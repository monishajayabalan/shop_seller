<?php
session_start();
include('../conn.php');
// if(!$_SESSION["user_id"])
// {
//   header('location:dashboard.php');
// }
// $id = $_SESSION["lid"];




 
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link rel="stylesheet" type="text/css" href="main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include 'header1.php' ?>
<br>
<br>
</head>
<body style="background-image:url('pic.jpeg')">
<main class="app-content"  style="background-image:url('pic.jpeg')">
  <h3 class="tile-title" align="center">Feedbacks</h3>
         <div class="col-md-10" id="d4">
          <div class="tile">
          <div class="tile">
        
              
            <table class="table">
              <thead  class="table table-dark table-striped">
                <tr>
               	  <th >Name</th>
                 
                 <!--  <th>Image</th> -->
                 
                  <th align="center"><font align="center">Feedback</font></th>
                                             
                </tr>
              </thead>
              <tbody>
                
                <?php
          
                $query = "select * from feedback_tb";
                $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
                while($row=mysqli_fetch_assoc($result)) 
                {
                  ?>
                <tr class="table-info">
                 
                  
                 
                  <td><?php echo $row['username']; ?></td>
                  
                  <td><?php echo $row['feedback']; ?></td>
                                     
                  <!-- <td><a href="editdetail1.php?edit_id=<?php //echo $row['login_id'];?>" class="btn">EDIT</a></td>  -->         
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
    </main>
</body>
</html>
