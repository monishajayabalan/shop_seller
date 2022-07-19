
<?php
include '../conn.php';

$delete_row=$_GET['del_id'];
$query=mysqli_query($conn,"SELECT * FROM register_tb WHERE s_register_id ='$delete_row'");

$delete=mysqli_query($conn,"DELETE FROM register_tb WHERE s_register_id= '$delete_row'");
header('location:view_seller.php');


if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $name = $_REQUEST['name'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $email = $_REQUEST['email'];
     $role = $_REQUEST['role'];
   
   


    mysqli_query($conn,"UPDATE register_tb SET name = '$name',`username` = '$username',`email` = '$email',`role` = '$role' WHERE s_register_id='$tyre'");
    echo "<script> alert('Details updated');</script>";
    echo "<script>window.location.href='view_seller.php';</script>";



}
?>


