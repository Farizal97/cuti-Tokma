<?php
include("sess_check.php");
	if(isset($_POST['update'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$cekfoto=$_FILES["foto"]["name"];
		
		if($cekfoto!=""){
			$foto=substr($_FILES["foto"]["name"],-5);
			$newfoto = "foto".$id.$foto;
			move_uploaded_file($_FILES["foto"]["tmp_name"],"../img/".$newfoto);
			$sql = "UPDATE karyawan SET 
					kry_nama='". $nama ."',
					kry_foto='". $newfoto ."'
					WHERE kry_nip='". $id ."'";
			$ress = mysqli_query($conn, $sql);
			if($ress){
				header("location: profile.php?act=update&msg=success");
			}else{
				echo("Error description: " . mysqli_error($conn));
			}
		}else {
			$sql = "UPDATE karyawan SET 
					kry_nama='". $nama ."'
					WHERE kry_nip='". $id ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: profile.php?act=update&msg=success");
			if($ress){
				header("location: profile.php?act=update&msg=success");
			}else{
				echo("Error description: " . mysqli_error($conn));
			}
		}
}
?>