<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	//username and password sent from form

	$username = mysqli_real_escape_string($connection,$_POST['usermail']);
	$password = mysqli_real_escape_string($connection,$_POST['userpass']);
	$usergrp = "passenger";
	
	$query = "SELECT usermail FROM user WHERE usermail = '$username' and userpass = '$password'";

	$result = mysqli_query($connection,$query) or die(msqli_error($connection));
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	$count = mysqli_num_rows($result);
	//if result matched $username and $password, row must be 1

	if($count==1){
		$grpquery = "SELECT * FROM user WHERE usermail = '$username';";
		$grpresult = mysqli_query($connection, $grpquery) or die(mysqli_error($connection));
		$grprow = mysqli_fetch_array($grpresult,MYSQLI_ASSOC);
		if($usergrp == $grprow['user_group']){
			$active = $row['active'];
			
			$_SESSION['activet_user'] = $username;
			header("location: pass_dashboard.php");
		}
		else
		{?>
			<!--<script language="Javascript">alert ("Access denied!");</script>-->
			<div class="alert alert-danger">
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Access denied!</strong>
			</div>
		<?php
		
		}
		
	}
	else 
	{?>
	<!--<script language="Javascript">alert ("Incorrect credetials. Please try again.");</script>-->
		<div class="alert alert-danger">
		<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Sign in failed!</strong> Incorrect credetials. Please try again.
		</div>
	<?php
	}
	
}
?>