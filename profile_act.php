<?php
include("sess_check.php");
	if(isset($_POST['update'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$cekfoto=$_FILES["foto"]["name"];
		
		if($cekfoto!=""){
			$foto=substr($_FILES["foto"]["name"],-5);
			$newfoto = "foto".$id.$foto;
			move_uploaded_file($_FILES["foto"]["tmp_name"],"img/".$newfoto);
			$sql = "UPDATE admin SET 
					adm_nama='". $nama ."',
					adm_foto='". $newfoto ."'
					WHERE id_adm='". $id ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: profile.php?act=update&msg=success");
		}else {
			$sql = "UPDATE admin SET 
					adm_nama='". $nama ."'
					WHERE id_adm='". $id ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: profile.php?act=update&msg=success");
		}
}
?>