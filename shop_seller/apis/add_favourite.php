<?php
require('./../conn.php');
if (count($_POST) > 0) {

    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];

    $result = mysqli_query($conn, "INSERT INTO `favourites`(`p_id`, `c_id`) VALUES ('$product_id','$user_id')");
    if ($result) {
        $message['message'] = "added Successfully";
    } else {
        $message['message'] = "already existing..";
    }

    echo json_encode($message);
}
