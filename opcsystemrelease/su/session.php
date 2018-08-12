<?php
include ('connection.php');
session_start();

$usercheck = $_SESSION['active_user'];
$ses_sql = mysqli_query($connection, "select usermail, fname from user where usermail= '$usercheck'") or die("Error: ".mysqli_error($connection));
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC) ;
$login_session = $row['usermail'];
$usersession = $row['fname'];

if(!isset($_SESSION['active_user'])){
	header("location: index.php");
}
?>