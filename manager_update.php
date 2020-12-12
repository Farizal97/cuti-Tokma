<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$niplama=$_POST['niplama'];
		$nip=$_POST['nip'];
		$nama=$_POST['nama'];
		$jk=$_POST['jk'];
		$telp=$_POST['telp'];
		$alamat=$_POST['alamat'];
		$cekfoto=$_FILES["foto"]["name"];
		
	if($nip!=$niplama){
		$sqlcek = "SELECT * FROM manager WHERE mng_nip='$nip'";
		$ress = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($ress);
		if($rows<1){
			if($cekfoto!=""){
				$foto=substr($_FILES["foto"]["name"],-5);
				$newfoto = "foto".$npp.$foto;				
				move_uploaded_file($_FILES["foto"]["tmp_name"],"img/".$newfoto);
				$sql = "UPDATE manager SET
					mng_nip='". $nip ."',
					mng_nama='". $nama ."',
					mng_jk='". $jk ."',
					mng_telp='". $telp ."',
					mng_alamat='". $alamat ."',
					mng_foto='". $newfoto ."'
					WHERE mng_nip='". $niplama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: manager.php?act=update&msg=success");
			}else{
				$sql = "UPDATE manager SET
					mng_nip='". $nip ."',
					mng_nama='". $nama ."',
					mng_jk='". $jk ."',
					mng_telp='". $telp ."',
					mng_alamat='". $alamat ."'
					WHERE mng_nip='". $niplama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: manager.php?act=update&msg=success");
			}
		}else{
			header("location: manager_edit.php?mng=$niplama&act=add&msg=double");			
		}
	}else{
		if($cekfoto!=""){
			$foto=substr($_FILES["foto"]["name"],-5);
			$newfoto = "foto".$npplama.$foto;				
			move_uploaded_file($_FILES["foto"]["tmp_name"],"img/".$newfoto);
				$sql = "UPDATE manager SET
					mng_nama='". $nama ."',
					mng_jk='". $jk ."',
					mng_telp='". $telp ."',
					mng_alamat='". $alamat ."',
					mng_foto='". $newfoto ."'
					WHERE mng_nip='". $niplama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: manager.php?act=update&msg=success");
		}else{
				$sql = "UPDATE manager SET
					mng_nama='". $nama ."',
					mng_jk='". $jk ."',
					mng_telp='". $telp ."',
					mng_alamat='". $alamat ."'
					WHERE mng_nip='". $niplama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: manager.php?act=update&msg=success");
		}
	}
}
?>