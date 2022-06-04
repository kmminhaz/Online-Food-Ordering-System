<?php include("partials/menu.php") ?>

<link rel="stylesheet" type="text/css" href="CSS/food-order-css/style.css">
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <?php 
        
            $search = $_POST['search'];

        ?>

        <h2 style="color: white;">Foods on Your Search <a href="#" style="color: coral"><?php echo $search; ?></a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>


        <?php


        //Get the search keyword
        $search = $_POST['search'];


        //SQL Query for search:
        $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";

 
        //Executing the query
        $res = mysqli_query($conn, $sql);

        //count Rows
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            //Food Available
            while ($row = mysqli_fetch_assoc($res)) {

                //Get the details
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];

        ?>


                <div class="food-menu-box">
                    <div class="food-menu-img">

                        <?php
                            
                            
                            if($image_name == ""){
                                // There are no images;
                                echo "<div class='error'> There are no images </div>";
                            }
                            else{

                                ?>


                                    <!-- // Other wise there are image -->
                                    <img src="<?php echo SITEURL; ?>photos/images-food-order/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">


                                <?php
                            }
                        
                        
                        ?>

                    </div>

                    <div class="food-menu-desc">
                        <h4> <?php echo $title; ?> </h4>
                        <p class="food-price">
                            <?php echo $price; ?> </p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="<?php echo SITEURL; ?>place-order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

        <?php


            }
        } else {
            //No food Available

            echo "<div class='error'> No Food is available based on your search </div>";
        }


        ?>



        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include("partials/footer.php") ?>