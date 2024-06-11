<?php
    class UserController
    {
        public function login()
        {
            View::load('login.php');
        }

        public function register()
        {
            View::load('register.php');
        }

        public function doLogin()
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $errors = [];
            if (!Validator::isValidInput($username, Validator::USERNAME_PATTERN)) {
                $errors[] = 'Enter valid username !';
            }
            if ($password == null) {
                $errors[] = 'Password is required !';
            }
            $user = new UserModel();
            if ($user->isValidUser(['username' => $username, 'password' => $password])) {
                $_SESSION['success'] = 'Valid user !';
                Utility::redirect('login');
            } else {
                $_SESSION['errors'] = array('Invalid credentials !');
                Utility::redirect('login');
            }
        }

        public function doRegister()
        {
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm-password'];
            $errors = [];
            if (!Validator::isValidInput($email, Validator::EMAIL_PATTERN)) {
                $errors[] ='Enter valid email id !';
            }
            if (!Validator::isValidInput($username, Validator::USERNAME_PATTERN)) {
                $errors[] ='Enter valid username !';
            }
            if ($password == null) {
                $errors[] ='Password is required !';
            }
            if ($confirmPassword == null) {
                $errors[] ='Confirm password is required !';
            }
            if ($password != $confirmPassword) {
                $errors[] ='Password and confirm password is not same !';
            }
            if (empty($errors)) {
                $newUser = new UserModel();
                $data = [
                    'email' => $email,
                    'username' => $username,
                    'password' => $password
                ];
                if ($newUser->registerUser($data)) {
                    $_SESSION['success'] = 'Registration success !';
                    Utility::redirect('login');
                } else {
                    array_push($errors, 'Username or email already taken !');
                    $_SESSION['error'] = $errors;
                    Utility::redirect('register');
                }
            } else {
                $_SESSION['error'] = $errors;
                Utility::redirect('register');
            }
        }
    }
