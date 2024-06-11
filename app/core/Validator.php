<?php
    class Validator
    {
        public const EMAIL_PATTERN = '/(^[a-z]+[0-9\._a-zA-Z]+)@{1}([a-zA-Z]+)\.{1}([a-zA-Z]{2,4}$)/';
        public const USERNAME_PATTERN = '/^[a-z]+[0-9a-z_\-\.]+$/';
        
        public static function isValidInput($input, $pattern)
        {
            return preg_match($pattern, $input);
        }
    }
