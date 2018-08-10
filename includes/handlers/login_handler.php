<?php
    if(isset($_POST['login-button'])) {
        $username = $_POST['login-username'];
        $password = $_POST['login-password'];
        
        $result = $account->login($username, $password);

        if($result) {
            $_SESSION['userLoggedIn'] = $username;
            header('Location: index.php');
        }
    }
?>
