<?php
include("sess_check.php");
$pagedesc="Divisi";
include "layout_top.php";
?>
<div id="page-wrapper">
	<div class="row">
    <!--  page header -->
		<div class="col-lg-12">
			<h1 class="page-header">Data Divisi</h1>
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
				<div class="panel-heading">
					<a href="divisi_tambah.php" class="btn btn-primary">Tambah</a>
                 </div>
                 <div class="panel-body">
                 <div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Opsi</th>
                              </tr>
                         </thead>
                         <tbody>
						 <?php
							$i = 1;
							$sql = "SELECT * FROM divisi ORDER BY div_nama ASC";
							$ress = mysqli_query($conn, $sql);
							while($data = mysqli_fetch_array($ress)) {
							echo '<tr>';
							echo '<td class="text-center">'. $i .'</td>';
							echo '<td class="text-center">'. $data['div_nama'] .'</td>';
							echo '<td class="text-center">
								  <a href="divisi_edit.php?div='. $data['div_id'] .'" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>';?>
        						  <a href="divisi_hapus.php?div=<?php echo $data['div_id'];?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['div_nama'];?>?');" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash-o"></i></a></td>
							<?php
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
						$($this.data('remote-target')).load('karyawan_view.php?code='+code);
						app.code = code;
						
					}
		});		

</script>
</body>
</html>
