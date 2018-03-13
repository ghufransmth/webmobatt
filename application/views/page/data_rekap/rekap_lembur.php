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
            Cari Data Rekap Lembur  
          </h1>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
           <li class="active">Data Rekap Lembur </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-body">
							
							<form action="<?php echo base_url(); ?>/index.php/data_rekap/print_rekap_lembur" method="POST" target="_blank">
								<table class="table table-bordered">
									<tr>
										<td>Pilih Pegawai</td>
										<td style="width:250px">
												<select type="text" name="id_pegawai" id="id_pegawai"  class="form-control selectpicker" data-live-search="true">

												</select>
										
										</td>
										
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
					"ajax": '<?php echo base_url() ?>/index.php/data_ijin/get_data_ijin',
					"columns": [
						{ "data": "first_name" },
						{ "data": "start_date" },
						{ "data": "end_date" },
						{ "data": "data_ijin_list.0.reason_desc" },
						{ "data": "data_approval_status" },
						{ "data": "data_action" }
						
						
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
<script>
  $.ajax({
                url     : '<?php echo base_url(); ?>index.php/data_user/get_data_user',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						$('#id_pegawai').append('<option value="0">Pilih Nama Pegawai</option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#id_pegawai').append('<option value="'+item.id+'">'+item.first_name+'</option>');
                    })
                }
            })

</script>

	
