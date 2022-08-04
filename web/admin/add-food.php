<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapperr">

        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <h1>Add Food</h1>
            <br><br>

            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Food">
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <option value="" disabled selected>select category --</option>
                            <option value="main dish">main dish</option>
                            <option value="drinks">drinks</option>
                            <option value="desserts">desserts</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        
        <?php 

            if(isset($_POST['submit']))
            {
  
                $title = $_POST['title'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        $ext = end(explode('.', $image_name));

                        $image_name = "Food-Name-".rand(0000,9999).".".$ext; 
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/food/".$image_name;

                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL.'admin/add-food.php');
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; 
                }

                //3. Insert Into Database

                $sql2 = "INSERT INTO tbl_food SET 
                    title = '$title',
                    price = '$price',
                    image_name = '$image_name',
                    category = '$category'
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == true)
                {

                    $_SESSION['add'] = "<div class='success'>Food Added Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    
                    $_SESSION['add'] = "<div class='error'>Failed to Add Food.</div>";
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
            }

        ?>

    </div>
</div>
