<?php include("partials/menu.php") ?>

<?php

//Check whether id is passed or not
if (isset($_GET['category_id'])) {

    //Category id is set and get the id 
    $category_id = $_GET['category_id'];

    $sql = "SELECT title FROM tbl_category WHERE id=$category_id ";

    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);

    $category_title = $row['title'];
} else {
    header('location:' . SITEURL . 'order.php');
}

?>

<link rel="stylesheet" type="text/css" href="CSS/food-order-css/style.css">
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2 style="color: white;">Foods on <a href="#" class="text-white" style="color: coral;"> <?php echo $category_title; ?> </a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->


<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>



        <?php include("partials/populer-product-category-food.php") ?>
        <!-- <link rel="stylesheet" type="text/css" href="CSS/food-order-css/style.css">; -->
        <link rel="stylesheet" type="text/css" href="CSS/index.css">;



        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->


<?php include("partials/footer.php") ?>