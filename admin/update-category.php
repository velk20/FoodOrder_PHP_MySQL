<?php
    include ('partials/menu.php');

?>
<?php ob_start(); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_category WHERE id=$id";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if ($count == 1){
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];

            }else{
                $_SESSION['no-category-found'] = "<div class='error'>Category Not Found.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        }else{
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">



            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title:</label>
                <div class="col-sm-3">
                    <input required type="text" name="title" class="form-control" id="title" value="<?php echo $title;?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="current_image" class="col-sm-2 col-form-label mb-3 ">Current Image:</label>
                <div class="col-sm-3" id="current_image">
                        <?php
                        if ($current_image != "") {
                            ?>
                            <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image;?>" width="100px" >
                            <?php
                        }else{
                            echo "<div class='error'>Image Not Added.</div>";
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
            <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" name="submit" value="Update Category" class="btn btn-success">
        </form>

        <?php
        if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

            if (isset($_FILES['image']['name'])) {
                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {

                    $source_path = $_FILES['image']['tmp_name'];
                    $destination_path = "../images/category/" . $image_name;

                    $upload = move_uploaded_file($source_path, $destination_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                        header('location:' . SITEURL . 'admin/manage-category.php');
                        die();//WE stop proccess cause wrong image was uploaded
                    }

                    if ($current_image!="")
                    {

                        $remove_path = "../images/category/".$current_image;
                        $remove = unlink($remove_path);

                        if ($remove == false) {
                            $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                            header('location:'.SITEURL.'admin/manage-category.php');
                            die();
                        }
                    }
                }else{
                    $image_name = $current_image;

                }
            }else{
                $image_name = $current_image;
            }

                $sql2 = "UPDATE tbl_category SET
                title = '$title',
                        image_name = '$image_name',
                        featured = '$featured',
                        active = '$active' WHERE id = $id";

            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == true)
            {
                $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');

            }else{
                $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        }
        ?>
    </div>
</div>



<?php ob_flush(); ?>
<?php
include ('partials/footer.php');

?>
