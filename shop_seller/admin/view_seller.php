<!doctype html>
<html class="no-js" lang="en">
    <?php
    include "../conn.php";
    session_start();
    ?>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SHOP_SELLER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body style = "background-color:pink;">
  
  
          
                    <div class ="main-content-inner">
                        
                            <div class="col-lg-6 mt-5">
                               
                                   
                                        <h4 class="header-title">SELLER DETAILS</h4>
                                       
                                           
                                                <table class="table text-center" style="color:black;font-size:15px;">
                                                    <thead class="text-uppercase bg-primary">
                                                        <tr class="text-white">
                                                            <th scope="col"><b>NAME</b></th>
                                                            <th scope="col"><b>USERNAME</b></th>
                                                            <th scope="col"><b>EMAIL</b></th>
                                                            <th scope="col"><b>APPROVAL_STATUS </b></th>
                                                            <th scope="col"><b>ACTION </b></th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <?php
                                                            $query = "select * from register_tb";
                                                            $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
                                                            
                                                            while ($row=mysqli_fetch_assoc($result)) {
                                                                ?>
                                                            <tr>
                                                                
                                                                <td><b> <?php echo $row['name']?></b></td> 
                                                                <td><b><?php echo $row['username'];?></b></td> 
                                                                 <td><b><?php echo $row['email'];?></b></td> 
                                                                 <td>  <?php  
                                                                      if($row['approval_status']=='0') 

                                                                    {?>
                                          <a class="dropdown-item" href="approve_seller.php?edit_id=<?php echo $row['s_register_id'];?>">WAITING FOR APPROVAL</a>
                                       <?php }
                                        ?>
                                        <?php
                    if ($row['approval_status']==1) 
                    {
                      ?>
                      <span style="color: green">APPROVED</span>
                    <?php } ?>
  
                                      
                         </td> 
                         <td class="text-center">
      
       <div class="dropdown action-label">
       <a class="dropdown-item" href="delete_seller.php?del_id=<?php echo $row['s_register_id'];?>">REMOVE</a>
 
       </div>
   </td> <?php
                                                            }
                                                            ?>
       
                                                            </tr>
                                                               
                                                        </tr>
                                                    </tbody>
                                                </table>
                                        <br><br><br>
                           <a href="adminhome.php">Back to Home</a>
                            </div>
              
              
                </div>
           
            <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
            <!-- bootstrap 4 js -->
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/owl.carousel.min.js"></script>
            <script src="assets/js/metisMenu.min.js"></script>
            <script src="assets/js/jquery.slimscroll.min.js"></script>
            <script src="assets/js/jquery.slicknav.min.js"></script>
        
            <!-- start chart js -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
            <!-- start highcharts js -->
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <!-- start zingchart js -->
            <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
            <script>
            zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
            ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
            </script>
            <!-- all line chart activation -->
            <script src="assets/js/line-chart.js"></script>
            <!-- all pie chart -->
            <script src="assets/js/pie-chart.js"></script>
            <!-- others plugins -->
            <script src="assets/js/plugins.js"></script>
            <script src="assets/js/scripts.js"></script>
        </body> 
        </html>