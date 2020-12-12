<?php
// memulai session
session_start();
// memanggil file koneksi
include("config/koneksi.php");

// mengecek apakah tombol login sudah di tekan atau belum
if(isset($_POST['login'])) {
		// membaca nilai variabel username dan password
		$username = $_POST['username'];
		$password = $_POST['password'];
		$akses = $_POST['akses'];
		// mencegah sql injection
		$username = htmlentities(trim(strip_tags($username)));
		$password = htmlentities(trim(strip_tags($password)));
		$pass = md5($password);
		if($akses=="admin"){
			// memeriksa username di tabel admin
			$sql = "SELECT * FROM admin WHERE username='". $username ."' AND password='". $pass ."'";
			$ress = mysqli_query($conn, $sql);
			$rows = mysqli_num_rows($ress);
			$dataku = mysqli_fetch_array($ress);
			// mendaftarkan session jika username di temukan
			if($rows == 1) {
				// membuat variabel session
				$_SESSION['alogin'] = "Y";
				$_SESSION['akses'] = "admin";
				$_SESSION['user'] = strtolower($dataku['id_adm']);
				// mengarahkan ke halaman indeks.php
				header("location: index.php");
			}else{
				echo "<script>alert('Username / Password Salah!');</script>";
				echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
			}
		}else if($akses=="karyawan"){
			// memeriksa username di tabel admin
			$sql = "SELECT * FROM karyawan WHERE kry_nip='". $username ."' AND kry_pass='". $pass ."'";
			$ress = mysqli_query($conn, $sql);
			$rows = mysqli_num_rows($ress);
			$dataku = mysqli_fetch_array($ress);
			// mendaftarkan session jika username di temukan
			if($rows == 1) {
				// membuat variabel session
				$_SESSION['klogin'] = "Y";
				$_SESSION['kakses'] = "karyawan";
				$_SESSION['kry'] = strtolower($dataku['kry_nip']);
				// mengarahkan ke halaman indeks.php
				header("location: karyawan/index.php");
			}else{
				echo "<script>alert('Username / Password Salah!');</script>";
				echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
			}
		}else if($akses=="manager"){
			// memeriksa username di tabel admin
			$sql = "SELECT * FROM manager WHERE mng_nip='". $username ."' AND mng_pass='". $pass ."'";
			$ress = mysqli_query($conn, $sql);
			$rows = mysqli_num_rows($ress);
			$dataku = mysqli_fetch_array($ress);
			// mendaftarkan session jika username di temukan
			if($rows == 1) {
				// membuat variabel session
				$_SESSION['mlogin'] = "Y";
				$_SESSION['makses'] = "manager";
				$_SESSION['mng'] = strtolower($dataku['mng_nip']);
				// mengarahkan ke halaman indeks.php
				header("location: manager/index.php");
			}else{
				echo "<script>alert('Username / Password Salah!');</script>";
				echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
			}
		}
}
?>