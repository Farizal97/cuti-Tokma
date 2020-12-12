<?php
	// memulai session
	session_start();
	// membaca nilai variabel session 
	$chk_kakses = $_SESSION['kakses'];
	$chk_ksess = $_SESSION['kry'];

	// memanggil file koneksi
	include("../config/koneksi.php");
	include("../config/library.php");
	// mengambil data pengguna dari tabel pengguna
		$sql_sess = "SELECT * FROM karyawan WHERE kry_nip='". $chk_ksess ."'";
		$ress_sess = mysqli_query($conn, $sql_sess);
		$row_sess = mysqli_fetch_array($ress_sess);
		// menyimpan id_pengguna yang sedang login
		$sess_kryid = $row_sess['kry_nip'];
		$sess_kname = $row_sess['kry_nama'];
		$sess_kfoto = $row_sess['kry_foto'];
	// mengarahkan ke halaman login.php apabila session belum terdaftar
	if(! isset($chk_ksess)) {
		header("location: ../login.php");
	}
?>