<?php
require('./../conn.php');
if (count($_POST) > 0) {

    $c_id = $_POST['cart_id'];
    $query = "DELETE FROM `cart` WHERE `cart_id`='$c_id'";
    $result = mysqli_query($conn, $query);
    if ($result)
        $message['message'] = "Record removed successfully";
    else
        $message['message'] = "already removed..";
    echo json_encode($message);
}
