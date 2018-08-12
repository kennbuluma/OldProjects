<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connect.php';
	createUser();
}


function createUser(){
	global $connect;

	$myid = $_POST["myid"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$adm = $_POST["adm"];

	$query = "insert into test(myid,fname,lname,adm) values('$myid','$fname','$lname','$adm');";

	mysqli_query($connect, $query) or die(mysqli_error($connect));
	mysqli_close($connect);
}
?>