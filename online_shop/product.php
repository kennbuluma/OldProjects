<?php 
//Database connection
include 'scripts/db_connection.php'; 
?>
<?php
//Display Categories menu		  
$sqlCommand = mysql_query("SELECT Category_ID, Category_Name FROM categories ORDER BY Category_ID");
		 
$categoriesDisplay="";
  while($row=mysql_fetch_array($sqlCommand)){
	  $pid = $row["Category_ID"];
	  $linklabel=$row["Category_Name"];
			  
	  $categoriesDisplay .='<li><a href="categories.php?cid='.$linklabel.'"> '.$linklabel.'</a></li>';
			  						
	  }
 mysql_free_result($sqlCommand);
?>
<?php
//Display Subcategories menu
$sqlCommand = mysql_query("SELECT Subcategory_ID, Subcategory_Name FROM subcategories ORDER BY Subcategory_ID");
 
$SubcategoriesDisplay="";
	  while($row=mysql_fetch_array($sqlCommand)){
		  $pid = $row["Subcategory_ID"];
		  $linklabel=$row["Subcategory_Name"];
			  
		  $SubcategoriesDisplay .='<li><a href="subcategories.php?sid='.$linklabel.'"> '.$linklabel.'</a></li>';
			  						
		  }
  mysql_free_result($sqlCommand);
?>
<?php 
//Check to see if the URL variable is set and that it exists in the db
if(isset($_GET['id'])){
	$id=preg_replace('#[^0-9]#i','',$_GET['id']);
	//Use this var to check to see if this ID exists, if yes then get the product
	//details, if no then exit this script and give message why
	$sql = mysql_query("SELECT * FROM products WHERE id='$id' LIMIT 1");
	$prodcutCount = mysql_num_rows($sql);//count the output amount
	if($prodcutCount>0){	
	//get all the product details
	while($row = mysql_fetch_array($sql)){
		$product_name=$row["product_name"];
		$price=$row["price"];
		$details=$row["details"];
		$category=$row["category"];
		$subcategory=$row["subcategory"];
		$date_added=strftime("%b %d, %Y", strtotime($row["date_added"]));
		
		}
	}else{
		echo "The item does not exist";
		exit();
		}
	}else{
		echo "Data to render this page is missing";
		exit();
		}

		mysql_close();
?>

         
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $product_name; ?></title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
<script src="js/jquery-func.js" type="text/javascript"></script>
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <h1 id="logo"><a href="index.php">Eshop</a></h1>
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
    <div id="content">
      <!-- Content Slider -->
      <?php include 'slider.php' ?>
      <!-- End Content Slider -->
      <!-- Products -->
      <div class="products">
        <div class="cl">&nbsp;</div>
        <table width="394">
  <tr>
    <td width="155">
    <img style="border: #666 1px solid;" src="inventory_images/<?php echo $id; ?>.jpg" width="149" height="112" alt="<?php echo $product_name; ?>"><a href="inventory_images/<?php echo $id; ?>.jpg">View Full Size Image</a></td>
    <td width="227" valign="top"><h3><?php echo $product_name; ?></h3>
    KES <?php echo $price; ?><br/>
	<?php echo $category; ?><br/>
      <?php echo $subcategory; ?><br/>
      <?php echo $details; ?><br/>
      <p>
      <form id="form1" name="form1" method="post" action="cart.php">
      <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>"/>
      <input type="submit" name="button" id="button" value="Add to Shopping Cart"/>
      </form>
      </p><br/>
      </td>
  </tr>
</table>
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Products -->
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
      <!-- Search -->
       <?php include 'sidebar.php' ?>
    </div>
    <!-- End Sidebar -->
    <div class="cl">&nbsp;</div>
  </div>
  <!-- End Main -->
    <!-- Footer -->
 <?php include 'footer.php' ?>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
