<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>

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
            echo $_SESSION['update']; //Displaying the delete admin message
            unset($_SESSION['update']); //Not displaying the delete admin message
        }
        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found']; //Displaying the delete admin message
            unset($_SESSION['user-not-found']); //Not displaying the delete admin message
        }
        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match']; //Displaying the delete admin message
            unset($_SESSION['pwd-not-match']); //Not displaying the delete admin message
        }
        if (isset($_SESSION['password'])) {
            echo $_SESSION['password']; //Displaying the delete admin message
            unset($_SESSION['password']); //Not displaying the delete admin message
        }
        ?>

        <br /> <br />

        <!-- Button to add Admin -->
        <a href="add-admin.php" class="btn-primary"> Add Admin </a>
        <br /> <br /> <br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Name.</th>
                <th>username</th>
                <th>Actions</th>
            </tr>


            <?php
            $sql = "SELECT * FROM admin";
            $res = mysqli_query($conn, $sql);

            if ($res == TRUE) {
                $count = mysqli_num_rows($res); // to get all the rows in database

                $sn=1; //This value will count the id

                //Check if the num of rows
                if ($count > 0) {

                    while ($rows = mysqli_fetch_assoc($res)) {
                        // Using while loop to get the data from database.


                        //Get individual data
                        $id = $rows['SI_No'];
                        $name = $rows['Name'];
                        $username = $rows['username'];

                        //Display the values in our Table
            ?>

                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo SITEURL ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary"> Change Password </a>
                                <a href="<?php echo SITEURL ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondery"> Update Admin </a>
                                <a href="<?php echo SITEURL ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-third"> Delete Admin </a>
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

<?php include('partials/footer.php') ?>