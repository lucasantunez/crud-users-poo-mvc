<?php

namespace Controllers;

use MVC\Router;
use Model\User;

class LoginController {

    public static function login(Router $router) {

        $errors = User::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $auth = new User($_POST);

            $errors = $auth->validateLogin();

            if(empty($errors)) {

                $result = $auth->userExist();

                if(!$result) {
                    $errors = User::getErrors();
                } else {
                    $authenticated = $auth->checkPassword($result);

                    if($authenticated) {
                        $auth->authenticate();
                    } else {
                        $errors = User::getErrors();
                    }
                }
            }
        }

        $router->view('auth/login', [
            'errors' => $errors,
        ]);
    }

    public static function logout() {
        session_start();

        $_SESSION = [];

        header('Location: /login');
    }
}