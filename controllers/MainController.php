<?php

namespace Controllers;

use MVC\Router;

class MainController {

    public static function index(Router $router) {

        $router->view('dashboard/index');
    }
}