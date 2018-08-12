<?php
   include('login.php');

?>
<!DOCTYPE html>
<html>
<title>Mobile Point of Sale System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3css/w3.css">
 <link rel="icon" href="images/icon.png">
   <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href= "bootstrap4/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
  <script src="bootstrap4/js/tests/vendor/jquery.min.js"></script>
  <script src="bootstrap4/dist/js/bootstrap.min.js"></script>

  <link href="bootstrap4/docs/examples/signin/signin.css" rel="stylesheet">
<body>
<div class="w3-container w3-light-grey">
<div class="w3-light-grey w3-container w3-padding-16 w3-center">
<div class="w3-border w3-round-xlarge" style="background-color: #009999">
	<p><img src="images/icon.png"></p>
  <p><h1><strong>Mobile Point of Sale System</strong></h1></p>
</div>
</div>
<div class="w3-row-padding">
    <div class="w3-third">
      <div class="w3-card-2 w3-light-grey w3-padding">
        <div class="w3-accordion" style="background-color:  #a3c2c2">
		<button onclick="myFunction('About')" class="w3-btn-block w3-center" style="background-color:#003333">About</button>
		<div id="About" class="w3-accordion-content w3-container">
			<p>Mobile point of sale system is a smartphone based system that offers a user the basic functionalities of a typical electronic point of sale system, at a lower cost.</p>
		</div>
  
	   </div>
      </div>
    </div>

    <div class="w3-third">
      <div class="w3-card-2 w3-padding w3-light-grey">
         <div class="w3-accordion" style="background-color:  #a3c2c2">
		<button onclick="myFunction('Contacts')" class="w3-btn-block w3-center" style="background-color:#003333">Contacts</button>
		<div id="Contacts" class="w3-accordion-content w3-container">
		<p>Email: customer@mpos.com</p>
      <p>Phone: +254 555 123 456</p>
      <p>Foo plaza, Lorem road, Ipsum town.</p>
      <p>P.O.Box 1234-56789, Ipsum, Kenya</p>
		</div>
  
	   </div>
      </div>
    </div>

    <div class="w3-third">
      <div class="w3-card-2 w3-light-grey w3-padding">
       <div class="w3-accordion" style="background-color:  #a3c2c2">
		<button onclick="myFunction('Help')" class="w3-btn-block w3-center" style="background-color:#003333">Help</button>
		<div id="Help" class="w3-accordion-content w3-container">
			<p>Some text..</p>
		</div>
  
	   </div>
    </div>
  </div>
  <br></div>

<script>
function myFunction(id) {
    document.getElementById(id).classList.toggle("w3-show");
}
</script>
    <div class="container" >
<div class="w3-card-2" style="background-color:  #a3c2c2">
      <form class="form-signin" action="" method="post">
        <center><h2 class="form-signin-heading">Sign In</h2></center>
        <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
        <label for="inputEmail" class="sr-only">Email address</label>
        <p><input type="email" id="inputEmail" class="w3-input" name="inputEmail" placeholder="Email address" required autofocus></p>
        <label for="inputPassword" class="sr-only">Password</label>
        <p><input type="password" id="inputPassword" class="w3-input" name="inputPassword" placeholder="Password" required></P>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <p><button class="w3-btn w3-btn-block w3-text-black" type="submit" style="background-color: #009999"><strong>Sign in</strong></button></p>
		    <p><button class="w3-btn w3-btn-block w3-text-black" onclick="document.getElementById('id01').style.display='block'" type="submit" style="background-color: #009999"><strong>Register</strong></button></p>
      </form>
    </div>
    </div>
<div id="id01" class="w3-modal">
 
  <div class="w3-modal-content w3-card-8 w3-animate-zoom" style="max-width:400px">
  
    <div class="w3-center" style="background-color:  #a3c2c2"><br>
      <strong><h2>Register</h2></strong>
       <span onclick="document.getElementById('id01').style.display='none'" 
  class="w3-closebtn w3-hover-red w3-container w3-padding-16 w3-display-topright w3-xxlarge">×</span>
    </div>

    <form class="w3-container" style="background-color:  #a3c2c2" action="reg_user.php" method="post">
      <div class="w3-section">
        
        <p><input class="w3-input w3-border" name="fname" type="text" placeholder="Enter First name" required></p>
        <p><input class="w3-input w3-border" name="lname" type="text" placeholder="Enter Last name" required></p>
        
        <p><input class="w3-input w3-border" name="bsname" type="text" placeholder="Enter Business name" required></p>
        
        <p><input class="w3-input w3-border" name="phone" type="text" placeholder="Enter Phone number" required></p>
        
        <p><input class="w3-input w3-border" name="email" type="email" placeholder="Enter Email" required></p>
        
        <p><input class="w3-input w3-border" name="pswd" type="password" placeholder="Enter Password" required></p>
        <p><input class="w3-input w3-border" name="conf_pswd" type="password" placeholder="Confirm Password" required></p>
        
        <button class="w3-btn w3-btn-block w3-section w3-text-black" style="background-color: #009999"><strong>Register</strong></button>
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-btn w3-btn-block w3-text-black" style="background-color: #009999"><strong>Cancel</strong></button>
      </div>
    </form>

  </div>
</div>

<footer class="w3-container w3-text-white w3-border" style="background-color:#003333"> 
<p>Mobile Point of Sale System @2016</p>
</footer>
</div>

</body>


</html> 