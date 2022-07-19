<?php
session_start();
include('conn.php');
if(!$_SESSION["user_id"])
{
  header('location:dashboard.php');
}
$query=mysqli_query($conn,"SELECT * FROM donator_tb");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
       
    <title>Approve Donators</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
      #d4{margin-left: 100px;}
    </style>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
   <?php include'header1.php'?>

    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
   

  
    <main class="app-content">

        <div class="app-title" id="hed">
         <h3><i class=""> </i></h3><br><br><br>
         </div>
     <h3 class="tile-title" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Donators List</h3>
        <div class="col-md-10" id="d4">
          <div class="tile">
          <div class="tile">
            
            <table class="table">
              <thead  class="table table-dark table-striped">
                <tr>
                  <th>Name</th>
                  
                  <th>Phone No</th>
                  <th>Action</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php
                    while ($row=mysqli_fetch_assoc($query))
                     {
                      ?>
                <tr class="table-info">
                    
                  <td><?php echo $row['name'];?></td>
                   
                  <td><?php echo $row['mobile'];?></td>
                  <td>
                    <?php
                    if ($row['approve_status']==0)
                     {
                      ?>
                    <a href="updateapprove.php?update_id=<?php echo $row['login_id'];?>" class="btn" type="submit">APPROVE</a>
                  <?php } ?>
                    <?php
                    if ($row['approve_status']==1) 
                    {
                      ?>
                      <span style="color: green">APPROVED</span>
                    <?php } ?>
  
                  </td></td>
                                         
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
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
  </body>
</html>