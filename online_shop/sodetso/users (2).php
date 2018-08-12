<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>

<?php
//Deleting user
if(isset($_GET['deleteid'])){
	$id_to_delete = $_GET['deleteid'];
	$sql = mysql_query("DELETE FROM admin WHERE id = '$id_to_delete' LIMIT 1") or die (mysql_error());
	
	}
?>
<?php
//Parse the form data and add user to the system
if(isset($_POST['submit'])){
	$Firstname=mysql_real_escape_string($_POST['Firstname']);
	$Surname=mysql_real_escape_string($_POST['Surname']);
	$Email=mysql_real_escape_string($_POST['Email']);
	$username=mysql_real_escape_string($_POST['username']);
	$password=mysql_real_escape_string($_POST['password']);
	
	//see if that user name is an identical match to another user in the system
	$sql = mysql_query("SELECT * FROM admin WHERE username='$username' AND Email='$Email' LIMIT 1");
	$UserMatch=mysql_num_rows($sql);//count the output
	if($UserMatch>0){
		echo "The user exists in the system, <a href='users.php'>Click Here</a>";
		exit();
		}
		//Add this user into the database
		$sql = mysql_query("INSERT INTO admin(Firstname, Surname, Email, username, password, date_added) VALUES('$Firstname', '$Surname', '$Email', '$username', '$password', now())") or die (mysql_error());
		$pid = mysql_insert_id();
	}
?>

<?php 
include 'pagination.php';
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
  <script language="javascript">
 function check()
{
 if(form.Firstname.value=="")
    {
     alert("Enter Firstname");
       return false;
    }
  if(form.Surname.value=="")
    {
       alert("Enter Surname");
       return false;
   }
  if(form.Email.value=="")
    {
       alert("Enter Email");
       return false;
   }
	if(form.username.value=="")
    {
       alert("Enter Username");
       return false;
   }
   if(form.password.value=="")
    {
       alert("Enter Password");
       return false;
   }
 return true;
}
</script>

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
      <form method="post" action="users.php" name="form" id="form" OnSubmit="return check()">
        <tr>
          <td>Firstname:</td>
          <td>
          <input name="Firstname" type="text" id="Firstname" class="ed" size="40" placeholder="Enter Firstname"></td>
        </tr>
        <tr>
          <td>Surname:</td>
          <td>
          <input name="Surname" type="text" id="Surname" class="ed" size="40" placeholder="Enter Surname"></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td>
          <input name="Email" type="email" id="Email" class="ed" size="40" placeholder="Enter Email"></td>
        </tr>
        <tr>
          <td>Username:</td>
          <td>
          <input name="username" type="text" id="username" class="ed" size="40" placeholder="Enter Username"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td>
          <input name="password" type="password" id="password" class="ed" size="40" placeholder="Enter Password"></td>
        </tr>
        
        <tr>
          <td colspan="2"><input type="submit" name="submit" id="submit" value="Add"></td>
        </tr>
        </form>
      </table>
    
    </div>
    </div>
    
    <div class="view_category">
  	<div class="view_category_header">
   USERS
    </div>
    <div class="view_category_list">
	 <?php
if(isset($_GET['pageid'])){
 $page =$_GET['pageid'];
 echo usersAdmin($_GET['pageid']);
}
else { 
echo usersAdmin($_GET['pageid']=1); 
}

?>

    </div>
  </div>
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>