<?php
include("sess_check.php");

$id = $sess_userid;
$nip=$_POST['nip'];
$nama=$_POST['nama'];
$jk=$_POST['jk'];
$telp=$_POST['telp'];
$alamat=$_POST['alamat'];
$foto=substr($_FILES["foto"]["name"],-5);
$newfoto = "foto".$nip.$foto;
$pass = md5($nip);

$sqlcek = "SELECT * FROM manager WHERE mng_nip='$nip'";
$resscek = mysqli_query($conn, $sqlcek);
$rowscek = mysqli_num_rows($resscek);
if($rowscek<1){
	$sql="INSERT INTO manager(mng_nip,mng_nama,mng_jk,mng_telp,mng_alamat,mng_pass,mng_foto,id_adm)
		  VALUES('$nip','$nama','$jk','$telp','$alamat','$pass','$newfoto','$id')";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		move_uploaded_file($_FILES["foto"]["tmp_name"],"img/".$newfoto);
		echo "<script>alert('Tambah Manager Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'manager.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'manager_tambah.php'; </script>";
	}
}else{
	header("location: manager_tambah.php?act=add&msg=double");	
}
?>