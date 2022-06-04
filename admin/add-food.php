<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br />
        <?php

        if (isset($_SESSION['updated'])) {
            echo $_SESSION['updated']; //Displaying the updated admin message
            unset($_SESSION['updated']); //Not displaying the updated admin message
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
                                    <h2 class="text-uppercase text-center mb-5" style="color: black;">Add a food Item</h2>

                                    <form method="POST" action="" enctype="multipart/form-data" style="color: black;">

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="title" placeholder="Title" />
                                            <!-- <label class="form-label" for="form3Example1cg">Your Name</label> -->
                                        </div>

                                        <div class="form-outline mb-4" style="font-size: 20px; font-weight: bold;">
                                            <tr>
                                                <td>Description : &nbsp &nbsp &nbsp</td>
                                                <td>
                                                    <textarea name="description" cols="50" rows="5"></textarea>
                                                </td>
                                            </tr>
                                            <!-- <input type="text" id="form3Example3cg" class="form-control form-control-lg" name="description" placeholder="Description" /> -->
                                            <!-- <label class="form-label" for="form3Example3cg">Your Email</label> -->
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="number" id="form3Example4cg" class="form-control form-control-lg" name="price" placeholder="Price" />
                                            <!-- <label class="form-label" for="form3Example4cg">Password</label> -->
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
                                                    <select name="category_id" id="" class="select-design">
                                                        <?php

                                                        //Creating PHP code to display categories from Database
                                                        //1. Creating SQL to get all active categories from database
                                                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                                        //Executing query
                                                        $res = mysqli_query($conn, $sql);

                                                        //Count rows to see if we have categorys or not
                                                        $count = mysqli_num_rows($res);

                                                        //IF count is greater than zero, then we have categorys otherwise no categorys.
                                                        if ($count > 0) {

                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                //get the details of categories
                                                                $id = $row['id'];
                                                                $title = $row['title'];
                                                        ?>

                                                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                                            <?php
                                                            }
                                                        } else {
                                                            ?>
                                                            <option value="0">No Category Found</option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
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
                                            <input type="submit" name="submit" value="Add Food" class="submit">
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

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = "No";
    }
    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }

    // print_r($_FILES['image']);

    // die();
    //Check if the image button is clicked ro not
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
            $image_name = 'Food_Name_' . rand(0000, 9999) . '.' . $ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../photos/images-food-order/food/" . $image_name;

            // Finally upload the image
            $upload = move_uploaded_file($source_path, $destination_path);

            //Check whether the image is uploaded or not
            //And if the image is not uploaded then we will stop the process and redirect the error message
            if ($upload == false) {
                //set a session variable to show a message
                $_SESSION['upload'] = "<div class='error'>Failed to upload the image</div>";
                header('location: ' . SITEURL . 'admin/add-food.php');
                //Stop the process
                die();
            }
        }
    } else {
        //don't upload image and set the image value as blank
        $image_name = "";
    }

    // SQL Query for inserting the values in database
    $sql2 = "INSERT INTO `tbl_food` SET `title` = '$title', `description` = '$description', `price` = '$price', `image_name` = '$image_name', `category_id` = '$category_id', `featured` = '$featured', `active` = '$active'";

    // Executing the query
    $res2 = mysqli_query($conn, $sql2) or die(mysqli_connect_error());

    if ($res2 == true) {
        // Creating a session variable to display the message
        $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
        //Redirect page to Manage-Food
        // header('location: '.SITEURL.'admin/manage-food.php');
?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>admin/manage-food.php';
        </script>
    <?php
    } else {
        // Creating a session variable to display the message
        $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
        //Redirect page to Add-Food
        //header("location: " . SITEURL . "admin/add-food.php");
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>admin/add-food.php';
        </script>
<?php
    }
}
?>