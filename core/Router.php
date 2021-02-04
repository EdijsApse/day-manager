<?php
    namespace Core;
    
    use Exception;

    class Router {

        protected $routes = [
            'GET' => [],
            'POST' => []
        ];

        public static function register($file) {
            $router = new self();

            if (!file_exists('../app/'.$file)) throw new Exception('Routes file not found!');

            require __DIR__.'/../app/'.$file;

            return $router;
        }

        public function get($uri, $controller) {
            $this->routes['GET'][$uri] = $controller;
        }

        public function post($uri, $controller) {
            $this->routes['POST'][$uri] = $controller;
        }

        public function direct($method, $uri) {

            if (!array_key_exists($method, $this->routes)) throw new Exception('Request method not registered!');

            if (!array_key_exists($uri, $this->routes[$method])) throw new Exception('Action not registered for this url!');

            return $this->callAction(...explode('@', $this->routes[$method][$uri]));
        }

        protected function callAction($controller, $method) {
            $controller = "\\App\\Controllers\\" . $controller;
            
            if (!class_exists($controller)) throw new Exception('Controller not found!');

            $instance = new $controller;

            if (!method_exists($instance, $method)) throw new Exception('Action not found!');

            return $instance->$method();

        }
    }