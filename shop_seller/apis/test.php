<?php
$user_id = $_POST['user_id'];
$sql = "SELECT * FROM `product`INNER JOIN `cart` ON product.p_id = cart.p_id WHERE cart.u_id = '3'";
// print($sql);
require('./../conn.php');
$result = mysqli_query($conn, $sql);
// print_r($result);

$num = mysqli_num_rows($result);

print($num);
while ($row = mysqli_fetch_assoc($result)) {
    // print_r($row);
}
