<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>
<?php
//Deleting Subcategory
if(isset($_GET['deleteid'])){
	$id_to_delete = $_GET['deleteid'];
	$sql = mysql_query("DELETE FROM subcategories WHERE Subcategory_ID = '$id_to_delete' LIMIT 1") or die (mysql_error());
	
	}
?>
<?php
//Parse the form data and add subcategory to the system
if(isset($_POST['submit'])){
	$CategoryName=mysql_real_escape_string($_POST['CategoryName']);
	$SubcategoryName=mysql_real_escape_string($_POST['SubcategoryName']);
	
	//see if that subcategory name is an identical match to another subcategory in the system
	$sql = mysql_query("SELECT * FROM subcategories WHERE Subcategory_Name='$SubcategoryName' LIMIT 1");
	$CategoryMatch=mysql_num_rows($sql);//count the output
	if($CategoryMatch>0){
		echo "The Subcategory Name exists in the system, <a href='sub_category.php'>Click Here</a>";
		exit();
		}
		//Add this subcategory into the database
		$sql = mysql_query("INSERT INTO subcategories(Category_Name, Subcategory_Name, date_added) VALUES('$CategoryName', '$SubcategoryName', now())") or die (mysql_error());
		$pid = mysql_insert_id();
	}
?>
<?php 
include 'pagination.php'; 
?>
<html>
<head>
	<title>Admin Panel - Subcategories</title>
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
 <script language="javascript">
 function check()
{
 
  if(form.SubcategoryName.value=="")
    {
       alert("Enter Subcategory Name");
       return false;
   }
 
return true;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php include_once 'includes/admin_header.php'; ?>

<div class="wrapper">
	
	<?php include_once 'includes/left_menu.php'; ?>    
	<?php include_once 'includes/controls.php'; ?>
    <div class="add_category">
  	<div class="add_category_header">
   ADD SUBCATEGORY
    </div>
   <div class="add_employees_category">
      <table width="520" border="0" cellpadding="5" cellspacing="5" style=" font-size:18px;">
      <form method="post" action="sub_category.php" name="form" id="form" OnSubmit="return check()">
      <tr>
          <td>Category Name:</td>
          <td><select name="CategoryName" id="CategoryName" class="ed">
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
          <td>Subcategory Name:</td>
          <td>
          <input name="SubcategoryName" type="text" id="SubcategoryName" class="ed" size="40" placeholder="Enter Subcategory Name"></td>
        </tr>
        
        <tr>
          <td colspan="2"><input type="submit" name="submit" id="submit" value="Add"></td>
        </tr>
        </form>
      </table>
    
    </div>
    </div>
    
    <div class="view_category">
  	<div class="view_category_header">
   AVAILABLE SUBCATEGORIES
    </div>
    <div class="view_category_list">
	
	 <?php
if(isset($_GET['pageid'])){
 $page =$_GET['pageid'];
 echo subcategory($_GET['pageid']);
}
else { 
echo subcategory($_GET['pageid']=1); 
}

?>

    
  
    </div>
  </div>
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>