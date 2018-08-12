<?php 
//hostname
$db_host = "localhost";
//database username
$db_username = "root";
//database password
$db_password = "";
//database name
$db_name = "online_shop";

//connection string
mysql_connect($db_host, $db_username, $db_password) or die ("Could not connect to mysql");

//Select database
mysql_select_db($db_name) or die ("The database was not found");
?>