<?php
	include("sess_check.php");
	$pagedesc="Approved";
	include "layout_top.php";
?>
<div id="page-wrapper">
	<div class="row">
    <!--  page header -->
		<div class="col-lg-12">
			<h1 class="page-header">Data Cuti</h1>
        </div>
	<!-- end  page header -->
    </div>
	 <div class="row">
		<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
	 </div>
     <div class="row">
		<div class="col-lg-12">
        <!-- Advanced Tables -->
			<div class="panel panel-default">
			<div class="panel-heading"><h4>Menunggu Approval</h4></div>
                 <div class="panel-body">
                 <div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th class="text-center">No</th>
                                <th class="text-center">Cuti ID</th>
                                <th class="text-center">Pemohon</th>
                                <th class="text-center">Tgl. Pengajuan</th>
                                <th class="text-center">Tgl. Mulai</th>
                                <th class="text-center">Tgl. Selesai</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Opsi</th>
                              </tr>
                         </thead>
                         <tbody>
						 <?php
							$i = 1;
							$sql = "SELECT cuti.*, karyawan.* FROM cuti, karyawan WHERE cuti.kry_nip=karyawan.kry_nip AND cuti.cuti_stt='Approved' ORDER BY cuti.cuti_tgl DESC";
							$ress = mysqli_query($conn, $sql);
							while($data = mysqli_fetch_array($ress)) {
							echo '<tr>';
							echo '<td class="text-center">'. $i .'</td>';
							echo '<td class="text-center">'. $data['cuti_id'] .'</td>';
							echo '<td class="text-center">
								<a href="#myModal" data-toggle="modal" data-load-nip="'.$data['kry_nip'].'" data-remote-target="#myModal .modal-body">'.$data['kry_nama'].'</a></td>';
							echo '<td class="text-center">'. IndonesiaTgl($data['cuti_tgl']) .'</td>';
							echo '<td class="text-center">'. IndonesiaTgl($data['cuti_mulai']) .'</td>';
							echo '<td class="text-center">'. IndonesiaTgl($data['cuti_akhir']) .'</td>';
							echo '<td class="text-left">'. $data['cuti_ket'] .'</td>';
							echo '<td class="text-left">'. $data['cuti_stt'] .'</td>';
							echo '<td class="text-center">
								  <a href="#myModal" data-toggle="modal" data-load-id="'.$data['cuti_id'].'" data-remote-target="#myModal .modal-body" class="btn btn-info btn-circle btn-sm"><i class="fa fa-info-circle"></i></a></td>';
							echo '</tr>';
							$i++;
							}
							?>
						</tbody>
                       </table>
                     </div> 
					 </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

		<!-- Large modal -->
			<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body">
							<p>Sedang memproses…</p>
						</div>
					</div>
				</div>
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
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
<script>
		var app = {
			code: '0'
		};
		
		$('[data-load-id]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var code = $this.data('load-id');
					if(code) {
						$($this.data('remote-target')).load('cuti_view.php?code='+code);
						app.code = code;
						
					}
		});		

		$('[data-load-nip]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var code = $this.data('load-nip');
					if(code) {
						$($this.data('remote-target')).load('karyawan_view.php?code='+code);
						app.code = code;
						
					}
		});		
</script>
</body>
</html>