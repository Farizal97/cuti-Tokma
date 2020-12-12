<?php
include("sess_check.php");
$pagedesc="Setting";
include "layout_top.php";

 $sql = "SELECT * FROM karyawan WHERE kry_nip='$sess_kryid'";
 $ress = mysqli_query($conn, $sql);
 $data = mysqli_fetch_array($ress);

?>
<div id="page-wrapper">
	<div class="row">
    <!-- page header -->
		<div class="col-lg-12">
			<h1 class="page-header">Pengaturan Akun</h1>
         </div>
         <!--end page header -->
     </div>
	 <div class="row">
		<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
	 </div>
	 <div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" action="profile_act.php" method="POST" enctype="multipart/form-data">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Update Akun</h4></div>
					<br/>
					<center><img src="../img/<?php echo $data['kry_foto'];?>" width="150px"></center>
					<br/>
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label col-sm-3">Nama User</label>
							<div class="col-sm-6">
								<input type="text" name="nama" class="form-control" value="<?php echo $data['kry_nama'] ?>" required>
								<input type="hidden" name="id" value="<?php echo $data['kry_nip'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">Foto</label>
							<div class="col-sm-6">
								<input type="file" name="foto" class="form-control" accept="image/*">
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
