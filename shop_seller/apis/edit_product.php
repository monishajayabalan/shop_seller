<?php
require('./../conn.php');
if (count($_POST) > 0) {

    $product = $_POST['product'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];

    mysqli_query($conn, "UPDATE `product` SET `product`='$product',`category`='$category',`price`='$price',`stock`='$stock' WHERE `p_id`='$product_id'");
    $message['message'] = "Record Modified Successfully";

    echo json_encode($message);
}
