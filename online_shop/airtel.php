<?php
//Database connection
include 'scripts/db_connection.php'; 
?>
<?php
session_start();
if(!isset($_SESSION["manager"]))
{
	
	header("location: user_login.php");
	exit();
	}
	
	//check that this session value is in fact in the database
	$_SESSION['TRN']='TRN'.time().rand(000,999);
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
		header("location: checkout.php");
		echo "Your login session data is not on record in the database";
		exit();
		
		}
?>
<?php 
//render the cart for the user to view
$cartOutput="";
$cartTotal="";
$x='';
$customer ='';
$airtel_checkout_btn="";
if(!isset($_SESSION["cart_array"])|| count($_SESSION["cart_array"])<1){
	$cartOutput="<h2 align='center'>Your shopping cart is empty</h2>";
	}else{
		//start paypal checkout button
		$airtel_checkout_btn .='<form action="airtel.php" method="post">';
		
		//start for each loop
		$i=0;
		foreach($_SESSION["cart_array"] as $each_item){
			//$i++;
			$item_id=$each_item['item_id'];
			$sql = mysql_query("SELECT * FROM products WHERE id='$item_id'");
			while($row=mysql_fetch_array($sql)){
				$product_id = $row["product_id"];
				$product_name = $row["product_name"];
				$price = $row["price"];
				$details = $row["details"];				
				}
			$pricetotal = $price*$each_item['quantity'];
			$cartTotal = $pricetotal+$cartTotal;
			$cost=$pricetotal+$cartTotal;
			$cost1=($pricetotal+$cartTotal)-$pricetotal;
			//dynamic checkout button assembly
			$x = $i + 1;
			$airtel_checkout_btn .='
								<input type="hidden" name="rm" value="2">
								<input type="hidden" name="item_name_'.$x.'" value="'.$product_name.'">
								<input type="hidden" name="amount_'.$x.'" value="'.$price.'">
								<input type="hidden" name="quantity_'.$x.'" value="'.$each_item['quantity'].'">';
								
			//Dynamic table row assembly
			//$customer = 
			$cartOutput .="<tr>";
			$cartOutput .='<td><a href="product.php?id='.$item_id.'">'.$product_name.'</a><br/><img src="inventory_images/'.$item_id.'.jpg" alt="'.$product_name.'" width="80" height="70" border="1"/></td>';
			$cartOutput .='<td>'.$product_id.'</td>';
			$cartOutput .='<td>'.$details.'</td>';
			$cartOutput .='<td>KES '.$price.'</td>';
			$cartOutput .='<td>'.$each_item['quantity'].'</td>';
			$cartOutput .='<td>KES '.$pricetotal.'</td>';
			$cartOutput .='</tr>';
			$i++;
			}
			$cartTotal ="KES ".$cartTotal." /=";
			//Finish the paypal checkout button
			$airtel_checkout_btn .=' 
				<input type="text" name="PTRN" size="40"/><br/><br/>
				<input type="submit" value="Purchase" name="submit"><br/>
					
			</form>';
		}
?>
<?php
//Submit shopping cart
foreach($_SESSION["cart_array"] as $each_item){
	
	if(isset($_POST['item_name_'.$x.''])){
		$id = $each_item['item_id'];
		$quantity = $each_item['quantity'];
		$transaction_id = $_SESSION['TRN'];
		$manager = $_SESSION["manager"];
		
		 
		
		$sql = "SELECT * FROM `products` WHERE `id` =$id";
		$run = mysql_query($sql) or die(mysql_error());
		$results = mysql_fetch_assoc($run);
		$rows = mysql_num_rows($run);
		
		if($rows > 0){
			$product_id = $results['product_id'] ;
			$product_name = $results['product_name'] ;
			$details = $results['details'];
			$price = $results['price'];
			
			$pricetotal = $price*$each_item['quantity'];
		}
		
		
			
			//Submit the shopping cart
			$sql = mysql_query("INSERT INTO cart(transaction_id, ItemName, Product_ID, ItemDetails, UnitPrice, Quantity, Total, User, date_added) VALUES('$transaction_id', '$product_name', '$product_id', '$details', '$price', '$quantity', '$pricetotal', '$manager', now())") or die (mysql_error());
			
			$sql = mysql_query("UPDATE products SET qt=qt-'$quantity' WHERE product_id='$product_id' ") or die (mysql_error());
			
	}
}
?>
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
<title>Mpesa Payment </title>
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
     <li><a href="home">Home</a></li>
        <li><a href="products">Products</a></li>
		<li><a href="register">Register</a></li>
        <li><a href="customer_login">Customer Login</a></li>
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
    <table width="297" height="280" border="0" cellpadding="2" cellspacing="2">
	<tr>
	<?php	
//insert transaction details 
	if(isset($_POST['item_name_'.$x.'']) && isset($_POST['PTRN'])){
	$Payment_Transaction_No = $_POST['PTRN'];
	
$sq = mysql_query("INSERT INTO transaction(transaction_id, user, total, Payment_Mode, Payment_Transaction_No, date_added, status, Type) VALUES('$transaction_id','$manager', '$cost1', 'Airtel', '$Payment_Transaction_No', now(), 'Pending', 'Cash')") or die (mysql_error());
			echo '<td>Your shopping cart has been successfully saved...</td>';	

session_destroy();

header('Location: end.php');				
		}

?>
</tr>
      <tr>
        <td><strong>AIRTEL MONEY PAYMENT </strong></td>
      </tr>
      <tr>
        <td><img src="pics/airtel.jpg" alt="Airtel Money" width="256" height="145" /></td>
      </tr>
      <tr>
        <td>Purchase your goods via Airtel Money </td>
      </tr>
      <tr>
        <td>Our Airtel Money Pay Bill No. is: <strong>BTHM5458543NB </strong></td>
      </tr>
      <tr>
        <td>Your Total Bill is: <?php echo $cartTotal; ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Enter Airtel Money Transaction No Below </td>
      </tr>
      <tr>
	  
      </tr>
	  
    </table>
<br/>
  <table width="100%" style="font-size:16px">
  <tr bgcolor="#007FFF" height="30">
    <td width="169" style="color:#FFF;">Item Name</td>
     <td width="169" style="color:#FFF;">Product ID</td>
    <td width="180"  style="color:#FFF;">Item Description</td>
    <td width="85"  style="color:#FFF;">Unit Price</td>
    <td width="71"  style="color:#FFF;">Quantity</td>
    <td width="90"  style="color:#FFF;">Total</td>
  </tr>
 <?php echo $cartOutput; ?>
 <?php echo $airtel_checkout_btn; ?>
</table>
</div>
<br/>

      
      
   
  <!-- End Main -->
    <!-- Footer -->

   <?php include 'footer.php' ?>

  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
