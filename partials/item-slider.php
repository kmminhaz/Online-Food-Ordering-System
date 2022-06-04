<?php include("order-css.php") ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="owl-carousel owl-theme">
                            <!-- display categories from database -->
                            <?php
                            $sql = "SELECT * FROM tbl_category WHERE active = 'Yes' AND featured = 'Yes'";

                            // Execute the query
                            $res = mysqli_query($conn, $sql);

                            //Check if the category is available or not.
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {

                                //Category is Available
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $image_name = $row['image_name'];
                            ?>

                                    <div class="item">

                                        <!-- Checking if the image is available or not -->
                                        <?php
                                        if ($image_name == "") {
                                            echo "<div class = 'error'>Image not Available</div>";
                                        } else {
                                        ?>

                                            <img src="<?php echo SITEURL; ?>photos/images-food-order/category/<?php echo $image_name; ?>" style="height:270px; width:270px;" class="img-responsive">

                                        <?php
                                        }
                                        ?>
                                        <h4 class="float-text text-white" style="text-align: center; 
                                            background: rgba(0, 0, 0, 0.8); padding:5px; color:coral; 
                                            font-weight:bold;"><a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id ?>" style="text-decoration: none; color: coral">    <?php echo $title?>  </a></h4>
                                    </div>

                            <?php
                                }
                            } else {

                                //Category Not available
                                echo "<div class='error'> No Category Exists <div/>";
                            }

                            ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("order-js.php") ?>