
<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url() ?>assets/img/data.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">PT Abadi Jaya Manunggal</strong>
                             </span> <span class="text-muted text-xs block">Setting <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            
                            <li><a href="mailbox.html">Data Profil</a></li>
                            <li class="divider"></li>
                            <li><a href="#" id="logout2">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        AJM
                    </div>
                </li>
                <!--<li class="active"> -->
				<li>
                    <a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
                </li>
				<li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Data Master</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
						<li><a href="<?php echo base_url() ?>index.php/data_pelamar">Data Master Pelamar</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/data_pegawai">Data Master Karyawan</a></li>
							 <li><a href="<?php echo base_url() ?>index.php/data_pegawai_keluar">Data Karyawan Keluar</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/data_posisi">Data Master Posisi</a></li>
                        <li><a href="<?php echo base_url() ?>index.php/data_devisi">Data Master Divisi</a></li>
					
                    </ul>
                </li>
				
				<li>
                    <a href="index.html"><i class="fa fa-calendar"></i> <span class="nav-label">Data Absensi</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo base_url() ?>index.php/data_absensi">Data Absensi </a></li>
						<li><a href="<?php echo base_url() ?>index.php/data_pegawai">Data Absensi Ijin</a></li>
						<li><a href="<?php echo base_url() ?>index.php/data_pegawai">Data Absensi Sakit</a></li>
						<li><a href="<?php echo base_url() ?>index.php/data_pegawai">Data Absensi Alpha</a></li>
                    </ul>
                </li>
				
               
				<!--<li>
                    <a href="layouts.html"><i class="fa fa-money"></i> <span class="nav-label">Data Gaji Karyawan</span></a>
                </li>-->
                <li>
                    <a href="<?php echo base_url() ?>index.php/data_user"><i class="fa fa-user"></i> <span class="nav-label">Management User</span> </a>
                </li>
                
                
            </ul>

        </div>
    </nav>
		<div id="page-wrapper" class="gray-bg">
		
		 <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" method="post" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    Welcome To <b><?php echo $this->session->userdata('nama_user'); ?></b>
                </li>
              
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="#" id="logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>