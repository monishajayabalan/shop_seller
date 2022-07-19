<?php
require('./../conn.php');
//fetch table rows from mysql db
$shop_id = $_POST['shop_id'];
$sql = "SELECT * FROM `order_details` 
INNER JOIN `product` ON product.p_id = order_details.p_id
INNER JOIN `register_tb` ON register_tb.s_register_id = order_details.u_id
 WHERE product.shop_id = '$shop_id'";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$data_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data_array[] = $row;
}
echo json_encode($data_array);
