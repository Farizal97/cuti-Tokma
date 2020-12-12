<?php
include("sess_check.php");

$id = $sess_userid;
$nip=$_POST['nip'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$telp=$_POST['telp'];
$divisi=$_POST['divisi'];
$jabatan=$_POST['jabatan'];
$jml=$_POST['jml'];
$alamat=$_POST['alamat'];
$foto=substr($_FILES["foto"]["name"],-5);
$newfoto = "foto".$nip.$foto;
$tgl = date('Y-m-d');
$aktif = "Aktif";
$pass = md5($nip);

$sqlcek = "SELECT * FROM karyawan WHERE kry_nip='$nip'";
$resscek = mysqli_query($conn, $sqlcek);
$rowscek = mysqli_num_rows($resscek);
if($rowscek<1){
	$sql="INSERT INTO karyawan(kry_nip,kry_nama,kry_jk,kry_telp,div_id,kry_jabatan,kry_alamat,kry_cuti,kry_pass,kry_foto,kry_stt,id_adm)
		  VALUES('$nip','$nama','$jk','$telp','$divisi','$jabatan','$alamat','$jml','$pass','$newfoto','$aktif','$id')";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		move_uploaded_file($_FILES["foto"]["tmp_name"],"img/".$newfoto);
		echo "<script>alert('Tambah Karyawan Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'karyawan.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'karyawan_tambah.php'; </script>";
	}
}else{
	header("location: karyawan_tambah.php?act=add&msg=double");	
}
?>