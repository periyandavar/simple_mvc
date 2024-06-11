<?php
    class Routes
    {
        private static $getMethodRoutes = array();
        private static $postMethodRoutes = array();

        public static function get($route)
        {
            if (
                !array_key_exists('url', $route)
                || !array_key_exists('controller', $route)
                || !array_key_exists('method', $route)
            ) {
                throw new Exception('Invalid route !');
            }
            array_push(self::$getMethodRoutes, $route);
        }

        public static function post($route)
        {
            if (
                !array_key_exists('url', $route)
                || !array_key_exists('controller', $route)
                || !array_key_exists('method', $route)
            ) {
                throw new Exception('Invalid route !');
            }
            array_push(self::$postMethodRoutes, $route);
        }
        
        public static function getRoutes($method)
        {
            if ($method == 'GET') {
                return self::$getMethodRoutes;
            } elseif ($method == 'POST') {
                return self::$postMethodRoutes;
            } else {
                return '';
            }
        }
    }
