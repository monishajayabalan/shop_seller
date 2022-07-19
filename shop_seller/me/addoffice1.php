<?php
session_start();
include('../conn.php');
if(!$_SESSION["user_id"])
{
  header('location:dashboard.php');
}
$details_id=$_GET['edit_id']; 

$query=mysqli_query($conn,"SELECT * FROM office_tb join section_tb on office_tb.section=section_tb.section_id WHERE staff_id='$details_id'");
$query1=mysqli_query($conn,"SELECT * FROM section_tb");
 $row=mysqli_fetch_assoc($query);

if(isset($_POST['subm']))
 {

$pic=$_FILES['f1']['name'];

  if($pic!="") 
  {
    $filearray=pathinfo($_FILES['f1']['name']);

    // var_dump($filearray);exit;

    $file1=rand();
    $file_ext=$filearray["extension"];
    if (check_ext($file_ext))
     {
      $filenew=$file1.".".$file_ext;
      move_uploaded_file($_FILES['f1']['tmp_name'],"uploads/office/".$filenew);

    }
    else
    {
      echo "<script> alert('please check file extension')</script>";
    }
  }

  $tid=$_POST['id'];
  $tname=$_POST['name'];
  $tage=$_POST['age'];
  $tdob=$_POST['dob'];
  $tgender=$_POST['gender'];
  $filenew=$_FILES['f1']['name'];
  $taddress=$_POST['address'];
  $tphone=$_POST['phone'];
  $temail=$_POST['email'];
  $tdate=$_POST['date'];
  $texp=$_POST['exp'];
  $tblood=$_POST['blood'];
  $tqul=$_POST['qul'];
  $tsalary=$_POST['salary'];
  $tsubject=$_POST['section'];

  if($filenew!="")

    {
      $filearray=pathinfo($files['f1']['name']);
      $filenew=$file1.".".$file_ext;
      move_uploaded_file($_FILES,['f1']['tmp_name'],"uploads/office/".$filenew);

    mysqli_query($conn,"UPDATE office_tb SET satff_id='$tid',staff_name='$tname',age='$tage',dob='$tdob',gender='$tgender',upload_photo='$filenew',address='$taddress',mobile_no='$tphone',email='$temail',joining_date='$tdate',experience='$texp',blood_group='$tblood',qualification='$tqul',salary='$tsalary',section='$tsection' WHERE staff_id='$details_id'");
   header('location:editoffice.php');
    }
    else
    {
       mysqli_query($conn,"UPDATE office_tb SET staff_id='$tid',staff_name='$tname',age='$tage',dob='$tdob',gender='$tgender',address='$taddress',mobile_no='$tphone',email='$temail',joining_date='$tdate',experience='$texp',blood_group='$tblood',qualification='$tqul',salary='$tsalary',section='$tsection' WHERE staff_id='$details_id'");
   header('location:editoffice.php');
    }

   
   }
   function check_ext($f_ext)
        {
          $allowed= array('jpg','png','jpeg','JPG');
          if(in_array($f_ext,$allowed))
          {
            return true;
          }
          else
          {
            return false;
          }

        }
 
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
   
    <title>Update Office staff</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
      #d3{margin-left: 240px;}
    </style>
  </head>
  <form method="post" enctype="multipart/form-data">
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
     
        <div class="col-md-6" id="d3">
          <div class="tile">
          <div class="tile">
            <h3 class="tile-title" align="center">Edit Office Staff</h3>
            <table class="table">
              <thead>
                <tr>
                 <th>Staff ID</th>
                   <tr class="table-info">
                  <td><input type="text" name="id" id="id1" onclick="clearerror('tid')" value="<?php echo $row['teacher_id']; ?>"><span id="tid" style="color: red"></span></td>
                </tr>
                 <th>Staff Name</th>
                  <tr class="table-info">
                  <td><input type="text" name="name" id="name1" onclick="clearerror('tname')" value="<?php echo $row['teacher_name']; ?>"><span id="tname" style="color: red"></span></td>
                </tr>
                 <th>Age</th>
                   <tr class="table-info">
                  <td><input type="text" name="age" id="age1" onclick="clearerror('tage')" value="<?php echo $row['age']; ?>"><span id="tage" style="color: red"></span></td>
                </tr>
                 <th>Date Of Birth</th>
                   <tr class="table-info">
                  <td><input type="date" name="dob" id="dob1" onclick="clearerror('tdob')" value="<?php echo $row['dob'];?>"><span id="tdob" style="color: red"></span></td>
                </tr>
                 <th>Gender</th>
                   <tr class="table-info">
                  <td><input type="radio" name="gender" id="gender1" value="male" onclick="clearerror('tgender')" <?php if($row["gender"]=='male')
                   {
                    ?>
                    checked
                    <?php
                  }
                  ?>
                  >male
                    <input type="radio" name="gender" id="gender1" value="female" onclick="clearerror('tgender')" 
                    <?php if($row["gender"]=='female')
                     {
                      ?>
                      checked
                      <?php
                    }
                    ?>
                    >female
                    <span id="tgender" style="color: red"></span></td>
                </tr>
                <th>Upload Photo</th>
                <tr class="table-info">
                <td><input type="file" id="image1" name="f1"><img src="uploads/gallery/<?php echo $row['upload_photo']; ?>" height="150px" onclick="clearerror('timage')"><span id="timage" style="color: red"></span></td>
            </tr>
                   <th>Address</th>
                  <tr class="table-info">
                  <td><input type="text" name="address" id="address1" onclick="clearerror('taddress')" value="<?php echo $row['address']; ?>"><span id="s2" style="color: red"></span></td>
                </tr>
                 <th>Mobile Number</th>
                  <tr class="table-info">
                  <td><input type="text" name="phone" id="phone1" onclick="clearerror('tphone')" value="<?php echo $row['mobile_no']; ?>"><span id="tphone" style="color: red"></span></td>
                </tr>
                 <th>Email</th>
                  <tr class="table-info">
                  <td><input type="email" name="email" id="email1" onclick="clearerror('temail')"
                    value="<?php echo $row['email']; ?>"><span id="temail" style="color: red"></span></td>
                </tr>
                  <th>Joining Date</th>
                   <tr class="table-info">
                  <td><input type="date" name="date" id="date1" onclick="clearerror('tdate')"
                    value="<?php echo $row['joining_date']; ?>"><span id="tdate" style="color: red"></span></td>
                </tr>
                 <th>Experience</th>
                  <tr class="table-info">
                  <td><input type="text" name="exp" id="exp1" onclick="clearerror('texp')" value="<?php echo $row['experience']; ?>"><span id="texp" style="color: red"></span></td>
                </tr>
                 <th>Blood Group</th>
                  <tr class="table-info">
                  <td><input type="text" name="blood" id="blood1" onclick="clearerror('tblood')" value="<?php echo $row['blood_group']; ?>"><span id="tblood" style="color: red"></span></td>
                </tr>
                  <th>Qualification</th>
                  <tr>
                  <td><input type="text" name="qul" id="qul1" onclick="clearerror('tqul')" value="<?php echo $row['qualification']; ?>"><span id="tqul" style="color: red"></span></td>
                </tr>
                 <th>Salary</th>
                  <tr class="table-info">
                  <td><input type="text" name="salary" id="salary1" onclick="clearerror('tsalary')" value="<?php echo $row['salary']; ?>"><span id="tsalary" style="color: red"></span></td>
                </tr>
                  <th>Section</th>
                   <tr class="table-info">
                  <td><select name="section" id="section1" onclick="clearerror('tsubject')">
                    <option value="<?php echo $row['section_id'];?>"><?php echo $row['section'];?></option>
                    <?php
                    while ($row=mysqli_fetch_assoc($query1))
                     {
                      ?>
                      <option value="<?php echo $row['section_id'];?>"><?php echo $row['section_name'];?></option>
                  <?php } ?>
                    <span id="tsection" style="color: red"></span>
                    </select></td>
                  </tr>
                </tr>
              </thead>
             </table>
             <div align="center">
                  <input type="submit" class="btn" name="subm" value="UPDATE" onclick="return validate()">
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
    
   <script type="text/javascript">

      function validate()
      {
        var uid=document.getElementById("id").value;
        var uname=document.getElementById("name").value;
        var uage=document.getElementById("age").value;
        var udob=document.getElementById("dob").value;
        var ugender=document.getElementById("gender").value;
        var uimage=document.getElementById("f1").value;
        var uaddress=document.getElementById("address").value;
        var uphone=document.getElementById("phone").value;
        var uemail=document.getElementById("email").value;
        var udate=document.getElementById("date").value;
        var uexp=document.getElementById("exp").value;
        var ublood=document.getElementById("blood").value;
        var uqul=document.getElementById("qul").value;
        var usalary=document.getElementById("salary").value;
        var usubject=document.getElementById("section").value;
        
         if(uid=="")
        {
          document.getElementById("tid").innerHTML="*Name Required";
          return false;
        }
        if(uname=="")
        {
          document.getElementById("tname").innerHTML="*Name Required";
          return false;
        }
         if(uage=="")
        {
          document.getElementById("tage").innerHTML="*Name Required";
          return false;
        }
        if(udob=="")
        {
          document.getElementById("tdob").innerHTML="*Address Required";
          return false;
        }
        if(ugender=="")
        {
          document.getElementById("tgender").innerHTML="*Designation Required";
          return false;
        }
         if(uimage=="")
        {
          document.getElementById("timage").innerHTML="*image Required";
          return false;
        }
         if(uaddress=="")
        {
          document.getElementById("taddress").innerHTML="*Name Required";
          return false;
        }
         if(uphone=="")
        {
          document.getElementById("tphone").innerHTML="*Name Required";
          return false;
        }
         if(uemail=="")
        {
          document.getElementById("temail").innerHTML="*Name Required";
          return false;
        }
         if(udate=="")
        {
          document.getElementById("tdate").innerHTML="*Name Required";
          return false;
        }
         if(uexp=="")
        {
          document.getElementById("texp").innerHTML="*Name Required";
          return false;
        }
         if(ublood=="")
        {
          document.getElementById("tblood").innerHTML="*Name Required";
          return false;
        }
         if(uqul=="")
        {
          document.getElementById("tqul").innerHTML="*Name Required";
          return false;
        }
        if (usalary=="") 
        {
          document.getElementById("tsalary").innerHTML="*Qualification Required";
          return false;
        }
        if (usubject=="")
        {
          document.getElementById("tsubject").innerHTML="*Section Required";
          return false;
        }
         
      }

    </script>
    <script type="text/javascript">

      function clearerror(eee)
      {
        document.getElementById(eee).innerHTML="";
      }

    </script>
  </body>
</form>
</html>