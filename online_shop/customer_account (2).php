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
<?php include 'pagination.php'; ?>

<?php
$sql = mysql_query("SELECT * FROM customers WHERE Email='$manager'");
			while($row=mysql_fetch_array($sql)){
				$id = $row["id"];
				$Telephone = $row["Telephone"];		
				$Firstname = $row["Firstname"];
				$Lastname = $row["Lastname"];
				$Email = $row["Email"];
				$Telephone = $row["Telephone"];		
				$Country = $row["Country"];
				$City = $row["City"];
				$Address_Street = $row["Address_Street"];
				$Address = $row["Address"];						
				}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Account </title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link href="sodetso/style/css.css" rel="stylesheet" type="text/css">
<style type="text/css">
#pageNum{
float:left;
background-color:#0CF;
padding: 3px;
border: 1px solid #e1e1e1;
}
#active{
float:left;
background-color:#FFFFFF;
padding: 3px;
border: 1px solid #e1e1e1;

}
.navNext {
float:left;
margin-left: 5px;
margin-right: 5px;
font-weight:bold;
}

.navPrev{
float:left;
margin-right: 5px;
font-weight:bold;
}
</style>
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
      <li><a href="home">Home</a></li>
        <li><a href="products">Products</a></li>
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
    <table width="526" border="0" cellspacing="4" cellpadding="4">
      <tr>
        <td colspan="4"><h3>Your Account Information</h3></td>
      </tr>
      <tr>
        <td width="116">Firstname:</td>
        <td width="99"><?php echo $Firstname; ?>&nbsp;</td>
        <td width="106">Country:</td>
        <td width="153"><?php echo $Country; ?></td>
      </tr>
      <tr>
        <td>Lastname:</td>
        <td><?php echo $Lastname; ?></td>
        <td>City:</td>
        <td><?php echo $City; ?></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><?php echo $Email; ?></td>
        <td>Address Street:</td>
        <td><?php echo $Address_Street; ?></td>
      </tr>
      <tr>
        <td>Telephone:</td>
        <td><?php echo $Telephone; ?></td>
        <td>Address:</td>
        <td><?php echo $Address; ?></td>
      </tr>
      
            <tr><td>&nbsp;</td></tr>
      <tr><td><h3>Your Transactions</h3></td></tr>
      <tr> 
    <?php
if(isset($_GET['pageid'])){
 $page =$_GET['pageid'];
 echo transactionsDet($_GET['pageid']);
}
else { 
echo transactionsDet($_GET['pageid']=1); 
}

?>
      </tr> 
      <tr><td>&nbsp;</td></tr>
      <tr><td><h3>Your Orders</h3></td></tr>
      <tr> 
         <?php
if(isset($_GET['pageid'])){
 $page =$_GET['pageid'];
 echo orders($_GET['pageid']);
}
else { 
echo orders($_GET['pageid']=1); 
}

?> </tr>
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
