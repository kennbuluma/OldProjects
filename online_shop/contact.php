<?php 
//Database Connection
include_once 'scripts/db_connection.php';
?>

<?php
//Parse the form message 
if(isset($_POST['submit'])){
	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$Message=$_POST['message'];
	
		$sql = mysql_query("INSERT INTO messages(Name, Email, Message, date_added, status) VALUES('$Name', '$Email', '$Message', now(), 'Unread')") or die (mysql_error());
		$pid = mysql_insert_id();
	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Contact us </title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link href="sodetso/style/css.css" rel="stylesheet" type="text/css">
<script language="javascript">
 function check()
{
	if(form.name.value=="")
    {
     alert("Enter Your Name");
       return false;
    }
 if(form.email.value=="")
    {
     alert("Enter Your Email");
       return false;
    }
	 if(form.message.value=="")
    {
       alert("Enter Your Message");
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
        <li><a href="customer_login">Customer Login</a></li>
        <li><a href="contact" class="active">Contact</a></li>
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <!-- Main -->
  <div class="main">

    <div class="contact">
  <table width="420" border="0" cellspacing="8" cellpadding="8">
    <tr>
      <td colspan="2">For any enquiries please contact us below</td>
    </tr>
 
      <form action="contact.php" method="post" OnSubmit="return check()" name="form">

      <tr>
        <td>Name:</td>
        <td><input name="name" type="text" id="name" size="40" class="ed" placeholder="Enter your name"/></td>
      </tr>
      <tr>
      <td width="47">Email:</td>
      <td width="545"><input name="email" type="text" id="email" size="40" class="ed" placeholder="Enter your email"/></td>
    </tr>
    <tr>
      <td>Message:</td>
      <td><textarea name="message" id="message" cols="45" class="ed" rows="5" placeholder="Enter your message here"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" id="submit" value="Submit" class="submit" /></td>
      </tr>
    </form>
  </table>
</div>
<div class="contact_details">
  <table width="400" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td>I-Shop Computer And Accessories Distributors</td>
    </tr>
    <tr>
      <td>Cell: +25470222222</td>
    </tr>
    <tr>
      <td>Landline: 020-54657654 </td>
    </tr>
    <tr>
      <td>Address: P.O BOX 1111 - 80100</td>
    </tr>
    <tr>
      <td>Mombasa, Kenya. </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
    <!-- Content -->
    
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
