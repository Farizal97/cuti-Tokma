<?php
	error_reporting(0);
	$nama = $sess_kname;
	$jml = 1;
	$name = implode(" ",array_slice(explode(" ",$nama), 0, $jml));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Pengajuan Cuti PT. Panca Tokma Lestari - <?php echo $pagedesc;?></title>
	<link href="../assets/img/tokma.jpg" rel="icon" type="images/x-icon">
    <!-- Core CSS - Include with every page -->
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="../assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="../assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="../assets/img/tokma.jpg" width="150" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x	"></i>
						
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i>Profil</a>
                        </li>
                        <li><a href="setting.php"><i class="fa fa-key fa-fw"></i>Ubah Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="../img/<?php echo $sess_kfoto;?>" class="img-circle elevation-2" alt="">
                            </div>
                            <div class="user-info">
                                <div><?php echo $name;?></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
					<?php 
					if($pagedesc=="Dashboard"){
						echo "<li class='selected'>";
					}else{
						echo "<li>";
					}?>							
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
					
					<?php 
						if($pagedesc=="Ajukan Cuti"||$pagedesc=="Menunggu Approval"||$pagedesc=="Approved"||$pagedesc=="Semua Data Cuti"){
							echo "<li class='active'>";
						}else{
							echo "<li>";
						}?>							
                        <a href="#"><i class="fa fa-random fa-fw"></i>Pengajuan Cuti<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
							<?php 
							if($pagedesc=="Ajukan Cuti"){
								echo "<li class='selected'>";
							}else{
								echo "<li>";
							}?>							
                                <a href="cuti_add.php">Ajukan Cuti</a>
                            </li>
							<?php 
							if($pagedesc=="Menunggu Approval"){
								echo "<li class='selected'>";
							}else{
								echo "<li>";
							}?>							
                                <a href="cuti_wait.php">Menunggu Approval</a>
                            </li>
							<?php 
							if($pagedesc=="Approved"){
								echo "<li class='selected'>";
							}else{
								echo "<li>";
							}?>							
                                <a href="cuti_app.php">Approved</a>
                            </li>
							<?php 
							if($pagedesc=="Semua Data Cuti"){
								echo "<li class='selected'>";
							}else{
								echo "<li>";
							}?>							
                                <a href="cuti.php">Semua Data Cuti</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
