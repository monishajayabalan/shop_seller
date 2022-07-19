<?php

$message = "";
$status = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require('./../conn.php');

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM `register_tb` WHERE username='$username'";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);

    // This sql query is use to check if
    // the username is already present 
    // or not in our Database
    if ($num == 0) {

        $hash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        // Password Hashing is used here. 
        $sql = "INSERT INTO `register_tb`( `name`, `address`, `phone`, `username`, `password`, `email`,`role`) VALUES ('$name', 
                '$address','$phone','$username','$password','$email','2')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $message = "user registered successfully";
            $status = true;
        }
    } // end if 

    if ($num > 0) {
        $message = "Username not available";
    }
    $data['message'] = $message;
    echo json_encode($data);
}//end if   
