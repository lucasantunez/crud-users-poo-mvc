<?php

namespace Controllers;

use MVC\Router;
use Model\User;

class UserController {

    public static function index(Router $router) {

        $users = User::all();
        $router->view('users/index', [
            'users' => $users,
        ]);
    }

    public static function create(Router $router) {

        $user = new User;
        $errors = User::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['user'];
            $args['password'] = password_hash($args['password'], PASSWORD_BCRYPT);
            $user = new User($args);
            $errors = $user->validate();
            if(empty($errors)) {
                $user->save();
            }
        }
        $router->view('users/create', [
            'user' => $user,
            'errors' => $errors,
        ]);
    }

    public static function update(Router $router) {
        
        $id = validateOrRedirect('/users');
        $user = User::find($id);
        $errors = User::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST['user'];
            $args['password'] = password_hash($args['password'], PASSWORD_BCRYPT);
            $user->sync($args);
            $errors = $user->validate();
            if(empty($errors)) {
                $user->save();
            }
        }
        $router->view('/users/update', [
            'user' => $user,
            'errors' => $errors,
        ]);
    }

    public static function delete() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = validateOrRedirect('/users');
            $user = User::find($id);
            $user->delete();
        }
    }
}