<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$niplama=$_POST['niplama'];
		$nip=$_POST['nip'];
		$nama=$_POST['nama'];
		$jml=$_POST['jml'];
		$jk=$_POST['jk'];
		$telp=$_POST['telp'];
		$divisi=$_POST['divisi'];
		$jabatan=$_POST['jabatan'];
		$alamat=$_POST['alamat'];
		$cekfoto=$_FILES["foto"]["name"];
		$aktif=$_POST['aktif'];
		
	if($nip!=$niplama){
		$sqlcek = "SELECT * FROM karyawan WHERE kry_nip='$nip'";
		$ress = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($ress);
		if($rows<1){
			if($cekfoto!=""){
				$foto=substr($_FILES["foto"]["name"],-5);
				$newfoto = "foto".$npp.$foto;				
				move_uploaded_file($_FILES["foto"]["tmp_name"],"img/".$newfoto);
				$sql = "UPDATE karyawan SET
					kry_nip='". $nip ."',
					kry_nama='". $nama ."',
					kry_jk='". $jk ."',
					kry_telp='". $telp ."',
					div_id='". $divisi ."',
					kry_jabatan='". $jabatan ."',
					kry_alamat='". $alamat ."',
					kry_cuti='". $jml ."',
					kry_stt='". $aktif ."',
					kry_foto='". $newfoto ."'
					WHERE kry_nip='". $niplama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: karyawan.php?act=update&msg=success");
			}else{
				$sql = "UPDATE karyawan SET
					kry_nip='". $nip ."',
					kry_nama='". $nama ."',
					kry_jk='". $jk ."',
					kry_telp='". $telp ."',
					div_id='". $divisi ."',
					kry_jabatan='". $jabatan ."',
					kry_alamat='". $alamat ."',
					kry_cuti='". $jml ."',
					kry_stt='". $aktif ."'
					WHERE kry_nip='". $niplama ."'";
				$ress = mysqli_query($conn, $sql);
				header("location: karyawan.php?act=update&msg=success");
			}
		}else{
			header("location: karyawan_edit.php?kry=$niplama&act=add&msg=double");			
		}
	}else{
		if($cekfoto!=""){
			$foto=substr($_FILES["foto"]["name"],-5);
			$newfoto = "foto".$npplama.$foto;				
			move_uploaded_file($_FILES["foto"]["tmp_name"],"img/".$newfoto);
				$sql = "UPDATE karyawan SET
					kry_nama='". $nama ."',
					kry_jk='". $jk ."',
					kry_telp='". $telp ."',
					div_id='". $divisi ."',
					kry_jabatan='". $jabatan ."',
					kry_alamat='". $alamat ."',
					kry_cuti='". $jml ."',
					kry_stt='". $aktif ."',
					kry_foto='". $newfoto ."'
					WHERE kry_nip='". $niplama ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: karyawan.php?act=update&msg=success");
		}else{
				$sql = "UPDATE karyawan SET
					kry_nama='". $nama ."',
					kry_jk='". $jk ."',
					kry_telp='". $telp ."',
					div_id='". $divisi ."',
					kry_jabatan='". $jabatan ."',
					kry_alamat='". $alamat ."',
					kry_cuti='". $jml ."',
					kry_stt='". $aktif ."'
					WHERE kry_nip='". $niplama ."'";
			$ress = mysqli_query($conn, $sql);
			header("location: karyawan.php?act=update&msg=success");
		}
	}
}
?>