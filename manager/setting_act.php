<?php
include("sess_check.php");
	if(isset($_POST['update'])) {
		$id_pengguna = $_POST['id_pengguna'];
		$password_old = md5($_POST['password_old']);
		$password_old2 = $_POST['password_old2'];
		$password_new = md5($_POST['password_new']);
		$password_new2 = md5($_POST['password_new2']);
		
		if($password_old == $password_old2) {
			if($password_new == $password_new2) {
				$sql = "UPDATE manager SET mng_pass='". $password_new ."' WHERE mng_nip='". $id_pengguna ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: setting.php?act=update&msg=success");
			}else {
				header("location: setting.php?act=update&msg=pwd_err_2");
			}
		}else {
			header("location: setting.php?act=update&msg=pwd_err_1");
		}
	}
?>