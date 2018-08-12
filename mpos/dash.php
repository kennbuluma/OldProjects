<?php
   include("session.php");
?>
<html>
<head style="text/css" script="bootstrap4/dist/css/bootstrap4/bootstrap.css">
<title>Home</title>
<!-- Bootstrap core for all pages -->
  <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href= "bootstrap4/dist/css/bootstrap.css" rel="stylesheet" type="text/css">
  <script src="bootstrap4/js/tests/vendor/jquery.min.js"></script>
  <script src="bootstrap4/dist/js/bootstrap.min.js"></script>
  <link href="bootstrap4/docs/examples/offcanvas/offcanvas.css" rel="stylesheet">
  <link rel="icon" href="images/icon.png">

    <!-- individual page resources -->
    
   
    <link href="bootstrap4/docs/examples/signin/signin.css" rel="stylesheet">
   <link rel="stylesheet" href="w3css/w3.css">

</head>
<body>
 <div class="w3-container">
 <div class="w3-border w3-round-xlarge" style="background-color: #009999">
 <h3><strong><center>Home</center></strong></h2>
 </div>
  <ul class="w3-navbar">
  <li class="w3-dropdown-click">
    <a onClick="table()"href="#">Tables</a>
    <div id="table" class="w3-dropdown-content w3-white w3-card-4">
      <a href="#">Item</a>
      <a href="#">Sale</a>
    </div>
  </li>
  <li class="w3-dropdown-click">
    <a onClick="report()" href="#">Reports</a>
    <div id="report" class="w3-dropdown-content w3-white w3-card-4">
      <a href="#">Items</a>
      <a href="#">Sales</a>
      
    </div>
  </li>
  <li class="w3-right"><a href="logout.php">Sign Out</a></li>
  <li class="w3-right"><a onClick="profile()" href="">Welcome <?php echo $user;?></a></li>
</ul>
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
  function table() {
    document.getElementById("table").classList.toggle("w3-show");
}
function report() {
    document.getElementById("report").classList.toggle("w3-show");
  }
function profile() {
  //open profile modal
}
</script>

<p>
<div class="container" id="bodyframe" style="background-color:  #a3c2c2">
  
     <div class="container">
<?php
$itm_query = "SELECT * FROM item;";
$sl_query = "SELECT * FROM sale;";
$usr_query = "SELECT * FROM user;";
?>
         
  </div>


</div>
</p>
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<!--$conn->close();-->