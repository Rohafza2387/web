<?php 
 
    include('../config/constants.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_table WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {

        $_SESSION['delete'] = "<div class='success'>Deleted Successfully.</div>";

        header('location:'.SITEURL.'admin/manage-table.php');
    }
    else
    {

        $_SESSION['delete'] = "<div class='error'>Failed to Delete</div>";
        header('location:'.SITEURL.'admin/manage-table.php');
    }

  

?>
