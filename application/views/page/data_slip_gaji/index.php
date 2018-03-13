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
            DATA SLIP GAJI  
          </h1>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
           <li class="active">Data Slip Gaji </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-body">
						<div class="col-md-12">
									<form action="<?php echo base_url() ?>index.php/data_slip_gaji/search" method="POST">
								<table class="table table-bordered">
									<tr>
										
										
										<td>Pilih Bulan</td>
										<td style="width:250px">
												<select type="text" name="bulan" id="bulan" class="form-control">
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
												<select type="text" name="tahun" id="tahun" class="form-control">
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
						</div><!-- /.box-body -->
					
				</div>	
			</div>
			</div>		
			</div>		
        </section><!-- /.content -->
   
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
					"ajax": '<?php echo base_url() ?>/index.php/data_slip_gaji/get_data_slip_gaji',
					"columns": [
						{ "data": "data_user.0.first_name" },
						 /* { "data": "NOMOR_PENGAJUAN_PIB", 
							"render" : function(data){
										var data_array 					= data.split('-');
										var data_nomor_pengajuan 		= data_array[0];
										
                   							return '<a href="#"><button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal_bea_cukai" style="border-radius:0px;" onclick="edit_pib_bea_cukai('+data_array+')";><i class="fa fa-check"></i></button></a>'
						 }}, */
						 <?php
										if($this->session->userdata('user_level') == "admin"){
				
										?>
						{ "data": "id", 
						"render" : function(data){
							return '<a href="<?php echo base_url()?>index.php/data_slip_gaji/view_edit_data_slip_gaji/'+data+'"><button type="button" class="btn btn-success btn-sm"   style="border-radius:0px;" ><i class="fa fa-pencil-square-o"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="#"><button type="button" onclick="delete_master_shoes_category('+data+')" class="btn btn-danger btn-sm" style="border-radius:0px;" ><i class="fa fa-trash-o"></i></button></a>'
						}}
						
						<?php
										}
						?>
					]
			});
			

			
				
		});
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
	
     url_edit = '<?php echo base_url()?>index.php/data_slip_gaji/delete_data_slip_gaji/'+id,
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


	
