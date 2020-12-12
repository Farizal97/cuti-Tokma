<?php
		include("sess_check.php");
		$id = $_GET['mng'];	
		$sql = "DELETE FROM manager WHERE mng_nip='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: manager.php?act=delete&msg=success");
?>