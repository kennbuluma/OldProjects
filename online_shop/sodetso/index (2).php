<?php 
//Database Connection
include '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>



<html>
<head>
	<title>Admin Panel - Dashboard</title>
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
    </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php include_once 'includes/admin_header.php'; ?>

<div class="wrapper">
	
  <?php include_once 'includes/left_menu.php'; ?>    
	<?php include_once 'includes/controls.php'; ?>
    <div class="view_category">
    	<div class="view_category_header">
    	STATISTICS
    	</div>
        <div class="view_category_list" >
          <table width="297" border="0" cellpadding="5" cellspacing="5" style="font-size:18px;">
            <tr>
              <td width="191">&nbsp;</td>
              <td width="71">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#00FFFF">Available Stock:</td>
              <?php 
	
		
		
		$get2 = mysql_query ("SELECT * FROM products ") or die(mysql_error());
		$num = mysql_num_rows($get2);
	

?>
              <td align="center" bgcolor="#00FFFF"><?php echo $num; ?></td>
            </tr>
            <tr>
              <td bgcolor="#00FFFF">Total Customers:</td>
              <?php 
		$get2 = mysql_query ("SELECT * FROM customers ") or die(mysql_error());
		$num = mysql_num_rows($get2);
		?>
              <td align="center" bgcolor="#00FFFF"><?php echo $num; ?></td>
            </tr>
            <tr>
              <td bgcolor="#00FFFF">Total Orders:</td>
              <?php 
		$get2 = mysql_query ("SELECT * FROM transaction WHERE Type='Order'") or die(mysql_error());
		$num = mysql_num_rows($get2);
		?>
              <td align="center" bgcolor="#00FFFF"><?php echo $num; ?></td>
            </tr>
                          
            <tr>
              <td bgcolor="#00FFFF">Total Users: </td>
              <?php 
	
		
		
		$get2 = mysql_query ("SELECT * FROM admin ") or die(mysql_error());
		$num = mysql_num_rows($get2);
	

?>
              <td align="center" bgcolor="#00FFFF"><?php echo $num; ?></td>
            </tr>
            
            <tr>
              <td bgcolor="#00FFFF">Total Categories:</td>
             <?php 
	
		
		
		$get2 = mysql_query ("SELECT * FROM categories ") or die(mysql_error());
		$num = mysql_num_rows($get2);
	

?>
              <td align="center" bgcolor="#00FFFF"><?php echo $num; ?></td>
            </tr>
            <tr>
              <td bgcolor="#00FFFF">Total Subcategories:</td>
              <?php 
	
		
		
		$get2 = mysql_query ("SELECT * FROM subcategories ") or die(mysql_error());
		$num = mysql_num_rows($get2);
	

?>
              <td align="center" bgcolor="#00FFFF"><?php echo $num; ?></td>
            </tr>
            <tr>
              <td bgcolor="#00FFFF">Total Messages:</td>
               <?php 
		$get2 = mysql_query ("SELECT * FROM messages ") or die(mysql_error());
		$num = mysql_num_rows($get2);
		?>
              <td align="center" bgcolor="#00FFFF"><?php echo $num; ?></td>
            </tr>
            <tr>
              <td bgcolor="#00FFFF">Total Transactions:</td>
              <?php 
		$get2 = mysql_query ("SELECT * FROM transaction WHERE status='Confirmed' AND Type='Cash' ") or die(mysql_error());
		$num = mysql_num_rows($get2);
		?>
              <td align="center" bgcolor="#00FFFF"><?php echo $num; ?></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>