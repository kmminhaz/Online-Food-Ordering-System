<?php include("partials/menu.php") ?>

<link rel="stylesheet" type="text/css" href="CSS/food-order-css/style.css">

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center" style="background-image: url(photos/food-background-1.jpg);">
    
    <div class="container">

        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <br /> <br />

        <?php
        //Display Foods that are Active

        $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Count the number of rows
        $count = mysqli_num_rows($res);

        //Check whether the foods are available or not 
        if ($count > 0) {

            //Foods Available
            while ($row = mysqli_fetch_assoc($res)) {

                //Get the Values
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];

        ?>


                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        //Check if the image is available or not
                            if ($image_name == "") {
                                //Image is not Available;
                                echo "<div class='error'> Image not Available </div>";
                            } else {
                        ?>
                            <!-- Image is Available; -->
                            <img src="<?php echo SITEURL; ?>photos/images-food-order/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                        <?php
                            }
                        ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price"><?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Food</a>
                    </div>
                </div>

        <?php
            }
        }
        ?>

        <div class="clearfix"></div>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include("partials/footer.php") ?>