<?php

// Check Logged or not user
if (!isset($_SESSION['user'])) {
    $_SESSION['no-login-message'] = "<div class='error'>Please login to access Admin Panel.</div> <br>";
    header('location:'.SITEURL.'admin/login.php');
}

