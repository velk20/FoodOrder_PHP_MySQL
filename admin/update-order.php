<?php include ('partials/menu.php');?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_order WHERE id=$id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);

                $status = $row['status'];
            }else{
                header('location:'.SITEURL.'admin/manage-order.php');

            }
        }else{
            header('location:'.SITEURL.'admin/manage-order.php');
        }
        ?>
        <form action="" method="POST">

            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status: </label>
                <div class="col-sm-3">
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status" id="status">
                                <option <?php if ($status == "Ordered"){echo "selected";}?> value="Ordered">Ordered</option>
                                <option <?php if ($status == "On Delivery"){echo "selected";}?> value="On Delivery">On Delivery</option>
                                <option <?php if ($status == "Delivered"){echo "selected";}?> value="Delivered">Delivered</option>
                                <option <?php if ($status == "Cancelled"){echo "selected";}?> value="Cancelled">Cancelled</option>

                    </select>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $id; // to get the id of user?>">
            <input type="submit" name="submit" value="Update Order" class="btn btn-info">


        </form>

        <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $status = $_POST['status'];

            $sql2 = "UPDATE tbl_order SET status='$status' WHERE id=$id ";

            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == true) {
                $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                header('location:'.SITEURL.'admin/manage-order.php');

            }else{
                $_SESSION['update'] = "<div class='error'>Order Updating Failed.</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        }
        ?>
    </div>
</div>


<?php include ('partials/footer.php');?>
