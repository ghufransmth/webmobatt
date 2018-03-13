<!--
#atasan_1 merupakan atasan dari jabatan
#atasan_2 merupakan nama atasannya


-->
<?php
foreach($data as $val){
	$id=$val['id'];
	$nama_pegawai=$val['data_user'][0]['first_name'];
	$id_pegawai=$val['data_user'][0]['id'];
	$file_bpjs=$val['file_bpjs'];
	
}
?>
 <link href="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	<link href="<?php echo"".base_url().""; ?>assets/js/plugins/datapicker/datepicker3.css" rel="stylesheet" type="text/css" />
   		<link href="<?php echo"".base_url().""; ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<style>
		
	</style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            EDIT DATA BPJS
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?php echo base_url(); ?>/index.php/data_bpjs/index"><i class="fa fa-folder-o"></i> Data BPJS </a></li>
            <li class="active">Edit Data BPJS </li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-body">
							<form id="form_input_shoes">
							<div class="col-md-6">
									<input type="hidden" name="id" value="<?php echo $id; ?>"class="form-control" id="user_id" >
										<input type="hidden" name="file_bpjs_db" value="<?php echo $file_bpjs; ?>"class="form-control" id="user_id" >
											
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Pegawai</label>
										<select name="nama_pegawai" id="nama_pegawai" class="form-control" required>
												
												
											</select>
											<div id="code_accessoris_val" ></div>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Upload BPJS</label>
										<input type="file" name="file_bpjs" id="file_bpjs" class="form-control" >
												
												
											<div id="code_accessoris_val" ></div>
									</div>
								
									
								<input type="submit" value="simpan" class="btn btn-block btn-success" style="width:100px">
									
								<br /><br /><br />
							</div>
							</form>
							<table class="table table-bordered" style="text-align:center">
								<tr>
									<td><a href="<?php echo base_url(); ?>/upload/upload_bpjs/<?php echo $file_bpjs; ?>" target="_blank">DOWNLOAD</td>
								</tr>
							</table>
							
							<div class="col-md-12">
									<div id="data_set"></div>
							</div>
						
					</div><!-- /.box -->
				</div>	
			</div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
		
	
<!-- SCRIPT UNTUK MENAMPILKAN LAMPIRAN PADA TABEL-->
<script src="<?php echo"".base_url().""; ?>/assets/js/moment.js"></script>
<script src="<?php echo"".base_url().""; ?>/assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript">
			$(function () {
				$('#jam_masuk').datetimepicker({
					format: 'YYYY-MM-DD HH:mm',
                });
				$('#jam_keluar').datetimepicker({
					format: 'YYYY-MM-DD HH:mm',
                });
			
			});
		</script>
<script>
	$('#form_input_shoes').submit(function(e){
	
		formData = new FormData($(this)[0]);
			$.ajax({
					url 	: '<?php echo base_url() ?>/index.php/data_bpjs/edit_data_bpjs',
					type	: 'POST',
					data	: formData,
					async	: false,
					cache	: false,
					processData : false,
					contentType	: false,
					success:function (data){
					
							sweetAlert({
	                                                   title: "Berhasil!", 
                                                        text: "Berhasil Diedit!", 
                                                        type: "success",
														
														 showCancelButton: false,//There won't be any cancle button
															showConfirmButton  : true ,
                                                        }
														, function() {
																	location.href='<?php echo base_url(); ?>index.php/data_bpjs/index';
														}
														);
					
						
					}
				})
		
			
			return false;
	});
</script>
<script>
			$(document).ready(function(){
            $.ajax({
                url     : '<?php echo base_url() ?>index.php/data_user/get_data_jabatan',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						$('#jabatan').append('<option value="">--Pilih Jabatan--</option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#jabatan').append('<option value="'+item.id_jabatan+'">'+item.nama_jabatan+'</option>');
                    })
                }
            })
		});
</script>

<SCRIPT>
	$(document).ready(function(){		
		$('#atasan_jabatan').change(function () {
			$('#nama_atasan').html("");
				if($('#atasan_jabatan').val()!=""){
						$.ajax({
								url   :'<?php echo base_url() ?>index.php/data_user/get_data_atasan/'+$('#atasan_jabatan').val(),
								type  : 'GET',
											 
								async : false,
								cache : false,
											  //dataType : 'jsonp',
											  processData : false,
											  contentType : false,
											  success:function (data_master_equipment){
														$('#nama_atasan').append('<option value="">--Pilih Nama Atasan--</option>');
															$.each(data_master_equipment.data, function(i, item){
																$('#nama_atasan').append('<option value="'+item.id+'">'+item.first_name+'</option>');
															})
											  }
						})
										}
				})
			 });
</script>

<script>
			$(document).ready(function(){
            $.ajax({
                url     : '<?php echo base_url() ?>index.php/data_user/get_data_user',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						$('#nama_pegawai').append('<option value="<?php echo $id_pegawai; ?>"><?php echo $nama_pegawai; ?></option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#nama_pegawai').append('<option value="'+item.id+'">'+item.first_name+'</option>');
                    })
                }
            })
		});
</script>

<script>
			$(document).ready(function(){
            $.ajax({
                url     : '<?php echo base_url() ?>index.php/data_user/get_data_unit_kerja',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						$('#nama_unit_kerja').append('<option value="">Pilih Unit Kerja');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#nama_unit_kerja').append('<option value="'+item.id+'">'+item.nama_unit_kerja+'</option>');
                    })
                }
            })
		});
</script>

<script>
			$(document).ready(function(){
            $.ajax({
                url     : '<?php echo base_url() ?>index.php/shoes_category_controller/data_shoes_category',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						$('#category_shoes').append('<option value="">--Select Category Shoes--</option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#category_shoes').append('<option value="'+item.id_category+'">'+item.name_category+'</option>');
                    })
                }
            })
		});
</script>
   <script src="<?php echo"".base_url().""; ?>/assets/js/admin.js"></script>
	

	   <script src="<?php echo"".base_url().""; ?>/assets/plugins/node-waves/waves.js"></script>

