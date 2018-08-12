<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>
<?php
//Parse the form data and add inventory item to the system
if(isset($_POST['ItemName'])){
	$ItemID=mysql_real_escape_string($_POST['product_id']);
	$ItemName=mysql_real_escape_string($_POST['ItemName']);
	$ItemPrice=mysql_real_escape_string($_POST['ItemPrice']);
	$Category=mysql_real_escape_string($_POST['Category']);
	$Subcategory=mysql_real_escape_string($_POST['Subcategory']);
	$ItemDetails=mysql_real_escape_string($_POST['ItemDetails']);
	$qt=mysql_real_escape_string($_POST['qt']);
	//see if that Item name is an identical match to another Item in the system
	$sql = mysql_query("SELECT id FROM products WHERE product_id='$ItemID' LIMIT 1");
	$ItemMatch=mysql_num_rows($sql);//count the output
	if($ItemMatch>0){
		echo "The Product ID exists in the system, <a href='add_item.php'>Click Here</a>";
		exit();
		}
		//Add this Item into the database
		$sql = mysql_query("INSERT INTO products(product_id, product_name, price, details, category, subcategory, qt, date_added) VALUES('$ItemID', '$ItemName', '$ItemPrice', '$ItemDetails', '$Category', '$Subcategory', '$qt', now())") or die (mysql_error());
		$pid = mysql_insert_id();
		//Place image in the folder
		$newname="$pid.jpg";
		move_uploaded_file($_FILES['fileField']['tmp_name'], "../inventory_images/$newname");
	}
?>
<script language="javascript">
 function check()
{
 if(form.product_id.value=="")
    {
     alert("Enter Product Id");
       return false;
    }
  if(form.ItemName.value=="")
    {
       alert("Enter Item Name");
       return false;
   }
  if(form.ItemPrice.value=="")
    {
       alert("Enter Item Price");
       return false;
   }
	if(form.ItemDetails.value=="")
    {
       alert("Enter Item Details");
       return false;
   }
 return true;
}
</script>


<html>
<head>
	<title>Admin Panel - Add Item</title>
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
      <form method="post" action="add_item.php" name="form" id="form" enctype="multipart/form-data" OnSubmit="return check()">
      <tr>
    <td width="131">Product ID:</td>
    <td width="463">
      <input name="product_id" type="text" id="product_id" size="40" class="ed" placeholder="Enter Item Code"></td>
  </tr>
      <tr>
    <td width="131">Item Name:</td>
    <td width="463">
      <input name="ItemName" type="text" id="ItemName" size="40" class="ed" placeholder="Enter Item Name"></td>
  </tr>
  <tr>
    <td width="131">Item Price:</td>
    <td width="463">
     KES <input name="ItemPrice" type="text" id="ItemPrice" size="40" class="ed" placeholder="Enter Item Price"></td>
  </tr>
      <tr>
          <td>Category:</td>
          <td><select name="Category" id="Category" class="ed">
          <option value="">--Select--</option>

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
          <option value="">--Select--</option>

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
     <td><textarea name="ItemDetails" id="ItemDetails" cols="45" rows="5" class="ed"></textarea></td>
  </tr>
   <tr>
    <td width="131">Quantity:</td>
    <td width="463">
      <input name="qt" type="text" id="qt" size="40" class="ed" placeholder="Enter Quantity"></td>
  </tr>
   <tr>
    <td>Item Image:</td>
    <td><input type="file" name="fileField" id="fileField" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Add" id="Add" value="Add Item"></td>
  </tr>
        </form>
      </table>
    
    </div>
    </div>
    
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>