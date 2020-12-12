<?php
	include("sess_check.php");

	include("config/format_tanggal.php");
	include("config/format_rupiah.php");
	$mulai 	 = $_GET['awal'];
	$selesai = $_GET['akhir'];
	$sql = "SELECT cuti.*, karyawan.* FROM cuti, karyawan WHERE cuti.kry_nip=karyawan.kry_nip 
			AND cuti.cuti_tgl BETWEEN '$mulai' AND '$selesai' ORDER BY cuti.cuti_tgl DESC";
	$query = mysqli_query($conn,$sql);
	// deskripsi halaman
	$pagedesc = "Laporan Data Cuti - Periode " . IndonesiaTgl($mulai) ." s/d ". IndonesiaTgl($selesai);
	$pagetitle = str_replace(" ", "_", $pagedesc)
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="universitas pamulang">

	<title><?php echo $pagetitle ?></title>

	<link href="assets/img/tokma.jpg" rel="icon" type="images/x-icon">

	<!-- Bootstrap Core CSS -->
	<link href="assets/new/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="assets/new/offline-font.css" rel="stylesheet">
	<link href="assets/new/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="assets/new/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- jQuery -->
	<script src="assets/new/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td rowspan="3" width="16%" class="text-center">
							<img src="assets/img/tokma.jpg" alt="logo-dkm" width="80" />
						</td>
						<td class="text-center"><h3>PT. Panca Tokma Lestari</h3></td>
						<td rowspan="3" width="16%">&nbsp;</td>
					</tr>
					<tr>
						<td class="text-center">Jl. Kondangjaya Kec. Klari Kab. Karawang, Jawa Barat - 41371</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">LAPORAN DATA CUTI</h4>
			<h5 class="text-center">Periode <?php echo IndonesiaTgl($mulai) ." - ". IndonesiaTgl($selesai) ?></h5>
			<br />
			<table class="table table-bordered table-keuangan">
				<thead>
					<tr>
								<th class="text-center">No</th>
                                <th class="text-center">Cuti ID</th>
                                <th class="text-center">Pemohon</th>
                                <th class="text-center">Tgl. Pengajuan</th>
                                <th class="text-center">Tgl. Mulai</th>
                                <th class="text-center">Tgl. Selesai</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$i=1;
						while($data = mysqli_fetch_array($query)) {
							echo '<tr>';
							echo '<td class="text-center">'. $i .'</td>';
							echo '<td class="text-center">'. $data['cuti_id'] .'</td>';
							echo '<td class="text-center">'.$data['kry_nama'].'</a></td>';
							echo '<td class="text-center">'. IndonesiaTgl($data['cuti_tgl']) .'</td>';
							echo '<td class="text-center">'. IndonesiaTgl($data['cuti_mulai']) .'</td>';
							echo '<td class="text-center">'. IndonesiaTgl($data['cuti_akhir']) .'</td>';
							echo '<td class="text-left">'. $data['cuti_ket'] .'</td>';
							echo '<td class="text-left">'. $data['cuti_stt'] .'</td>';
							echo '</tr>';
							$i++;
						}
					?>
				</tbody>
			</table>
			<br />
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="assets/new/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="assets/new/jTerbilang.js"></script>

</body>
</html>