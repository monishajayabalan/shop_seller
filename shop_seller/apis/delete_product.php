<?php
require('./../conn.php');
if (count($_POST) > 0) {

    $product_id = $_POST['product_id'];
    $query =  "DELETE FROM `product` WHERE `p_id`='$product_id'";
    $result = mysqli_query($conn, $query);
    if ($result)
        $message['message'] = "Record removed successfully";
    else
        $message['message'] = "already removed..";
    echo json_encode($message);
}
