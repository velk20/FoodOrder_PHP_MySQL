<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>

        <form action="" method="POST">


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name:</label>
                    <div class="col-sm-3">
                        <input type="text" name="full_name" class="form-control" id="inputEmail3" placeholder="Your Full Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username:</label>
                    <div class="col-sm-3">
                        <input type="text" name="username" placeholder="Your Username" class="form-control" id="inputEmail3" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-3">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Your Password">
                    </div>
                </div>



                        <input type="submit" name="submit" value="Add Admin" class="btn btn-success">

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    //Process the value from Form and Save it in DB
    //Check whether the submit button is clicked or not
    if (isset($_POST['submit']))
    {
        //Button clicked
        $full_name = $_POST['full_name'];
         $username = $_POST['username'];
         $password = md5($_POST['password']);// Password Encrypt with md5

         //SQL to Save data into DB
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username = '$username',
            password = '$password'
        ";

        //save to DB
        $res = mysqli_query($conn,$sql) or die(mysqli_error());
        if ($res == TRUE){
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }else{
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
            header("location:".SITEURL.'admin/add-admin.php');
        }


    }



?>
