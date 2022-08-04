
<?php include('partials-front/menu.php'); ?>


<?php


if(isset($_SESSION['add']))
{
    echo $_SESSION['add']; //Displaying Session Message
    unset($_SESSION['add']); //REmoving Session Message
}
?>


<section id="order">
        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                <p>Table Reservation</p>
                <input type="text" placeholder="your name" class="box" name="customer_name"><br>
                <br>
                <input type="email" placeholder="your email" class="box" name="customer_email"><br>
                <br>
                <input type="number" placeholder="your number" class="box" name="customer_contact"><br>
                <br>
                <input type="date" placeholder="reservation date" class="box" name="date"><br>
                <br>
                <input type="number" placeholder="number of people" class="box" name="num_people"><br>
                <br>
                <input type="submit" name="submit" value="Reserve now" class="btn">
            </form>
            <div class="image">
                <img src="http://localhost/onlinefood-order/images/p-6.jpg">
            </div>
        </div>   
    </section>
 


<?php


               if(isset($_POST['submit']))
               {

                   $customer_name = $_POST['customer_name'];
                   $customer_email = $_POST['customer_email'];
                   $customer_contact = $_POST['customer_contact'];
                   $date = $_POST['date'];
                   $num_people = $_POST['num_people'];
                   $status = "Reserved"; 


                
                   $sql7 = "INSERT INTO tbl_table SET

                    customer_name = '$customer_name',
                    customer_email = '$customer_email',
                    customer_contact = '$customer_contact',
                    date = '$date',
                    num_people = '$num_people',
                    status = '$status'

               ";

                    $res2 = mysqli_query($conn, $sql7);
                    if($res2 == true)
                            {
                         $_SESSION['add'] = "<div class='success'>table reserved Successfully.</div>";
                        header('location:'.SITEURL.'table.php');
                            }
                        else
                                {
                            $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
                            header('location:'.SITEURL.'table.php');
                                        }

                                    }

             
?>

