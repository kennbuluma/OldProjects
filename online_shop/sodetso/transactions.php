<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>
<?php 
//Delete transaction
if(isset($_GET['deleteid'])){
	
	$id_to_delete = $_GET['deleteid'];
	$sql = mysql_query("DELETE FROM transaction WHERE id='$id_to_delete' LIMIT 1") or die(mysql_error);
	
	$cart = mysql_query("DELETE FROM cart WHERE id='$id_to_delete'") or die(mysql_error);
	
		header("location: transactions.php");
		exit();
	}
?>
<?php include 'pagination.php' ?>
<html>
<head>
	<title>Admin Panel - Transactions</title>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php include_once 'includes/admin_header.php'; ?>

<div class="wrapper">
	
	<?php include_once 'includes/left_menu.php'; ?>    
	<?php include_once 'includes/controls.php'; ?>
   
    <div class="view_category">
  	<div class="view_category_header">
  TRANSACTIONS
    </div>
    <div class="view_category_list">
    <?php
if(isset($_GET['pageid'])){
 $page =$_GET['pageid'];
 echo transactionsDet($_GET['pageid']);
}
else { 
echo transactionsDet($_GET['pageid']=1); 
}

?>

    </div>
  </div>
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>