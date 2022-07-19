<!DOCTYPE html>
<html>
<title>SHOP_SELLER</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display";
  letter-spacing: 5px;
}
</style>
<body style="max-width:1500px; background-color:orange">

<!-- Navbar (sit on top) -->
<div class="w3-top" style="max-width:1500px">
  <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">

    <a href="#home" class="w3-bar-item w3-button"><h3 style="color:#05033D ;"><font face="algerian">SHOP <strong style="color:#150F87;">SELLER</strong> app</font></h3></a>
    <!-- Right-sided navbar links. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#menu" class="w3-bar-item w3-button">Registration</a>
      <a href="login.php" class="w3-bar-item w3-button">Login</a>
    </div>
  </div>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;min-width:500px" id="home">
  <img class="w3-image" src="admin_pic.jpg" alt="Hamburger Catering" width="1500" height="500">
  <div class="w3-display-bottomleft w3-padding-large w3-opacity">
    <h1 class="w3-xxlarge" style="color:black;"><b>Shopping Drive</b></h1>
  </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-64" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="clothes.jpg" class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="100">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center">About Clothes</h1><br>
      
      <p class="w3-large">To take your dream from a business idea to launch and make it in the frenzied world of fashion takes a specific set of skills, a generous dose of creativity, and a pinch of business savvy.</p>
 
      <p class="w3-large w3-text-grey w3-hide-medium">It took me a long time to be confident enough that I could fill a store with my clothing.</p>
    </div>
  </div>
  
  

  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
<!--       <h1 class="w3-center">Registration</h1><br>

 -->      <br><br><br>
  <h4 align="center"><a href="register.php" class="w3-button" type="submit"><font face="algerian">Register as SELLER</font></a></h4>
    <h4 align="center"><a href="register.php" class="w3-button" type="submit"><font face="algerian">Register as CUSTOMER</font></a></h4>    
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="clothes1.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%" height="600">
    </div>
  </div>

  <hr>

 </body>
</html>
<br><br><br>
  <?php
  include 'footer.php';
  ?>