<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	include ("session.php");
	replyToComplaint();
	?>
			<!--<script language="Javascript">alert ("Access denied!");</script>-->
			<div class="alert alert-success">
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Successfully replied!</strong>
			</div>
		<?php
}
function replyToComplaint(){
	
	global $connection;
			
	 		
	
	$cmp_id = $_POST["compid"];
	$response = $_POST["response"];
	$replydate = date("Y/m/d");
	$responsei_status = 'Responded';

		
	$query = "UPDATE complaint SET responsedate = '$replydate', feedback = '$response', feedback_status = '$responsei_status' WHERE id = '$cmp_id';";
	
	mysqli_query($connection, $query) or die (mysqli_error($connection));

}

header("location: dashboard.php");



?>