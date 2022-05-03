<?php include ('partials-front/menu.php');?>
        <?php
        if (isset($_GET['food_id'])) {
            $food_id = $_GET['food_id'];
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $price = $row['price'];
                $desc = $row['description'];
                $image_name = $row['image_name'];

            }else{
                header('location:'.SITEURL);

            }
        }else{
            header('location:'.SITEURL);
        }
        ?>

<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Food Information.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Food Information</legend>

                <div class="food-menu-img">
                    <?php
                    if ($image_name == "") {
                        echo "<div class='error'>Image Not Available.</div>";
                    }else{
                        ?>
                        <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>"
                             class="img-responsive img-curve">
                        <?php
                    }
                    ?>

                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title;?></h3>
                    <input type="hidden" name="food" value="<?php echo $title;?>">

                    <p class="food-price">$<?php echo $price;?></p>
                    <input type="hidden" name="price" value="<?php echo $price;?>">
                    <br>
                    <div class="order-label">Description:</div>
                    <textarea name="desc" rows="10"
                              class="input-responsive" ><?php echo $desc;?></textarea>

                </div>

            </fieldset>


        </form>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->
<?php include ('partials-front/footer.php');?>
