<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>DASHBOARD</h1>

        <br /> <br />

        <?php

        if (isset($_SESSION['login'])) {
            echo $_SESSION['login']; //Displaying the login admin message
            unset($_SESSION['login']); //Not displaying the login admin message
        }
        ?>
        <br /> <br />

        <div class="clearfix"></div>

    </div>
</div>

<?php include('partials/footer.php'); ?>