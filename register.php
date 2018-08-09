<?php
    function sanitizeInput($input) {
        $input = strip_tags($input);
        $input = str_replace(' ', '', $input);
        return $input;    
    }

    if(isset($_POST['login-button'])) {
        echo 'Login button was pressed';
    }

    if(isset($_POST['register-button'])) {

        $username = sanitizeInput($_POST['register-username']);
        $email = sanitizeInput($_POST['register-email']);
        $password = sanitizeInput($_POST['register-password']);
        $password_confirm = sanitizeInput($_POST['register-password-confirm']);

        echo $username, $email, $password, $password_confirm;

    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEE's SPOTIFY</title>
</head>

<body>
    <div id="input-container">
        <form id="login-form" action="register.php" method="POST">
            <h2>Login to your account</h2>
            <input id="login-username" name="login-username" type="text" placeholder="Username" required>
            <input id="login-password" name="login-password" type="password" placeholder="Password" required>
            <button type="submit" name="login-button" value="login">LOGIN</button>
        </form>

        <form id="register-form" action="register.php" method="POST">
            <h2>Register your new account</h2>
            <input id="register-username" name="register-username" type="text" placeholder="Username">
            <input id="register-email" name="register-email" type="email" placeholder="Email">
            <input id="register-password" name="register-password" type="password" placeholder="Password">
            <input id="register-password-confirm" name="register-password-confirm" type="password" placeholder="Confirm Password">
            <button type="submit" name="register-button">REGISTER</button>
        </form>
    </div>
</body>

