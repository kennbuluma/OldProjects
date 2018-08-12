<?php
include('session.php');
$user="SELECT * FROM user WHERE usermail = '$login_session';";
$userresult = mysqli_query($connection, $user) or die(mysqli_error());
$userrow= mysqli_fetch_array($userresult,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
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
<div class="container" id="banner">
<center><strong>
<h3>
Online Passenger Complaint System
</h3>
</strong></center>
</div>
<div class="container-fluid">
<nav class="navbar navbar-light bg-faded" style="background-color:#b3d9ff">
  
<div class="container-fluid">
  <ul class="nav navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="dashboard.php">Home</a>
    </li>
	<li class="nav-item">
	<a class="nav-link" href="reg.php">Add user</a>
	</li>
	<li class="nav-item">
      <a class="nav-link" href="in_help.php">Help</a>
    </li>
	</ul>
	 <ul class="nav navbar-nav navbar-right">
	   <li class="nav-item">
      <a class="nav-link active" href="profile.php">Hello <?php echo $usersession;?></a>
    </li>
	 <li class="nav-item">
      <a class="nav-link active" href="logout.php">Logout</a>
    </li>
  	 </ul>
	  </div>
  </nav>
  </div>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-3 sidenav">
    
    </div>
    <div class="col-sm-6 text-left"> 
      <p><strong>User Details</strong></p>
	<p><strong>First name: </strong><?php echo $userrow['fname'];?></p>
	<p><strong>Last name: </strong><?php echo $userrow['lname'];?></p>
	<p><strong>Email: </strong><?php echo $userrow['usermail'];?></p>
	<p><strong>Phone number: </strong><?php echo $userrow['phone'];?></p>
	<p>Photo: <?php //echo $userrow['usermail'];?></p>
    </div>
    <div class="col-sm-3 sidenav">
      
	<div class="panel panel-info">
			<div class="panel-heading">Contacts</div>
			<div class="panel-body text-left">Phone: +254788000111</div>
			<div class="panel-body text-left">Email: customer@opc.com</div>
			<div class="panel-body text-left">Website: www.opcsytem.com</div>
			<div class="panel-body text-left">Physical Address: OPC Plaza, Nairobi, Kenya</div>
		</div>
  
      
    </div>
  </div>
</div>
<footer class="footer" style="background-color:#001a33">
<div class="container-fluid"><p class="text-muted">Online Passenger Complaint System 2016</p></div>
</footer>
</body>
</html>