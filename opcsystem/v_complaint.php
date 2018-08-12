<?php
include 'session.php';
$get_cmp = $_GET["cmp"];
$complaint = "SELECT * FROM complaint WHERE id = '$get_cmp';";
$cm_result =  mysqli_query($connection, $complaint) or die ("Failed to execute.");
$cm_row = mysqli_fetch_array($cm_result, MYSQLI_ASSOC);
$cmp_id = $cm_row['complaint_id'];
$cctype = "SELECT * FROM complaint_type WHERE complaint_id = '$cmp_id';";
$cc_result = mysqli_query($connection, $cctype) or die ("Failed to execute query.");
$cc_row = mysqli_fetch_array($cc_result, MYSQLI_ASSOC);
$username = $cm_row['usermail'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	
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
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li class="nav-item active">
				<a class="nav-link" href="pass_dashboard.php">Home</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" href="in_help.php">Help</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
				<a class="nav-link active" href="profile.php">Hello <?php echo $userpsession;?></a>
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
	<h3> Complaint </h3>
	
    <form class="form-group">       
    <input type="hidden" name="cmpid" value="<?php echo $get_cmp;?>">
	<p>Title: <input type="text" class="form-control" value="<?php echo $cc_row['complaint_type'];?>"readonly></p>
	<p>Response status: <input type="text" class="form-control" value="<?php echo $cm_row['feedback_status'];?>"readonly></p>
	<p>Date: <input type="text" class="form-control" value="<?php echo $cm_row['issuedate'];?>"readonly></p>
	<p>Complaint:<br>
		<textarea name="complaint" class="form-control" readonly><?php echo $cm_row['complaint'];?></textarea></p>
		<a href="print_complaint.php<?php echo '?cmp='.$get_cmp;?>" class="btn btn-info">Print</a>
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
<div class="container"><p class="text-muted">Online Passenger Complaint System 2016</p></div>
</footer>
</body>
</html>
