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
            DATA MASTER UNIT KERJA  
          </h1>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
           <li class="active">Data Master Unit Kerja </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-body">
							<h3 class="box-title">
								<a class="btn btn-primary " href="<?php echo base_url(); ?>index.php/data_master/input_master_data_unit_kerja" role="button" style="color:white"><i class="fa fa-plus-circle fa-1x"></i> &nbsp;&nbsp;Tambah Unit Kerja</a>
							</h3>
							
							<table class="table table-striped" id="data-brands">
								<thead>
									<tr>
										
										<th>Kode Unit Kerja</th>
										<th>Nama Unit Kerja</th>
										
										<th>Option</th>
										
										
									</tr>
								</thead>
								<tbody>
								
								</tbody>
							</table>
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
					"ajax": '<?php echo base_url() ?>/index.php/data_master/get_data_unit_kerja',
					"columns": [
						{ "data": "kode" },
							{ "data": "nama_unit_kerja" },
						
						
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
							return '<a href="<?php echo base_url()?>index.php/data_master/view_edit_data_master_unit_kerja/'+data+'"><button type="button" class="btn btn-success btn-sm"   style="border-radius:0px;" ><i class="fa fa-pencil-square-o"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="#"><button type="button" onclick="delete_master_shoes_category('+data+')" class="btn btn-danger btn-sm" style="border-radius:0px;" ><i class="fa fa-trash-o"></i></button></a>'
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
	
     url_edit = '<?php echo base_url()?>index.php/data_master/delete_master_unit_kerja/'+id,
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


	
