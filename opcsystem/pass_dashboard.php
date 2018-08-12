<?php
include('session.php');
//for user complaints
$usercmp_query = "SELECT * FROM complaint where usermail = '$loginuser_session';";
		$usercmp_result = mysqli_query($connection,$usercmp_query) or die(mysqli_error());
		$usercmp_rowcount = mysqli_num_rows($usercmp_result);
		//$usercmp_row= mysqli_fetch_array($usercmp_result,MYSQLI_ASSOC);
//for responses
$usereply_query = "SELECT * FROM complaint where usermail = '$loginuser_session' AND feedback_status = 'Responded';";
		$usereply_result = mysqli_query($connection,$usereply_query) or die(mysqli_error());
		$usereply_rowcount = mysqli_num_rows($usereply_result);
		//$usereply_row= mysqli_fetch_array($usereply_result,MYSQLI_ASSOC);
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
				<a class="nav-link" href="">Home</a>
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

<div class="container-fluid text-center">    
	<div class="row content">
	<div class="col-sm-2">
	<nav id="scrollSpy">
      <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
        <li id="li_form" class="active"><a href="#" id="a_complaint_form">Issue Complaint</a></li>
        <li id="li_complaints"><a href="#" id="a_complaints">Complaints(<?php echo $usercmp_rowcount;?>)</a></li>
		<li id="li_responses"><a href="#" id="a_responses">Reply(<?php echo $usereply_rowcount?>)</a></li>
    </ul>
    	<script type="text/javascript">
		
		$('#a_complaint_form').click(function(){
			$('#complaint_form').removeClass("hidden");
			$('#complaints').addClass("hidden");
			$('#responses').addClass("hidden");
			$('#li_responses').removeClass("active");
			$('#li_complaints').removeClass("active");
			$('#li_form').addClass("active");
		});
		$('#a_complaints').click(function(){
			$('#complaint_form').addClass("hidden");
			$('#complaints').removeClass("hidden");
			$('#responses').addClass("hidden");
			$('#li_form').removeClass("active");
			$('#li_complaints').addClass("active");
			$('#li_responses').removeClass("active");
		});
		$('#a_responses').click(function(){
			$('#complaint_form').addClass("hidden");
			$('#complaints').addClass("hidden");
			$('#responses').removeClass("hidden");
			$('#li_responses').addClass("active");
			$('#li_form').removeClass("active");
			$('#li_complaints').removeClass("active");
		});
	</script>
	</nav>
    </div>	
    <div class="col-sm-7 text-left">
		<div id="complaint_form">
			<form class="form-group" method="post" action="insert_complaint.php">
				<label for="sel1">Complaint type:</label>
				<select class="form-control" id="sel1" name="sel1" required>
				<?php  
					$complainttype_query = "SELECT * FROM complaint_type;";
					$complaint_result = mysqli_query($connection,$complainttype_query) or die(mysqli_error());
					while ($complaint_row= mysqli_fetch_array($complaint_result,MYSQLI_ASSOC)){
					echo "<option>".$complaint_row['complaint_type']."</option>";}
				?>
				</select>
				<br>
				<p>
				<label for="complaint">Complaint:</label></br>
				<textarea id="complaint" name="complaint" class= "form-control" placeholder="Your complaint..." required></textarea></p>
				<button class="btn btn-info">Submit</button>
			</form>
		</div>
		<div id="complaints" class="hidden">
			<div class="panel panel-info">
			<div class="panel-heading" style="background-color:#b3d9ff">My Complaints</div>
			<div class="panel-body text-left" style= "background-color:#ebebe0">
			<table class="table table-striped">
			<thead><tr>
			<th> Complaint type </th>
			<th> Complaint </th>
			<th> Date issued </th>
			<th> Response status </th>
			<th> View complaint </th>
			</tr>
		</thead>
		<tbody>
		<?php
			while ($usercmp_row= mysqli_fetch_array($usercmp_result,MYSQLI_ASSOC)){
			$compid = $usercmp_row['complaint_id'];
			$cmp = $usercmp_row['id'];
			$usercmptype_query = "SELECT * FROM complaint_type WHERE complaint_id = '$compid';";
			$usercmptype_result = mysqli_query($connection,$usercmptype_query) or die(mysqli_error());
			$usercmptype_row= mysqli_fetch_array($usercmptype_result,MYSQLI_ASSOC);
		?>
		<tr>
		<td> <?php echo $usercmptype_row['complaint_type'];?> </td>
		<td> <?php echo $usercmp_row['complaint'];?> </td>
		<td> <?php echo $usercmp_row['issuedate'];?> </td>
		<td> <?php echo $usercmp_row['feedback_status'];?> </td>
		<td> 
			<a href="v_complaint.php<?php echo '?cmp='.$cmp;?>" class="btn btn-info">View</a><a href="print_complaint.php<?php echo '?cmp='.$cmp;?>" class="btn btn-info">Print</a>
		</td>
		</tr><?php } ?>
		</tbody>
		</table>
			<a href="print_complaint.php<?php echo '?cmp='."alcpm";?>" class="btn btn-info">Print All</a>
		</div>
    </div>
		</div>
		<div id="responses" class="hidden">
		<div class="panel panel-info">
			<div class="panel-heading" style="background-color:#b3d9ff">Responses</div>
			<div class="panel-body text-left" style= "background-color:#ebebe0">
			<table class="table table-striped">
			<thead><tr>
			<th> Complaint type </th>
			<th> Complaint </th>
			<th> Date issued </th>
			<th> Response </th>
			<th> Response date </th>
			<th> View Response </th>
			</tr>
		</thead>
		<tbody>
		<?php
			while ($usereply_row= mysqli_fetch_array($usereply_result,MYSQLI_ASSOC)){
			$ucompid = $usereply_row['complaint_id'];
			$rpl = $usereply_row['id'];
			$replycmptype_query = "SELECT * FROM complaint_type WHERE complaint_id = '$ucompid';";
			$replycmptype_result = mysqli_query($connection,$replycmptype_query) or die(mysqli_error());
			$replycmptype_row= mysqli_fetch_array($replycmptype_result,MYSQLI_ASSOC);
			$response_status = $complaint_row['feedback_status'];
		?>
		<tr>
	
		<td> <?php echo $replycmptype_row['complaint_type'];?> </td>
		<td> <?php echo $usereply_row['complaint'];?> </td>
		<td> <?php echo $usereply_row['issuedate'];?> </td>
		<td> <?php echo $usereply_row['feedback'];?> </td>
		<td> <?php echo $usereply_row['responsedate'];?> </td>
		<td>
			<a href="v_reply.php<?php echo '?rpl='.$rpl;?>" class="btn btn-info">View</a><a href="print_reply.php<?php echo '?rpl='.$rpl;?>" class="btn btn-info">Print</a>
		</td>
		</tr><?php } ?>
		</tbody>
		</table>
			<a href="print_reply.php<?php echo '?rpl='."alrpl";?>" class="btn btn-info">Print All</a>
		</div>
    </div>
		</div>
		
	
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