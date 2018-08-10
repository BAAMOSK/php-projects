<?php
    function sanitizeInput($input) {
        $input = strip_tags($input);
        $input = str_replace(' ', '', $input);
        return $input;    
    }

    if(isset($_POST['register-button'])) {

        $username = sanitizeInput($_POST['register-username']);
        $email = sanitizeInput($_POST['register-email']);
        $password = sanitizeInput($_POST['register-password']);
        $password_confirm = sanitizeInput($_POST['register-password-confirm']);

        $loginSuccess = $account->register($username, $email, $password, $password_confirm);

        if($loginSuccess) {
            header('Location: index.php');
        }

    }
?>

