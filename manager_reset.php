<?php
		include("sess_check.php");
		$id = $_GET['mng'];	
		$pass = md5($id);
		$sql = "UPDATE manager SET mng_pass='". $pass ."'	WHERE mng_nip='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: manager.php?act=update&msg=pass");
?>