<?php
require('./../conn.php');

$shop_id = $_POST['shop_id'];
//fetch table rows from mysql db
$sql = "SELECT * FROM `product` WHERE shop_id = '$shop_id'";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$data_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data_array[] = $row;
}
echo json_encode($data_array);
