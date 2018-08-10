<?php 
    ob_start();
    $timezone = date_default_timezone_set('America/New_York');
    $conn = mysqli_connect('localhost', 'tee', 'asdfasdf', 'spotify');

    if(mysqli_connect_errno()) {
        echo 'Failed to connect: ' . mysqli_connect_errno();
    }
?>
