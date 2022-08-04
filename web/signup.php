


<?php

$conn=mysqli_connect('localhost','root','','web');


if (isset($_POST['submit'])){

    $fname=mysqli_real_escape_string($conn, $_POST['first_name']);
    $lname=mysqli_real_escape_string($conn, $_POST['last_name']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $phone_num=mysqli_real_escape_string($conn, $_POST['phone']);
    $password=mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword=mysqli_real_escape_string($conn, $_POST['cpassword']);
    $address=mysqli_real_escape_string($conn, $_POST['address']);

    $select="SELECT * FROM tbl_user WHERE email='$email' && password='$password' ";
    $result=mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already exist!';
    }else{
        if($password!=$cpassword){
            $error[] = 'password doesnt match!';
        }else{
        $insert="INSERT INTO tbl_user( first_name, last_name, email,	phone, password, address) 
        VALUES('$fname','$lname','$email','$phone_num','$password','$address')";
        mysqli_query($conn, $insert);
        header('location:index.php');
        }
    }

};





?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="css/style2.css">

</head>
<body>
    
    <div class="for">
        <img src="http:\\localhost\web\images\5ad74b9dbc38a.jpg" class="im">
   
        <form action="" method="post">
            

            <h3>signup</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error_msg">'.$error.'</span>';
                };
            };
            ?>

           
            <input type="text" name="first_name" required placeholder="enter your first name">
            <input type="text" name="last_name" required placeholder="enter your last name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="tel" name="phone" required placeholder="enter your phone number">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <textarea class="ord" name="address" placeholder="enter your address" rows="5" ></textarea>

            <input type="submit" name="submit" value="signup" class="form_btm">
            <p>already have an account? <a href="login.php">login now</a></p>
        </form>

    </div>
</body>