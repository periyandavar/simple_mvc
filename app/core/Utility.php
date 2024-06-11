<?php
    class Utility
    {
        public static function getAppURL()
        {
            $baseurl = $_SERVER['SERVER_PORT'] == 443? 'https://': 'http://'.$_SERVER['HTTP_HOST'];
            $requestedURL = $baseurl.$_SERVER['REQUEST_URI'];
            $appurl = str_replace(substr($requestedURL, strpos($requestedURL, 'index.php')), "", $requestedURL);
            return $appurl;
        }

        public static function redirect($route)
        {
            header('location:'.self::getAppURL().'index.php/'.$route);
        }
    }
