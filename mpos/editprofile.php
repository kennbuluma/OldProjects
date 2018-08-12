<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connect.php';
	editProfile();
}
function editProfile(){
	global $db;
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$bsname = $_POST["bsname"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$pswd = $_POST["pswd"];
	
	$query = "INSERT INTO user(usr_fname,usr_lname,usr_bsn,usr_phone,usr_email,usr_pass) VALUES ('$fname','$lname','$bsname','$phone','$email','$pswd');";
	
	mysqli_query($db, $query) or die (mysqli_error($db));
echo 'success';	
}
?>
