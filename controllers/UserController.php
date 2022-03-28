<?php

namespace Controllers;

use MVC\Router;
use Model\User;

class UserController {

    // Return users index view
    public static function index(Router $router) {

        $users = User::all();
        $router->view('users/index', [
            'users' => $users,
        ]);
    }

    // Create user
    public static function create(Router $router) {

        $user = new User;
        $errors = User::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new User($_POST['user']);
            $errors = $user->validate();            
            if(empty($errors)) {
                $user->password = password_hash($user->password, PASSWORD_BCRYPT);
                $user->save();
            }
        }
        $router->view('users/create', [
            'user' => $user,
            'errors' => $errors,
        ]);
    }

    // Update user
    public static function update(Router $router) {
        
        $id = validateOrRedirect('/users');
        $user = User::find($id);
        $errors = User::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['user'];
            $user->sync($args);
            $errors = $user->validate();
            if(empty($errors)) {
                $user->password = password_hash($user->password, PASSWORD_BCRYPT);
                $user->save();
            }
        }
        $router->view('/users/update', [
            'user' => $user,
            'errors' => $errors,
        ]);
    }

    // Delete user
    public static function delete() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = validateOrRedirect('/users');
            $user = User::find($id);
            $user->delete();
        }
    }
}