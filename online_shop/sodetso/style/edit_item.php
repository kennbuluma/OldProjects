<?php
session_start();
if(!isset($_SESSION["manager"]))
{
	header("location: admin_login.php");
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
	if($existCount == 1)//evaluate the count
	{
		header("location: ../index.php");
		echo "Your login session data is not on record in the database";
		exit();
		
		}
?>
<?php 
//Gather this product`s full info for inserting automatically into the edit form on page
if(isset($_GET['pid'])){
$targetID = $_GET['pid'];
$sql = mysql_query("SELECT * FROM products WHERE id='$targetID' LIMIT 1");
$prodcutCount = mysql_num_rows($sql);//count the output
if($prodcutCount>0){
	while($row = mysql_fetch_array($sql)){
		$id=$row["id"];
		$product_name=$row["product_name"]; 
		$price = $row["price"];
		$category = $row["category"];
		$subcategory = $row["subcategory"];
		$productdetails = $row["details"];
		$date_added=strftime("%b %d, %Y", strtotime($row["date_added"]));
		 
		}
	}
	else{
		echo "Sory that item does not exist";
		exit();
		}
	}
?>
<?php
//Parse the form data and add inventory item to the system
if(isset($_POST['productName'])){
	$pid = mysql_real_escape_string($_POST['thisID']);
	$productName=mysql_real_escape_string($_POST['productName']);
	$price=mysql_real_escape_string($_POST['productPrice']);
	$category=mysql_real_escape_string($_POST['Category']);
	$subcategory=mysql_real_escape_string($_POST['subCategory']);
	$productdetails=mysql_real_escape_string($_POST['productDetails']);
	//Updare the product in the system
	$sql = mysql_query("UPDATE products SET product_name='$productName', price='$price', details='$productdetails', category='$category', subCategory='$subcategory' WHERE id='$pid'");
	
	if($_FILES['fileField']['tmp_name']!=""){	
		$newname="$pid.jpg";
		move_uploaded_file($_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
	}
		header("location: inventory_list.php");
		exit();
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventory Management</title>
<link type="text/css" rel="stylesheet" href="../style/style.css" />
</head>

<body>
<div align="center" id="mainWrapper" >
<?php include_once '../header.php'; ?>

<div id="pageContent">
<div align="right" style="margin-right: 32px;"><a href="inventory_list.php#inventoryForm">+Add New Inventory Item</a></div>
<h2>Inventory List</h2>
<a name="inventoryForm" id="inventoryForm"></a>
<h4>Add New Inventory Item Below</h4>
<form action="edit_item.php" enctype="multipart/form-data" name="myForm" id="myForm" method="post">

<table width="573" border="0" cellpadding="4" cellspacing="4">
  <tr>
    <td width="131">Product Name:</td>
    <td width="463">
      <input name="productName" type="text" id="productName" size="40" value="<?php echo $product_name; ?>"></td>
  </tr>
  <tr>
    <td>Product Price:</td>
    <td> KES <input type="text" name="productPrice" id="productPrice" value="<?php echo $price; ?>"></td>
  </tr>
  <tr>
    <td>Category: </td>
    <td><select name="Category" id="Category">
      <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
      <option>Hardware</option>
      <option>Software</option>
    </select></td>
  </tr>
  <tr>
    <td>Subcategory:</td>
    <td><select name="subCategory" id="subCategory">
      <option value="<?php echo $subcategory; ?>"><?php echo $subcategory; ?></option>
      <option>Input Devices</option>
      <option>Output Devices</option>
      <option>Antivirus</option>
      <option>Applications</option>
      <option>Drivers</option>
      <option>OS</option>
    </select></td>
  </tr>
  <tr>
    <td>Product Details:</td>
    <td><textarea name="productDetails" id="productDetails" cols="45" rows="5"><?php echo $productdetails; ?></textarea></td>
  </tr>
  <tr>
    <td>Product Image:</td>
    <td><input type="file" name="fileField" id="fileField"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <input name ="thisID" type="hidden" value="<?php echo $targetID; ?>">
    <input type="submit" name="Add" id="Add" value="Edit Item"></td>
  </tr>
</table>
</form>

</div>
<?php include_once '../footer.php'; ?>
</div>

</body>
</html>