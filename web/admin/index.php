
<?php include('partials/menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Administrator Dashboard</h1>
                <br><br>
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                        $sql2 = "SELECT * FROM tbl_food";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br>
                    Foods
                    <br>
                </div>

                <div class="col-4 text-center">
                    
                    <?php
                        $sql3 = "SELECT * FROM tbl_order";
                        $res3 = mysqli_query($conn, $sql3);
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>



                <div class="col-4 text-center">
                    
                    <?php 
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                        $res4 = mysqli_query($conn, $sql4);
                        $row4 = mysqli_fetch_assoc($res4);
                        $total_revenue = $row4['Total'];

                    ?>

                    <h1><?php echo $total_revenue; ?> afg</h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        $sql5 = "SELECT * FROM tbl_table";
                        $res5 = mysqli_query($conn, $sql5);
                        $count5 = mysqli_num_rows($res5);
                    ?>

                    <h1><?php echo $count5; ?></h1>
                    <br />
                    Total Reservation
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        $sql9 = "SELECT * FROM tbl_user";
                        $res9 = mysqli_query($conn, $sql9);

                        $count9 = mysqli_num_rows($res9);
                    ?>
                    <h1><?php echo $count9; ?></h1>
                    <br />
                    Users
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
  
                        $sql7 = "SELECT * FROM tbl_order WHERE status = 'On Delivery'";
                        $res7 = mysqli_query($conn, $sql7);
        
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    On Delivery Orders
                </div>


                <div class="col-4 text-center">
                    
                    <?php
                        $sql7 = "SELECT * FROM tbl_order WHERE status = 'Cancelled'";
                        $res7 = mysqli_query($conn, $sql7);
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    Cancelled Orders
                </div>


                <div class="col-4 text-center">
                    
                    <?php 
       
                        $sql8 = "SELECT * FROM tbl_admin";
                        $res8 = mysqli_query($conn, $sql8);
                        $count8 = mysqli_num_rows($res8);
                    ?>

                    <h1><?php echo $count8; ?></h1>
                    <br />
                    System Administrator
                </div>


                <div class="clearfix"></div>

            </div>
        </div>

