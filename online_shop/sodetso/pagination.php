<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php 
//Function to display categories
function category($page)
{
	$start = 0;
    $limit = 5;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM categories ORDER BY Category_ID DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo'<table style="margin-top: 10px;" width="100%">
			
						<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
							<td>Category ID</td><td>Category Name</td><td>Date Added</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
				echo '<tr>
							<td>'.$row['Category_ID'].'</td>
							<td>'.$row['Category_Name'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="edit_category.php?ID='.$row['Category_ID'].'">Edit</a> &bull;
							<a href="add_category.php?deleteid='.$row['Category_ID'].'">Delete</a></td>
							
						</tr>';
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM categories ORDER BY Category_ID DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="add_category.php?pageid='.($page-1).'">Prev</a></div>';
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
		echo '<div class="Navnext"><a href="add_category.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' Categories';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' Categories';
		  }
		echo '</div>';
	
	
}}

?>

<?php 
//Function to display subcategories
function subcategory($page)
{
	$start = 0;
    $limit = 5;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM subcategories ORDER BY Subcategory_ID DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo'<table style="margin-top: 10px;" width="100%">
			
						<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
							<td>Subcategory ID</td><td>Category Name</td><td>Subcategory Name</td><td>Date Added</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
				echo '<tr>
							<td>'.$row['Subcategory_ID'].'</td>
							<td>'.$row['Category_Name'].'</td>
							<td>'.$row['Subcategory_Name'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="edit_subcategory.php?ID='.$row['Subcategory_ID'].'">Edit</a> &bull;
							<a href="sub_category.php?deleteid='.$row['Subcategory_ID'].'">Delete</a></td>
							
						</tr>';
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM subcategories ORDER BY Subcategory_ID DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="sub_category.php?pageid='.($page-1).'">Prev</a></div>';
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
		echo '<div class="Navnext"><a href="sub_category.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' Subcategories';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' Subcategories';
		  }
		echo '</div>';
	
	
}}

?>

<?php 
//Function to display inventory
function inventory($page)
{
	$start = 0;
    $limit = 5;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM products ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo'<table style="margin-top: 10px;" width="100%">
			
						<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
<td>ID</td><td>Image</td><td>Product ID</td><td>Item Name</td><td>Price</td><td>Details</td><td>Category</td><td>Subcategory</td><td>Qty</td><td>Date Added</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
				echo '<tr>
							<td>'.$row['id'].'</td>
							<td width="100"><a href="product.php?id='.$row['id'].'"><img style="border: #666 1px solid;" src="../inventory_images/'.$row['id'].'.jpg" width="80" height="60" alt="'.$row['product_name'].'"></a></td>
							<td>'.$row['product_id'].'</td>
							<td>'.$row['product_name'].'</td>
							<td>'.$row['price'].'</td>
							<td>'.$row['details'].'</td>
							<td>'.$row['category'].'</td>
							<td>'.$row['subcategory'].'</td>
							<td>'.$row['qt'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="edit_item.php?ID='.$row['id'].'">Edit</a> &bull;
							<a href="inventory.php?deleteid='.$row['id'].'">Delete</a></td>
							
						</tr>';
						
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM products ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="inventory.php?pageid='.($page-1).'">Prev</a></div>';
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
		echo '<div class="Navnext"><a href="inventory.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' Products';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' Products';
		  }
		echo '</div>';
	
	
}}

?>

<?php 
//Function to display users
function usersAdmin($page)
{
	$start = 0;
    $limit =5;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM admin ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo'<table style="margin-top: 10px;" width="100%">
			
						<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
							<td>ID</td><td>Firstname</td><td>Surname</td><td>Email</td><td>Username</td><td>Date Added</td><td>Last Log</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
					echo '<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['Firstname'].'</td>
							<td>'.$row['Surname'].'</td>
							<td>'.$row['Email'].'</td>
							<td>'.$row['username'].'</td>
							<td>'.$row['date_added'].'</td>
							<td>'.$row['last_log_date'].'</td>
							<td><a href="edit_user.php?ID='.$row['id'].'">Edit</a> &bull;
							<a href="users.php?deleteid='.$row['id'].'">Delete</a></td>
							
						</tr>';
						
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM admin ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="users.php?pageid='.($page-1).'">Prev</a></div>';
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
		echo '<div class="Navnext"><a href="users.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' Users';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' Users';
		  }
		echo '</div>';
	
	
}}

?>

<?php 
//Function to display customers
function customers($page)
{
	$start = 0;
    $limit = 10;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM customers ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo'<table style="margin-top: 10px;" width="100%">
			
						<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
<td>Firstname</td><td>Lastname</td><td>Email</td><td>Telephone</td><td>Country</td><td>City</td><td>Address_Street</td><td>Address</td><td>Date Added</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
					echo '<tr>
						
							<td>'.$row['Firstname'].'</td>
							<td>'.$row['Lastname'].'</td>
							<td>'.$row['Email'].'</td>
							<td>'.$row['Telephone'].'</td>
							<td>'.$row['Country'].'</td>
							<td>'.$row['City'].'</td>
							<td>'.$row['Address_Street'].'</td>
							<td>'.$row['Address'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="msg_customer.php?ID='.$row['id'].'">Msg</a> &bull;
							<a href="customers.php?deleteid='.$row['id'].'">Delete</a>
							
							</td>
							
						</tr>';
						
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM customers ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="customers.php?pageid='.($page-1).'">Prev</a></div>';
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
		echo '<div class="Navnext"><a href="customers.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' Customers';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' Customers';
		  }
		echo '</div>';
	
	
}}

?>

<?php
//Function to display Cash Sale transactions
function transactionsDet($page)
{
	$start = 0;
    $limit =10;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM transaction WHERE Type='Cash' AND status='Confirmed' ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo '<table style="margin-top: 10px;" width="100%">
		<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
<td>ID</td><td>Transaction ID</td><td>User</td><td>Total</td><td>Payment Mode</td><td>Payment TRN No.</td><td>Date</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
				echo '<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['transaction_id'].'</td>
							<td>'.$row['user'].'</td>
							<td>'.$row['total'].'</td>
							<td>'.$row['Payment_Mode'].'</td>
							<td>'.$row['Payment_Transaction_No'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="transaction_details.php?ID='.$row['transaction_id'].'">View</a> &bull;
							<a href="transactions.php?deleteid='.$row['id'].'">Delete</a></td>
				</tr>';
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM transaction WHERE  Type='Cash' AND status='Confirmed' ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="transactions.php?pageid='.($page-1).'">Prev</a></div>';
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
		echo '<div class="navNext"><a href="transactions.php?pageid='.($page+1).'">Next</a></div>';
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
//Function to display Pending transactions
function pendingTransactions($page)
{
	$start = 0;
    $limit =10;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM transaction WHERE status='Pending' AND Type='Cash' ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo '<table style="margin-top: 10px;" width="100%">
		<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
<td>ID</td><td>Transaction ID</td><td>User</td><td>Total</td><td>Payment Mode</td><td>Payment TRN No.</td><td>Date</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
				echo '<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['transaction_id'].'</td>
							<td>'.$row['user'].'</td>
							<td>'.$row['total'].'</td>
							<td>'.$row['Payment_Mode'].'</td>
							<td>'.$row['Payment_Transaction_No'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="confirm_transaction.php?ID='.$row['transaction_id'].'">Confirm</a> &bull;
							<a href="pending_transactions.php?deleteid='.$row['id'].'">Delete</a></td>
				</tr>';
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM transaction WHERE status='Pending' AND Type='Cash' ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="pending_transactions.php?pageid='.($page-1).'">Prev</a></div>';
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
		echo '<div class="navNext"><a href="pending_transactions.php?pageid='.($page+1).'">Next</a></div>';
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
//Function to display Orders
function orders($page)
{
	$start = 0;
    $limit =10;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM transaction WHERE Type='Order' ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo '<table style="margin-top: 10px;" width="100%">
		<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
<td>ID</td><td>Transaction ID</td><td>User</td><td>Total</td><td>Date</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
				echo '<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['transaction_id'].'</td>
							<td>'.$row['user'].'</td>
							<td>'.$row['total'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="order_details.php?ID='.$row['transaction_id'].'">View</a> &bull;
							<a href="orders.php?deleteid='.$row['id'].'">Delete</a></td>
				</tr>';
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM transaction WHERE Type='Order' ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="orders.php?pageid='.($page-1).'">Prev</a></div>';
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
		echo '<div class="navNext"><a href="orders.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' orders';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' orders';
		  }
		echo '</div>';
	
	
}}
?>