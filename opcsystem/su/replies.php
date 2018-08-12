<?php
include 'session.php';
$get_cmp = $_GET["cid"];
$rsource = "SELECT * FROM complaint WHERE id = '$get_cmp';";
$rs_result =  mysqli_query($connection, $rsource) or die ("Failed to execute.");
$rs_row = mysqli_fetch_array($rs_result, MYSQLI_ASSOC);
$cmp_id = $rs_row['complaint_id'];
$rctype = "SELECT * FROM complaint_type WHERE complaint_id = '$cmp_id';";
$rc_result = mysqli_query($connection, $rctype) or die ("Failed to execute query.");
$rc_row = mysqli_fetch_array($rc_result, MYSQLI_ASSOC);
$username = $rs_row['usermail'];
$ruser = "SELECT * FROM user WHERE usermail = '$username';";
$ruser_result = mysqli_query($connection, $ruser) or die ("Failed to execute query.");
$ruser_row = mysqli_fetch_array($ruser_result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reply</title>
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
<div class="container-fluid" id="banner">
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
				</li><li class="nav-item">
				<a class="nav-link" href="">Add user</a>
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

<div class="container-fluid">    
  <div class="row content">
    <div class="col-sm-3 sidenav">
    </div>
    <div class="col-sm-6 text-left"> 
	<h3> Reply </h3>
	<form class="form-group" method="post" action="reply.php">       
    <input type="hidden" name="compid" value="<?php echo $get_cmp;?>">
	<p>From: <input type="text" class="form-control" value="<?php echo $rs_row['usermail'];?>" readonly></p>
	<p>Title: <input type="text" class="form-control" value="<?php echo $rc_row['complaint_type'];?>" readonly></p>
	<p>Complaint:<br>
		<textarea name="complaint" class="form-control" readonly><?php echo $rs_row['complaint'];?>			
		</textarea></p>
	<p>Reply:<br>
		<textarea name="response" class="form-control" placeholder="Your reply..."></textarea></p>
	<button class="btn btn-info"  type="submit">Reply</button>   
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
</div>
</div>
<footer class="footer" style="background-color:#001a33">
<div class="container-fluid"><p class="text-muted">Online Passenger Complaint System 2016</p></div>
</footer>
</body>
</html>
