<?php
include("connection.php");
include("pass_login.php");
?>
<!DOCTYPE html>
<head>
	<title>Online Passenger Complaint System</title>
	<link rel="icon" href="su/images/icon.png">
	<link rel="stylesheet" type="text/css" href="su/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="su/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="su/bootstrap/css/sticky-footer.css">
	<link href="su/bootstrap/css/signin.css" rel="stylesheet">
	<script src="su/bootstrap/js/jquery.min.js"></script>
	<script src="su/bootstrap/js/bootsrap.js"></script>
</head>
<body style= "background-color:#ebebe0">
<div class="container-fluid" id="banner">
<center><strong>
<h3>
Online Passenger Complaint System
</h3>
</strong></center>
</div>
<div class="container-fluid">
<nav class="navbar navbar-light bg-faded" style="background-color:#b3d9ff">
  
  <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="register.php">Register</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="">Help</a>
    </li>
   </ul>
  </nav>
  </div>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-3 sidenav">
    
    </div>
    <div class="col-sm-6 text-left"> 
    <p><a href="#login">How to login</a></p>
	<p><a href="#register">How to register</a></p>
	<p><a href="#passforgot">Forgot Password</a></p>
	<p><div id="login">
	<strong>Open the home page then:</strong></br>
	1. Enter the email address you used during registration</br>
	2. Enter your password</br>
	3. Click on sign in to Sing in to your account.</br>
	</div></p>
	<p><div id="register">
	<strong>Open the home page then:</strong></br>
	1. Click on the Register tab to navigate to the registration page.</br>
	2. Enter the details required on the registration form.</br>
	3. Click on Register. You will be redirected to the home page</br>
	4. Enter the email address you used during registration</br>
	5. Enter your password</br>
	6. Click on sign in to Sing in to your account.</br>
	</div></p>
	<p><div id="passforgot"></div></p>
    </div>
    <div class="col-sm-3 sidenav">
<div class="panel panel-info">
  <div class="panel-heading" style="background-color:#b3d9ff">Contacts</div>
  <div class="panel-body text-left" style= "background-color:#ebebe0">Phone: +254788000111</div>
  <div class="panel-body text-left" style= "background-color:#ebebe0">Email: customer@opc.com</div>
  <div class="panel-body text-left" style= "background-color:#ebebe0">Website: www.opcsytem.com</div>
  <div class="panel-body text-left" style= "background-color:#ebebe0">Physical Address: OPC Plaza, Nairobi, Kenya</div>
</div>
   </div>
  </div>
</div>
  

  <footer class="footer" style="background-color:#001a33">
<div class="container"><p class="text-muted">Online Passenger Complaint System 2016</p></div>
</footer>

</body>
</html>