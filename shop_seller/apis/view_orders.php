<?php
require('./../conn.php');
//fetch table rows from mysql db
$user_id = $_POST['user_id'];
$sql = "SELECT * FROM `order_details` 
INNER JOIN `product` ON product.p_id = order_details.p_id
INNER JOIN `register_tb` ON register_tb.s_register_id = product.shop_id
 WHERE order_details.u_id = '$user_id'";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$data_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data_array[] = $row;
}
echo json_encode($data_array);
