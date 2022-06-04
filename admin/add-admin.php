<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/>
        <?php

            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; //Displaying the add admin message
                unset($_SESSION['add']); //Not displaying the add admin message
            }
        ?>
        <br/> 

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <section>
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5" style="box-shadow: 0px 10px 20px 10px #888888;">
                                    <h2 class="text-uppercase text-center mb-5" style="color: black;">Create an account</h2>

                                    <form method="POST" action="">

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" placeholder="Name" />
                                            <!-- <label class="form-label" for="form3Example1cg">Your Name</label> -->
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="username" placeholder="Username" />
                                            <!-- <label class="form-label" for="form3Example3cg">Your Email</label> -->
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" placeholder="Password" />
                                            <!-- <label class="form-label" for="form3Example4cg">Password</label> -->
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <input type="submit" name="submit" value="submit" class="submit">
                                        </div>

                                        <!-- <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p> -->

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php include('partials/footer.php') ?>


<?php
// Check if the submit button is clicked or not
if (isset($_POST['submit'])) {
    // echo "The button is clicked";

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //encripted password.

    // SQL Query for inserting the values in database
    $sql = "INSERT INTO `admin` SET `Name` = '$name', `username` = '$username', `password` = '$password' ";

    // Executing the query
    $res = mysqli_query($conn, $sql) or die(mysqli_connect_error());

    if($res == true){
        // Creating a session variable to display the message
        $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
        //Redirect page to Manage-Admin
        header('location: '.SITEURL.'admin/manage-admin.php');
    }else{
        // Creating a session variable to display the message
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
        //Redirect page to Add-Admin
        header("location: ".SITEURL."admin/add-admin.php");
    }
}
?>