<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>
<?php 
//Gather this Subcategory full info for inserting automatically into the edit form on page
if(isset($_GET['ID'])){
$targetID = $_GET['ID'];
$sql = mysql_query("SELECT * FROM subcategories WHERE Subcategory_ID='$targetID' LIMIT 1");
$SubcategoryCount = mysql_num_rows($sql);//count the output
if($SubcategoryCount>0){
	while($row = mysql_fetch_array($sql)){
		$SubcategoryID=$row["Subcategory_ID"];
		$CategoryName=$row["Category_Name"]; 
		$SubcategoryName=$row["Subcategory_Name"];
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
//Parse the form data and edit subcategory to the system
if(isset($_POST['submit'])){
	$SubcategoryID=mysql_real_escape_string($_POST['SubcategoryID']);
	$CategoryName=mysql_real_escape_string($_POST['CategoryName']);
	$SubcategoryName=mysql_real_escape_string($_POST['SubcategoryName']);
	
	//Update this SubCategory into the database
		$sql = mysql_query("UPDATE subcategories SET Category_Name='$CategoryName', Subcategory_Name='$SubcategoryName', date_added=now() WHERE Subcategory_ID='$SubcategoryID'") or die (mysql_error());
		
		header("location: sub_category.php");
		exit();
	}
?>
<html>
<head>
	<title>Admin Panel - Add Category</title>
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
   EDIT CATEGORY
    </div>
    <div class="add_employees_category">
      <table width="520" border="0" cellpadding="5" cellspacing="5" style=" font-size:18px;">
      <form method="post" action="edit_subcategory.php" name="form" id="form">
      <tr>
      <td>
      <input type="hidden" name="SubcategoryID" id="SubcategoryID" value="<?php echo $SubcategoryID; ?>">
      </td>
      </tr>
      <tr>
          <td>Category Name:</td>
          <td><select name="CategoryName" id="CategoryName" class="ed">
				<option value="<?php echo $CategoryName; ?>"><?php echo $CategoryName; ?></option>
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
          <td>Subcategory Name:</td>
          <td>
         <input name="SubcategoryName" type="text" id="SubcategoryName" class="ed" size="40" value="<?php echo $SubcategoryName; ?>"></td>
        </tr>
        
        <tr>
          <td colspan="2"><input type="submit" name="submit" id="submit" value="Edit"></td>
        </tr>
        </form>
      </table>
    
    </div>
    </div>
    
   
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>