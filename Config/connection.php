<?php
    
    // starting the session
    session_start();

    define('SITEURL', 'http://localhost/projects/Web/Eager!Food/');
    $url = 'localhost';
    $username = 'root';
    $password = '';
    $conn = mysqli_connect($url, $username, $password, "online_food_ordering_system") or die(mysqli_connect_error());

?>