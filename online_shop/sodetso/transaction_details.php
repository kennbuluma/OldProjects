<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>
<?php 
//Gather the transaction full information
if(isset($_GET['ID'])){
$targetID = $_GET['ID'];
$add = mysql_query("UPDATE transaction SET status='1' WHERE ID ='$targetID'") or die(mysql_error());
$sql = mysql_query("SELECT * FROM transaction WHERE transaction_id='$targetID' LIMIT 1");
$prodcutCount = mysql_num_rows($sql);//count the output
if($prodcutCount>0){
	while($row = mysql_fetch_array($sql)){
		$id=$row["id"];
		$user=$row["user"]; 
		$total = $row["total"];
		$date_added=strftime("%b %d, %Y", strtotime($row["date_added"]));
		
		}
	}	
	}
?>
<?php 
//Gather the customer full information
if(isset($_GET['ID'])){
$targetID = $_GET['ID'];
$sql = mysql_query("SELECT * FROM customers WHERE Email='$user' LIMIT 1");
$prodcutCount = mysql_num_rows($sql);//count the output
if($prodcutCount>0){
	while($row = mysql_fetch_array($sql)){
		$id=$row["id"];
		$Firstname=$row["Firstname"]; 
		$Lastname = $row["Lastname"];
		$Email = $row["Email"];
		$Telephone = $row["Telephone"];
		$Country = $row["Country"];
		$City = $row["City"];
		$Address_Street = $row["Address_Street"];
		$Address = $row["Address"];
		 
		}
	}
	}
?>

<html>
<head>
	<title>Admin Panel - Transaction Details</title>
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
  TRANSACTION DETAILS
</div>
     <div class="view_category_list">
     <table width="604" border="0" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <td colspan="4"><div align="center"><strong>INVOICE</strong></div></td>
      </tr>
      <tr>
        <td colspan="4"><div align="right"><strong>Date:</strong> <?php echo $date_added; ?></div></td>
        </tr>
      <tr>
        <td width="117" style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Firstname:</td>
        <td width="188" ><?php echo $Firstname; ?></td>
        <td width="183" style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Country:</td>
        <td width="98"><?php echo $Country; ?></td>
      </tr>
      <tr>
        <td style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Lastname:</td>
        <td><?php echo $Lastname; ?></td>
        <td style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">City:</td>
        <td><?php echo $City; ?></td>
      </tr>
      <tr>
        <td style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Email:</td>
        <td><?php echo $Email; ?></td>
        <td style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Address Street:</td>
        <td><?php echo $Address_Street; ?></td>
      </tr>
      <tr>
        <td style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Telephone:</td>
        <td><?php echo $Telephone; ?></td>
        <td style="font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif;">Address:</td>
        <td><?php echo $Address; ?></td>
      </tr>
    </table>
    
    <?php
				include_once '../scripts/db_connection.php';
				if(isset($_GET['ID'])){
					$targetID = $_GET['ID'];
					$result = mysql_query("SELECT * FROM cart WHERE transaction_id='$targetID' ");
				
				echo'<table style="margin-top: 10px;" width="100%">
			
						<tr bgcolor="#999999" style="color:#FFF; font-size: 18px;" >
<td>Item Name</td><td>Product ID</td><td>Item Details</td><td>Unit Price</td><td>Quantity</td><td>Total</td>
							
						</tr>';
			while($row=mysql_fetch_assoc($result))
			
				{
					echo '<tr>
							<td>'.$row['ItemName'].'</td>
							<td>'.$row['Product_ID'].'</td>
							<td>'.$row['ItemDetails'].'</td>
							<td>'.$row['UnitPrice'].'</td>
							<td>'.$row['Quantity'].'</td>
							<td>'.$row['Total'].'</td>
							
							
						</tr>';
						
				}
				
				echo '</table>';
				}
				?>
                <br/>
       <table width="100%" border="0">                 
                  <tr align="right">
                  <td style="font-weight:bold;">TOTAL AMOUNT:</td>
                    <td style="font-weight:bold;"><?php echo $total ?></td>
                  </tr>
       </table>
     </div>
  </div>
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>