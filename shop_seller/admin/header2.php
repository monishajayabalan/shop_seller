<?php
session_start();
include('conn.php');
if(!$_SESSION["user_id"])
{
  header('location:healthhome.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>W3.CSS Template</title>
<meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" type="text/css" href="main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  #d4{margin-left: 100px;}
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("uploads/25.jpg");
  min-height: 75%;
}

.menu {
  display: none;
}
</style>

 <?php
 include'helheader.php';

 ?> 

</head>

<body class="app sidebar-mini">
  <main class="app-content">
   
    
<div class="w3-container" id="where" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    
  <!-- <div class="app-sidebar__overlay" data-toggle="sidebar"> -->
           <h5 class="w3-center w3-padding-64"><span class="w3-tag w3-wide">MESSAGES</span></h5>
   

   <!--  <img src="uploads/30.jpg" style="width:250"> -->
    <!-- <p><span class="w3-tag">FYI!</span> We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste.</p>
    <p><strong>Reserve</strong> a table, ask for today's special or just --> send a reply message:</p>
    <br>
    <form action=" "  method="post">
       <label>Message: </label>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements"  name="rmessage" required></p>

      <p><button class="w3-button w3-black" type="submit" name="msg">SEND MESSAGE</button></p>
    </form>
   
<?php

$msgid=$_GET['msgg_id'];
//echo "$msgid";
if(isset($_POST['msg'])){

  $rep=$_POST['rmessage'];

mysqli_query($conn,"UPDATE admsg_tb SET reply='$rep' WHERE message_id='$msgid'");

//echo '<script type="text/javascript">window.location=\'admsg.php\';</script>';
} 
?>



  </div>
</div>
<div>
</div>
</main>
</body>
</html>
