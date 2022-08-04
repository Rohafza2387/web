    <?php include('partials-front/menu.php'); ?>




    <section id="home">
        <div>
            <h3>The Best Food <br>quality</h3>
            <img src="http://localhost/web/images/54674.jpeg" id=imeg>
        </div>

               
            <form method="POST" class="container" action="<?php echo SITEURL; ?>food-search.php">
                <input type="search" name="search" class="sear" placeholder="Search Foods" required>
                <input type="submit" name="submit" value="Search" class="btn_pri">
            </form>
        
    </section>
    




