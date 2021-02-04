<?php

    namespace Core;

    use Twig\Environment;
    use Twig\Loader\FilesystemLoader;

    class BaseController {

        public function __construct()
        {
            $this->_setTwigEngine();
        }

        protected function _setTwigEngine() {
            $loader = new FilesystemLoader('../app/Views/');
    
            $this->twig = new Environment($loader);
        }

        public function render($view) {
            return $this->twig->display("$view.html");
        }
    }