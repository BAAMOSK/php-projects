<?php
    include('includes/config.php');
    include('includes/classes/Constants.php');
    include('includes/classes/Account.php');

    $account = new Account($conn);

    include('includes/handlers/login_handler.php');
    include('includes/handlers/register_handler.php');

    function getInputValue($name) {
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
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

            <div> <?php echo $account->getErrors(Constants::$emailError); ?></div>
            <div> <?php echo $account->getErrors(Constants::$passwordsDoNotMatch); ?></div>
            <div> <?php echo $account->getErrors(Constants::$passwordMinLength); ?></div>
            <div> <?php echo $account->getErrors(Constants::$passwordMaxLength); ?></div>

            <input id="register-username" name="register-username" type="text" placeholder="Username" 
                value="<?php getInputValue('register-username'); ?>">
            <input id="register-email" name="register-email" type="email" placeholder="Email"
                value="<?php getInputValue('register-email'); ?>">
            <input id="register-password" name="register-password" type="password" placeholder="Password">
            <input id="register-password-confirm" name="register-password-confirm" type="password" placeholder="Confirm Password">
            <button type="submit" name="register-button">REGISTER</button>
        </form>
    </div>
</body>

