<?php 

    include('../Config/connection.php');

    // get the ID of Admin to be deleted
    $id = $_GET['id'];

    // Create SQL query to delete admin
    $sql = "DELETE FROM admin WHERE SI_No=$id";
    
    $res = mysqli_query($conn, $sql);

    if($res == true){
        
        // Query Executed Successfully and Admin is deleted
        // echo "Admin Deleted";
        // Create Session variable to display message

        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";

        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }else{

        //echo "Deletation Failed";
        $_SESSION['delete'] = "<div class='error'>Deletation Failed.</div>";

        //Redirect to Manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>