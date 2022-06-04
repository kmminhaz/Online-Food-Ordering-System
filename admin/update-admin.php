<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br/>

        <?php

            if(isset($_SESSION['update'])){
                echo $_SESSION['update']; //Displaying the update admin message
                unset($_SESSION['update']); //Not displaying the update admin message
            }
        ?>
        <br/> 

        <?php

            $id = $_GET['id'];

            $sql = "SELECT * FROM admin WHERE SI_No=$id";

            $res = mysqli_query($conn, $sql);

            //Check if the query is executed or not

            if($res == true){
                
                $count = mysqli_num_rows($res);

                if($count==1){

                    $row = mysqli_fetch_assoc($res);

                    $name = $row['Name'];
                    $username = $row['username'];
                }else{

                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }
        ?>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <section>
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5" style="box-shadow: 0px 10px 20px 10px #888888;">
                                    <h2 class="text-uppercase text-center mb-5" style="color: black;"> Update the information </h2>

                                    <form method="POST" action="" style="color: black;">

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" placeholder="Name" value="<?php echo $name; ?>"/>
                                            <!-- <label class="form-label" for="form3Example1cg">Your Name</label> -->
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="username" placeholder="Username" value="<?php echo $username; ?>"/>
                                            <!-- <label class="form-label" for="form3Example3cg">Your Email</label> -->
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
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
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];

    //echo $id. " ". $name. " ". $username;
    // echo $name. " ". $username. " ". $password;

    // SQL Query for inserting the values in database
    $sql = "UPDATE `admin` SET `Name` = '$name', `username` = '$username' WHERE `SI_No`= '$id' ";



    // Executing the query
    $res = mysqli_query($conn, $sql) or die(mysqli_connect_error());


    if($res==true){
        // Creating a session variable to display the message
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";

        //Redirect page to Manage-Admin
        header('location:'.SITEURL.'admin/manage-admin.php');
    }else{
        // Creating a session variable to display the message
        $_SESSION['update'] = "<div class='error'>Failed to Add Admin.</div>";
        
        //Redirect page to Add-Admin
        header("location: ".SITEURL."admin/add-admin.php");
    }
}
?>