<?php

namespace Controllers;

use MVC\Router;

class MainController {

    // Return de dashboard index view
    public static function index(Router $router) {

        $router->view('dashboard/index');
    }
}