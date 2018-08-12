<?php 
//Database Connection
include_once 'scripts/db_connection.php';
?>

<?php
if(isset($_POST['Firstname'])){
	$Email =$_POST['REmail'];
	$Firstname = $_POST['Firstname'];
	$Lastname =$_POST['Lastname'];
	$Telephone = $_POST['Telephone'];
	$Country =$_POST['Country'];
	$City = $_POST['City'];
	$Address_Street = $_POST['Address_Street'];
	$Address =$_POST['Address'];
	//see if that Customer name is an identical match to another in the system
	$sql = mysql_query("SELECT id FROM customers WHERE Email='$Email' LIMIT 1");
	$ItemMatch=mysql_num_rows($sql);//count the output
	if($ItemMatch>0){
		echo "The Customer exists in the system, <a href='user_login.php'>Click Here</a>";
		exit();
		}
	
	$sql = mysql_query("INSERT INTO customers(Firstname, Lastname, Email, Telephone, Country, City, Address_Street, Address, date_added) VALUES('$Firstname', '$Lastname', '$Email', '$Telephone', '$Country', '$City', '$Address_Street', '$Address', now())") or die (mysql_error());
	
?>