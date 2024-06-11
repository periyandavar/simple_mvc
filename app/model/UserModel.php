<?php
    class UserModel
    {
        private $table = 'user';

        public function registerUser($data)
        {
            $db = Database::getDBInstance();
            $query = "INSERT INTO $this->table (username, email, password) VALUES
                        ('".$data['username']."', '".$data['email']."','".$data['password']."')";
            return mysqli_query($db, $query);
        }

        public function isValidUser($data)
        {
            $db = Database::getDBInstance();
            $query = "SELECT * FROM $this->table WHERE status = 1";
            $resultSet = mysqli_query($db, $query);
            $validUser = false;
            if (mysqli_num_rows($resultSet) > 0) {
                while ($user = mysqli_fetch_assoc($resultSet)) {
                    if (
                        $user['username'] == $data['username']
                        && $user['password'] == $data['password']
                    ) {
                        $validUser = true;
                    }
                }
            }
            return $validUser;
        }
    }
