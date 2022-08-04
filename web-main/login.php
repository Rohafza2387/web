<?php

$conn=mysqli_connect('localhost','root','','web');


if (isset($_POST['submit'])){

    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $password=md5($conn, $_POST['password']);
   

    $select="SELECT * FROM tbl_user WHERE email='$email' && password='$password' ";
    $result=mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $row=mysqli_fetch_array($result);

    }else{
        $error[]='incorrect email or password';
    }

}
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
            

            <h3>login</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error_msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login" class="form_btm">
            <p>don't have an account? <a href="signup.php">signup now</a></p>
        </form>

    </div>
</body>
