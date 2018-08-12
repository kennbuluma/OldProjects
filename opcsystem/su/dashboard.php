<?php
include('session.php');
 $complaint_query = "SELECT * FROM complaint;";
		$complaint_result = mysqli_query($connection,$complaint_query) or die(mysqli_error());
		$complaint_rowcount = mysqli_num_rows($complaint_result);
		
 $hancomp_query = "SELECT * FROM complaint WHERE feedback_status = 'Not responded';";
		$hancomp_result = mysqli_query($connection,$hancomp_query) or die(mysqli_error());
		$hancomp_rowcount = mysqli_num_rows($hancomp_result);
		
$ctype_query = "SELECT * FROM complaint_type;";
		$ctype_result = mysqli_query($connection,$ctype_query) or die(mysqli_error());
		$ctype_rowcount =  mysqli_num_rows($ctype_result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="w3css/w3.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/sticky-footer.css">
	<link href="bootstrap/css/signin.css" rel="stylesheet">
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	
	
	<style>
.hidden { display:none; }
</style>

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
				<a class="nav-link" href="">Home<span class="sr-only">(current)</span></a>
				</li><li class="nav-item">
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
  
	<nav class="col-sm-2" id="scrollSpy">
      <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
        <li id="complaints" class="active"><a href="#" id="a_complaints">All Complaints (<?php echo $complaint_rowcount;?>)</a></li>
        <li id="users"><a href="#" id="a_users">Users</a></li>
        <li id="ctypes"><a href="#" id="a_ctype">Complaint Types</a></li>
       </ul>
	   	<script type="text/javascript">
		
		$('#a_complaints').click(function(){
			$('#complaints_table').removeClass("hidden");
			$('#user_table').addClass("hidden");
			$('#complaint_types').addClass("hidden");
			$('#ctypes').removeClass("active");
			$('#users').removeClass("active");
			$('#complaints').addClass("active");
		});
		$('#a_users').click(function(){
			$('#complaints_table').addClass("hidden");
			$('#user_table').removeClass("hidden");
			$('#complaint_types').addClass("hidden");
			$('#ctypes').removeClass("active");
			$('#users').addClass("active");
			$('#complaints').removeClass("active");
		});
		$('#a_ctype').click(function(){
			$('#complaints_table').addClass("hidden");
			$('#user_table').addClass("hidden");
			$('#complaint_types').removeClass("hidden");
			$('#ctypes').addClass("active");
			$('#users').removeClass("active");
			$('#complaints').removeClass("active");
		});
	</script>
    </nav>

    <div class="col-sm-7 text-left"> 
		
		<div id="complaints_table">
			<div class="panel panel-info">
			<div class="panel-heading" style="background-color:#b3d9ff">Pending Complaints</div>
			<div class="panel-body text-left" style= "background-color:#ebebe0">
			<table class="table table-striped">
			<thead><tr>
			<th> Email </th>
			<th> Complaint type </th>
			<th> Complaint </th>
			<th> Date issued </th>
			<th> Response status </th>
			<th> Respond </th>
			</tr>
		</thead>
		<tbody>
		<?php
			while ($hancomp_row= mysqli_fetch_array($hancomp_result,MYSQLI_ASSOC)){
			$compid = $hancomp_row['complaint_id'];
			$cid = $hancomp_row['id'];
			$complainttype_query = "SELECT * FROM complaint_type WHERE complaint_id = '$compid';";
			$complainttype_result = mysqli_query($connection,$complainttype_query) or die(mysqli_error());
			$complainttype_row= mysqli_fetch_array($complainttype_result,MYSQLI_ASSOC);
			$response_status = $hancomp_row['feedback_status'];
		?>
		<tr>
	
		<td> <?php echo $hancomp_row['usermail'];?> </td>
		<td> <?php echo $complainttype_row['complaint_type'];?> </td>
		<td> <?php echo $hancomp_row['complaint'];?> </td>
		<td> <?php echo $hancomp_row['issuedate'];?> </td>
		<td> <?php echo $hancomp_row['feedback_status'];?> </td>
		<td><a href="replies.php<?php echo '?cid='.$cid;?>" class="btn btn-info">Reply</a></td>
		</tr><?php } ?>
		</tbody>
		</table>
		</div>
		</div>
		
		<div class="panel panel-info">
			<div class="panel-heading" style="background-color:#b3d9ff">All Complaints</div>
			<div class="panel-body text-left" style= "background-color:#ebebe0">
			<table class="table table-striped">
			<thead><tr>
			<th> Email </th>
			<th> Complaint type </th>
			<th> Complaint </th>
			<th> Date issued </th>
			<th> Response status </th>
			</tr>
		</thead>
		<tbody>
		<?php
			while ($complaint_row= mysqli_fetch_array($complaint_result,MYSQLI_ASSOC)){
			$compid = $complaint_row['complaint_id'];
			$complainttype_query = "SELECT * FROM complaint_type WHERE complaint_id = '$compid';";
			$complainttype_result = mysqli_query($connection,$complainttype_query) or die(mysqli_error());
			$complainttype_row= mysqli_fetch_array($complainttype_result,MYSQLI_ASSOC);
			$response_status = $complaint_row['feedback_status'];
		?>
		<tr>
	
		<td> <?php echo $complaint_row['usermail'];?> </td>
		<td> <?php echo $complainttype_row['complaint_type'];?> </td>
		<td> <?php echo $complaint_row['complaint'];?> </td>
		<td> <?php echo $complaint_row['issuedate'];?> </td>
		<td> <?php echo $complaint_row['feedback_status'];?> </td>
		</tr><?php } ?>
		</tbody>
		</table>
		</div>
    </div>
	</div>
		<div id="user_table" class="hidden">
		<div class="panel panel-info">
			<div class="panel-heading" style="background-color:#b3d9ff">Administrators</div>
			<div class="panel-body text-left" style= "background-color:#ebebe0">
		<table class="table table-striped">
		<thead><tr>
		<th> First name </th>
		<th> Last name </th>
		<th> Email </th>
		<th> Phone number </th>
		</tr>
		</thead>
		<tbody>
		<?php
		$user_query = "SELECT * FROM user WHERE user_group = 'administrator';";
		$user_result = mysqli_query($connection,$user_query) or die(mysqli_error());
		$user_rowcount =  mysqli_num_rows($user_result);
			while ($user_row= mysqli_fetch_array($user_result,MYSQLI_ASSOC)){
		?>
		<tr>
		<td> <?php echo $user_row['fname'];?> </td>
		<td> <?php echo $user_row['lname'];?> </td>
		<td> <?php echo $user_row['usermail'];?> </td>
		<td> <?php echo $user_row['phone'];?> </td>
		</tr><?php } ?>
		</tbody>
		</table>
		</div>
		</div>
		<div class="panel panel-info">
		<div class="panel-heading" style="background-color:#b3d9ff">Passengers</div>
			<div class="panel-body text-left" style= "background-color:#ebebe0">
		
		<table class="table table-striped">
		<thead><tr>
		<th> First name </th>
		<th> Last name </th>
		<th> Email </th>
		<th> Phone number </th>
		</tr>
		</thead>
		<tbody>
			<?php
		$userp_query = "SELECT * FROM user WHERE user_group = 'passenger';";
		$userp_result = mysqli_query($connection,$userp_query) or die(mysqli_error());
		$userp_rowcount =  mysqli_num_rows($userp_result);
			while ($userp_row= mysqli_fetch_array($userp_result,MYSQLI_ASSOC)){
		?>
		<tr>
		<td> <?php echo $userp_row['fname'];?> </td>
		<td> <?php echo $userp_row['lname'];?> </td>
		<td> <?php echo $userp_row['usermail'];?> </td>
		<td> <?php echo $userp_row['phone'];?> </td>
		</tr><?php } ?>
		</tbody>
		</table>
		</div>
		</div>
		</div>
		
		<div id="complaint_types" class="hidden">
		<div class="panel panel-info">
		<div class="panel-heading" style="background-color:#b3d9ff">Complaint Types</div>
			<div class="panel-body text-left" style= "background-color:#ebebe0">
			<table class="table table-striped">
		<thead><tr>
		<th> Complaint ID </th>
		<th> Complaint type </th>
		<th> Delete </th>
		</tr>
		</thead>
		<tbody>
		<?php
			while ($ctype_row= mysqli_fetch_array($ctype_result,MYSQLI_ASSOC)){
		?>
		<tr>
	
		<td> <?php echo $ctype_row['complaint_id'];?> </td>
		<td> <?php echo $ctype_row['complaint_type'];?> </td>
		<td><a href="" </td>
		
		</tr><?php } ?>
		</tbody>
		</table>
		</div>
		</div>
		<form class="form-inline" method="post" action="addcomplaint.php">
		<p><input type="text" name="comp_id" class="form-control" placeholder="Complaint ID" required> 
		<input type="text" name="complaint" class="form-control" placeholder="Complaint Name/Type" required></p>
		<button class="btn btn-info" type="submit">Add Complaint</button> 
		</form>
		</div>
		</div>
	
	<div class="col-sm-3 sidenav">
        <div class="panel panel-info text-left">
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
<div class="container-fluid"><p class="text-muted">Online Passenger Complaint System 2016</p></div>
</footer>
</body>
</html>

