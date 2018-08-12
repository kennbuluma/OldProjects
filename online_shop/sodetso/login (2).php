<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
session_start();
if(isset($_SESSION["manager"]))
{
	header("location: index.php");
	exit();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - Login</title>
<link rel="stylesheet" type="text/css" href="style/css.css" />
<style type="text/css">
body{
	margin:auto;
	background-color:#CCC;
	}
a{
	color:#FFF;
	}
#login{
	width: 100px;
	height: 50px;
	font-size:16px;
	background-color:#03F;
	color:#FFF;	
	}
</style>
<script language="javascript">
 function check()
{
 if(form.username.value=="")
    {
     alert("Enter Your Username");
       return false;
    }
	 if(form.password.value=="")
    {
       alert("EnterYour  Password");
       return false;
   }
 return true;
}
</script>
</head>

<body>
<div class="login">
<table width="331" height="236" align="center" cellpadding="5" cellspacing="5" style="font-size:20px;" >
<form method="post" action="login.php" OnSubmit="return check()" name="form">
  <tr>
  <?php 
//Parse the log in form if the user has filled it out and pressed "Log in"
if(isset($_POST["username"])&&isset($_POST["password"])){
	$manager = $_POST["username"];
	$password = $_POST["password"];


//Database Connection
include_once '../scripts/db_connection.php';
$sql=mysql_query("SELECT id FROM admin WHERE username='$manager' AND password='$password' LIMIT 1");

//Make  sure the person exists
$existCount=mysql_num_rows($sql);
if($existCount==1){
	while($row=mysql_fetch_array($sql)){
		$id=$row["id"];

	}
	$_SESSION["id"]=$id;
	$_SESSION["manager"]=$manager;
	$_SESSION["password"]=$password;
	header("location: index.php");
	exit();

}	else{
	echo '<td colspan="2" align="center"  style="font-size:12px; color: #FFF;">The credentials you have entered are incorect...</td>';	
}

}
?>

  </tr>
  <tr>
    <td colspan="2" align="center"><img src="images/logo2.png" width="120" height="100" alt="sodetso" longdesc="http://www.sodetso.com" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><strong>Please login here</strong></td>
  </tr>
  <tr>
    <td width="94">Username:</td>
    <td width="200"><label for="username"></label>
    <input name="username" type="text" class="ed" id="username" size="40"/></td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><label for="password"></label>
    <input name="password" type="password" class="ed" id="password" size="40"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="login" id="login" value="Login" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="#">Forgot username/password?</a></td>
    </tr>
  </form>
</table>
</div>
</body>
</html>