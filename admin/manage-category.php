<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Manage Category </h1>

        <br />
        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Displaying the add admin message
            unset($_SESSION['add']); //Not displaying the add admin message
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete']; //Displaying the delete admin message
            unset($_SESSION['delete']); //Not displaying the delete admin message
        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update']; //Displaying the update admin message
            unset($_SESSION['update']); //Not displaying the update admin message
        }
        ?>
        <br />

        <br />
        <!-- Button to add Category -->
        <a href="add-category.php" class="btn-primary"> Add Category </a>
        <br /> <br /> <br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            $sql = "SELECT * FROM tbl_category";
            $res = mysqli_query($conn, $sql);

            if ($res == TRUE) {
                $count = mysqli_num_rows($res); // to get all the rows in database

                $sn = 1; //This value will count the id

                //Check if the num of rows
                if ($count > 0) {

                    while ($rows = mysqli_fetch_assoc($res)) {
                        // Using while loop to get the data from database.


                        //Get individual data
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $image_name = $rows['image_name'];
                        $featured = $rows['featured'];
                        $active = $rows['active'];

                        //Display the values in our Table
            ?>

                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $title; ?></td>
                            
                            <td>
                                <?php
                                    //Check if the image name is available or not
                                    if($image_name!=""){
                                        //display the image
                                        ?>

                                        <img src="<?php echo SITEURL; ?>photos/images-food-order/category/<?php echo $image_name; ?>" width="200px;" >;

                                        <?php
                                    }else{
                                        //display the no image message
                                        echo "<div class='error'> Image Not Available</div>";
                                    }
                                ?>

                            </td>
                            
                            <td><?php echo $featured; ?></td>
                            <td><?php echo $active; ?></td>
                            <td>
                                <a href="<?php echo SITEURL ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondery"> Update Category </a>
                                <a href="<?php echo SITEURL ?>admin/delete-category.php?id=<?php echo $id; ?>" class="btn-third"> Delete Category </a>
                            </td>
                        </tr>

            <?php
                    }
                }
            }
            ?>

        </table>

    </div>
</div>

<?php include('partials/footer.php'); ?>