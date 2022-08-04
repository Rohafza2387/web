<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Reservation</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Customer</th>
                        <th width="10%">Contact</th>
                        <th width="15%">Email</th>
                        <th width="10%">number of people</th>
                        <th width="10%">Reserve Date</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        $sql = "SELECT * FROM tbl_table ORDER BY id DESC";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        $sn = 1;

                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res)  )
                            {
                                $id = $row['id'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $reserve_date=$row['date'];
                                $num_people=$row['num_people'];

                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $num_people; ?></td>
                                        <td><?php echo $reserve_date; ?></td>
                                        
                                        <td>
                                            
                                            <a href="<?php echo SITEURL; ?>admin/delete-table.php?id=<?php echo $id; ?>" class="btn-danger" >Delete</a>

                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='12' class='error'>reserve not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

