<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>
<?php 
//Gather this product`s full info for inserting automatically into the edit form on page
if(isset($_GET['ID'])){
$targetID = $_GET['ID'];
$sql = mysql_query("SELECT * FROM products WHERE id='$targetID' LIMIT 1");
$prodcutCount = mysql_num_rows($sql);//count the output
if($prodcutCount>0){
	while($row = mysql_fetch_array($sql)){
		$id=$row["id"];
		$ItemName=$row["product_name"]; 
		$ItemPrice = $row["price"];
		$Category = $row["category"];
		$Subcategory = $row["subcategory"];
		$ItemDetails = $row["details"];
		$qt = $row["qt"];
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
//Parse the form data and update inventory item to the system
if(isset($_POST['ItemName'])){
	$pid = mysql_real_escape_string($_POST['thisID']);
	$ItemName=mysql_real_escape_string($_POST['ItemName']);
	$ItemPrice=mysql_real_escape_string($_POST['ItemPrice']);
	$Category=mysql_real_escape_string($_POST['Category']);
	$Subcategory=mysql_real_escape_string($_POST['Subcategory']);
	$ItemDetails=mysql_real_escape_string($_POST['ItemDetails']);
		$eqt=mysql_real_escape_string($_POST['qt']);
	//Updare the product in the system
	$sql = mysql_query("UPDATE products SET product_name='$ItemName', price='$ItemPrice', details='$ItemDetails', category='$Category', subcategory='$Subcategory', qt='$eqt', date_added=now() WHERE id='$pid'");
	
	if($_FILES['fileField']['tmp_name']!=""){	
		$newname="$pid.jpg";
		move_uploaded_file($_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
	}
		header("location: inventory.php");
		exit();
}
?>
<html>
<head>
	<title>Admin Panel - Edit Item</title>
    <link href="style/css.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
    </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php include_once 'includes/admin_header.php'; ?>

<div class="wrapper">
	
	<?php include_once 'includes/left_menu.php'; ?>    
	<?php include_once 'includes/controls.php'; ?>
    <div class="add_category">
  	<div class="add_category_header">
   ADD ITEM 
    </div>
   <div class="add_employees_category">
      <table width="520" border="0" cellpadding="5" cellspacing="5" style=" font-size:18px;">
      <form method="post" action="edit_item.php" name="form" id="form" enctype="multipart/form-data">
      <tr>
    <td width="131">Item Name:</td>
    <td width="463">
      <input name="ItemName" type="text" id="ItemName" size="40" class="ed" value="<?php echo $ItemName;?>"></td>
  </tr>
  <tr>
    <td width="131">Item Price:</td>
    <td width="463">
     KES <input name="ItemPrice" type="text" id="ItemPrice" size="40" class="ed" value="<?php echo $ItemPrice;?>"></td>
  </tr>
      <tr>
          <td>Category:</td>
          <td><select name="Category" id="Category" class="ed">
          <option value=""><?php echo $Category;?></option>

       <?php

       $sql="select * from categories";

       $sql_row=mysql_query($sql);

       while($sql_res=mysql_fetch_assoc($sql_row))

       {

       ?>

       <option value="<?php echo $sql_res["Category_Name"]; ?>"><?php echo $sql_res["Category_Name"]; ?></option>

       <?php

       }

       ?>

    </select>
          </select></td>
        </tr>
        <tr>
          <td>Subcategory:</td>
          <td><select name="Subcategory" id="Subcategory" class="ed">
          <option value=""><?php echo $Subcategory;?></option>

       <?php

       $sql="select * from subcategories ";

       $sql_row=mysql_query($sql);

       while($sql_res=mysql_fetch_assoc($sql_row))

       {

       ?>

       <option value="<?php echo $sql_res["Subcategory_Name"]; ?>"><?php echo $sql_res["Subcategory_Name"]; ?></option>

       <?php

       }

       ?>

    </select>
          </select></td>
        </tr>
        <tr>
    <td width="131">Item Details:</td>
     <td><textarea name="ItemDetails" id="ItemDetails" cols="45" rows="5" class="ed"><?php echo $ItemDetails;?></textarea></td>
  </tr>
  <tr>
    <td width="131">Quantity:</td>
    <td width="463">
      <input name="qt" type="text" id="qt" size="40" class="ed" value="<?php echo $qt;?>"></td>
  </tr>
   <tr>
    <td>Item Image:</td>
    <td><input type="file" name="fileField" id="fileField" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <input name ="thisID" type="hidden" value="<?php echo $targetID; ?>">
    <input type="submit" name="Edit" id="Edit" value="Edit Item"></td>
  </tr>
        </form>
      </table>
    
    </div>
    </div>
    
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>