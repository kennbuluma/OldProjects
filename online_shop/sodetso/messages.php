<?php 
//Database Connection
include_once '../scripts/db_connection.php';
?>
<?php
include_once 'session_check.php';
?>
<?php 
//Delete message from system
if(isset($_GET['deleteid'])){
 
	//delete from database 
	$id_to_delete = $_GET['deleteid'];
	$sql = mysql_query("DELETE FROM messages WHERE id='$id_to_delete' LIMIT 1") or die(mysql_error);
	
		header("location: messages.php");
		exit();
	}
?>

<?php 
include_once '../scripts/db_connection.php';
				function listmembers($page)
{
	$start = 0;
    $limit = 10;
    $start .= ($page-1)*$limit;
	$sql = "SELECT * FROM messages ORDER BY id DESC LIMIT $start, $limit ";
			
	$result = mysql_query($sql) or die(mysql_error());
	$rowNumber = mysql_num_rows($result);
	if($rowNumber>0){
		echo'<table style="margin-top: 10px;" width="100%">
			
						<tr bgcolor="#00CCFF" style="color:#FFF; font-size: 18px;" >
<td>ID</td><td>Name</td><td>Email</td><td>Message</td><td>Date Added</td><td>Action</td>
							
						</tr>';
			while($row=mysql_fetch_array($result)){
					echo '<tr>
							<td>'.$row['id'].'</td>
							<td>'.$row['Name'].'</td>
							<td>'.$row['Email'].'</td>
							<td>'.$row['Message'].'</td>
							<td>'.$row['date_added'].'</td>
							<td><a href="view_message.php?ID='.$row['id'].'">View</a> &bull;
							<a href="messages.php?deleteid='.$row['id'].'">Delete</a></td>
							
						</tr>';
						
			}
			echo'</table>';
	
		
	
	 $rows=mysql_num_rows(mysql_query("SELECT * FROM messages ORDER BY id DESC"));
		$lastpage=ceil($rows/$limit);
		if($page>1){
		echo '<div class="paginationArea">';
	     echo ' <div class="navPrev"><a href="messages.php?pageid='.($page-1).'">Prev</a></div>';
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
		echo '<div class="Navnext"><a href="messages.php?pageid='.($page+1).'">Next</a></div>';
			}
			
		
		  if($page!=$lastpage){
		echo '  Showing '.($start+1).' to '.($limit+($start)).' of '.$rows.' Messages';
		  }else{
		 echo ' Showing '.($start+1).' to '.($rows).' of '.$rows.' Messages';
		  }
		echo '</div>';
	
	
}}

?>

<html>
<head>
	<title>Admin Panel - Messages</title>
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
#pageNum{
float:left;
background-color:#0CF;
padding: 3px;
border: 1px solid #e1e1e1;
}
#active{
float:left;
background-color:#FFFFFF;
padding: 3px;
border: 1px solid #e1e1e1;
}
.navNext {
float:left;
margin-left: 5px;
margin-right: 5px;
font-weight:bold;
}

.navPrev{
float:left;
margin-right: 5px;
font-weight:bold;
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
   MESSAGES
    </div>
    <div class="view_category_list">
	
	 <?php
if(isset($_GET['pageid'])){
 $page =$_GET['pageid'];
 echo listmembers($_GET['pageid']);
}
else { 
echo listmembers($_GET['pageid']=1); 
}

?>
    
   
    </div>
  </div>
    
    
</div>
<?php include_once 'includes/footer.php'; ?>
</body>
</html>