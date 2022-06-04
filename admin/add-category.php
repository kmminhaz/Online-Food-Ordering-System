<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Categories</h1>
        <br />
        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Displaying the add admin message
            unset($_SESSION['add']); //Not displaying the add admin message
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload']; //Displaying the upload admin message
            unset($_SESSION['upload']); //Not displaying the upload admin message
        }
        ?>

        <br />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <section>
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5" style="box-shadow: 0px 10px 20px 10px #888888;">
                                    <h2 class="text-uppercase text-center mb-5" style="color: black;">Add Category form</h2>

                                    <form method="POST" action="" enctype="multipart/form-data" style="color: black;">

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="title" placeholder="Category Title" />
                                            <!-- <label class="form-label" for="form3Example1cg">Your Name</label> -->
                                        </div>

                                        <div class="form-outline mb-4" style="font-size: 20px; font-weight: bold;">
                                            <tr>
                                                <td> Select Image</td>
                                                <td>
                                                    <input type="file" name="image">
                                                </td>
                                            </tr>
                                        </div>

                                        <div class="form-outline mb-4" style="font-size: 20px; font-weight: bold;">
                                            <tr>
                                                <td>
                                                    Featured &nbsp:
                                                </td>
                                                <td>
                                                    <input type="radio" name="featured" value="Yes" style="margin-left: 40px;"> Yes
                                                    <input type="radio" name="featured" value="No" style="margin-left: 40px;"> No
                                                </td>
                                            </tr>
                                        </div>

                                        <div class="form-outline mb-4" style="font-size: 20px; font-weight: bold;">
                                            <tr>
                                                <td>
                                                    Active &nbsp &nbsp &nbsp:
                                                </td>
                                                <td>
                                                    <input type="radio" name="active" value="Yes" style="margin-left: 40px;"> Yes
                                                    <input type="radio" name="active" value="No" style="margin-left: 40px;"> No
                                                </td>
                                            </tr>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <input type="submit" name="submit" value="Add Category" class="submit">
                                        </div>

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

    $title = $_POST['title'];
    //For radio input, we need to check if the admin has clicked the button or not
    if (isset($_POST['featured'])) {
        // Get the value from form
        $featured = $_POST['featured'];
    } else {
        // Default Value
        $featured = "No";
    }
    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }

    if (isset($_FILES['image']['name'])) {

        // Upload the image
        // To upload image we need image name, source path and destination path
        $image_name = $_FILES['image']['name'];

        // upload image only if the image is selected
        if ($image_name != "") {

            //Auto Rename our Image.
            //Get the Extension of our image.
            $ext = end(explode('.', $image_name));

            //Rename the image
            $image_name = 'Food_Category_' . rand(0000, 9999) . '.' . $ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../photos/images-food-order/category/" . $image_name;

            // Finally upload the image
            $upload = move_uploaded_file($source_path, $destination_path);

            //Check whether the image is uploaded or not
            //And if the image is not uploaded then we will stop the process and redirect the error message
            if ($upload == false) {
                //set a session variable to show a message
                $_SESSION['upload'] = "<div class='error'>Failed to upload the image</div>";
                header('location: ' . SITEURL . 'admin/add-category.php');
                //Stop the process
                die();
            }
        }
    } else {
        //don't upload image and set the image value as blank
        $image_name = "";
    }
    // SQL Query for inserting the Category into database
    $sql = "INSERT INTO `tbl_category` SET `title` = '$title', `image_name` = '$image_name', 
    `featured` = '$featured', `active` = '$active' ";

    // Executing the query
    $res = mysqli_query($conn, $sql) or die(mysqli_connect_error());

    if ($res == true) {
        // Creating a session variable to display the message
        $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
        //Redirect page to Manage-Category
        // header('location: ' . SITEURL . 'admin/manage-category.php');
        ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>admin/manage-category.php';
        </script>
    <?php
    } else {
        // Creating a session variable to display the message
        $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
        //Redirect page to Add-Category
        // header("location: " . SITEURL . "admin/add-category.php");
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>admin/manage-category.php';
        </script>
<?php
    }
}
?>