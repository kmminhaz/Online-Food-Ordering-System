<?php include("Config/connection.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Eager!Food </title>
    <link rel="stylesheet" type="text/css" href="CSS/index.css"> 
</head>
<body>

    
<header>
    <a href="#" class = "logo" >
        <img src="video/delivery-boy.gif" style = "height: 50px; width: 70px; padding: 10px;">
        <p style = "margin: auto; margin-left: 20px;"> Eager!!..Food </p>
    </a>

    <ul>
        <li> <a href="<?php echo SITEURL; ?>"> Home </a> </li>
        <li> <a href="<?php echo SITEURL; ?>admin/index.php"> Admin </a> </li>
        <li> <a href = "<?php echo SITEURL; ?>order.php"> Order </a> </li>
    </ul>
    <script src="JS/index.js" type="text/javascript"></script>
</header>