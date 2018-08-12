<?php
include("connection.php");
include("login.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Passenger Complaint System</title>
	<link rel="icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="w3css/w3.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/sticky-footer.css">
	<link href="bootstrap/css/signin.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
</head>
<body style= "background-color:#ebebe0">
<div class="container-fluid padding:0px" id="banner" style="background-color:#ebebe0" >
<div class="page-header text-center">
<h2><img src="images/icon.png"> Online Passenger Complaint System</h2>
</div>
</div>
<div class="container-fluid">
<nav class="navbar navbar-light bg-faded" style="background-color:#b3d9ff">
  
  <ul class="nav navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="">Home<span class="sr-only">(current)</span></a>
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
       <form class="form-signin" method="post" action="" role="form">
        <h3 class="form-signin-heading">Sign in</h3>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="usermail" class="form-control" name="usermail" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="userpass" class="form-control" name="userpass" placeholder="Password" required>
        <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>
      </form>
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
  <footer class="footer" style="background-color:#001a33">
<div><p class="text-muted">Online Passenger Complaint System 2016</p></div>
</footer>
</div>
<footer class="footer" style="background-color:#001a33">
<div class="container-fluid"><p class="text-muted">Online Passenger Complaint System 2016</p></div>
</footer>
</body>
</html>