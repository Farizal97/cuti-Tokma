<?php
include("sess_check.php");
$pagedesc="Dashboard";
include "layout_top.php";

	//waiting approval
	$sqlw = "SELECT * FROM cuti WHERE cuti_stt='Menunggu Approval HRD'";
	$ressw = mysqli_query($conn, $sqlw);
	$wait = mysqli_num_rows($ressw);

	//approved
	$sqla = "SELECT * FROM cuti WHERE cuti_stt='Approved'";
	$ressa = mysqli_query($conn, $sqla);
	$app = mysqli_num_rows($ressa);

	//all
	$sql = "SELECT * FROM cuti";
	$ress = mysqli_query($conn, $sql);
	$all = mysqli_num_rows($ress);

	//kry
	$sqlk = "SELECT * FROM karyawan WHERE kry_stt='Aktif'";
	$ressk = mysqli_query($conn, $sqlk);
	$kry = mysqli_num_rows($ressk);
?>
 <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle"></i><b>&nbsp;Halo! </b>Selamat datang kembali <b><?php echo $sess_username;?> </b>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>


            <div class="row">
                <!--quick info section -->
                <div class="col-lg-3">
                    <div class="alert alert-danger text-center">
                        <i class="fa fa-users fa-3x"></i>&nbsp;<a href="karyawan.php"><b><?php echo $kry;?></b> Total Karyawan</a>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-info text-center">
                        <i class="fa fa-plus-circle fa-3x"></i>&nbsp;<a href="cuti.php"><b><?php echo $all;?></b> Total Pengajuan</a>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                        <i class="fa  fa-rss fa-3x"></i>&nbsp;<a href="cuti_wait.php"><b><?php echo $wait;?> </b>Menunggu Approval</a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-success text-center">
                        <i class="fa  fa-check-circle fa-3x"></i>&nbsp;<a href="cuti_app.php"><b><b><?php echo $app;?> </b>Approved  </a>
                    </div>
                </div>
                <!--end quick info section -->
            </div>

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
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>
</html>
