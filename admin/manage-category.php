<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['remove'])) {
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>
        <br>

        <!--Button add admin-->
        <a href="<?php echo SITEURL;?>admin/add-category.php" class=" btn btn-primary">Add Category</a>
        <br>

        <br>
        <table class="tbl-full">
            <tr >
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>

            </tr>

            <?php
            $sql = "SELECT * FROM tbl_category";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            $sn = 1;

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

                    ?>
                    <tr>
                        <td><?php echo $sn++;?>.</td>
                        <td><?php echo $title;?></td>

                        <td>
                            <?php
                            if ($image_name != "") {

                                ?>
                                <img src="<?php echo  SITEURL; ?>images/category/<?php echo $image_name;?>"
                                    width="75px" alt="Image">
                                    <?php
                            }else{
                                //if no image found
                                echo "<div class='error'>Image Not Added.</div>";
                            }

                            ?>
                        </td>

                        <td><?php echo $featured;?></td>
                        <td><?php echo $active;?></td>
                        <td>
                            <a href="<?php echo SITEURL;?>admin/update-category.php" class="btn btn-info">Update Category</a>
                            <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn btn-danger"> Delete Category</a>
                        </td>
                    </tr>
                        <?php

                }

            }else{
                ?>
                        <td colspan="6"><div class="error">No Category Added.</div></td>
                <?php
            }
            ?>

        </table>
    </div>
</div>
<?php include('partials/footer.php'); ?>