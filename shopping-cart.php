
<?php
include('partials-front/menu.php');?>


<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Food Ordering.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Food Ordering</legend>
                <table class="tbl-full">
                    <tr >
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Short Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM tbl_food";
                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    $sn=1;
                    if ($count > 0) {

                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $desc = $row['description'];
                            ?>
                            <tr style="margin:10px">
                                <td class="text-center"><?php echo $sn++; ?>.</td>
                                <td class="text-center"><?php echo $title; ?></td>
                                <td class="text-center" style="margin: 10px">$<?php echo $price; ?></td>
                                <td class="text-center" ><?php
                                    if (strlen($desc) > 40) {
                                        echo substr($desc, 0, 40) . '...';
                                    } else {
                                        echo $desc;
                                    }
                                    ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($image_name == "") {
                                        //Do not have image
                                        echo "<div class='error'>No Image Added.</div>";
                                    } else{
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/food/<?php echo  $image_name; ?>" width="75px">
                                        <?php
                                    }
                                    ?>
                                </td>

                                <td class="text-center">
                                    <a href="" class="btn btn-primary">Remove</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }else{
                        echo "<tr><td colspan='7' class='error'>Food Not Added Yet.</td> </tr>";
                    }
                    ?>
                </table>
            </fieldset>


        </form>
    </div>
</section>
<?php
include('partials-front/footer.php');
?>
