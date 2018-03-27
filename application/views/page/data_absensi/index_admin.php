    <style>
		.datepicker{
			z-index:1151 !important;
		}
	</style>
	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DATA ABSENSI  
          </h1>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
           <li class="active">Data Absensi </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-body">

							<ul class="nav nav-tabs">
				              <li class="active"><a href="#tab_1" data-toggle="tab">Data Absensi</a></li>
				              <li><a href="#tab_2" data-toggle="tab">Data Izin Cepat</a></li>
				            
				              <!-- <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
				            </ul>
				            <div class="tab-content">
              					<div class="tab-pane active" id="tab_1">
								<form action="<?php echo base_url() ?>index.php/data_absensi/search_admin" method="POST">
								<table class="table table-bordered">
									<tr>
									
										
										<td>Pilih Bulan</td>
										<td style="width:250px">
												<select type="text" name="bulan" id="bulan" class="form-control" required>
													<option value="">Pilih Bulan</option>
													<option value="01">Januari</option>
													<option value="02">Februari</option>
													<option value="03">Maret</option>
													<option value="04">April</option>
													<option value="05">Mei</option>
													<option value="06">Juni</option>
													<option value="07">Juli</option>
													<option value="08">Agustus</option>
													<option value="09">September</option>
													<option value="10">Oktober</option>
													<option value="11">November</option>
													<option value="12">Desember</option>
													
												</select>
											
										</td>
										
										<td>Pilih Tahun</td>
										<td style="width:250px">
											<div class="form-group">
												<select type="text" name="tahun" id="tahun" class="form-control" required>
													<option value="">Pilih Tahun</option>
													<?php
													for($i=2017;$i<=2050;$i++){
														echo"<option value='$i'>$i</option>";
													}
													?>
												</select> 
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="6"><button class="btn btn-primary" type="submit">Search</button></td>
									</tr>
								</table>
							</form>
							<div  style="width:100%;overflow:scroll">
								<table class="table table-bordered" id="">
								<thead>
								<tr>
									<td rowspan="2" style="background-color:#18365E;color:white;border:1px solid #FFD700">Nama Pegawai</td>
									<td COLSPAN="31" style="text-align:center;background-color:#18365E;color:white;border:1px solid #FFD700"><b>TANGGAL ABSENSI</b></td>
								</tr>
									<tr>
										
										<?php
										if($search == 0){
											$date = date('t');
											for($i=1;$i<=$date;$i++){
												echo"<td style=\"text-align:center;background-color:#18365E;color:white;border:1px solid #FFD700\"><b>$i</b></td>";
											}	
										}else if($search == 1){
											for($i=1;$i<=$enddate;$i++){
												echo"<td style=\"text-align:center;background-color:#18365E;color:white;border:1px solid #FFD700\"><b>$i</b></td>";
											}
										}else{
											$date = date('t');
											for($i=1;$i<=$date;$i++){
												echo"<td style=\"text-align:center;background-color:#18365E;color:white;border:1px solid #FFD700\"><b>$i</b></td>";
											}
										}
										
										?>
									</tr>
								</thead>
								<tbody>
								<?PHP
								
								$a=0;
								
									
										foreach($data as $val_2){
								
												echo"
												<tr>
												<td >
												".$val_2['first_name']."
												</td>";
												
												
												
												
									if($search == 0){
											$date = date('t');
											for($i=1;$i<=$date;$i++){
										
											if(isset($val_2['data_absensi'][$i][0]['id'])){
											$id=$val_2['data_absensi'][$i][0]['id'];
											$link="".base_url()."index.php/data_absensi/detail_absensi/".$id."/1";
											}else{
												$id=0;
												$link="#";
											}
										
													if(isset($val_2['data_absensi'][$i][0]['jam_masuk'])){
														$jam_masuk_set=$val_2['data_absensi'][$i][0]['jam_masuk'];
														$jam_masuk = substr($jam_masuk_set, 0,-3);
													}else{
														$jam_masuk="00:00";
													}
													
													if(isset($val_2['data_absensi'][$i][0]['jam_keluar'])){
														$jam_keluar_set=$val_2['data_absensi'][$i][0]['jam_keluar'];
														$jam_keluar = substr($jam_keluar_set, 0,-3);
													}else{
														$jam_keluar="00:00";
													}
													
															
													echo"
													<td>
														<a href='$link'>".$jam_masuk." </a><br /><a href='$link'>".$jam_keluar." </a> 
														
													</td>
													";
										}	
									}else if($search == 1){
											for($i=1;$i<=$enddate;$i++){
										
											if(isset($val_2['data_absensi'][$i][0]['id'])){
											$id=$val_2['data_absensi'][$i][0]['id'];
											$link="".base_url()."index.php/data_absensi/detail_absensi/".$id."/1";
											}else{
												$id=0;
												$link="#";
											}
										
													if(isset($val_2['data_absensi'][$i][0]['jam_masuk'])){
														$jam_masuk_set=$val_2['data_absensi'][$i][0]['jam_masuk'];
														$jam_masuk = substr($jam_masuk_set, 0,-3);
													}else{
														$jam_masuk="00:00";
													}
													
													if(isset($val_2['data_absensi'][$i][0]['jam_keluar'])){
														$jam_keluar_set=$val_2['data_absensi'][$i][0]['jam_keluar'];
														$jam_keluar = substr($jam_keluar_set, 0,-3);
													}else{
														$jam_keluar="00:00";
													}
													
															
													echo"
													<td>
														<a href='$link'>".$jam_masuk." </a><br /><a href='$link'>".$jam_keluar." </a> 
														
													</td>
													";
										}
									}else{
											$date = date('t');
											for($i=1;$i<=$date;$i++){
										
											if(isset($val_2['data_absensi'][$i][0]['id'])){
											$id=$val_2['data_absensi'][$i][0]['id'];
											$link="".base_url()."index.php/data_absensi/detail_absensi/".$id."/1";
											}else{
												$id=0;
												$link="#";
											}
										
													if(isset($val_2['data_absensi'][$i][0]['jam_masuk'])){
														$jam_masuk_set=$val_2['data_absensi'][$i][0]['jam_masuk'];
														$jam_masuk = substr($jam_masuk_set, 0,-3);
													}else{
														$jam_masuk="00:00";
													}
													
													if(isset($val_2['data_absensi'][$i][0]['jam_keluar'])){
														$jam_keluar_set=$val_2['data_absensi'][$i][0]['jam_keluar'];
														$jam_keluar = substr($jam_keluar_set, 0,-3);
													}else{
														$jam_keluar="00:00";
													}
													
															
													echo"
													<td>
														<a href='$link'>".$jam_masuk." </a><br /><a href='$link'>".$jam_keluar." </a> 
														
													</td>
													";
										}	
									}									
												
														
												echo"
												</tr>
												";
												$a++;
										}
							
								?>
								</tbody>
							</table>
							<!-- <table class="table table-striped" id="data-absen">
									<thead>
									<tr>
										<td rowspan="2" style="background-color:#18365E;color:white;border:1px solid #FFD700">Nama Pegawai</td>
										<td COLSPAN="31" style="text-align:center;background-color:#18365E;color:white;border:1px solid #FFD700"><b>TANGGAL ABSENSI</b></td>
									</tr>
										<tr>
											
											<?php
											if($search == 0){
												$date = date('t');
												for($i=1;$i<=$date;$i++){
													echo"<td style=\"text-align:center;background-color:#18365E;color:white;border:1px solid #FFD700\"><b>$i</b></td>";
												}	
											}else if($search == 1){
												for($i=1;$i<=$enddate;$i++){
													echo"<td style=\"text-align:center;background-color:#18365E;color:white;border:1px solid #FFD700\"><b>$i</b></td>";
												}
											}else{
												$date = date('t');
												for($i=1;$i<=$date;$i++){
													echo"<td style=\"text-align:center;background-color:#18365E;color:white;border:1px solid #FFD700\"><b>$i</b></td>";
												}
											}
											
											?>
										</tr>
									</thead>
									<tbody>
									
									</tbody>
							</table> -->
							</div>
							</div>

							<div class="tab-pane" id="tab_2">
								<br>
								<table class="table table-striped" id="data-brands">
									<thead>
										<tr>
											<th>Nama Pegawai</th>
											<th>Tanggal Mulai Absensi</th>
											<th>Tanggal Selesai Absensi</th>
											
										</tr>
									</thead>
									<tbody>
									
									</tbody>
								</table>
							</div>

							</div>


							
						</div><!-- /.box-body -->
					</div><!-- /.box -->
				</div>	
			</div>
					
				
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
		
	<script src="<?php echo"".base_url().""; ?>/assets/js/jquery.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function(){ 
			$("#data-brands").dataTable({
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": true,
					"bAutoWidth": false,
					"processing": true,
					"ajax": '<?php echo base_url() ?>/index.php/data_absensi/get_data_absensi_pulang_cepat',
					"columns": [
						{ "data": "username" },
						{ "data": "start_date" },
						{ "data": "end_date" }
						
					]
			});
			

			
				
		});
	</script>
	<script>
		$(document).ready(function(){ 
			$("#data-absen").dataTable({
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": true,
					"bAutoWidth": false,
					"processing": true,
					"ajax": '<?php echo base_url() ?>/index.php/data_absensi/get_data_absensis',
					"columns": [
						{ "data": "username" },
						{ "data": "start_date" },
						{ "data": "end_date" }
						
					]
			});
			

			
				
		});
	</script>
	
	<script>
		function delete_master_shoes_category(id){
				var x;
				if (confirm("Do You Will Delete This Data??") == true) {
					url_edit = '<?php echo base_url()?>index.php/shoes_index_controller/delete_shoes_index/'+id,
					$.getJSON(url_edit, function (data){
						alert(data.result);
						location.reload();
					})
				} else {
					
				}
			}
	</script>
	<script>
		function delete_master_shoes_category(id){
	swal({   
    title: "Konfirmasi Penghapusan Data",   
    text: "Apakah Anda Akan Menghapus Data Ini?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55", 
    confirmButtonText: "Hapus",   
    cancelButtonText: "Cancel",   
    closeOnConfirm: false,   
    closeOnCancel: false 
}, function(isConfirm){   
    if (isConfirm) {
	
      url_edit = '<?php echo base_url()?>index.php/data_ijin/delete_ijin/'+id,
						$.getJSON(url_edit, function (data){
						sweetAlert({
	                                                   title: "Berhasil!", 
                                                        text: "Data Berhasil dihapus!", 
                                                        type: "success",
														
														 timer: 1200,
														 showCancelButton: false,//There won't be any cancle button
															showConfirmButton  : false ,
                                                        }
														, function() {
																	location.reload();
																}
														);
					})
    }else{
        swal({title:"Cancelled",text:"", type:"error"},function(){
            location.reload();
        });
    }
});
			}
	</script>
     <script src="<?php echo"".base_url().""; ?>/assets/js/admin.js"></script>
	

	   <script src="<?php echo"".base_url().""; ?>/assets/plugins/node-waves/waves.js"></script>


	
