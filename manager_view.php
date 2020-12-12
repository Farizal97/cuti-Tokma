<!-- Printing -->
	<link rel="stylesheet" href="css/printing.css">
		
<?php
include("sess_check.php");
include("config/format_tanggal.php");
include("config/format_rupiah.php");
if($_GET) {
	$kode = $_GET['code'];
	$sql = "SELECT * FROM manager WHERE mng_nip='$kode'";
	$query = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($query);
	
}
else {
	echo "Nomor Transaksi Tidak Terbaca";
	exit;
}
?>
<html>
<head>
</head>
<body>
<div id="section-to-print">
<div id="only-on-print">
<!--	<h2>Profil Project Manager</h2> -->
</div>
<div class="modal-header">
	<h4 class="modal-title" id="myModalLabel">Detail Manager</h4>
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
</div>
<div><br/>
<table width="100%">
	<tr>
		<td width="20%"><b>NIP Manager</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['mng_nip'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Nama</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['mng_nama'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Jenis Kelamin</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['mng_jk'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Telepon</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['mng_telp'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Alamat</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><?php echo $result['mng_alamat'];?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td width="20%"><b>Foto</b></td>
		<td width="2%"><b>:</b></td>
		<td width="78%"><img src="img/<?php echo $result['mng_foto'];?>" width="100px"></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
</table>
</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
	</div>
</div>
</body>
</html>