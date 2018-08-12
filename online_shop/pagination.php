<?php 
//Database Connection
include_once 'scripts/db_connection.php';
?>
<?php
//Function to display Cash Sale transactions
function transactionsDet($page)
{
	$start = 0;
    $limit =10;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM transaction WHERE user='".$_SESSION["manager"]."' AND Type = 'Cash' AND status='Confirmed' ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo '<table style="margin-top: 10px;" width="100%">
		<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
<td>Transaction Number</td><td>Total</td><td>Payment Mode</td><td>Payment TRN No.</td><td>Date</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
				echo '<tr>
							
							<td>'.$row['transaction_id'].'</td>
							<td>'.$row['total'].'</td>
							<td>'.$row['Payment_Mode'].'</td>
							<td>'.$row['Payment_Transaction_No'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="transaction_details.php?ID='.$row['transaction_id'].'">Print Preview</a> </td>
				</tr>';
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM transaction WHERE  user='".$_SESSION["manager"]."' AND Type = 'Cash' AND status='Confirmed' ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="customer_account.php?pageid='.($page-1).'">Prev</a></div>';
	}

		 
		
			for($i=1; $i<=$lastpage; $i++)
		  {
		  if($i==$page){
			echo ' <div id="active">'.$i.'</div>';
		  }else{
			echo '<div id="pageNum"><a href="?pageid='.$i.'">'.$i.'</a></div>';
			  }
			  }
			  if($page!=$lastpage){
		echo '<div class="navNext"><a href="customer_account.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' Transactions';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' Transactions';
		  }
		echo '</div>';
	
	
}}
?>

<?php
//Function to display Orders
function orders($page)
{
	$start = 0;
    $limit =10;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM transaction WHERE user='".$_SESSION["manager"]."' AND Type = 'Order' ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo '<table style="margin-top: 10px;" width="100%">
		<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
<td>Transaction Number</td><td>Total</td><td>Date</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
				echo '<tr>
							
							<td>'.$row['transaction_id'].'</td>
							<td>'.$row['total'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="order_details.php?ID='.$row['transaction_id'].'">Print Preview</a></td>
				</tr>';
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM transaction WHERE user='".$_SESSION["manager"]."' AND Type = 'Order' ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="customer_account.php?pageid='.($page-1).'">Prev</a></div>';
	}

		 
		
			for($i=1; $i<=$lastpage; $i++)
		  {
		  if($i==$page){
			echo ' <div id="active">'.$i.'</div>';
		  }else{
			echo '<div id="pageNum"><a href="?pageid='.$i.'">'.$i.'</a></div>';
			  }
			  }
			  if($page!=$lastpage){
		echo '<div class="navNext"><a href="customer_account.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' orders';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' orders';
		  }
		echo '</div>';
	
	
}}
?>

<?php
//Function to display Messages
function inbox($page)
{
	$start = 0;
    $limit =10;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM inbox WHERE Receiver='".$_SESSION["manager"]."' ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo '<table style="margin-top: 10px;" width="50%">
		<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
<td>From</td><td>Date</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
				echo '<tr>
							
							<td>'.$row['Sender'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="read_inbox.php?ID='.$row['id'].'">View</a> </td>
				</tr>';
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM inbox WHERE  Receiver='".$_SESSION["manager"]."'ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="inbox.php?pageid='.($page-1).'">Prev</a></div>';
	}

		 
		
			for($i=1; $i<=$lastpage; $i++)
		  {
		  if($i==$page){
			echo ' <div id="active">'.$i.'</div>';
		  }else{
			echo '<div id="pageNum"><a href="?pageid='.$i.'">'.$i.'</a></div>';
			  }
			  }
			  if($page!=$lastpage){
		echo '<div class="navNext"><a href="inbox.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' Messages';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' Messages';
		  }
		echo '</div>';
	
	
}}
?>

<?php 
//Function to display inventory
function inventory($page)
{
	$start = 0;
    $limit = 16;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM products WHERE qt>0 ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
			while($row=mysql_fetch_array($result)){
		$id=$row["id"];
		$product_name=$row["product_name"];
		$price=$row["price"];
		$date_added=strftime("%b %d, %Y", strtotime($row["date_added"]));
				echo '<div class="product_box">
 
    <a href="product.php?id='.$id.'"><img style="border: #666 1px solid;" src="inventory_images/'.$id.'.jpg" width="180" height="140" alt="'.$product_name.'"></a>
      <div class="productName">'.$product_name.'</div>
      <div class="buynow"> KES '.$price.'</div>
      <a href="product.php?id='.$id.'">View Product</a>
 
</div>'; 
			}
			
				
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM products  WHERE qt>0 ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
			
			echo '<br/>';
		echo '<div class="paginationArea"> ';
	     echo ' <div class="navPrev"><a href="products.php?pageid='.($page-1).'">Prev</a></div>';
	}

		 
		
			for($i=1; $i<=$lastpage; $i++)
		  {
		  if($i==$page){
			echo ' <div id="active">'.$i.'</div>';
		  }else{
			echo '<div id="pageNum"><a href="?pageid='.$i.'">'.$i.'</a></div>';
			  }
			  }
			  if($page!=$lastpage){
		echo '<div class="Navnext"><a href="products.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' Products';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' Products';
		  }
		echo '</div>';
	
	
}}

?>