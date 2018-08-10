<?php
    class Account {

        private $conn;
        private $errorArray;
        
        public function __construct($conn) {
            $this->errorArray = array();
            $this->conn = $conn;
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

            $result = mysqli_query($this->conn,
                "INSERT INTO users VALUES (NULL, '$un', '$em', '$encrypt_pw', '$date', '$profile_pic')"
            );

            return $result;
        }

        private function validateUsername($un) {
            #Todo: check if username exists
        }

        private function validateEmail($em) {
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailError);
                return;
            }
            #Todo: check if email exists
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
