<?php
include("sess_check.php");
$pagedesc="Data Manager";
include "layout_top.php";

	if(isset($_GET['mng'])) {
		$sql = "SELECT * FROM manager WHERE mng_nip='". $_GET['mng'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
?>
<script type="text/javascript">
	function checkMngAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
		url: "check_mngavailability.php",
		data:'nip='+$("#nip").val(),
		type: "POST",
		success:function(data){
			$("#user-availability-status").html(data);
			$("#loaderIcon").hide();
		},
		error:function (){}
	});
	}
</script>
<div id="page-wrapper">
	<div class="row">
    <!-- page header -->
		<div class="col-lg-12">
			<h1 class="page-header">Data Manager</h1>
         </div>
         <!--end page header -->
     </div>
	 <div class="row">
		<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
	 </div>
	 <div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" action="manager_update.php" method="POST" enctype="multipart/form-data">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Edit Data</h4></div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-sm-3">NIP</label>
							<div class="col-sm-4">
								<input type="text" id="nip" name="nip" onBlur="checkMngAvailability()" class="form-control" placeholder="NIP" value="<?php echo $data['mng_nip'] ?>" required>
								<span id="user-availability-status" style="font-size:12px;"></span>
								<input type="hidden" name="niplama" class="form-control" placeholder="NPP" value="<?php echo $data['mng_nip'] ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Nama</label>
							<div class="col-sm-4">
								<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['mng_nama'] ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Jenis Kelamin</label>
							<div class="col-sm-4">
								<select name="jk" id="jk" class="form-control" required>
									<option value="<?php echo $data['mng_jk'] ?>" selected><?php echo $data['mng_jk'] ?></option>
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Telepon</label>
							<div class="col-sm-4">
								<input type="number" name="telp" min="0" class="form-control" placeholder="Telepon" value="<?php echo $data['mng_telp'] ?>"required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Alamat</label>
							<div class="col-sm-4">
								<textarea name="alamat" class="form-control" placeholder="Alamat" rows="3" required><?php echo $data['mng_alamat'] ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Foto (Abaikan Jika Tidak Diubah)</label>
							<div class="col-sm-4">
								<input type="file" name="foto" class="form-control" accept="image/*">
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button type="submit" name="perbarui" class="btn btn-success">Update</button>
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
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
