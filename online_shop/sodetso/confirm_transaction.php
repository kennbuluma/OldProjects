<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>

<?php

 if(isset($_GET['ID'])  && $_GET['ID']!=''  ){
	$sid=$_GET['ID'];
 }
?>
<?php 

$add = mysql_query("UPDATE transaction SET status='Confirmed' WHERE transaction_id ='$sid'") or die(mysql_error());

	header("location: pending_transactions.php");
	
?>



