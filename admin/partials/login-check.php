<?php
    if(!isset($_SESSION['user'])){ //if user session is not set
        $_SESSION['not-logedin-message'] ="<div class='error text-center'> Please login to access Admin Panel </div>";
        header('location: '. SITEURL .'admin/login.php');
    }
?>