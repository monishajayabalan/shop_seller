<?php
require('./../conn.php');
//fetch table rows from mysql db
$sql = "SELECT * FROM `category`";
$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

//create an array
$data_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data_array[] = $row;
}
echo json_encode($data_array);
