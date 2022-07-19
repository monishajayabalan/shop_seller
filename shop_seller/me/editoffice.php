<?php
session_start();
include('../conn.php');
if(!$_SESSION["user_id"])
{
  header('location:dashboard.php');
}
$query=mysqli_query($conn,"SELECT * FROM office_tb join section_tb on office_tb.section=section_tb.section_id");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
   
    <title>Edit Staff Details</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
      #d4{margin-left: 55px;}
    </style>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
   <?php include'header.php'?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
   

   <?php include'leftbar.php'?>
    <main class="app-content">
       <div class="app-title" id="hed">
         <h3><i class=""></i></h3><br><br><br>
         </div>
         <div align="center">
         <tr>
          <td al><a href="addoffice.php" class="btn">Add Office Staff</a></td> 
        </tr>
      </div>
     
        <div class="col-md-12" id="d4">
          <div class="row">
          <div class="tile">
            <h3 class="tile-title" align="center">Staff Details</h3>
            <table class="table">
              <thead>
                <tr>
                  <th>Staff ID</th>
                  <th>Staff Name</th>
                  <th>Age</th>
                  <th>DOB</th>
                  <th>Gender</th>
                  <th>Upload Photo</th>
                  <th>Address</th>
                  <th>Mobile Number</th>
                  <th>Email</th>
                  <th>Joining Date</th>
                  <th>Experience</th>
                  <th>Blood Group</th>
                  <th>Qualification</th>
                  <th>Salary</th>
                  <th>Section</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                while($row=mysqli_fetch_assoc($query)) 
                {
                  ?>
                <tr class="table-info">
                  <td><?php echo $row['staff_id']; ?></td>
                  <td><?php echo $row['staff_name']; ?></td>
                  <td><?php echo $row['age']; ?></td>
                  <td><?php echo $row['dob']; ?></td>
                  <td><?php echo $row['gender']; ?></td>
                  <td><img src="uploads/office/<?php echo $row['upload_photo']; ?>" height="150px"></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['mobile_no']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['joining_date']; ?></td>
                  <td><?php echo $row['experience']; ?></td>
                  <td><?php echo $row['blood_group']; ?></td>
                  <td><?php echo $row['qualification']; ?></td>
                  <td><?php echo $row['salary']; ?></td> 
                  <td><?php echo $row['section']; ?></td>   
                  <td><a href="addoffice1.php?edit_id=<?php echo $row['staff_id'];?>" class="btn">EDIT</a></td>          
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
        
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    
  </body>
</html>