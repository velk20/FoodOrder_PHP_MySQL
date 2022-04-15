<?php

include('../config/constants.php');

$id = $_GET['id'];
$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql);

if ($res == true) {

}else{

}


?>