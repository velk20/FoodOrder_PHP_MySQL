<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Food Order Website</title>
    <link rel="icon" href="images/pizza-logo.png">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/8c50fc06f1.js" crossorigin="anonymous"></script>
</head>

<body>
<!-- Navbar Section Starts Here -->
<section class="navbar">
    <div class="container">
        <div class="logo">
            <a href="index.php" title="Logo">
                <img
                    src="images/logo.png"
                    alt="Restaurant Logo"
                    class="img-responsive"
                />
            </a>
        </div>

        <div class="menu text-right">
            <ul>
                <li>
                    <a href="<?php echo SITEURL;?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL;?>categories.php">Categories</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL;?>foods.php">Foods</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL;?>contacts.php">Contacts</a>
                </li>
                <li>
                    <a href="<?php echo SITEURL;?>shopping-cart.php">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo SITEURL;?>admin/login.php">Login</a>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Navbar Section Ends Here -->
