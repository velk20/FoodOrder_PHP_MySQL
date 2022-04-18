<?php
include ('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        ?>

        <form action="" method="POST">

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Current Password:</label>
                    <div class="col-sm-3">
                        <input type="password" name="current_password" class="form-control" id="inputPassword3" placeholder="Your Current Password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">New Password:</label>
                    <div class="col-sm-3">
                        <input type="password" name="new_password" class="form-control" id="inputPassword3" placeholder="Your New Password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password:</label>
                    <div class="col-sm-3">
                        <input type="password" name="confirm_password" class="form-control" id="inputPassword3" placeholder="Confirm Your New Password">
                    </div>
                </div>

            <input type="hidden" name="id" value="<?php echo $id?>">
            <input type="submit" name="submit" value="Change Password" class="btn btn-primary">



        </form>
    </div>
</div>


<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    $sql = "SELECT * FROM tbl_admin WHERE id='$id' AND password = '$current_password'";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            //User exist
            if ($new_password == $confirm_password) {

                $sql2 = "UPDATE tbl_admin SET password = '$new_password' WHERE id = $id";

                $res2 = mysqli_query($conn,$sql2);

                if ($res2 == true){
                    $_SESSION['change-password'] = "<div class='success'>Password Changed Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');

                }else{
                    $_SESSION['change-password'] = "<div class='error'>Failed To Change Password.</div>";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }else{
                $_SESSION['password-not-match'] = "<div class='error'>Password Did Not Match.</div>";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        } else {
            //user not exist

            $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
}
?>




<?php
include ('partials/footer.php');
?>

