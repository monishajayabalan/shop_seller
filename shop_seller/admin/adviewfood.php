<?php
session_start();
include('conn.php');
if(!$_SESSION["user_id"])
{
  header('location:adminhome.php');
}
$id = $_SESSION["user_id"];
// $_SESSION["acceptor_id"] = $id;

$sql2="SELECT * FROM acceptor_tb where login_id='$id'";
$query2=mysqli_query($conn,$sql2);
while($row = mysqli_fetch_assoc($query2)){
  $acc_id = $row['acceptor_id'];
}
$sql1="SELECT * FROM dndetail_tb  ORDER BY dt DESC";
$query1=mysqli_query($conn,$sql1);
//if(mysqli_num_rows($query1)>0){ 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
   
    <title>Edit Details</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
      #d4{margin-left: 55px;}
    </style>
    <?php include'header1.php'?>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
   
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
   

  
    <main class="app-content">
       <div class="app-title" id="hed">
         <h3><i class=""></i></h3><br><br><br>
         </div>
         <div align="center">
         
          <!-- <a href="moredetail.php" class="btn">Add Details</a>
        
      </div><br><br>
      <div class="col-15 col-md-15" id="d4">
          
          
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View Details</h3> 
            <div align="center"> -->
       
              
                 

          <!-- <div class="row align-items-start"> -->
 <table align="center" class="table table-striped">
  <thead  class="thead-dark">
    <tr>
		<th>name</th>
		<th>food</th>
		<th>quantity</th>
		<th>date</th>
    
    <th>Permission</th>
    <th>Action</th>
    <th>Msg</th> 
	</tr>
		<!-- <th>Time</th> -->
	</thead>
<tbody>
<?php
while ($row_img=mysqli_fetch_assoc($query1)) {
  ?>

  <tr>  
<th><?php echo $row_img['name'];?></th>
<th><?php echo $row_img['food'];?></th>
<th><?php echo $row_img['quantity'];?></th>
<th><?php echo $row_img['dt'];?></th>
<!--  <td>
                    <?php
                    // if ($row_img['acceptor_booking']==0)
                     {
                      //$acceptor_id=$row['acceptor_id'];
                      ?>
                    
                    <a href="updateapprove2.php?update_id=<?php echo $row_img['donator_id'];?>&acc_id=<?php echo $acc_id;?>" class="btn" type="submit">Pending</a>
                    <a href="updateapprove5.php?updat_id=$id" class="btn" type="submit">Pending</a>  
                  <?php } ?>
                    <?php
                    if ($row_img['acceptor_booking']==1) 
                    {
                     ?>
                      <span style="color: red">Reserved</span>
                    <?php }?>
                    </td> -->
                     <td><?php 
                    if(!$row_img['permission']==1) 
                    {
                      ?>
                      <span style="color: red">
                      <a href="updateapprove6.php?update_id=<?php echo $row_img['detail_id'];?>&name=<?php echo'approve';?>" class="btn" type="submit" name="approve">Approve</a></span>

                      <a href="updateapprove6.php?update_id=<?php echo $row_img['detail_id'];?>&nname=<?php echo'notapprove';?>" class="btn" type="submit" name="notapprove">Not Approve</a></span>
                    
                  <?php }
                    elseif($row_img['permission']==1) 
                    {
                      ?>
                      <span style="color: green">Approved</span>
                    <?php }
                    elseif($row_img['permission']==2) 
                    {
                      ?>
                      <span style="color:red">Not Approved</span>
                    <?php }?>
                    </td>

                    <td><a href="updateapprove4.php?update_id=<?php echo $row_img['donator_id'];?>" class="btn" type="submit">More</a></td>
<!--                      <td><a href="admsg.php" class="btn" type="submit">Msg</a></td>
 -->                       <td><a href="dnmessagehel.php?update_id=<?php echo $row_img['donator_id'];?>" class="btn" type="submit">Message</a></td>  
                    

</tr>
</tbody>
<?php
	}
?>
 </table>

</body>
</html>
