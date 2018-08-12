<?php
session_start();
if(session_destroy()){
	header("location: index.php");
	?>
			<!--<script language="Javascript">alert ("Access denied!");</script>-->
			<div class="alert alert-success">
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Successfully signed out!</strong>
			</div>
		<?php
}
?>