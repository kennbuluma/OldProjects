<?php

	require 'connect.php';
	fetchProfile();
}
function fetchProfile(){
	global $db;
	$usermail = $_POST["up_user"];
	//$query = "SELECT * FROM user WHERE usermail = '$usermail';';
	$query = "SELECT * FROM user;';
	$result = mysqli_query($db,$query) or die ("Failed to execute");
	$rcount = mysqli_num_rows($result);

	$temp_array = array();
	if($rcount > 0){
	while($row = mysqli_fetch_assoc($result)){
	$temp_array[] = $row;
	}	
	}
	header('Content-Type: application/json');
	
	mysqli_close($connect);

}
?>
<html>
<body>
<?php
	echo json_encode(array("user"=>$temp_array));
?>
</body></html>
