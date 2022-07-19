<?php
session_start();
include('conn.php');
if(!$_SESSION["user_id"])
{
  header('location:adminhome.php');
}
$id =$_SESSION['user_id'];
 $sql1 = "SELECT * From login_tb";
$query = mysqli_query($conn,$sql1);
// $sql6 = "SELECT * From acceptor_tb Where login_id='$id'";
// $query6=mysqli_query($conn,$sql6);
//   $result6=mysqli_fetch_assoc($query6);
 
//   $acc_id=$result6['acceptor_id'];



?>

    
<!DOCTYPE html>
<html lang="en">
<head>
<title>FOOD DONATION</title>
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
 include'header1.php';

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
    <p><strong>Reserve</strong> a table, ask for today's special or just --> send a message:</p>
    <form action="addmessage.php"  method="post">

                             <label>To: </label>
                            <p><select name="Candidate" class="w3-input w3-padding-16 w3-border">
                           
                              <!-- <option value="health">health</option> -->
                             <option value="<?php echo '2'; ?>">
                              
                              <?php echo 'health'; ?>
                            </option> 
                          
                          </select></p>
     <!--  <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="How many people" required name="People"></p> -->
      <!-- <label>Date & Time: </label>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p> -->
      <br>
       <label>Message: </label>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message \ Special requirements"  name="message" required></p>

      <p><button class="w3-button w3-black" type="submit" name="msg">SEND MESSAGE</button></p>
    </form>
  </div>
</div>
<div>
  <?php

  $sql3="SELECT * FROM admsg_tb Where login_id='$id'";
  $query3=mysqli_query($conn,$sql3);
   if(mysqli_num_rows($query3) >0){  
  while($row = mysqli_fetch_assoc($query3)){
   // $t= $row['donator_name'];
    $mg = $row['message'];
    $d=$row['dt'];


    ?>
     <p><?php echo "<font color='#C52319'>To</font>:health ";?></p> 
     <p><?php echo "<font color='#C52319'>Time:</font>".$d ; ?></p> 
    <p><?php echo $mg; ?></p>
    <?php
     $r=$row['reply'];
    if (!empty($r)) {
     
    ?>

    <p><?php echo "<font color='#C52319'>Reply:</font>".$r ; ?></p> 

    <hr>
    <?php
     }   
     }
    }
  ?>
<hr>
  <?php
   $query8="SELECT * FROM admsg_tb where login_id='2' ";
          $result8=mysqli_query($conn,$query8);
          if(mysqli_num_rows($result8) >0){  
 while($row=mysqli_fetch_assoc($result8)) 
   {
    $ec= $row['message'];
    $d=$row['dt'];

  ?>
    <p><?php echo "<font color='#C52319'>From:</font>health "; ?></p>
    <p><?php echo "<font color='#C52319'>Time:</font>".$d ; ?></p> 
    <p><?php echo $ec; ?></p>
    <?php
    if (empty($row['reply'])) {?>
    <p><a href="updateapprove5.php?msg_id=<?php echo $row['message_id'];?>" class="btn" type="submit">Reply</a></p>
    <?php
  }
    $r=$row['reply'];
    if (!empty($r)) {
     
    ?>

    <p><?php echo "<font color='#C52319'>reply:</font>".$r ; ?></p> 

    <hr>
    <?php
     }
     }
    }
  ?>
</div>
</main>
</body>
</html>

