<?php

namespace Model;

class User extends ActiveRecord {

    // DataBase
    protected static $table = 'users';
    protected static $columnsDB = ['id', 'name', 'last_name', 'email', 'password', 'create_at'];

    public $id;
    public $name;
    public $last_name;
    public $email;
    public $password;
    public $create_at;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->create_at = date('Y/m/d');
    }

    // Validate de values of inputs
    public function validate() {

        if(!$this->name) {
            self::$errors[] = "El campo Nombre es obligatorio";
        }

        if(!$this->last_name) {
            self::$errors[] = 'El campo Apellido es obligatorio';
        }

        if(!$this->email) {
            self::$errors[] = 'El campo Email es obligatorio';
        }

        if( strlen( $this->password ) < 8 ) {
            self::$errors[] = 'El campo Contraseña es obligatorio y debe tener al menos 8 caracteres';
        }

        return self::$errors;
    }

    // Validate login
    public function validateLogin() {

        if(!$this->email) {
            self::$errors[] = "El Email es obligatorio";
        }

        if(!$this->password) {
            self::$errors[] = 'La Contraseña es obligatoria';
        }

        return self::$errors;
    }

    // Validate if user exist
    public function userExist() {

        $query = "SELECT * FROM " . self::$table . " WHERE email = '" . $this->email . "' LIMIT 1";

        $result = self::$db->query($query);

        if(!$result->num_rows) {
            self::$errors[] = 'El Usuario y/o la Contraseña son incorrectos';
            return;
        }
        return $result;
    }

    // Validate password
    public function checkPassword($result) {
        $user = $result->fetch_object();

        $authenticated = password_verify($this->password, $user->password);

        if(!$authenticated) {
            self::$errors[] = 'El Usuario y/o la Contraseña son incorrectos';
        } else {
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_last_name'] = $user->last_name;
        }
        return $authenticated;
    }

    // Auth user
    public function authenticate() {

        session_start();        
        
        $_SESSION['login'] = true;

        header('Location: /');
    }

}