
  <body class="skin-blue sidebar-mini " onload="startTime()">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
				
            </div>
			<img src="<?php echo base_url(); ?>assets/dist/img/mandiri_oke.png" style="width:100px;height:50px">
        
        </div>
    </div>
    <div class="wrapper" >
      <header class="main-header" >
        <!-- Logo -->
        <a href="#" class="logo" style="">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini" ><b>A</b>DM</span>
          <!-- logo for regular state and mobile devices -->
        
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" >
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style='color:black' >
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu" >
            <ul class="nav navbar-nav">
				
					<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black">
					  <i class="fa fa-warning"></i>
					  <span class="label label-success" id="load_ijin_lupa_password_total"></span>
					</a>
					<ul class="dropdown-menu">
					  <li class="header" style="background-color:#90EE90"><b>Notifikasi User Lupa Password</b></li>
					  <li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu" id="load_ijin_lupa_password">
						  
						 
						</ul>
					  </li>
					   <li class="footer" style="background-color:#F0E68C"><a href="<?php echo base_url(); ?>/index.php/data_overtime/index_lembur_setuju" style="background-color:#F0E68C">View all</a></li>
					
					</ul>
				</li>
				
			   	<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black">
					  <i class="fa fa-archive"></i>
					  <span class="label label-success" id="load_ijin_setuju_total"></span>
					</a>
					<ul class="dropdown-menu">
					  <li class="header" style="background-color:#90EE90"><b>Ijin Sudah Disetujui</b></li>
					  <li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu" id="load_ijin_setuju">
						  
						 
						</ul>
					  </li>
					   <li class="footer" style="background-color:#F0E68C"><a href="<?php echo base_url(); ?>/index.php/data_ijin/index_setuju" style="background-color:#F0E68C">View all</a></li>
					</ul>
				</li>
				  
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black">
					  <i class="fa fa-calendar"></i>
					  <span class="label label-success" id="load_lembur_setuju_total"></span>
					</a>
					<ul class="dropdown-menu">
					  <li class="header" style="background-color:#90EE90"><b>Lembur Sudah Disetujui</b></li>
					  <li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu" id="load_lembur_setuju">
						  
						 
						</ul>
					  </li>
					   <li class="footer" style="background-color:#F0E68C"><a href="<?php echo base_url(); ?>/index.php/data_overtime/index_lembur_setuju" style="background-color:#F0E68C">View all</a></li>
					
					</ul>
				</li>
				
				<li class="dropdown notifications-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:black">
					  <i class="fa fa-check-square-o"></i>
					  <span class="label label-success" id="load_absensi_setuju_total"></span>
					</a>
					<ul class="dropdown-menu" >
					  <li class="header" style="background-color:#90EE90"><b>Absensi Sudah Disetujui</b></li>
					  <li>
						<!-- inner menu: contains the actual data -->
						<ul class="menu" id="load_absensi_setuju" >
						  
						 
						</ul>
					  </li>
					  <?php
		if($this->session->userdata('user_level') == "admin"){
		?>
					  <li class="footer" style="background-color:#F0E68C"><a href="<?php echo base_url(); ?>/index.php/data_absensi/index_admin" style="background-color:#F0E68C">View all</a></li>
				<?php
		}else{
				?>
				  <li class="footer" style="background-color:#F0E68C"><a href="<?php echo base_url(); ?>/index.php/data_absensi/index" style="background-color:#F0E68C">View all</a></li>
		<?php
		}
		?>
					</ul>
				</li>
				  
            </ul>
          </div>
        </nav>
      </header>
  <aside class="main-sidebar" style="">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image">
          <img src="<?php echo base_url();?>/assets/dist/img/mandiri_oke.png" class="logo" alt="User Image">
        </div>
        <div class="image">
          <img src="<?php echo base_url();?>/upload/foto_user/<?php echo $this->session->userdata('gambar'); ?>" class="img-circle" alt="User Image" style="height:100px;width:200px">
        </div>
        <div class="info" style="left:0;width:100%">
          <center><p style="font-size:14pt"><?php echo $this->session->userdata('nama'); ?></p>
         <center><p style="font-size:14pt"><?php echo $this->session->userdata('jabatan_nama'); ?></p>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="background-color: #18365E">
          <button style="border-radius: 10%; border:0px; background-color:#FAD048;font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: 400;" onclick="location.href='<?php echo base_url() ?>index.php/data_user/view_profil/<?php echo $this->session->userdata('id_user') ;?>'">My Profile</button>
        </li>

        <li class="treeview" >
		  <div style="border-top:solid 1px white;width:205px;margin-left:10px"></div>
          <a href="<?php echo base_url(); ?>/index.php/home">
            <i class="fa fa-home" style="color:#FAD048"></i>
            <span>Home</span>
            <span class="pull-right-container">
             
            </span>
          </a>
		  <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		<!--
		 <li class="treeview">
          <a href="#">
             <i class="fa fa-calendar" style="color:#FAD048"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right" style="padding-right:10px"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>/index.php/data_master/index_master_jabatan"><i class="fa fa-circle-o"></i>Master Jabatan</a></li>
            <li><a href="<?php echo base_url(); ?>/index.php/data_master/index_unit_kerja"><i class="fa fa-circle-o"></i>Master Unit Kerja</a></li>
           <li><a href="<?php echo base_url(); ?>/index.php/data_master/index_perijinan"><i class="fa fa-circle-o"></i>Master Data Perijinan</a></li>
           
          </ul>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		-->
	
			<li class="treeview " id="">
          <a href="#">
             <i class="fa fa-archive" style="color:#FAD048"></i>
            <span>Ijin</span>
            <span class="pull-right-container" > 
                  <i class="fa fa-angle-down pull-right" style="padding-right:10px"></i>
                </span>
          </a>
		  
          <ul class="treeview-menu " >
            <li><a href="<?php echo base_url(); ?>/index.php/data_ijin/input_data_ijin"><i class="fa fa-circle-o"></i> Pengajuan Ijin</a></li>
            <li><a href="<?php echo base_url(); ?>/index.php/data_ijin/index"><i class="fa fa-circle-o"></i> Data Pengajuan Ijin</a></li>
			 <li><a href="<?php echo base_url(); ?>/index.php/data_ijin/pengajuan_ijin_cepat"><i class="fa fa-circle-o"></i>Pengajuan Ijin Cepat</a></li>
			
           
          </ul>

		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
			
		
		
       <li class="treeview">
          <a href="#">
             <i class="fa fa-calendar" style="color:#FAD048"></i>
            <span>Lembur</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right" style="padding-right:10px"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>/index.php/data_overtime/input_data_overtime"><i class="fa fa-circle-o"></i> Input Lembur</a></li>
            <li><a href="<?php echo base_url(); ?>/index.php/data_overtime/index"><i class="fa fa-circle-o"></i> Data Lembur</a></li>
           
          </ul>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		
		
		
      
		<!--
        <li class="treeview">
          <a href="<?php echo base_url(); ?>/index.php/index">
            <i class="fa fa-info-circle" style="color:#FAD048"></i>
            <span>HC Info</span>
            <span class="pull-right-container">
             
            </span>
          </a>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>-->
	
		
		<?php
		if($this->session->userdata('user_level') == "admin"){
		?>
		<li class="treeview">
		
          <a href="<?php echo base_url(); ?>/index.php/data_absensi/index_admin">
            <i class="fa  fa-check-square-o" style="color:#FAD048"></i>
            <span>Data Absensi</span>
            <span class="pull-right-container">
            
            </span>
          </a>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		
		<?php
		}else{
		?>
			
		<li class="treeview">
		
          <a href="<?php echo base_url(); ?>/index.php/data_absensi/index">
            <i class="fa fa-check-square-o" style="color:#FAD048"></i>
            <span>Data Absensi</span>
            <span class="pull-right-container">
            
            </span>
          </a>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		<?php
		}
		?>
		   <li class="treeview">
          <a href="#">
             <i class="fa fa-check" style="color:#FAD048"></i>
            <span>Approval Delegated</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right" style="padding-right:10px"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>/index.php/data_approval_delegated/index"><i class="fa fa-circle-o"></i>Approval Perijinan</a></li>
            <li><a href="<?php echo base_url(); ?>/index.php/data_approval_delegated/index_absensi"><i class="fa fa-circle-o"></i>Approval Absensi</a></li>
             <li><a href="<?php echo base_url(); ?>/index.php/data_approval_delegated/index_lembur"><i class="fa fa-circle-o"></i>Approval Lembur</a></li>
          </ul>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>	
		<?php
		if($this->session->userdata('jabatan') == 1){
			
		}else{
		?>
		   <li class="treeview">
          <a href="#">
             <i class="fa fa-check" style="color:#FAD048"></i>
            <span>Approval</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right" style="padding-right:10px"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>/index.php/data_approval/index"><i class="fa fa-circle-o"></i>Approval Perijinan</a></li>
            <li><a href="<?php echo base_url(); ?>/index.php/data_approval/index_absensi"><i class="fa fa-circle-o"></i>Approval Absensi</a></li>
             <li><a href="<?php echo base_url(); ?>/index.php/data_approval/index_lembur"><i class="fa fa-circle-o"></i>Approval Lembur</a></li>
          </ul>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		<!--
 <li class="treeview">
          <a href="#">
             <i class="fa fa-warning" style="color:#FAD048"></i>
            <span>Reject Approval</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right" style="padding-right:10px"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>/index.php/data_reject_approval/index"><i class="fa fa-circle-o"></i>Reject Approval Perijinan</a></li>
            <li><a href="<?php echo base_url(); ?>/index.php/data_reject_approval/index_absensi"><i class="fa fa-circle-o"></i>Reject Approval Absensi</a></li>
             <li><a href="<?php echo base_url(); ?>/index.php/data_reject_approval/index_lembur"><i class="fa fa-circle-o"></i>Reject Approval Lembur</a></li>
          </ul>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		-->
		<?php
		
		}
		?>
			<li class="treeview">
          <a href="#">
             <i class="fa fa-cog" style="color:#FAD048"></i>
            <span>HC Info</span>
            <span class="pull-right-container" > 
                  <i class="fa fa-angle-down pull-right" style="padding-right:10px"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>/index.php/data_hc_info/index_struktur"><i class="fa fa-circle-o"></i>Struktur Organisasi</a></li>
			  <li><a href="<?php echo base_url(); ?>/index.php/data_hc_info/index_tutorial"><i class="fa fa-circle-o"></i>Tutorial</a></li>
            <li><a href="<?php echo base_url(); ?>/index.php/data_hc_info/index_visi_misi"><i class="fa fa-circle-o"></i>Visi Misi</a></li>
           <li><a href="<?php echo base_url(); ?>/index.php/data_hc_info/index_budaya_kerja"><i class="fa fa-circle-o"></i>Budaya Kerja</a></li>
          </ul>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
				  <?php
		if($this->session->userdata('user_level') == "admin"){
		?>
			<li class="treeview">
		
          <a href="<?php echo base_url(); ?>/index.php/data_bpjs/index">
            <i class="fa fa-folder-o" style="color:#FAD048"></i>
            <span>BPJS</span>
            <span class="pull-right-container">
            
            </span>
          </a>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
			<?php
		}else{
			?>
		<li class="treeview">
		
          <a href="<?php echo base_url(); ?>/index.php/data_bpjs/index_staff">
            <i class="fa fa-folder-o" style="color:#FAD048"></i>
            <span>BPJS</span>
            <span class="pull-right-container">
            
            </span>
          </a>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		<?php
		
		}
		?>
		<li class="treeview " id="">
          <a href="#">
             <i class="fa fa-archive" style="color:#FAD048"></i>
            <span>Delegated</span>
            <span class="pull-right-container" > 
                  <i class="fa fa-angle-down pull-right" style="padding-right:10px"></i>
                </span>
          </a>
		  
          <ul class="treeview-menu " >
		    <li><a href="<?php echo base_url(); ?>/index.php/delegated/input_delegated"><i class="fa fa-circle-o"></i>Input Delegated</a></li>
			
           
            <li><a href="<?php echo base_url(); ?>/index.php/delegated/index"><i class="fa fa-circle-o"></i>Data Delegated</a></li>
          
          </ul>

		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		
			<li class="treeview">
		
          <a href="<?php echo base_url(); ?>/index.php/data_slip_gaji/index">
            <i class="fa fa-money" style="color:#FAD048"></i>
            <span>Slip Gaji</span>
            <span class="pull-right-container">
            
            </span>
          </a>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		<?php
		if($this->session->userdata('user_level') == "admin"){
		?>
	 <li class="treeview">
          <a href="#">
             <i class="fa fa-calendar" style="color:#FAD048"></i>
            <span>Rekap</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-down pull-right" style="padding-right:10px"></i>
                </span>
          </a>
          <ul class="treeview-menu">
		  <li><a href="<?php echo base_url(); ?>/index.php/data_rekap/rekap_absensi"><i class="fa fa-circle-o"></i>Rekap Absensi</a></li>
            
            <li><a href="<?php echo base_url(); ?>/index.php/data_rekap/rekap_ijin"><i class="fa fa-circle-o"></i>Rekap Ijin</a></li>
            <li><a href="<?php echo base_url(); ?>/index.php/data_rekap/rekap_lembur"><i class="fa fa-circle-o"></i> Rekap Lembur</a></li>
           
          </ul>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
	
		
		<li class="treeview">
		
          <a href="<?php echo base_url(); ?>/index.php/data_user/index">
            <i class="fa fa-user" style="color:#FAD048"></i>
            <span>Data User</span>
            <span class="pull-right-container">
            
            </span>
          </a>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		
		<?php
		}
		?>
    
		<?php
		$tanggal=date('d');
		if($tanggal == 1 || $tanggal == 2 || $tanggal == 3){
		?>
		<li class="treeview">
		
          <a href="<?php echo base_url(); ?>/index.php/data_user/view_edit_data_user/<?php echo $this->session->userdata('id_user'); ?>">
            <i class="fa fa-folder-o" style="color:#FAD048"></i>
            <span>Ganti Password</span>
            <span class="pull-right-container">
            
            </span>
          </a>
		   <div style="border-bottom:solid 1px white;width:205px;margin-left:10px"></div>
        </li>
		<?php
		}else{
			
			
		}
		?>
		<br /><br />
    
		  <li class="treeview" style="text-align:center;background-color:#FFD700">
		
          <a href="<?php echo base_url() ?>index.php/login/logout">
           
            <span style="color:black;padding-right:20PX">Logout</span>
            <span class="pull-right-container">
            
            </span>
          </a>
		   
        </li>
		
      </ul>
	  
    </section>
    <!-- /.sidebar -->
  </aside>

	<script src="<?php echo"".base_url().""; ?>/assets/js/jquery.min.js" type="text/javascript"></script>
	  <script>
		$("#logout").click(function() {
            localStorage.removeItem("data_user");
			localStorage.removeItem("time_expired");
			localStorage.removeItem("time_expired_hours");
			
			location.href="<?php echo base_url() ?>index.php/backoffice";
        });
	  </script>