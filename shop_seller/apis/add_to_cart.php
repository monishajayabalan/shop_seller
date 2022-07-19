<?php
require('./../conn.php');
if (count($_POST) > 0) {

    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $result = mysqli_query($conn, "INSERT INTO `cart`(`u_id`, `p_id`, `quantity`) VALUES ('$user_id','$product_id','$quantity')");
    if ($result) {
        $message['message'] = "added Successfully";
    } else {
        $message['message'] = "already existing..";
    }

    echo json_encode($message);
}
