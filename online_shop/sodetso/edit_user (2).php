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
$sql = mysql_query("SELECT * FROM admin WHERE id='$targetID' LIMIT 1");
$UserCount = mysql_num_rows($sql);//count the output
if($UserCount>0){
	while($row = mysql_fetch_array($sql)){
		$id=$row["id"];
		$Firstname=$row["Firstname"]; 
		$Surname = $row["Surname"];
		$Email = $row["Email"];
		$username = $row["username"];
		$date_added=strftime("%b %d, %Y", strtotime($row["date_added"]));
		 
		}
	}
	else{
		echo "Sory that user does not exist";
		exit();
		}
	}
?>
<?php
//Parse the form data and update user to the system
if(isset($_POST['username'])){
	$pid = mysql_real_escape_string($_POST['thisID']);
	$Firstname=mysql_real_escape_string($_POST['Firstname']);
	$Surname=mysql_real_escape_string($_POST['Surname']);
	$Email=mysql_real_escape_string($_POST['Email']);
	$username=mysql_real_escape_string($_POST['username']);
	$Npassword=mysql_real_escape_string($_POST['Npassword']);
	//Updare the user in the system
	$sql = mysql_query("UPDATE admin SET Firstname='$Firstname', Surname='$Surname', Email='$Email', username='$username', password='$Npassword' WHERE id='$pid'");
	
		header("location: users.php");
		exit();
}
?>
<html>
<head>
	<title>Admin Panel - Users</title>
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
   ADD USER
    </div>
    <div class="add_employees_category">
      <table width="520" border="0" cellpadding="5" cellspacing="5" style=" font-size:18px;">
      <form method="post" action="edit_user.php" name="form" id="form">
        <tr>
          <td>Firstname:</td>
          <td>
          <input name="Firstname" type="text" id="Firstname" class="ed" size="40" value="<?php echo $Firstname; ?>"></td>
        </tr>
        <tr>
          <td>Surname:</td>
          <td>
          <input name="Surname" type="text" id="Surname" class="ed" size="40" value="<?php echo $Surname; ?>"></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td>
          <input name="Email" type="email" id="Email" class="ed" size="40" value="<?php echo $Email; ?>"></td>
        </tr>
        <tr>
          <td>Username:</td>
          <td>
          <input name="username" type="text" id="username" class="ed" size="40" value="<?php echo $username; ?>"></td>
        </tr>
        <tr>
          <td>Old Password:</td>
          <td>
          <input name="password" type="password" id="password" class="ed" size="40" placeholder="Enter old Password"></td>
        </tr>
        <tr>
          <td>New Password:</td>
          <td>
          <input name="Npassword" type="password" id="Npassword" class="ed" size="40" placeholder="Enter New Password"></td>
        </tr>
        
        <tr>
        
          <td colspan="2">
           <input name ="thisID" type="hidden" value="<?php echo $targetID; ?>">
          <input type="submit" name="submit" id="submit" value="Edit"></td>
        </tr>
        </form>
      </table>
    
    </div>
    </div>
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>