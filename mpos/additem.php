<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connect.php';
	addItem();
}
function addItem(){
	global $db;
	$itmid = $_POST["itmid"];
	$itmname = $_POST["itmname"];
	$itmucost = $_POST["itmucost"];
	$itmuprice = $_POST["itmuprice"];
	$itmdesc = $_POST["itmdescpt"];
	$itmcount = $_POST["itmcount"];
	$date = date("Y/m/d");
	$userid = $_POST["usrid"];
	
	$query = "INSERT INTO item(itm_id,itm_name,itm_unit_cost,itm_unit_price,itm_descript,itm_count,itm_date_added,usr_id) VALUES ('$itmid','$itmname','$itmucost','$itmuprice','$itmdesc','$itmcount','$date','$userid');";
	
	mysqli_query($db, $query) or die (mysqli_error($db));
echo 'success';	
}
?>
