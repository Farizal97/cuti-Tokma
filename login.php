<?php
$pagedesc = "login";
session_start();

// jika sudah login, alihkan ke halaman dasbor
if (isset($_SESSION['alogin'])) {
  header('location: index.php');
  exit();
}else if(isset($_SESSION['klogin'])) {
  header('location: karyawan/index.php');
  exit();
}else if(isset($_SESSION['mlogin'])) {
  header('location: manager/index.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Pengajuan Cuti PT. Panca Tokma Lestari - <?php echo $pagedesc;?></title>
	<link href="assets/img/tokma.jpg" width="70%" rel="icon" type="images/x-icon">
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<link href="assets/css/main-style.css" rel="stylesheet" />
</head>
<body class="body-Login-back">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
						<center><img src="assets/img/tokma.jpg" width="200" alt=""/></center>
                        <h4 class="text-center">Sistem Informasi Permohonan Cuti<br/><b>PT. Panca Tokma Lestari</b></h4>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="login_auth.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <div class="form-group">
									<select name="akses" class="form-control" required>
										<option value="">=== Login Sebagai ===</option>
										<option value="admin">Admin</option>
										<option value="karyawan">Karyawan</option>
										<option value="manager">Manager</option>										
									</select>
								</div>
                                <!-- Change this to a button or input when using this as a form -->
								<input type="submit" class="btn btn-primary btn-block" name="login" value="Masuk">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- footer-bottom -->
	<div class="navbar navbar-inverse navbar-fixed-bottom footer-bottom">
		<div class="container text-center">
			<p class="text-center" style="color: #D1C4E9; margin: 0 0 0px; padding: 0"><small><?php echo date('Y');?> - Sistem Informasi Permohonan Cuti PT. Panca Tokma Lestari</small></p>
		</div>
	</div><!-- /.footer-bottom -->

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
</body>
</html>
