<?php

namespace MVC;

class Router {

    public $getRoutes = [];
    public $postRoutes = [];

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }
    
    public function checkRoutes() {
        session_start();

        $auth = $_SESSION['login'] ?? null;

        $protected_routes = ['/', '/users', '/users/create', '/users/update', '/users/delete'];

        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        
        if($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if(in_array($currentUrl, $protected_routes) && !$auth) {
            header('Location: /login');
        }

        if($fn) {
            // The url and function exist
            call_user_func($fn, $this);
        } else {
            echo "Pagina no encontrada";
        }
    }

    // Return a view
    public function view($view, $data = []) {

        foreach($data as $key => $value) {
            $$key = $value;
        }

        ob_start(); // Stores in memory

        include __DIR__ . "/views/$view.php";
        $content = ob_get_clean(); // Clean de buffer
        include __DIR__ . "/views/layout.php";

    }
}