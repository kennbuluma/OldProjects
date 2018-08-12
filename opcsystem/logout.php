<?php
session_start();
if(session_destroy()){
	?>
			<!--<script language="Javascript">alert ("Access denied!");</script>-->
			<div class="alert alert-success">
			<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Successfully singed out!</strong>
			</div>
		<?php
	header("location: index.php");
}
?>