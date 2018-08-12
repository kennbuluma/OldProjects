<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php 
//Gather this product`s full info for inserting automatically into the edit form on page
if(isset($_GET['ID'])){
$targetID = $_GET['ID'];
$sql = mysql_query("SELECT * FROM categories WHERE Category_ID='$targetID' LIMIT 1");
$CategoryCount = mysql_num_rows($sql);//count the output
if($CategoryCount>0){
	while($row = mysql_fetch_array($sql)){
		$CategoryID=$row["Category_ID"];
		$CategoryName=$row["Category_Name"]; 
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
include_once 'session_check.php';
?>
<?php
//Parse the form data and add category to the system
if(isset($_POST['submit'])){
	$CategoryID=mysql_real_escape_string($_POST['CategoryID']);
	$CategoryName=mysql_real_escape_string($_POST['CategoryName']);
	
	//Add this Category into the database
		$sql = mysql_query("UPDATE categories SET Category_Name='$CategoryName', date_added=now() WHERE Category_ID='$CategoryID'") or die (mysql_error());
		
		header("location: add_category.php");
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
      <form method="post" action="edit_category.php" name="form" id="form">
      <tr>
      <td>
      <input type="hidden" name="CategoryID" id="CategoryID" value="<?php echo $CategoryID; ?>">
      </td>
      </tr>
        <tr>
          <td>Category Name:</td>
          <td>
          <input name="CategoryName" type="text" id="CategoryName" class="ed" size="40" value="<?php echo $CategoryName; ?>"></td>
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