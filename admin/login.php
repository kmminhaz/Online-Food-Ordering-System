<?php include('../Config/connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../CSS/food-order-css/admin.css">
</head>

<body style="background: white; color:black">

    <div class="login">
        <br />
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['not-logedin-message'])) {
            echo $_SESSION['not-logedin-message'];
            unset($_SESSION['not-logedin-message']);
        }
        ?>
        <br /> <br />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <section>
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5" style="box-shadow: 0px 10px 20px 10px #888888;">
                                    <h2 class="text-uppercase text-center mb-5">Login</h2>

                                    <form method="POST" action="">

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="username" placeholder="Username" />
                                            <!-- <label class="form-label" for="form3Example1cg">Your Name</label> -->
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example3cg" class="form-control form-control-lg" name="password" placeholder="Password" />
                                            <!-- <label class="form-label" for="form3Example3cg">Your Email</label> -->
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <input type="hidden" name="id" value="">
                                            <input type="submit" name="submit" value="Login" class="submit">
                                        </div>

                                        <!-- <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p> -->

                                    </form>
                                    <br /> <br />
                                    <p class="text-center">Created By - <a href="../Developers.php/"> MSO`Trios` </a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- <br/> <br/> -->
        <!-- <p class="text-center">Created By - <a href="MSO`Trios`"> MSO`Trios` </a> </p> -->
    </div>
    <link rel="stylesheet" href="../CSS/food-order-css/admin.css">
</body>

</html>
<link rel="stylesheet" href="../CSS/food-order-css/admin.css">

<?php
// Check if the submit button is clicked or not
if (isset($_POST['submit'])) {
    // echo "The button is clicked";
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password' ";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        // header('location: ' . SITEURL . 'admin/');
        $_SESSION['login'] = "<div class='success'>Login Successful</div>";
        $_SESSION['user'] = $username;
?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>admin/';
        </script>
    <?php
    } else {
        // header('location: ' . SITEURL . 'admin/login.php');
        $_SESSION['login'] = "<div class='error text-center'>Username or password is wrong</div>";
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>admin/login.php';
        </script>
<?php
    }
}
?>