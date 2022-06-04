<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br />

        <?php

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update']; //Displaying the update admin message
            unset($_SESSION['update']); //Not displaying the update admin message
        }
        ?>
        <br />

        <?php

        $id = $_GET['id']; //getting the id from manage-category page

        $sql = "SELECT * FROM tbl_category WHERE id=$id";

        $res = mysqli_query($conn, $sql);

        //Check if the query is executed or not

        if ($res == true) {

            $count = mysqli_num_rows($res);

            if ($count == 1) {

                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            } else {
                $_SESSION['update'] = "<div class='error'>Category not Found</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
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
                                    <h2 class="text-uppercase text-center mb-5" style="color: black;">Update the Category</h2>

                                    <form method="POST" action="" enctype="multipart/form-data" style="color: black;">

                                        <div class="form-outline mb-4">
                                            <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="title" placeholder="Category Title" value="<?php echo $title; ?>" />
                                            <!-- <label class="form-label" for="form3Example1cg">Your Name</label> -->
                                        </div>

                                        <div class="form-outline mb-4" style="font-size: 15px; font-weight: bold;">
                                            <tr>
                                                <td> Current Image :&nbsp &nbsp &nbsp &nbsp </td>
                                                <td>

                                                    <?php
                                                    if ($current_image != "") {

                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>photos/images-food-order/category/<?php echo $current_image; ?>" width="200px">

                                                    <?php

                                                    } else {
                                                        echo "<div class='error'> No Image has been selected</div>";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </div>

                                        <div class="form-outline mb-4" style="font-size: 15px; font-weight: bold;">
                                            <tr>
                                                <td> New Image :&nbsp &nbsp &nbsp &nbsp </td>
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
                                                    <input <?php if ($featured == "Yes") {
                                                                echo "checked";
                                                            } ?> type="radio" name="featured" value="Yes" style="margin-left: 40px;"> Yes
                                                    <input <?php if ($featured == "No") {
                                                                echo "checked";
                                                            } ?> type="radio" name="featured" value="No" style="margin-left: 40px;"> No
                                                </td>
                                            </tr>
                                        </div>

                                        <div class="form-outline mb-4" style="font-size: 20px; font-weight: bold;">
                                            <tr>
                                                <td>
                                                    Active &nbsp &nbsp &nbsp:
                                                </td>
                                                <td>
                                                    <input <?php if ($active == "Yes") {
                                                                echo "checked";
                                                            } ?> type="radio" name="active" value="Yes" style="margin-left: 40px;"> Yes
                                                    <input <?php if ($active == "No") {
                                                                echo "checked";
                                                            } ?> type="radio" name="active" value="No" style="margin-left: 40px;"> No
                                                </td>
                                            </tr>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <input type="submit" name="submit" value="Update Category" class="submit">
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
    // echo "The button is clicked";
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    if (isset($_FILES['image']['name'])) {
        //get the image details to update in database
        $image_name = $_FILES['image']['name'];

        if ($image_name != "") {
            //Image Available
            // Upload the new Image
            $ext = end(explode('.', $image_name));

            //Rename the image
            $image_name = 'Food_Category_' . rand(000, 999) . '.' . $ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../photos/images-food-order/category/" . $image_name;

            // Finally upload the image
            $upload = move_uploaded_file($source_path, $destination_path);
            //Check whether the image is uploaded or not
            //And if the image is not uploaded then we will stop the process and redirect the error message
            if ($upload == false) {
                //set a session variable to show a message
                $_SESSION['update'] = "<div class='error'>Failed to upload the image</div>";
                header('location:' . SITEURL . 'admin/manage-category.php');
                //Stop the process
                die();
            }

            // If the current image is available then we are removing the image
            if ($current_image != "") {
                //remove the current image:
                $remove_path = "../photos/images-food-order/category/" . $current_image;
                $remove = unlink($remove_path);

                //check if the image is remove or not
                if ($remove == false) {
                    $_SESSION['update'] = "<div class='error'>Failed to remove the image</div> ";
                    header('location:' . SITEURL . 'admin/manage-category.php');
                    die(); //here i am stopping the feature
                }
            }
        } else {
            $image_name = $current_image;
        }
    } else {
        $image_name = $current_image;
    }

    // SQL Query for Updating the values in database
    $sql2 = "UPDATE `tbl_category` SET `title` = '$title', `image_name` = '$image_name', `featured` = '$featured', `active` = '$active' WHERE `id`= '$id' ";

    // Executing the query
    $res = mysqli_query($conn, $sql2) or die(mysqli_connect_error());

    if ($res == true) {
        // Creating a session variable to display the message
        $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
        //Redirect page to Manage-Category
        // header('location: '.SITEURL.'admin/manage-category.php');
?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>admin/manage-category.php';
        </script>
    <?php
    } else {
        // Creating a session variable to display the message
        $_SESSION['update'] = "<div class='error'>Failed to Add category.</div>";
        //Redirect page to Add-Category
        // header('location:' . SITEURL . 'admin/add-category.php');
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>admin/manage-category.php';
        </script>
<?php
    }
}
?>