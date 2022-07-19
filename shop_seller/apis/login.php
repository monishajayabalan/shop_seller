<?php
require('./../conn.php');
$username = $_POST['email'];
$password = $_POST['password'];
//fetch table rows from mysql db
$sql = "SELECT * FROM `register_tb` WHERE `username` = '$username' AND `password`='$password'";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$data_array = array();
$data_array['status'] = false;
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 1) {
    $data_array[] = $row;
    $data_array['status'] = true;
}
echo json_encode($data_array);
