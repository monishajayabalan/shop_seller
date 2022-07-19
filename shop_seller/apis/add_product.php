<?php
require('./../conn.php');
if (isset($_POST['product'])) {

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  $product = $_POST['product'];
  $category = $_POST['category'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $user_id = $_POST['user_id'];

  $uploadOk = 1;
  $message = "";
  $data = array();
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    $message = "File is an image - " . $check["mime"] . "." . $product;
    $uploadOk = 1;
  } else {
    $message = "File is not an image.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
  ) {
    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $message = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $message = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
      $QUERY = "INSERT INTO `product`(`product`, `category`, `price`, `stock`, `image_url`,`shop_id`) VALUES ('$product','$category','$price','$stock','$target_file','$user_id')";
      if (mysqli_query($conn, $QUERY)) {
        $message = "product added successfully";
      } else {
        $message = "product already existing";
      }
    } else {
      $message = "Sorry, there was an error uploading your file.";
    }

    $data['message'] = $message;
    $data['status'] = $uploadOk;
    echo json_encode($data);
  }
}
