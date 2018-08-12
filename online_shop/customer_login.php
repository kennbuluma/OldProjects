<?php 
//Database Connection
include_once 'scripts/db_connection.php';
?>
  
<?php
session_start();
if(isset($_SESSION["manager"]))
{
	header("location: customer_account.php");
	exit();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Customer Login</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link href="sodetso/style/css.css" rel="stylesheet" type="text/css">
<script language="javascript">
 function check()
{
 if(form.email.value=="")
    {
     alert("Enter Your Email");
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
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <h1 id="logo"><a href="index.php"></a></h1>
    <!-- Cart -->
    <div id="cart"> <a href="cart" class="cart-link">Your Shopping Cart</a>
      <div class="cl">&nbsp;</div>
      </div>
    <!-- End Cart -->
    <!-- Navigation -->
    <div id="navigation">
      <ul>
      <li><a href="home">Home</a></li>
        <li><a href="products">Products</a></li>
		<li><a href="register">Register</a></li>
        <li><a href="customer_login" class="active">Customer Login</a></li>
        <li><a href="contact">Contact</a></li>
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <!-- Main -->
  <div id="main">
    <div class="cl">&nbsp;</div>
    <!-- Content -->
    <br/>
<div class="user_login">
  <table width="400" border="0" cellspacing="8" cellpadding="8">
    <tr>
      <td colspan="2">Please Login Below</td>
    </tr>
    <tr>
      <form method="post" name="form" action="customer_login.php" OnSubmit="return check()">

  <?php 
//Parse the log in form if the user has filled it out and pressed "Log in"
if(isset($_POST["login"])&&isset($_POST["email"])){
	$manager = $_POST["email"];
	$password = $_POST["password"];
 
//Database Connection
include_once 'scripts/db_connection.php';
$sql=mysql_query("SELECT id FROM customers WHERE Email='$manager' AND password='$password' LIMIT 1");

//Make  sure the person exists
$existCount=mysql_num_rows($sql);
if($existCount==1){
	while($row=mysql_fetch_array($sql)){
		$id=$row["id"];

	}
	$_SESSION["id"]=$id;
	$_SESSION["manager"]=$manager;
	$_SESSION["password"]=$password;
	header("location: customer_account.php");
	exit();

}	else{
	echo '<td colspan="2" align="center"  style="font-size:12px; color: #FF0000;">The credentials you have entered are incorect...</td>';

	
}

}
?>   
   
      </tr>
    <tr>
      <td width="169">Email:</td>
      <td width="203"><input name="email" type="text" id="email" size="40" class="ed" placeholder="Email"/></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input name="password" type="password" id="password" size="40" class="ed" placeholder="Password"/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="login" id="login" value="Login" class="submit" /></td>
      </tr>
    <tr>
      <td colspan="2"><a href="#">Forgot Password/Username?</a></td>
    </tr>
  </table>
</div>

</div>

<br/>

      
      
   
  <!-- End Main -->
    <!-- Footer -->

   <?php include 'footer.php' ?>

  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
