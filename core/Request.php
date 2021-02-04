<?php

    namespace Core;

    class Request {

        public static function method() {
            return strtoupper($_SERVER['REQUEST_METHOD']);
        }

        public static function uri() {
            return $_SERVER['REQUEST_URI'];
        }
    }