<?php
require('./../conn.php');
if (count($_POST) > 0) {

    $f_id = $_POST['favourite_id'];
    $query = "DELETE FROM `favourites` WHERE `f_id`='$f_id'";
    $result = mysqli_query($conn, $query);
    if ($result)
        $message['message'] = "Record removed successfully";
    else
        $message['message'] = "already removed..";
    echo json_encode($message);
}
