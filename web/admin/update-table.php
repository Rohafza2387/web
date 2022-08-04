<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Reservation</h1>
        <br><br>




        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                $sql = "SELECT * FROM tbl_table WHERE id=$id";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $reserve_date = $row['date'];
                    $num_people = $row['num_people'];
                    $status = $row['status'];

                    
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-table.php');
                }
            }
            else
            {

                header('location:'.SITEURL.'admin/manage-table.php');
            }
        
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
            <tr>
                    <td>Customer Name: </td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Contact: </td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Customer Email: </td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Reservation Date</td>
                    <td>
                        <input type="number" name="reserve_date" value="<?php echo $reserve_date; ?>">
                    </td>
                </tr>


                <tr>
                    <td>number of people</td>
                    <td>
                        <input type="number" name="num_people" value="<?php echo $num_people; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Reserved"){echo "selected";} ?> value="Reserved">Reserved</option>

                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>



                <tr>
                    <td clospan="2">
                        <input type="submit" name="submit" value="Update" class="btn-secondary">
                    </td>
                </tr>
            </table>
        
        </form>


        <?php 

            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $reserve_date = $_POST['date'];
                $num_people = $_POST['num_people'];
                $status = $_POST['status'];

                $sql2 = "UPDATE tbl_table SET 
         
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    date = '$reserve_date',
                    num_people = '$num_people',
                    status = '$status'
                    WHERE id=$id
                ";
                
                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {

                    $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-table.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
                    header('location:'.SITEURL.'admin/manage-table.php');
                }
            }
        ?>


    </div>
</div>

