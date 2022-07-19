<?php
require('./../conn.php');
if (count($_POST) > 0) {

    $category = $_POST['category'];

    $result = mysqli_query($conn, "INSERT INTO `category`( `category`) VALUES ('$category')");
    if ($result) {
        $message['message'] = "added Successfully";
    } else {
        $message['message'] = "already existing..";
    }

    echo json_encode($message);
}
