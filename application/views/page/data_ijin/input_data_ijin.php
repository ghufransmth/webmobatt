 <link href="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	<link href="<?php echo"".base_url().""; ?>assets/js/plugins/datapicker/datepicker3.css" rel="stylesheet" type="text/css" />
   		<link href="<?php echo"".base_url().""; ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<style>
		
	</style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            INPUT DATA IJIN
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?php echo base_url(); ?>/index.php/data_ijin/index"><i class="fa fa-archive"></i> Data Ijin </a></li>
            <li class="active">Input Data Ijin </li>
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
									<label for="exampleInputEmail1">Tanggal Mulai Ijin</label>
									  <div class='input-group date' id='jam_masuk'>
										<input type='text' class="form-control" name="start_date" id="start_date" readonly />
										<span class="input-group-addon">
										  <span class="glyphicon glyphicon-calendar"></span>
										</span>
										
									  </div>
									  <div id="start_date_alert" style="color:red"></div>
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">Tanggal Selesai Ijin</label>
									  <div class='input-group date' id='jam_keluar'>
										<input type='text' class="form-control" name="end_date" id="end_date" readonly  />
										<span class="input-group-addon">
										  <span class="glyphicon glyphicon-calendar"></span>
										</span>
									  </div>
									   <div id="end_date_alert" style="color:red"></div>
									</div>
								
									
									<div class="form-group">
										<label for="exampleInputEmail1">Alasan</label>
										<select name="reason" id="reason" class="form-control"  >
												
												
											</select>
											 <div id="alasan_alert" style="color:red"></div>
									</div>
									<!-- <div class="form-group">
										<label for="exampleInputEmail1">Libur Nasional ?</label>
										<input type="checkbox" value="0" name="is_libur_nasional" >
											 <div id="alasan_alert" style="color:red"></div>
									</div> -->
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
<script src="<?php echo"".base_url().""; ?>/assets/js/moment.js"></script>
<script src="<?php echo"".base_url().""; ?>/assets/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript">
			$(function () {
				var today = new Date();
				var lastDate = new Date(today.getFullYear(), 6, 31); 

				$('#jam_masuk').datetimepicker({
					format: 'YYYY-MM-DD',
					minDate: today,
					// startDate: '-1m',
   		// 			endDate: lastDate,
					ignoreReadonly: true
                });
				$('#jam_keluar').datetimepicker({
					format: 'YYYY-MM-DD',
					minDate: today,
					ignoreReadonly: true
                });
			
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
						$('#reason').append('<option value="">--Pilih Alasan Ijin--</option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#reason').append('<option value="'+item.id+'">'+item.reason_desc+'</option>');
                    })
                }
            })
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
					url 	: '<?php echo base_url() ?>/index.php/data_ijin/save_data_ijin',
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
																	//location.href='<?php echo base_url() ?>/index.php/data_ijin/index';
																	location.reload();
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
                url     : '<?php echo base_url() ?>index.php/brands_controller/data_brands',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						$('#brands_get').append('<option value="">--Select Brands--</option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#brands_get').append('<option value="'+item.id_brands+'">'+item.name_brands+'</option>');
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
						$('#id_pegawai_penggantian').append('<option value="">--Pilih Pegawai--</option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#id_pegawai_penggantian').append('<option value="'+item.id+'">'+item.first_name+'</option>');
                    })
                }
            })
		});
</script>

   <script src="<?php echo"".base_url().""; ?>/assets/js/admin.js"></script>
	

	   <script src="<?php echo"".base_url().""; ?>/assets/plugins/node-waves/waves.js"></script>

