<?php
include("connection.php");

?>
<!DOCTYPE html>
<html>
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
    <li class="nav-item active">
      <a class="nav-link" href="">Register<span class="sr-only">(current)</span></a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="help.php">Help</a>
    </li>
   </ul>
  </nav>
  </div>
  <div class="container-fluid text-center"> 
   <div class="row content">
    <div class="col-sm-3">
    
    </div>
    <div class="col-sm-6 text-left"> 

	<form role="form" class="form-signin" method="post" action="pass_reg.php" onsubmit="validatePass()">       
        <h3 class="form-signin-heading">Sign in</h3>
		<label for="fname" class="sr-only">First name</label>
        <input type="text" id="fname" name="fname" class="form-control" placeholder="Last name" required autofocus></p>
		<label for="lname" class="sr-only">Last name</label>
        <input type="text" id="lname" name="lname" class="form-control" placeholder="Last name" required></p>
		<label for="phone" class="sr-only">Phone number</label>
        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone number" required></p>
        <label for="usermail" class="sr-only">Email address</label>
        <input type="email" id="usermail" name="usermail" class="form-control" placeholder="Email address" required></p>
        <label for="userpass" class="sr-only">Password</label>
        <input type="password" id="userpass" name="userpass" class="form-control" placeholder="Password" required></p>
		<label for="cnfpass" class="sr-only">Confirm Password</label>
        <input type="password" id="conf_pass" name="userpass" class="form-control" placeholder="Confirm Password" required></p>
		<button class="btn btn-lg btn-info btn-block" type="submit">Register</button>
     <script language="Javascript">
      function validatePass() {
    var pass = document.forms["regform"]["userpass"].value;
	var cpass = document.forms["regform"]["conf_pass"].value;
    if (pass != cpass) {
        alert("Passwords don't mmatch");
		pass="";
		cpass="";
        return false;
    }
}</script>

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
 