      
	  <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
	
	<script type="text/javascript">
			 function formatangka(objek)
				{
				  a = objek.value;
					   b = a.replace(/\,/g, '');
				  c = "";
				  panjang = b.length;
				  j = 0;
				  for (i = panjang; i > 0; i--)
				  {
				   j = j + 1;
				   if (((j % 3) == 1) && (j != 1))
					  {
					   c = b.substr(i-1,1) + "," + c;
					  } else {
					  c = b.substr(i-1,1) + c;
					  }
						   }
			   objek.value = c;
			}

		</script>
		 <script src="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- 
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>jQuery 2.1.4 -->
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo"".base_url().""; ?>/assets/js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo"".base_url().""; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo"".base_url().""; ?>/assets/js/raphael-min.js"></script>
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo"".base_url().""; ?>/assets/js/moment.min.js"></script>
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo"".base_url().""; ?>/assets/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo"".base_url().""; ?>/assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo"".base_url().""; ?>/assets/dist/js/demo.js"></script>

	<script src="<?php echo"".base_url().""; ?>/assets/js/bootstrap-select.js"></script>
	<script src="<?php echo"".base_url().""; ?>/assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
	<script src="<?php echo"".base_url().""; ?>/assets/plugins/morris/morris.min.js"></script>
<!--	<script src="<?php echo"".base_url().""; ?>/assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script> 
    <script src="<?php echo"".base_url().""; ?>/assets/plugins/noty/jquery.noty.packaged.min.js"></script>  
   -->
	<script>
	setInterval(function(){
	$("#load_absensi_setuju_total").load('<?php echo base_url();?>/index.php/data_absensi/total_absensi_setuju')
	}, 2000); //menggunakan setinterval jumlah notifikasi akan selalu update setiap 2 detik diambil dari controller notifikasi fungsi load_row
	
	setInterval(function(){
	$("#load_absensi_setuju").load('<?php echo base_url();?>/index.php/data_absensi/load_absensi_setuju')
	}, 2000); //menggunakan setinterval jumlah notifikasi akan selalu update setiap 2 detik diambil dari controller notifikasi fungsi load_row
	
	
	</script>
	
	<script>
	setInterval(function(){
	$("#load_lembur_setuju_total").load('<?php echo base_url();?>/index.php/data_overtime/total_lembur_setuju')
	}, 2000); //menggunakan setinterval jumlah notifikasi akan selalu update setiap 2 detik diambil dari controller notifikasi fungsi load_row
	
	setInterval(function(){
	$("#load_lembur_setuju").load('<?php echo base_url();?>/index.php/data_overtime/load_lembur_setuju')
	}, 2000); //menggunakan setinterval jumlah notifikasi akan selalu update setiap 2 detik diambil dari controller notifikasi fungsi load_row
	
	
	</script>
	
	
	<script>
	setInterval(function(){
	$("#load_ijin_setuju_total").load('<?php echo base_url();?>/index.php/data_ijin/total_ijin_setuju')
	}, 2000); //menggunakan setinterval jumlah notifikasi akan selalu update setiap 2 detik diambil dari controller notifikasi fungsi load_row
	
	setInterval(function(){
	$("#load_ijin_setuju").load('<?php echo base_url();?>/index.php/data_ijin/load_ijin_setuju')
	}, 2000); //menggunakan setinterval jumlah notifikasi akan selalu update setiap 2 detik diambil dari controller notifikasi fungsi load_row
	
	
	</script>
	
		
	<script>
	setInterval(function(){
	$("#load_ijin_lupa_password_total").load('<?php echo base_url();?>/index.php/data_user/total_forgot_password')
	}, 2000); //menggunakan setinterval jumlah notifikasi akan selalu update setiap 2 detik diambil dari controller notifikasi fungsi load_row
	
	setInterval(function(){
	$("#load_ijin_lupa_password").load('<?php echo base_url();?>/index.php/data_user/load_total_forgot_password')
	}, 2000); //menggunakan setinterval jumlah notifikasi akan selalu update setiap 2 detik diambil dari controller notifikasi fungsi load_row
	
	
	</script>
	
	<script>
	
	
	  $.ajax({
                url     : '<?php echo base_url() ?>index.php/data_absensi/get_total_absensi',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						
                    $.each(data_master_equipment.data, function(i, item){
                        //$('#brands_get').append('<option value="'+item.id_brands+'">'+item.name_brands+'</option>');
						//console.log(item.total);
						//item.total;
						
                    })
                }
            })
			
	<?php
	 $sumber = 'http://localhost:85/mandiri//index.php/data_absensi/get_total_absensi/'.$this->session->userdata('id_user').'';
 $konten = file_get_contents($sumber);
 $data = json_decode($konten, true);

 //echo $data[1]["nama_lokasi"];
 
	$time=date("h:i:s");
		$jam=substr($time,0,2);
		$waktu=substr($time,3,2);
		if($this->session->userdata('user_level') != "admin"){
			
				$totalnya=$data['data'][0]['total'];
			
		if($jam > 8 && $waktu > 0 && $totalnya == 0){
			
			?>
			
				$("#tutup").hide();
					$("#ijinnya").hide();
			<?php
		}else{
	?>
	
	$("#tutup").show();
	$("#ijinnya").show();
	<?php
		}
		
		}else{
	?>
	$("#tutup").show();
	$("#ijinnya").show();
	<?php
		}
	?>
	</script>
	
	
  </body>
</html>
