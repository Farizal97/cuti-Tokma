<?php
include("sess_check.php");
$pagedesc="Setting";
include "layout_top.php";

 $sql = "SELECT * FROM admin WHERE id_adm='$sess_userid'";
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
			<form class="form-horizontal" action="setting_act.php" method="POST" enctype="multipart/form-data">
				<div class="panel panel-default">
					<div class="panel-heading"><h4>Update Password</h4></div>
					<div class="panel-body">
						<div class="form-group row">
							<label class="col-form-label col-sm-3" align="right">Password Lama</label>
							<div class="col-sm-6">
								<input type="password" name="password_old" class="form-control" placeholder="Password Lama" required>
								<input type="hidden" name="password_old2" value="<?php echo $data['password'] ?>">
								<input type="hidden" name="id_pengguna" value="<?php echo $data['id_adm'] ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-sm-3" align="right">Password Baru</label>
							<div class="col-sm-6">
								<input type="password" name="password_new" class="form-control" placeholder="Password Baru" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-sm-3" align="right">Ulangi Password</label>
							<div class="col-sm-6">
								<input type="password" name="password_new2" class="form-control" placeholder="Ulangi Password Baru" required>
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
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
