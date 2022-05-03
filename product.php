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
                $image_name = $row['image_name'];

            }else{
                header('location:'.SITEURL);

            }
        }else{
            header('location:'.SITEURL);
        }
        ?>