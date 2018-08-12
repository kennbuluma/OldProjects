<?php
//Database connection
include 'scripts/db_connection.php'; 
?>

<?php
session_start();
if(!isset($_SESSION["manager"]))
{
	
	header("location: customer_login.php");
	exit();
	}
	$managerID = $_SESSION["id"];//filter everythn but numbers and letters
	$manager = $_SESSION["manager"];
	$password = $_SESSION["password"];
	
	//Run mysql query to be sure this person is an admin and their password session var equals the database information
	//connect to the mysql database
	include 'scripts/db_connection.php';
	$sql = mysql_query("SELECT *FROM customers WHERE id='$managerID' AND Email='$manager' AND password='$password' LIMIT 1"); //query the person
	//Make sure the person exists in database
	$existCount = mysql_num_rows($sql);//count the row nums
	if($existCount == 0)//evaluate the count
	{
		header("location: customer_account.php");
		echo "Your login session data is not on record in the database";
		exit();
		
		}
?>

<?php

 if(isset($_GET['ID'])  && $_GET['ID']!=''  ){
	$sid=$_GET['ID'];
 }
?>
<?php 
$add = mysql_query("UPDATE inbox SET status='Read' WHERE id ='$sid'") or die(mysql_error());

?>
<?php
$sql = mysql_query("SELECT * FROM inbox WHERE id='$sid'");
			while($row=mysql_fetch_array($sql)){
				$id = $row["id"];
				$Sender = $row["Sender"];		
				$Message = $row["Message"];
				$Date= $row["date_added"];						
				}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Inbox </title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link href="sodetso/style/css.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <h1 id="logo"><a href="index.php"></a></h1>
    <!-- Cart -->
    <div id="cart"> <a href="cart" class="cart-link">Your Shopping Cart</a>
      <div class="cl">&nbsp;</div>
      </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
       <li><a href="home" >Home</a></li>
        <li><a href="products" >Products</a></li>
		<li><a href="register">Register</a></li>
        <li><a href="contact">Contact</a></li>
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <!-- Main -->
  <div id="main">
    <div class="cl">&nbsp;</div>
    <!-- Content -->
    <table width="227" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td width="57"><a href="customer_account.php">Account</a> &bull;</td>
         <?php 
		$get2 = mysql_query ("SELECT * FROM inbox WHERE Receiver='$manager' AND Status='Unread' ") or die(mysql_error());
		$num = mysql_num_rows($get2);
?>
        <td width="69"><a href="inbox.php">Inbox (<?php echo $num; ?>)</a> &bull;</td>
        <td width="81"><a href="logout.php">Logout</a></td>
      </tr>
    </table>
    <br/>
    <table width="200" border="0" cellspacing="4" cellpadding="4">
      <tr>
        <td colspan="2"><h3>Message Details</h3></td>
      </tr>
      <tr>
        <td width="66">From:</td>
        <td width="120"><?php echo $Sender; ?></td>
      </tr>
      <tr>
        <td>Date:</td>
        <td><?php echo $Date; ?></td>
      </tr>
      <tr>
        <td>Message:</td>
        <td><?php echo $Message; ?></td>
      </tr>
    </table>
    <br/>
    
   </div>
   <?php //include 'footer.php' ?>
  <!-- End Main -->
    <!-- Footer -->
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
