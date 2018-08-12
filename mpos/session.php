<?php
   include("connect.php");
   session_start();
   
   $user_check = $_SESSION["user"];
   
  $ses_sql = mysqli_query($db,"SELECT usr_fname, usr_email from user where usr_email = '$user_check' ;") or die(mysqli_error());
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
  $user = $row['usr_fname'];
  $userid = $row['usr_email'];
  
   
   if(!isset($_SESSION["user"])){
	   echo 'no session';
	   
      //header("location:index.php");
   }
?>