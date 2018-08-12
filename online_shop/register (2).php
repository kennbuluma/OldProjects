<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Register </title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link href="sodetso/style/css.css" rel="stylesheet" type="text/css">
<script language="javascript">
 function check()
{
 if(form.Firstname.value=="")
    {
     alert("Enter Firstname");
       return false;
    }
	 if(form.Country.value=="")
    {
       alert("Enter Country");
       return false;
   }
   if(form.City.value=="")
    {
       alert("Enter City");
       return false;
   }
  if(form.Surname.value=="")
    {
       alert("Enter Surname");
       return false;
   }
    if(form.Address.value=="")
    {
       alert("Enter Address");
       return false;
   }
    if(form.Address_Street.value=="")
    {
       alert("Enter Address Street");
       return false;
   }
    if(form.Telephone.value=="")
    {
       alert("Enter Telephone");
       return false;
   }
  if(form.Email.value=="")
    {
       alert("Enter REmail");
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
       <li><a href="home" >Home</a></li>
        <li><a href="products" >Products</a></li>
		<li><a href="register" class="active">Register</a></li>
        <li><a href="customer_login">Customer Login</a></li>
        <li><a href="contact">Contact</a></li>
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <!-- Main -->
  <div id="main">
    <div class="cl">&nbsp;</div>
	<br/>
    <!-- Content -->
	<div class="user_register">
<table width="100%" border="0" cellpadding="8" cellspacing="8" >
      <form method="post" action="register.php" name="form" id="form" OnSubmit="return check()">
      
        <tr>
          <td colspan="4">Dont have an account? Please register below</td>
        </tr>
        <tr><?php
		
if(isset($_POST['Firstname'])){
	$REmail =$_POST['REmail'];
	$Firstname = $_POST['Firstname'];
	$Lastname =$_POST['Lastname'];
	$Telephone = $_POST['Telephone'];
	$Country =$_POST['Country'];
	$password2 = $_POST['password2'];
	$City = $_POST['City'];
	$Address_Street = $_POST['Address_Street'];
	$Address =$_POST['Address'];
	
	//Database Connection
	include 'scripts/db_connection.php'; 
	//see if that Customer name is an identical match to another in the system
	$sql = mysql_query("SELECT * FROM customers WHERE Email='$REmail' LIMIT 1 ");
	$ItemMatch=mysql_num_rows($sql);//count the output
	if($ItemMatch>0){
		echo '<td colspan="4" style="color:#FF0000;">The Customer exists in the system, <a href="user_login.php">Click Here</a></td>';
		exit();
		}
	
	$sql = mysql_query("INSERT INTO customers(Firstname, Lastname, Email, password, Telephone, Country, City, Address_Street, Address, date_added) VALUES('$Firstname', '$Lastname', '$REmail', '$password2', '$Telephone', '$Country', '$City', '$Address_Street', '$Address', now())") or die (mysql_error());
		
		echo '<td colspan="4" style="color:#0033FF;">Your account has been created successfully... Please login to proceed to checkout </td>';
	$pid = mysql_insert_id();
	}
?>
          </tr>
        <tr>
          <td width="19%"  >Firstname:</td>
          <td width="33%">
            <input name="Firstname" type="text" id="Firstname" class="ed" size="40" placeholder="Enter Firstname"></td>
          <td>Country:</td>
          <td><input name="Country" type="text" id="Country" class="ed" size="40" placeholder="Enter Country"></td>
        </tr>
        <tr>
          <td>Lastname:</td>
          <td>
          <input name="Lastname" type="text" id="Lastname" class="ed" size="40" placeholder="Enter Lastname"></td>
          <td width="13%">City:</td>
          <td width="35%"><input name="City" type="text" id="City" class="ed" size="40" placeholder="Enter City"></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td>
          <input name="REmail" type="text" id="REmail" class="ed" size="40" placeholder="Enter Email"></td>
           <td width="13%">Address Street:</td>
          <td width="35%"><input name="Address_Street" type="text" id="Address_Street" class="ed" size="40" placeholder="Enter Address Street"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><label for="password"></label>
            <input name="password2" type="password" class="ed" id="password" size="40" placeholder="Enter Password"/></td>
          <td>Address:</td>
          <td><input name="Address" type="text" id="Address" class="ed" size="40" placeholder="Enter Address" /></td>
        </tr>
        <tr>
          <td>Confirm Password: </td>
          <td><label for="cpassword2"></label>
            <input name="cpassword2" type="password" class="ed" id="cpassword2" size="40" placeholder="Confirm Password"/></td>
          <td>Telephone:</td>
          <td><label for="telephone"></label>
            <input name="Telephone" type="text" class="ed" id="Telephone" size="40" placeholder="Enter Telephone no."/></td>
        </tr>
        <tr>
          <td colspan="4"><input type="submit" name="register" id="register" value="Register" /></td>
          </tr>
       </form>
      </table>
</div>
    
<br/>

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
