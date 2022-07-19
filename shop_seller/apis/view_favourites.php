<?php
require('./../conn.php');
//fetch table rows from mysql db
if (count($_POST) > 0) {
    $user_id = $_POST['user_id'];
    $sql = "SELECT * FROM `product`INNER JOIN `favourites` ON product.p_id = favourites.p_id WHERE favourites.c_id = '$user_id'";
    // die($sql);
    $result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

    //create an array
    $data_array = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data_array[] = $row;
    }
    echo json_encode($data_array);
}
