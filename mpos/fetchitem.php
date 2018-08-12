<?php  
 if($_SERVER['REQUEST_METHOD']=='GET'){
 require_once('connect.php');

 $id  = $_GET['id'];
 
 $sql = "SELECT * FROM item WHERE itm_id='".$id."'";
 
 $r = mysqli_query($db,$sql);
 
 $result = array();
 $res = mysqli_fetch_array($r); 
 array_push($result,array(
 "item_id"=>$res['itm_id'],
 "item_name"=>$res['itm_name'],
 "unit_cost"=>$res['itm_unit_cost'],
 "unit_price"=>$res['itm_unit_price'],
 "item_descript"=>$res['itm_descript'],
 "item_count"=>$res['itm_count'],
 "date_added"=>$res['itm_date_added']
 )
 );


 
 echo json_encode(array("result"=>$result));
 
 mysqli_close($db);
}
 
?>
