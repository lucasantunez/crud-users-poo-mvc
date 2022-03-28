<?php

namespace Controllers;

use MVC\Router;
use Model\User;

class LoginController {

    // Login
    public static function login(Router $router) {

        $auth = new User;
        $errors = User::getErrors();

        // If the request method is post
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $auth = new User($_POST);            
            $errors = $auth->validateLogin();

            if(empty($errors)) {
                // Check if user exist
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

        // Return the view
        $router->view('auth/login', [
            'auth' => $auth,
            'errors' => $errors,
        ]);
    }

    // Logout
    public static function logout() {
        session_start();
        // Clean session
        $_SESSION = [];
        // Redirect to login
        header('Location: /login');
    }
}