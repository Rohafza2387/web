<?php include('../config/constants.php'); ?>

<html>
    <head>
        <link rel="stylesheet" href="../css/stylee.css">
    </head>

<body>
        
    <div class="login">
        <img src="http:\\localhost\web\images\5ad74b9dbc38a.jpg" class="im">

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

   
        <form action="" method="post" >
            

                <h3>login</h3>
                <input type="username" name="username" required placeholder="enter your user name">
                <input type="password" name="password" required placeholder="enter your password">
                <input type="submit" name="submit" value="login" class="form_btm">
            
        </form>
        </div>

    </body>
</html>

<?php 

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; 

            header('location:'.SITEURL.'admin/');
        }
        else
        {
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";

            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>
