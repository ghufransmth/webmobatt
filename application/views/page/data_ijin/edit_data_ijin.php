 <link href="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	<link href="<?php echo"".base_url().""; ?>assets/js/plugins/datapicker/datepicker3.css" rel="stylesheet" type="text/css" />
   		<link href="<?php echo"".base_url().""; ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<style>
		
	</style>
	<?php
		foreach($data as $val){
			$start_date=$val['start_date'];
			$end_date=$val['end_date'];
			$reason=$val['reason'];
			$id=$val['id'];
			$id_ijin=$val['data_ijin_list'][0]['id'];
			$reason_desc=$val['data_ijin_list'][0]['reason_desc'];
			
				
			
			if($val['is_libur_nasional'] == 1){
				$data="";
			}else{
				$data="checked";
			}
		}
	?>
	
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            EDIT DATA IJIN
			
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?php echo base_url(); ?>/index.php/data_ijin/index"><i class="fa fa-archive"></i> Data Ijin </a></li>
            <li class="active">Edit Data Ijin </li>
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
											
									
									
									<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Hari Ini</label>
									  <div class='input-group date' id='jam_masuk'>
										<input type='text' class="form-control" name="start_date" value="<?php echo $start_date; ?>" readonly />
										<span class="input-group-addon">
										  <span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>
									  		  <div id="start_date_alert" style="color:red"></div>
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Selesai</label>
									  <div class='input-group date' id='jam_keluar'>
										<input type='text' class="form-control" name="end_date" value="<?php echo $end_date; ?>" readonly />
										<span class="input-group-addon">
										  <span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>
									  	   <div id="end_date_alert" style="color:red"></div>
									</div>
									
									<div class="form-group">
										<label for="exampleInputEmail1">Alasan</label>
											<select name="reason" id="reason" class="form-control" required>
												
												
											</select>
											 <div id="alasan_alert" style="color:red"></div>	
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Libur Nasional ?</label>
										<input type="checkbox" value="0" name="is_libur_nasional" <?php echo $data; ?> >
											 <div id="alasan_alert" style="color:red"></div>
									</div>
									<!--
									<div class="form-group">
										<label for="exampleInputEmail1">Menggantikan Ijin Pegawai</label>
										<select name="id_pegawai_penggantian" id="id_pegawai_penggantian" class="form-control"  >
												
												
											</select>
											 <div id="alasan_alert" style="color:red">*Boleh Dikosongi Jika Tidak Ada Penggantian</div>
									</div>-->
								<input type="submit" value="simpan" class="btn btn-block btn-success" style="width:100px">
									
								
							</div>
						
					</div><!-- /.box -->
				</div>	
			</div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
		
	
<!-- SCRIPT UNTUK MENAMPILKAN LAMPIRAN PADA TABEL-->
<!-- SCRIPT UNTUK MENAMPILKAN LAMPIRAN PADA TABEL-->
<script src="<?php echo"".base_url().""; ?>/assets/js/moment.js"></script>
<script src="<?php echo"".base_url().""; ?>/assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript">
			$(function () {
				$('#jam_masuk').datetimepicker({
					format: 'YYYY-MM-DD HH:mm:00.000',
					 ignoreReadonly: true
                });
				$('#jam_keluar').datetimepicker({
					format: 'YYYY-MM-DD HH:mm:00.000',
					 ignoreReadonly: true
                });
			
			});
		</script>
<script>
	$('#form_input_shoes').submit(function(e){
		var end_date=$("#end_date").val();
	var start_date=$("#start_date").val();
	var alasan=$("#reason").val();
	
	if(end_date == ""){
		$("#end_date_alert").html('Tanggal Selesai Ijin Tidak Boleh Kosong');
	}else{
		
	}
	if(start_date == ""){
		$("#start_date_alert").html('Tanggal Mulai Ijin Tidak Boleh Kosong');
	}else{
		
	}
	if(alasan == ""){
		$("#alasan_alert").html('Alasan Tidak Boleh Kosong');
	}else{
		
	}
	if(end_date != "" && start_date != "" && alasan != ""){
		formData = new FormData($(this)[0]);
			$.ajax({
					url 	: '<?php echo base_url() ?>/index.php/data_ijin/edit_data_ijin_action',
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
																	location.href='<?php echo base_url() ?>/index.php/data_ijin/index';
														}
														);
					
						
					}
				})
		
	}
			return false;
	});
</script>
	<script>
			$(document).ready(function(){
            $.ajax({
                url     : '<?php echo base_url() ?>index.php/data_ijin/get_data_ijin_list',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						$('#reason').append('<option value="<?php echo $id_ijin; ?>"><?php echo $reason_desc; ?></option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#reason').append('<option value="'+item.id+'">'+item.reason_desc+'</option>');
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
						$('#id_pegawai_penggantian').append('<option value="<?php echo $id_user; ?>"><?php echo $nama_user; ?></option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#id_pegawai_penggantian').append('<option value="'+item.id+'">'+item.first_name+'</option>');
                    })
                }
            })
		});
</script>
   <script src="<?php echo"".base_url().""; ?>/assets/js/admin.js"></script>
	

	   <script src="<?php echo"".base_url().""; ?>/assets/plugins/node-waves/waves.js"></script>

