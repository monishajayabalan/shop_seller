<?php 
include "../conn.php";

$dis = $_GET['edit_id'];

$update_status=mysqli_query($conn,"UPDATE `register_tb` SET approval_status='1' WHERE `s_register_id` ='$dis'");

header('location:view_seller.php');

?>