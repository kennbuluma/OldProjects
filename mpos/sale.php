<?php
include('session.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
	//require 'connect.php';
	
	addItem();
}
function addItem(){
	global $db;
	
	$itmid = $_POST["itmid"];
	$itmname = $_POST["itmname"];
	$itmucost = $_POST["itmucost"];
	$itmuprice = $_POST["itmuprice"];
	$itmdescpt = $_POST["itmdescpt"];
	$itmcount = $_POST["itmcount"];
	$itmdate = date("Y/m/d");
	$usrid = $userid;
		
	$query = "INSERT INTO sale(itm_id,itm_name,itm_descript,itm_unit_cost,itm_unit_price,itm_count, itm_date_added, usr_id) VALUES ('$itmid','$itmname','$itmdescpt','$itmucost','$itmuprice','$itmcount','$itmdate','$usrid');";
	
	mysqli_query($db, $query) or die (mysqli_error($db));
	echo 'Done';
	
}
?>
