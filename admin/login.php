<?php include('../config/constants.php')?>

<html>
<head>
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>
    <body>
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br>
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if (isset($_SESSION['no-login-message'])) {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
            ?>
            <form action="" method="POST" class="text-center">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Username:</label>
                    <div class="col-sm-8">
                        <input type="text" name="username" placeholder="Your Username" class="form-control" id="inputEmail3" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Password:</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Your Password">
                    </div>
                </div>

                <input type="submit" name="submit" value="Login" class="btn btn-primary">

            </form>

        </div>
    </body>
</html>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] = "<div class='success text-center'>Login Successful.</div>";
        $_SESSION['user'] = $username;
        header('location:'.SITEURL.'admin/');

    } else {
        //User not available
        $_SESSION['login'] = "<div class='error text-center'>Login Failed. Wrong username or password.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
}
?>



