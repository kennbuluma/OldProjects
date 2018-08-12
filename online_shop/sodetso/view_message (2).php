<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>
<?php 
//Gather the Message full information
if(isset($_GET['ID'])){
$targetID = $_GET['ID'];
$add = mysql_query("UPDATE messages SET status='Read' WHERE id ='$targetID'") or die(mysql_error());

$sql = mysql_query("SELECT * FROM messages WHERE id='$targetID' LIMIT 1");
$prodcutCount = mysql_num_rows($sql);//count the output
if($prodcutCount>0){
	while($row = mysql_fetch_array($sql)){
		$id=$row["id"];
		$Name=$row["Name"]; 
		$Email = $row["Email"];
		$Message= $row["Message"];
		 
		}
	}
	}
?>

<html>
<head>
	<title>Admin Panel - Order Details</title>
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
  ORDER DETAILS
</div>
     <div class="view_category_list">
     <table width="319" border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td width="117" style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Name:</td>
        <td width="188" ><?php echo $Name; ?></td>
        </tr>
      <tr>
        <td style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Email:</td>
        <td><?php echo $Email; ?></td>
        </tr>
      <tr>
        <td style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Message:</td>
        <td><?php echo $Message; ?></td>
        </tr>
    </table>
    
     </div>
  </div>
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>