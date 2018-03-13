<!--
#atasan_1 merupakan atasan dari jabatan
#atasan_2 merupakan nama atasannya


-->
 <link href="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	<link href="<?php echo"".base_url().""; ?>assets/js/plugins/datapicker/datepicker3.css" rel="stylesheet" type="text/css" />
   		<link href="<?php echo"".base_url().""; ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<style>
		
	</style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            INPUT DATA USER
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?php echo base_url(); ?>/index.php/data_user/index"><i class="fa fa-user"></i> Data User </a></li>
            <li class="active">Input Data User </li>
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
									<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id_user'); ?>"class="form-control" id="user_id" >
										
									<div class="form-group">
										<label for="exampleInputEmail1">NIP</label>
										<input type="text" name="username" class="form-control" id="" required>
											<div id="code_accessoris_val" ></div>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Password</label>
										<input type="password" name="password" class="form-control" id="password" required>
											<div id="code_accessoris_val" ></div>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Confirm Password</label>
										<input type="password" class="form-control" id="password_set" required>
											<div id="code_accessoris_val" ></div>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama</label>
										<input type="text" name="first_name" class="form-control" id="" required>
											<div id="code_accessoris_val" ></div>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Unit Kerja</label>
										
										<select name="nama_unit_kerja" id="nama_unit_kerja" class="form-control" required>
												
												
											</select>
											<div id="code_accessoris_val" ></div>
									</div>
									
								
									
								<input type="submit" value="simpan" class="btn btn-block btn-success" style="width:100px">
									
								
							</div>
							
							<div class="col-md-6">
							<div class="form-group">
										<label for="exampleInputEmail1">Nama Jabatan</label>
											<select name="nama_jabatan" id="jabatan" class="form-control" required>
												
												
											</select>
									
											<div id="code_accessoris_val" ></div>
									</div>
										<div class="form-group">
										<label for="exampleInputEmail1">Atasan</label>
											<select name="atasan_1" class="form-control" id="atasan_jabatan"required>
												
												
											</select>
									
											<div id="code_accessoris_val" ></div>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Atasan </label>
											<select name="atasan_2" class="form-control" id="nama_atasan">
												
												
											</select>
									
											<div id="code_accessoris_val" ></div>
									</div>
								
						
									
									<div class="form-group">
										<label for="exampleInputEmail1">User Level</label>
										<select name="user_level" class="form-control" id="" required>
											<option value="">-- PIlih User Level -- </option>
											<option value="admin">Admin</option>
											<option value="user">User </option>
											
										</select>
											<div id="code_accessoris_val" ></div>
									</div>
										<div class="form-group">
										<label for="exampleInputEmail1">Gambar Profil</label>
										<input type="file" name="profile_image" class="form-control" id="" required>
											<div id="code_accessoris_val" ></div>
									</div>
							</div>
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
		var password=$("#password").val();
		var password_set=$("#password_set").val();
		
		if(password == password_set){
			formData = new FormData($(this)[0]);
			$.ajax({
					url 	: '<?php echo base_url() ?>/index.php/data_user/save_data_user',
					type	: 'POST',
					data	: formData,
					async	: false,
					cache	: false,
					processData : false,
					contentType	: false,
					success:function (data){
					
							sweetAlert({
	                                                   title: "Berhasil!", 
                                                        text: "Berhasil Masuk!", 
                                                        type: "success",
														
														 showCancelButton: false,//There won't be any cancle button
															showConfirmButton  : true ,
                                                        }
														, function() {
																	location.href='<?php echo base_url(); ?>index.php/data_user/index';
														}
														);
					
						
					}
				})
		}else{
			
		alert("Password Tidak Sama");
		
		}
			
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
                url     : '<?php echo base_url() ?>index.php/data_user/get_data_jabatan',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						$('#atasan_jabatan').append('<option value="">--Pilih Jabatan--</option><option value="-">Tidak Ada Atasan</option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#atasan_jabatan').append('<option value="'+item.id_jabatan+'">'+item.nama_jabatan+'</option>');
                    })
                }
            })
		});
</script>

<script>
			$(document).ready(function(){
            $.ajax({
                url     : '<?php echo base_url() ?>index.php/data_master/get_data_unit_kerja',
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

