<?php  
  include ('connect.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['inputEmail']);
      $mypassword = mysqli_real_escape_string($db,$_POST['inputPassword']); 
      
      $sql = "SELECT * FROM user WHERE usr_email = '$myusername' and usr_pass = '$mypassword'";
      $result = mysqli_query($db,$sql) or die(mysqli_error());
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      

      // If result matched $myusername and $mypassword, table row must be 1 row
		
     if($count == 1) {
      	 echo 'success';
         // header("location: dash.php");
      }else {
         echo 'Incorrect credentials!';
      }
   }
?>
