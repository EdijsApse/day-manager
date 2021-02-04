<?php

    require '../vendor/autoload.php';

    use Core\Router;
    use Core\Request;

    Router::register('routes.php')->direct(Request::method(), Request::uri());