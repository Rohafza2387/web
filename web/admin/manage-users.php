<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
            <h1>Manage User</h1>

        <br>

        <?php 

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
                    

        ?>
                <br><br><br>

                <br><br><br>

        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>first name</th>
                <th>last name</th>
                <th>email</th>
                <th>phone number</th>
                <th>address</th>
                <th>password</th>
                <th>actions</th>

            </tr>

                    
        <?php 
                    
            $sql = "SELECT * FROM tbl_user";
            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count = mysqli_num_rows($res); 

                $sn=1;

                if($count>0)
                {
                    while($rows=mysqli_fetch_assoc($res))
                    {
    
                        $id=$rows['id'];
                        $first_name=$rows['first_name'];
                        $last_name=$rows['last_name'];
                        $email=$rows['email'];
                        $phone=$rows['phone'];
                        $address=$rows['address'];
                        $password=$rows['password'];
        ?>
                                    
            <tr>
                <td><?php echo $sn++; ?>. </td>
                <td><?php echo $first_name; ?></td>
                <td><?php echo $last_name; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $phone; ?></td>
                <td><?php echo $address; ?></td>
                <td><?php echo $password; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>admin/delete-user.php?id=<?php echo $id; ?>" class="btn-danger" >Delete</a>
                </td>

            </tr>

                                    <?php

                                }
                            }
                            else
                            {
                                
                            }
                        }

                    ?>


                    
                </table>

            </div>
        </div>

