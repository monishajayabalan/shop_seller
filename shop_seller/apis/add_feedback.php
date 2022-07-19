<?php
require('./../conn.php');
if (count($_POST) > 0) {

    $user_id = $_POST['user_id'];
    $shop_id = $_POST['shop_id'];
    $feedback = $_POST['feedback'];
    $sql = "INSERT INTO `feedback`(`feedback`, `sender_id`, `reciever_id`) VALUES ('$feedback','$user_id','$shop_id')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $message['message'] = "added Successfully";
    } else {
        $message['message'] = "already existing..";
    }

    echo json_encode($message);
}
