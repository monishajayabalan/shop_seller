<?php

session_start();
include('conn.php');

// <?php
//session_start();
// include 'condb.php';

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];


$sel="SELECT * FROM  `login_tb` WHERE `username`='$username' and `password`='$password'";

$query=mysqli_query($conn,$sel);

$array=mysqli_num_rows($query);

if($array==1)
{
	$fetch=mysqli_fetch_array($query);

	$role = $fetch['role'];

	if($role=="0")
	{
		$_SESSION['lid']=$fetch[ 'logid'];
		$_SESSION['uname']=$fetch['username'];
		$_SESSION['password']=$fetch['password'];
		echo '<script> alert ("LOGIN SUCCESSFULLY"); window.location.href="admin/adminhome.php"</script>';
	}
else if($role=="1")
	{
		$_SESSION['lid']=$fetch[ 'logid'];
		$_SESSION['uname']=$fetch['username'];
		$_SESSION['password']=$fetch['password'];
		echo '<script> alert ("LOGIN SUCCESSFULLY"); window.location.href="seller/index.php"</script>';

	}
  else if($role=="2")
	{
		$_SESSION['lid']=$fetch[ 'logid'];
		$_SESSION['uname']=$fetch['username'];
		$_SESSION['password']=$fetch['password'];
		echo '<script> alert ("LOGIN SUCCESSFULLY"); window.location.href="customer/index.php"</script>';

	}

	else{
		echo '<script>alert("try again");window.location.href="index.php"</script>';
	}

}

}

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
<style>   
html,body{
/*background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
*/
background-image: url('uploads/16.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
color: #F8FD8D;

}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #F8FD4B;
}
</style>
</head>
<body>
  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="styles.css">

<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Sign In</h3>
        
      </div>
      <div class="card-body">
        <form method="post" action="">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="username" id="username" class="form-control" placeholder="username">
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" name="password" id="password"  class="form-control" placeholder="password">
          </div>
        
          <div class="form-group">
            <input type="submit" name="submit" value="Login" class="btn float-right login_btn">
          </div>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center links">
          Don't have an account?<a href="register.php">Sign Up</a>
        </div>
        <!-- <div class="d-flex justify-content-center">
          <a href="#">Forgot your password?</a>
        </div> -->
      </div>
    </div>
  </div>
</div>
</body>
</html>