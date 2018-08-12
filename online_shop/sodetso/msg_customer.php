<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>
<?php 
if(isset($_GET['ID'])){
$targetID = $_GET['ID'];
$sql = mysql_query("SELECT * FROM customers WHERE id='$targetID' LIMIT 1");
$UserCount = mysql_num_rows($sql);//count the output
if($UserCount>0){
	while($row = mysql_fetch_array($sql)){
		$id=$row["id"];
		$Firstname=$row["Firstname"]; 
		$Lastname = $row["Lastname"];
		$REmail = $row["Email"];
		}
	}
	else{
		echo "Sory that customer does not exist";
		exit();
		}
	}
?>
<?php
//Parse the form data 
if(isset($_POST['send'])){
	$Senderr=$_POST['From'];
	$Recieverr=$_POST['To'];
	$Messagee=$_POST['Message'];
	
	//Send the Message
$sql = mysql_query("INSERT INTO inbox(Sender, Receiver, Message, Status, date_added) VALUES('$Senderr', '$Recieverr', '$Messagee', 'Unread', now())") or die (mysql_error());
	
		header("location: customers.php");
		exit();
}
?>
<html>
<head>
	<title>Admin Panel - Messaging</title>
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
    <div class="add_category">
  	<div class="add_category_header">
  MESSAGING
    </div>
    <div class="add_employees_category">
      <table width="520" border="0" cellpadding="5" cellspacing="5" style=" font-size:18px;">
      <form method="post" action="msg_customer.php" name="form" id="form">
        <tr>
          <td>From:</td>
          <td>
          <input name="From" type="email" id="From" class="ed" size="40" value="support@ishop.com"></td>
        </tr>
        <tr>
          <td>To:</td>
          <td>
          <input name="To" type="email" id="To" class="ed" size="40" value="<?php echo $REmail; ?>"></td>
        </tr>
        <tr>
          <td>Message:</td>
          <td><textarea name="Message" id="Message" cols="45" class="ed" rows="5"></textarea></td>
        </tr>
        
        <tr>
          
          <td colspan="2">
            <input type="submit" name="send" id="send" value="Send"></td>
        </tr>
        </form>
      </table>
    
    </div>
    </div>
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>