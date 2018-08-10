<?php
    class Account {

        private $con;
        private $errorArray;
        
        public function __construct($conn) {
            $this->errorArray = array();
            $this->con = $conn;
        }

        public function login($un, $pw) {
            $pw = md5($pw);
            $query = mysqli_query($this->con,
                "SELECT * FROM users WHERE username='$un' AND password='$pw' "
            );

            if(mysqli_num_rows($query) == 1) {
                return true;
            } else {
                array_push($this->errorArray, Constants::$loginFail);
                return false;
            }
        }

        public function register($un, $em, $pw, $pwc) {
            $this->validateUsername($un);
            $this->validateEmail($em);
            $this->validatePasswords($pw, $pwc);
            
            if(empty($this->errorArray)) {
                return $this->registerUser($un, $em, $pw);
            } else {
                return false;
            }
        }

        public function getErrors($err) {
            if(!in_array($err, $this->errorArray)) {
                $err = ''; 
            }
            return "<span class='error-message'>$err</span>";
        }

        private function registerUser($un, $em, $pw) {
            $encrypt_pw = md5($pw);
            $date = date("Y-m-d");
            $profile_pic = 'assets/images/profile-pics/default.png';

            $result = mysqli_query($this->con,
                "INSERT INTO users VALUES (NULL, '$un', '$em', '$encrypt_pw', '$date', '$profile_pic')"
            );

            return $result;
        }

        private function validateUsername($un) {
            $username_exists = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
            
            if(mysqli_num_rows($username_exists) != 0) {
                array_push($this->errorArray, Constants::$usernameExists);
                return;
            }
        }

        private function validateEmail($em) {
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailError);
                return;
            }

            $email_exists = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");

            if(mysqli_num_rows($email_exists) != 0) {
                array_push($this->errorArray, Constants::$emailExists);
                return;
            }
        }

        private function validatePasswords($pw, $pwc) {
            $len = strlen($pw);

            if($pw != $pwc) {
                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
            }
            if($len < 5) {
                array_push($this->errorArray, Constants::$passwordMinLength);
            }
            if($len > 25) {
                array_push($this->errorArray, Constants::$passwordMaxLength);
            }
        }

    }

?>
