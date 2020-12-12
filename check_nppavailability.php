<?php 
require_once("config/koneksi.php");
// code user username availablity
if(!empty($_POST["nip"])){
	$nip= $_POST["nip"];
	$sql = "SELECT * FROM karyawan WHERE kry_nip='$nip'";
	$query = mysqli_query($conn,$sql);
	if(mysqli_num_rows($query)>0){
		echo "<span style='color:red'> NIP sudah terdaftar.</span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
		echo "<span style='color:green'> NIP bisa digunakan.</span>";
		echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}

?>
