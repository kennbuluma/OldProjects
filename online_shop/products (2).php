<?php 
//Database connection
include 'scripts/db_connection.php'; 
?>
<?php 
include 'pagination.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Products </title>
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
       <li><a href="home" >Home</a></li>
        <li><a href="products" class="active">Products</a></li>
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
    <div class="products">
        <div class="cl">&nbsp;</div>
        <br/>
        <p>
		 <?php
		 include 'scripts/db_connection.php'; 
if(isset($_GET['pageid'])){
 $page =$_GET['pageid'];
 echo inventory($_GET['pageid']);
 
}
else { 
echo inventory($_GET['pageid']=1); 
}

?>

             
        <div class="cl">&nbsp;</div>
      </div>
    
<br/>


<br/>

      
      
   
  <!-- End Main -->
    <!-- Footer -->

   <?php include 'footer.php' ?>

  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
