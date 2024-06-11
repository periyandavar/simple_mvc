<?php
    class Database
    {
        private static $db;
        private const DB_USERNAME = 'root';
        private const DB_PASSWORD = '';
        private const DB_NAME = 'php-training';
        private const DB_HOST = 'localhost';

        private function __construct()
        {
            
        }

        public static function getDBInstance()
        {
            if (is_null(self::$db)) {
                self::$db = new mysqli(self::DB_HOST, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME);
                if (mysqli_connect_errno(self::$db)) {
                    return false;
                }
                return self::$db;
            }
            return self::$db;
        }
    }
