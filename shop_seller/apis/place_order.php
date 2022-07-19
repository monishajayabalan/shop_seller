<?php
require('./../conn.php');
if (count($_POST) > 0) {
    $message = array();
    $user_id = $_POST['user_id'];
    $total = 0;
    $message['message'] = "no items left..";
    $message['status'] = false;

    $sql = "SELECT * FROM `product`INNER JOIN `cart` ON product.p_id = cart.p_id WHERE cart.u_id = '$user_id'";
    // echo ($sql);
    $result_data = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));

    while ($row = mysqli_fetch_assoc($result_data)) {
        $product_id = $row['p_id'];
        $price = $row['price'];
        $cart_id = $row['cart_id'];
        $quantity = $row['quantity'];
        $stock = $row['stock'] - $quantity;
        $total = $price * $quantity;
        $result = mysqli_query($conn, "INSERT INTO `order_details`(`p_id`, `u_id`, `quantity`,`amount`) VALUES  ('$product_id','$user_id','$quantity','$total')");

        if ($result) {
            $result = mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = '$cart_id'");
            mysqli_query($conn, "UPDATE `product` SET `stock`='$stock' WHERE `p_id`='$product_id'");

            $message['message'] = "added Successfully";
            $message['status'] = true;
        } else {
            $message['message'] = "no items left..";
            $message['status'] = false;
        }
    }
}

echo json_encode($message);
