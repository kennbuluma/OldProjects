<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connection.php';
	createUser();
}
function createUser(){
	global $connection;
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$mail = $_POST["usermail"];
	$pass = $_POST["userpass"];
	$phone = $_POST["phone"];
	$usergrp = "passenger";
		
	$query = "INSERT INTO user(fname,lname,usermail,userpass,phone,user_group) VALUES ('$fname','$lname','$mail','$pass', '$phone', '$usergrp');";
	
	mysqli_query($connection, $query) or die (mysqli_error($connection));
	
}

header("location: index.php");

?>