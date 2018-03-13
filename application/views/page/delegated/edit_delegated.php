 <?php
foreach($data as $val){
	$id=$val['id'];
	$id_delegated=$val['id'];
	$delegated_date=$val['delegate_date'];
	$undelegated_date=$val['undelegate_date'];
	$nama_user=$val['nama_user'][0]['first_name'];
	$id_pegawai=$val['nama_user'][0]['id'];
	
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
            EDIT DATA DELEGATED
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?php echo base_url(); ?>/index.php/delegated/index"><i class="fa fa-gift"></i> Data Delegated </a></li>
            <li class="active">Edit Data Delegated </li>
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
									<input type="hidden" name="id" value="<?php echo $id; ?>"class="form-control" id="user_id" >
										
									
									<div class="form-group">
										<label for="exampleInputEmail1">Delegated For</label>
										<select name="id_pegawai" id="id_pegawai" class="form-control">
											
										</select>
											<div id="code_accessoris_val" ></div>
									</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Delegated Date</label>
									  <div class='input-group date' id='jam_masuk'>
										<input type='text' class="form-control" value="<?php echo $delegated_date; ?>" name="delegated_date" id="start_date"readonly />
										<span class="input-group-addon">
										  <span class="glyphicon glyphicon-calendar"></span>
										</span>
										
									  </div>
									  <div id="start_date_alert" style="color:red"></div>
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">Undelagated Date</label>
									  <div class='input-group date' id='jam_keluar'>
										<input type='text' class="form-control"  value="<?php echo $undelegated_date; ?>" name="undelegated_date" id="start_date"readonly />
										<span class="input-group-addon">
										  <span class="glyphicon glyphicon-calendar"></span>
										</span>
										
									  </div>
									  <div id="start_date_alert" style="color:red"></div>
									</div>
									
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
	
		formData = new FormData($(this)[0]);
			$.ajax({
					url 	: '<?php echo base_url() ?>/index.php/delegated/edit_delegated_action',
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
																	location.href='<?php echo base_url();?>/index.php/delegated/index';
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
                url     : '<?php echo base_url() ?>index.php/data_absensi/get_data_absensi_approval',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						$('#id_pegawai').append('<option value="<?php echo $id_pegawai; ?>"><?php echo $nama_user; ?></option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#id_pegawai').append('<option value="'+item.id+'">'+item.nama_user[0].first_name+'</option>');
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

