<?php
		include("sess_check.php");
		$id = $_GET['div'];	
		$sql = "DELETE FROM divisi WHERE div_id='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: divisi.php?act=delete&msg=success");
?>