<?php include("partials/menu.php") ?>

<!-- CAtegories Section Starts Here -->


<link rel="stylesheet" type="text/css" href="CSS/food-order-css/style.css">
<section class="categories">
    <div class="container">
        <br/> <br/> <br/>
        <h1 class="text-center"> Explore Foods </h1>


        <?php

        //Display all the catagories that are active
        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Count Rows
        $count = mysqli_num_rows($res);

        //Check Whether categories available or not
        if ($count > 0) {

            //Categories are Available
            while ($row = mysqli_fetch_assoc($res)) {

                //Get the values
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
        ?>

                <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id ?>">
                    <div class="box-3 float-container">

                    <?php
                    
                    if($image_name==""){
                        //Image not Available

                    }else{
                        ?>
                        
                        <img src="<?php echo SITEURL; ?>photos/images-food-order/category/<?php echo $image_name; ?>" style="height: 400px; width:400px" alt="Pizza" class="img-responsive img-curve">
                        
                        <?php
                    }

                    ?>

                        <h3 class="float-text text-white" style="background: rgba(0, 0, 0, 0.9); padding: 10px;"><?php echo $title ?></h3>
                    </div>
                </a>

        <?php


            }
        }else{

            //Categories Not Available
            echo "<div class='error'> Category not found </div>";
        }
        ?>


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->



