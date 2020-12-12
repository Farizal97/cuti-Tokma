<?php
include("sess_check.php");
$pagedesc="Divisi";
include "layout_top.php";

	if(isset($_POST['simpan'])) {
		$nama = addslashes($_POST['nama']);
		$sql = "INSERT INTO divisi(div_nama)VALUES('$nama')";
		$ress = mysqli_query($conn, $sql);		
		if($ress){
			echo "<script>alert('Tambah Data Berhasil!');</script>";
			echo "<script type='text/javascript'> document.location = 'divisi.php'; </script>";
		}else{
		//	echo("Error description: " . mysqli_error($conn));
			echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
			echo "<script type='text/javascript'> document.location = 'divisi_tambah.php'; </script>";
		}
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
			<h1 class="page-header">Data Divisi</h1>
         </div>
         <!--end page header -->
     </div>
	 <div class="row">
		<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
	 </div>
	 <div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Tambah Data</h4></div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-sm-3">Nama</label>
							<div class="col-sm-4">
								<input type="text" name="nama" class="form-control" placeholder="Nama" required>
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
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
