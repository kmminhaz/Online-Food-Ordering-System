<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1> Manage Food </h1>

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
        <a href="add-food.php" class="btn-primary"> Add Food </a>
        <br /> <br /> <br />

        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>Food</th>
                <th> Price </th>
                <th> Quentity </th>
                <th> Total </th>
                <th>Order Data</th>
                <th>Status</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

            <?php

            $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
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
                        $food = $rows['food'];
                        $price = $rows['price'];
                        $quentity = $rows['quentity'];
                        $total = $rows['total'];
                        $order_date = $rows['order_date'];
                        $status = $rows['status'];
                        $customer_name = $rows['customer_name'];
                        $customer_contact = $rows['customer_contact'];
                        $customer_email = $rows['customer_email'];
                        $customer_address = $rows['customer_address'];

                        //Display the values in our Table
            ?>

                        <tr>
                            <td><?php echo $sn++; ?> </td>
                            <td><?php echo $food; ?> </td>
                            <td><?php echo $price; ?> </td>
                            <td><?php echo $quentity; ?> </td>
                            <td><?php echo $total; ?> </td>
                            <td><?php echo $order_date; ?> </td>
                            <td><?php echo $status; ?> </td>
                            <td><?php echo $customer_name; ?> </td>
                            <td><?php echo $customer_contact; ?> </td>
                            <td><?php echo $customer_email; ?> </td>
                            <td><?php echo $customer_address; ?> </td>
                            <td>
                                <a href="<?php echo SITEURL ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondery"> Update Food </a>
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