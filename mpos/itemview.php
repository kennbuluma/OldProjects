<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	include 'connect.php';
	showItem();
}
 function showItem()
 {
	 global $db;
	 
	 $query = " Select * FROM Item;";
	 $result = mysqli_query($db, $query);
	 $numrows = mysqli_num_rows($result);
	 
	 $theArray = array();
	 
	 if($numrows > 0){
		 while($row = mysqli_fetch_assoc($result)){
			 $theArray[] = $row;
		 }
	 }
	 
	 header('Content-Type: application/json');
	 echo json_encode(array("items"=>$theArray));
	 mysqli_close($db);
 }
?>