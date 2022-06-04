<?php include("order-css.php") ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <h4 class=" text-center text-success">Popular Product</h4>
                    </div> -->
                    <div class="panel-body">
























<?php

    // $sql = "SELECT * FROM tbl_food WHERE active='Yes' AND featured = 'Yes'";

    $sql = "SELECT * FROM tbl_food WHERE category_id = $category_id";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);


    if($count > 0){

        //There are data
        while($row = mysqli_fetch_assoc($res)){

            //Now let's get all the velue
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $description = $row['description'];
            $image_name = $row['image_name'];



            ?>
            
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="thumbnail popular-thumnil">


                        <?php 
                        
                            if($image_name == ""){

                                echo "<div class='error'> Image is unavailable </div>";

                            }else{

                                ?>
                                
                                <img src="<?php echo SITEURL; ?>photos/images-food-order/food/<?php echo $image_name; ?>" 
                                    style="height: 200px; width: 250px;"  
                                    class="img-thumbnail popular-image" />
                                
                                <?php
                            }
                        
                        ?>

                    
                        <div class="caption">
                            <p class="pull-right text-success"><?php echo $price; ?></p>
                            <p class="text-success"> <?php echo $title; ?> </p>
                            <hr />
                            <p><?php echo $description; ?></p>

                            <a href="<?php echo SITEURL; ?>place-order.php?food_id=<?php echo $id; ?>" class="btn btn-primary" style="background: coral; color: white">Order Food</a>
                        </div>
                    </div>
                </div>
            
            <?php

        }

    }else{
        echo "<div class='error'> There are no items in this category</div>";
    }

?>





















                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("order-js.php") ?>