<?php
session_start();
if(!isset($_SESSION["manager"]))
{
	header("location: login.php");
	exit();
	}
	//check that this session value is in fact in the database
	$managerID = preg_replace('#[^0-9]#i','',$_SESSION["id"]);//filter everythn but numbers and letters
	$manager = preg_replace('#[^A-Za-z0-9]#i','',$_SESSION["manager"]);
	$password = preg_replace('#[^A-Za-z0-9]#i','',$_SESSION["password"]);
	
	//Run mysql query to be sure this person is an admin and their password session var equals the database information
	//connect to the mysql database
	include '../scripts/db_connection.php';
	$sql = mysql_query("SELECT *FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1"); //query the person
	//Make sure the person exists in database
	$existCount = mysql_num_rows($sql);//count the row nums
	if($existCount == 0)//evaluate the count
	{
		header("location: ../index.php");
		echo "Your login session data is not on record in the database";
		exit();
		
		}
?>