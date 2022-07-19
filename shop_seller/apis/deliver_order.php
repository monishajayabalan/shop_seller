<?php
require('./../conn.php');
if (count($_POST) > 0) {

    $order_id = $_POST['order_id'];

    mysqli_query($conn, "UPDATE `order_details` SET `status`='delivered' WHERE `order_id`='$order_id'");
    $message['message'] = "Record Modified Successfully";

    echo json_encode($message);
}
