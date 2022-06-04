<?php include("partials/menu.php") ?>





<?php

//Check whether id is passed or not
if (isset($_GET['food_id'])) {

    //Category id is set and get the id 
    $food_id = $_GET['food_id'];

    //Get the details of the selected food
    $sql = "SELECT * FROM tbl_food WHERE id=$food_id ";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Count the rows
    $count = mysqli_num_rows($res);

    if ($count == 1) {

        // Food Available
        // Get the data from database
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        // Food Not Available
        header('location: ' . SITEURL);
    }
} else {
    header('location:' . SITEURL . 'order.php');
}

?>







<link rel="stylesheet" type="text/css" href="CSS/food-order-css/style.css">

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container" style="background-color: rgba(0, 0, 0, 0.7); color:white">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?php

                    //Check whether the image is available or not
                    if ($image_name == "") {
                        //Image not Available
                        echo "<div class='error'> Image is not Available </div>";
                    } else {

                    ?>

                        <img src="<?php echo SITEURL; ?>photos/images-food-order/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                    <?php


                    }

                    ?>

                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price"><?php echo $price ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="quentity" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. K. M. Minhaz" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 017xxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. kmminhaj.khan@gmail.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

        <?php

        if (isset($_POST['submit'])) {


            $food = $_POST['food'];
            $price = $_POST['price'];
            $quentity = $_POST['quentity'];

            $total = $price * $quentity; //total is equals to price * quentity;

            $order_date = date("Y-m-d h:i:sa"); // Our order date and time in current time formate

            $status = "Ordered"; //

            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];



            // now we will save the data in database
            $sql2 = "INSERT INTO tbl_order SET food = '$food',
            price = $price,
            quentity = $quentity,
            total = $total, 
            order_date = '$order_date', 
            status = '$status', 
            customer_name = '$customer_name', 
            customer_contact = '$customer_contact', 
            customer_email = '$customer_email', 
            customer_address = '$customer_address'
            ";

            // echo $sql2; die();
            //Executing the Query
            $res2 = mysqli_query($conn, $sql2);


            //Check whether query executed successfully or not
            if ($res2 == true) {

                //Query executed and order is Saved.
                $_SESSION['order'] = "<div class='success text-center' > Food Ordered Successfully </div>";

        ?>
                <script type="text/javascript">
                    window.location.href = '<?php echo SITEURL; ?>order.php';
                </script>
            <?php
            } else {

                $_SESSION['order'] = "<div class='error text-center' > Failed to order the food </div>";
            ?>
                <script type="text/javascript">
                    window.location.href = '<?php echo SITEURL; ?>order.php';
                </script>
        <?php
            }
        }

        ?>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php include("partials/footer.php") ?>