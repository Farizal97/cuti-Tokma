<?php
include("sess_check.php");
$pagedesc="Data Karyawan";
include "layout_top.php";

	if(isset($_GET['kry'])) {
		$sql = "SELECT karyawan.*, divisi.* FROM karyawan, divisi WHERE karyawan.div_id=divisi.div_id AND karyawan.kry_nip='". $_GET['kry'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}
?>
<script type="text/javascript">
	function checkNppAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
		url: "check_nppavailability.php",
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
			<h1 class="page-header">Data Karyawan</h1>
         </div>
         <!--end page header -->
     </div>
	 <div class="row">
		<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
	 </div>
	 <div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" action="karyawan_update.php" method="POST" enctype="multipart/form-data">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Edit Data</h4></div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-sm-3">NIP</label>
							<div class="col-sm-4">
								<input type="text" id="nip" name="nip" onBlur="checkNppAvailability()" class="form-control" placeholder="NIP" value="<?php echo $data['kry_nip'] ?>" required>
								<span id="user-availability-status" style="font-size:12px;"></span>
								<input type="hidden" name="niplama" class="form-control" placeholder="NPP" value="<?php echo $data['kry_nip'] ?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Nama</label>
							<div class="col-sm-4">
								<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['kry_nama'] ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Jenis Kelamin</label>
							<div class="col-sm-4">
								<select name="jk" id="jk" class="form-control" required>
									<option value="<?php echo $data['kry_jk'] ?>" selected><?php echo $data['kry_jk'] ?></option>
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Telepon</label>
							<div class="col-sm-4">
								<input type="number" name="telp" min="0" class="form-control" placeholder="Telepon" value="<?php echo $data['kry_telp'] ?>"required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Divisi</label>
							<div class="col-sm-4">
								<select name="divisi" id="divisi" class="form-control" required>
									<?php
									$mySql = "SELECT * FROM divisi ORDER BY div_nama ASC";
									$myQry = mysqli_query($conn, $mySql);
									$dataMerek = $data['div_id'];
									while ($myData = mysqli_fetch_array($myQry)) {
									if ($myData['div_id']== $dataMerek) {
										$cek = " selected";
									} else { $cek=""; }
										echo "<option value='$myData[div_id]' $cek>$myData[div_nama] </option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Jabatan</label>
							<div class="col-sm-4">
								<input type="text" name="jabatan" class="form-control" placeholder="Jabatan" value="<?php echo $data['kry_jabatan'] ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Alamat</label>
							<div class="col-sm-4">
								<textarea name="alamat" class="form-control" placeholder="Alamat" rows="3" required><?php echo $data['kry_alamat'] ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Jumlah Cuti</label>
							<div class="col-sm-4">
								<input type="number" name="jml" min="0" class="form-control" placeholder="Jumlah Cuti" value="<?php echo $data['kry_cuti'] ?>"required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Aktif</label>
							<div class="col-sm-4">
								<select name="aktif" id="aktif" class="form-control" required>
									<option value="<?php echo $data['kry_stt']; ?>" selected><?php echo $data['kry_stt']; ?></option>
									<option value="Aktif">Aktif</option>
									<option value="Tidak Aktif">Tidak Aktif</option>
								</select>
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
