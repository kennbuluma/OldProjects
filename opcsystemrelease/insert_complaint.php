<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	include ("session.php");
	insertComplaint();
}
function insertComplaint(){
	
	global $connection;
	global $loginuser_session;
		$cmptype = $_POST["sel1"];
	 $complainttype_query = "SELECT * FROM complaint_type WHERE complaint_type = '$cmptype';";
		$complaint_result = mysqli_query($connection,$complainttype_query) or die(mysqli_error());
		$complaint_row= mysqli_fetch_array($complaint_result,MYSQLI_ASSOC);
		
	$usermail = $loginuser_session;
	$complaint_id = $complaint_row['complaint_id'];
	$complaint = $_POST["complaint"];
	$issuedate = date("Y/m/d");
	$responsei_status = 'Not responded';
	
		
	$query = "INSERT INTO complaint(usermail,complaint_id,complaint,issuedate,feedback_status) VALUES ('$usermail','$complaint_id','$complaint','$issuedate','$responsei_status');";
	
	mysqli_query($connection, $query) or die (mysqli_error($connection));

}
header("location: pass_dashboard.php");
?>