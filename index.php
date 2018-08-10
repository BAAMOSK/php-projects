<?php 
    include('includes/config.php');

    if(isset($_SESSION['userLoggedIn'])) {
        $userLoggedIn = $_SESSION['userLoggedIn'];
    } else {
        header('Location: register.php');
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>

<body>
    <h1>Hello Tee</h1>
</body>

