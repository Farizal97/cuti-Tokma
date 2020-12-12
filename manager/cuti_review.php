<?php
include("sess_check.php");
$pagedesc="Menunggu Approval";
include "layout_top.php";

	if(isset($_GET['cut'])) {
		$sql = "SELECT karyawan.*, cuti.* FROM karyawan, cuti WHERE cuti.kry_nip=karyawan.kry_nip AND cuti.cuti_id='". $_GET['cut'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}

	if(isset($_POST['update'])) {
		$id = $_POST['id'];
		$aksi = $_POST['aksi'];
		$reject = $_POST['reject'];
		if($aksi==1){
			$stt = "Menunggu Approval HRD";
		}else{
			$stt = "Rejected";
		}
		
		$sql = "UPDATE cuti SET 
					cuti_stt='". $stt ."',
					cuti_reject='". $reject ."'
					WHERE cuti_id='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		if($ress){
			echo "<script type='text/javascript'>
					alert('Update data berhasil!'); 
					document.location = 'cuti_wait.php'; 
				</script>";
		}else{
			echo "<script type='text/javascript'>
					alert('Oops, ada kesalahan. Silahkan coba lagi!'); 
					document.location = 'cuti_review.php?cut=$id'; 
				</script>";
			
		}			
	}

?>
<script type="text/javascript">
$(document).ready(function() {
    $('#aksi').change(function(){
        if($(this).val() === '2'){
            $('#reject').attr('disabled', false);
        }else{
            $('#reject').attr('disabled', 'disabled');
        }
    });

});
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
					<div class="panel-heading"><h4>Review Pengajuan Cuti</h4></div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-sm-3">ID Cuti</label>
							<div class="col-sm-4">
								<input type="text" id="id" name="id" class="form-control" placeholder="NIP" value="<?php echo $data['cuti_id'] ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">NIP</label>
							<div class="col-sm-4">
								<input type="text" id="nip" name="nip" class="form-control" placeholder="NIP" value="<?php echo $data['kry_nip'] ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Nama</label>
							<div class="col-sm-4">
								<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['kry_nama'] ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Tgl. Pengajuan</label>
							<div class="col-sm-4">
								<input type="text" name="tgl" class="form-control" placeholder="Nama" value="<?php echo IndonesiaTgl($data['cuti_tgl'])?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Mulai Cuti</label>
							<div class="col-sm-4">
								<input type="text" name="mulai" class="form-control" placeholder="Nama" value="<?php echo IndonesiaTgl($data['cuti_mulai'])?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Selesai Cuti</label>
							<div class="col-sm-4">
								<input type="text" name="akhir" class="form-control" placeholder="Nama" value="<?php echo IndonesiaTgl($data['cuti_akhir'])?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Durasi</label>
							<div class="col-sm-4">
								<input type="number" name="durasi" min="0" class="form-control" placeholder="Telepon" value="<?php echo $data['cuti_durasi'] ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Keterangan</label>
							<div class="col-sm-4">
								<textarea name="ket" class="form-control" placeholder="Keterangan" rows="3" readonly><?php echo $data['cuti_ket'] ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Aksi</label>
							<div class="col-sm-4">
								<select name="aksi" id="aksi" class="form-control" required>
									<option value="" selected>---- Pilih Aksi ----</option>
									<option value="1">Approved</option>
									<option value="2">Rejected</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Keterangan Reject <br>(Silahkan isi jika direject!)</label>
							<div class="col-sm-4">
								<textarea name="reject" id="reject" class="form-control" placeholder="Keterangan Reject" rows="3"></textarea>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button type="submit" name="update" class="btn btn-success">Update</button>
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
