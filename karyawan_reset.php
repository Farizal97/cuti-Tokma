<?php
		include("sess_check.php");
		$id = $_GET['kry'];	
		$pass = md5($id);
		$sql = "UPDATE karyawan SET kry_pass='". $pass ."'	WHERE kry_nip='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: karyawan.php?act=update&msg=pass");
?>