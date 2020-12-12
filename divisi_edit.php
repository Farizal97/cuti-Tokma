<?php
include("sess_check.php");
$pagedesc="Divisi";
include "layout_top.php";

	if(isset($_GET['div'])) {
		$sql = "SELECT * FROM divisi WHERE div_id='". $_GET['div'] ."'";
		$ress = mysqli_query($conn, $sql);
		$data = mysqli_fetch_array($ress);
	}

	if(isset($_POST['perbarui'])) {
		$nama = addslashes($_POST['nama']);
		$id = addslashes($_POST['id']);
		$sql = "UPDATE divisi SET div_nama='". $nama ."' WHERE div_id='". $id ."'";
		$ress = mysqli_query($conn, $sql);		
		if($ress){
			echo "<script>alert('Update Data Berhasil!');</script>";
			echo "<script type='text/javascript'> document.location = 'divisi.php'; </script>";
		}else{
		//	echo("Error description: " . mysqli_error($conn));
			echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
			echo "<script type='text/javascript'> document.location = 'divisi_edit.php?div=$id'; </script>";
		}
	}


?>
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
					<div class="panel-heading"><h4>Edit Data</h4></div>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-sm-3">Nama</label>
							<div class="col-sm-4">
								<input type="hidden" name="id" class="form-control" placeholder="Nama" value="<?php echo $data['div_id'];?>" required>
								<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['div_nama'];?>" required>
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
