<?php ob_start(); ?>
<?php include('partials/menu.php');?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
    $res2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($res2);

    $category_title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $current_category = $row2['category_id'];
    $featured = $row2['featured'];
    $active = $row2['active'];

}else{
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">


            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title:</label>
                <div class="col-sm-3">
                    <input required type="text" name="title" class="form-control" id="title" value="<?php echo $category_title;?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="desc_food" class="col-sm-2 col-form-label">Description: </label>
                <div class="col-sm-3">
                    <textarea required name="description"  cols="30" rows="5" class="form-control" id="desc_food"
                              ><?php echo $description;?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="food_price" class="col-sm-2 col-form-label">Price: </label>
                <div class="col-sm-3">
                    <input  required type="number" name="price" class="form-control" id="food_price"
                           value="<?php echo $price;?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="current_image" class="col-sm-2 col-form-label mb-3 ">Current Image:</label>
                <div class="col-sm-3" id="current_image">
                    <?php
                    if ($current_image != "") {
                        ?>
                        <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image;?>" width="100px" >
                        <?php
                    }else{
                        echo "<div class='error'>Image Not Available.</div>";
                    }
                    ?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label mb-3 " for="customFile">Select New Image:</label>
                <div class="col-sm-3">
                    <input type="file" name="image" class="form-control" id="customFile" />
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Category: </label>
                <div >
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category" id="category">
                        <?php
                        //Displaying categories from DB
                        //Only active categories will be displayed

                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                        if ($count > 0) {

                            while ($row = mysqli_fetch_assoc($res)) {
                                $category_id = $row['id'];
                                $category_title = $row['title'];
                                ?>
                                <option <?php if ($current_category == $category_id){echo "selected"; }?> value="<?= $category_id; ?>"><?= $category_title;?></option>
                                <?php
                            }
                        }else{
                            ?>
                            <option value="0">No Category Found</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="radio" class="col-sm-2 col-form-label">Featured:</label>
                <div class="form-check">
                    <input id="radio" <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes
                    <input id="radio"<?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                </div>

            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Active:</label>
                <div class="form-check">
                    <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                </div>

            </div>

            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
            <input type="submit" name="submit" value="Update Food" class="btn btn-success">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            if (isset($_FILES['image']['name'])) {

                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {
                    $src_path = $_FILES['image']['tmp_name'];
                    $dest_path = "../images/food/".$image_name;
                    $upload = move_uploaded_file($src_path, $dest_path);
                    /// CHeck whether the image is uploaded or not
                    if($upload==false){

                        $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";

                        header ('location:'.SITEURL. 'admin/manage-food.php');
                        //stop the Process
                        die();
                    }
                    if ($current_image != "") {
                        //Image exist int our dir
                        //and we need to remove it

                        $remove_path = "../images/food/" . $current_image;
                        $remove = unlink($remove_path);

                        if ($remove == false){
                            $_SESSION['remove-failed'] = "<div class='error'>Failed to remove current image.</div>";
                            header('location:'.SITEURL.'admin/manage-food.php');
                            die();
                        }
                    }

                }else{
                    $image_name = $current_image;
                }
            }else{
                $image_name = $current_image;
            }

            $sql3 = "UPDATE tbl_food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = $category,
            featured= '$featured',
            active ='$active' WHERE id=$id
                    ";

            $res3 = mysqli_query($conn, $sql3);

            if ($res3 == true) {

                $_SESSION['update'] = "<div class='success'>Food Updated Successfully.</div>";
                header ('location:'.SITEURL.'admin/manage-food.php');
            }else{
                $_SESSION['update'] = "<div class='error'>Failed to Update Food.</div>";
                header ('location:'.SITEURL. 'admin/manage-food.php');
            }

        }
        ?>
    </div>
</div>

<?php include('partials/footer.php');?>
<?php ob_flush(); ?>
