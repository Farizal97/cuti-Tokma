<?php
		include("sess_check.php");
		$id = $_GET['cut'];	
		$sql = "DELETE FROM cuti WHERE cuti_id='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: cuti_wait.php?act=delete&msg=success");
?>