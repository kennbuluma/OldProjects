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
 //grabs the inventory category for viewing
if(isset($_GET['cid'])){
	$targetCategories = $_GET['cid'];	
	$dynamicList="";
	$sql = mysql_query("SELECT * FROM products WHERE category ='$targetCategories' AND qt>0 ORDER BY date_added ASC LIMIT 6");
	$productCount = mysql_num_rows($sql);//count the output
	if($productCount>0){
		while($row = mysql_fetch_array($sql)){
			$id=$row["id"];
			$product_name=$row["product_name"];
			$price=$row["price"];
			$date_added=strftime("%b %d, %Y", strtotime($row["date_added"]));
			$dynamicList .='<div class="product_box">
 
    <a href="product.php?id='.$id.'"><img style="border: #666 1px solid;" src="inventory_images/'.$id.'.jpg" width="180" height="140" alt="'.$product_name.'"></a>
    <div class="productName">
    '.$product_name.'</div>
     <div class="buynow"> KES '.$price.'</div>
      
      <a href="product.php?id='.$id.'">View Product</a>
 
</div>'; 
		}
	}
	else{
		$dynamicList="<h4 style='color: red;'>We have no products listed in that category yet</h4>";
		}}
		mysql_close();
?>
        
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $targetCategories; ?></title>
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
    <h1 id="logo"><a href="index.php"></a></h1>
    <!-- Cart -->
    <div id="cart"> <a href="cart" class="cart-link">Your Shopping Cart</a>
      <div class="cl">&nbsp;</div>
    </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
       <li><a href="home" class="active">Home</a></li>
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
        <p><?php echo $dynamicList; ?><p>
             
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Products -->
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
        <div id="sidebar">
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
