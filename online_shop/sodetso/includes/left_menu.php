<div class="side_menu">
    	<div class="side_menu_header">
        QUICK LINKS
        </div>
        <div class="side_menu_list">
        	<ul>
            	<li><a href="index.php">Dashboard</a></li>
                <li><a href="add_category.php">Categories</a></li>
                <li><a href="sub_category.php">Subcategories</a></li>
            	<li><a href="inventory.php">Inventory List</a></li>
                <li><a href="add_item.php">Add New Item </a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="customers.php">Customers</a></li>
                <?php 
		$get2 = mysql_query ("SELECT * FROM transaction WHERE status='Pending' AND Type='Cash' ") or die(mysql_error());
		$num = mysql_num_rows($get2);
		?>
                 <li><a href="pending_transactions.php">Pending Transactions (<?php echo $num; ?>)</a></li>
                <li><a href="transactions.php">Transactions</a></li>
            <?php 
		$get1 = mysql_query ("SELECT * FROM transaction WHERE status='Pending' AND Type='Order' ") or die(mysql_error());
		$num1 = mysql_num_rows($get1);
		?>
                <li><a href="orders.php">Orders (<?php echo $num1; ?>)</a></li>
                
            <?php 
		$get3 = mysql_query ("SELECT * FROM messages WHERE status='Unread'") or die(mysql_error());
		$num3 = mysql_num_rows($get3);
		?>    
                <li><a href="messages.php">Messages (<?php echo $num3; ?>)</a></li>
                                               
          </ul>
        </div>
</div>