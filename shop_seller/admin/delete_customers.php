
<?php
include '../conn.php';

$delete_row=$_GET['del_id'];
$query=mysqli_query($conn,"SELECT * FROM customer_tb WHERE cust_id ='$delete_row'");

$delete=mysqli_query($conn,"DELETE FROM customer_tb WHERE cust_id= '$delete_row'");
header('location:view_customers.php');


if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $name = $_REQUEST['name'];
    $address = $_REQUEST['address'];
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
     $role = $_REQUEST['role'];
   
   


    mysqli_query($conn,"UPDATE customer_tb  name = '$name',`address` = '$address',`username` = '$username',`email` = '$email',`role` = '$role' WHERE cust_id='$tyre'");
    echo "<script> alert('Details deleted..');</script>";
    echo "<script>window.location.href='view_customers.php';</script>";



}
?>


