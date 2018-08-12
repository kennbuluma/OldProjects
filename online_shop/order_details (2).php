<?php 
//Database Connection
include_once 'scripts/db_connection.php';
?>
<?php
//include_once 'session_check.php';
?>
<?php 
//Gather the transaction full information
if(isset($_GET['ID'])){
$targetID = $_GET['ID'];
$add = mysql_query("UPDATE transaction SET status='Confirmed' WHERE transaction_id ='$targetID'") or die(mysql_error());

$sql = mysql_query("SELECT * FROM transaction WHERE transaction_id='$targetID' LIMIT 1");
$prodcutCount = mysql_num_rows($sql);//count the output
if($prodcutCount>0){
	while($row = mysql_fetch_array($sql)){
		$id=$row["id"];
		$transaction_id =$row["transaction_id"];
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
	<title>Admin Panel - Order Details</title>
    <link href="style/css.css" rel="stylesheet" type="text/css">
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<div class="wrapper">
	

  <div class="view_category">
    
     <div class="view_category_list">
     <table width="604" border="0" align="center" cellpadding="2" cellspacing="2">
       <tr>
         <td colspan="4" align="center">I-Shop Computer And Accessories Distributors</td>
       </tr>
       <tr>
         <td colspan="4" align="center">Cell: +25470222222</td>
       </tr>
       <tr>
         <td colspan="4" align="center">Landline: 020-54657654</td>
       </tr>
       <tr>
         <td colspan="4" align="center">Address: P.O BOX 1111 - 80100</td>
       </tr>
       <tr>
         <td colspan="4" align="center">Mombasa, Kenya</td>
       </tr>
      <tr>
        <td colspan="4"><div align="center"><strong>INVOICE</strong></div></td>
      </tr>
      <tr>
        <td colspan="4"><strong>Transaction No: <?php echo $transaction_id; ?></strong></td>
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
				include_once 'scripts/db_connection.php';
				if(isset($_GET['ID'])){
					$targetID = $_GET['ID'];
					$result = mysql_query("SELECT * FROM cart WHERE transaction_id='$targetID' ");
				
				echo'<table style="margin-top: 10px;" width="60%" align="center">
			
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
       <table width="60%" border="0" align="center">                 
                  <tr align="right">
                  <td style="font-weight:bold;">TOTAL AMOUNT:</td>
                    <td style="font-weight:bold;"><?php echo $total ?></td>
                  </tr>
       </table>
     </div>
  </div>
    
    
</div>

</body>
</html>