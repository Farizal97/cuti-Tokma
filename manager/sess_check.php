<?php
	// memulai session
	session_start();
	// membaca nilai variabel session 
	$chk_makses = $_SESSION['makses'];
	$chk_msess = $_SESSION['mng'];

	// memanggil file koneksi
	include("../config/koneksi.php");
	include("../config/library.php");
	// mengambil data pengguna dari tabel pengguna
		$sql_sess = "SELECT * FROM manager WHERE mng_nip='". $chk_msess ."'";
		$ress_sess = mysqli_query($conn, $sql_sess);
		$row_sess = mysqli_fetch_array($ress_sess);
		// menyimpan id_pengguna yang sedang login
		$sess_mngid = $row_sess['mng_nip'];
		$sess_mname = $row_sess['mng_nama'];
		$sess_mfoto = $row_sess['mng_foto'];
	// mengarahkan ke halaman login.php apabila session belum terdaftar
	if(! isset($chk_msess)) {
		header("location: ../login.php");
	}
?>