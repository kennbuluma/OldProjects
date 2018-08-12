<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connection.php';
	addComplaintType();
}
function addComplaintType(){
	global $connection;
	$complaint_id = $_POST["comp_id"];
	$complaint_type = $_POST["complaint"];
						
	$query = "INSERT INTO complaint_type(complaint_id,complaint_type) VALUES ('$complaint_id','$complaint_type');";
	
	mysqli_query($connection, $query) or die (mysqli_error($connection));
echo "Added successfully";	
}

header("location: dashboard.php");

?>