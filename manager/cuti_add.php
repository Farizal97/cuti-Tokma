<?php
include("sess_check.php");
$pagedesc="Ajukan Cuti";
include "layout_top.php";
$now = date('Y-m-d');

if(isset($_POST['simpan'])) {
	$nip	= $sess_kryid;
	$ajuan  = date('Y-m-d');
	$mulai	= $_POST['mulai'];
	$akhir	= $_POST['akhir'];
	$ket	= $_POST['ket'];

	$start = new DateTime($mulai);
	$finish = new DateTime($akhir);
	$int = $start->diff($finish);
	$dur = $int->days;
	$durasi = $dur+1;
	
	$stt = "Menunggu Approval Manager";
	$id = date('dmYHis');
	
	$kry = "SELECT * FROM karyawan WHERE kry_nip='$nip'";
	$qpgw = mysqli_query($conn,$kry);
	$ress = mysqli_fetch_array($qpgw);
	$jml = $ress['kry_cuti'];


	if($durasi>$jml){
		echo "<script type='text/javascript'>
				alert('Durasi cuti lebih banyak dari jumlah cuti tersedia! $durasi $jml'); 
				document.location = 'cuti_add.php'; 
			</script>";	
	}else{
		$sql 	= "INSERT INTO cuti (cuti_id, kry_nip, cuti_tgl, cuti_mulai, cuti_akhir, cuti_durasi, cuti_ket, cuti_stt) 
					VALUES ('$id','$nip','$ajuan','$mulai','$akhir','$durasi','$ket','$stt')";
		$query 	= mysqli_query($conn,$sql);
		if($query){
			echo "<script type='text/javascript'>
					alert('Pengajuan cuti berhasil!'); 
					document.location = 'cuti_wait.php'; 
				</script>";

		}else {
			echo "<script type='text/javascript'>
					alert('Terjadi kesalahan, silahkan coba lagi!.'); 
					document.location = 'cuti_add.php'; 
				</script>";
		}
	}

}


?>
<script type="text/javascript">
function valid()
{
	if(document.cuti.akhir.value < document.cuti.mulai.value){
		alert("Tanggal selesai tidak boleh lebih kecil dari tanggal mulai!");
		return false;
	}

	if(document.cuti.mulai.value < document.cuti.now.value){
		alert("Tanggal mulai cuti tidak valid!");
		return false;
	}
	
	return true;
}
</script>
<div id="page-wrapper">
	<div class="row">
    <!-- page header -->
		<div class="col-lg-12">
			<h1 class="page-header">Data Cuti</h1>
         </div>
         <!--end page header -->
     </div>
	 <div class="row">
		<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
	 </div>
	 <div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" name="cuti" action="" method="POST" enctype="multipart/form-data" onSubmit="return valid();">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Ajukan Cuti Baru</h4></div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-sm-3">Mulai Cuti</label>
							<div class="col-sm-4">
								<input type="date" name="mulai" class="form-control" value=<?php echo date('Y-m-d');?> required>
								<input type="hidden" name="now" class="form-control" value="<?php echo $now;?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Selesai Cuti</label>
							<div class="col-sm-4">
								<input type="date" name="akhir" class="form-control" value=<?php echo date('Y-m-d');?> required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Keterangan</label>
							<div class="col-sm-4">
								<textarea name="ket" class="form-control" rows="3" required></textarea>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button type="submit" name="simpan" class="btn btn-success">Simpan</button>
					</div>
				</div><!-- /.panel -->
				</form>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
	</div>
        <!-- end page-wrapper -->
    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="../assets/plugins/jquery-1.10.2.js"></script>
    <script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="../assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../assets/plugins/pace/pace.js"></script>
    <script src="../assets/scripts/siminta.js"></script>

</body>

</html>
