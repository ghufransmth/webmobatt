 <link href="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	<link href="<?php echo"".base_url().""; ?>assets/js/plugins/datapicker/datepicker3.css" rel="stylesheet" type="text/css" />
   		<link href="<?php echo"".base_url().""; ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	
	<?php
		foreach($data as $val){
				//$profile_image=$file_profil_save;
				$username=$val['username'];
				$password=$val['password'];
				$first_name=$val['first_name'];
				$id=$val['id'];
				$nama_jabatan=$val['nama_jabatan'];
				
				$nama_unit_kerja=$val['nama_unit_kerja'];
				$atasan_1=$val['atasan_1'];
				$atasan_2=$val['atasan_2'];
				$user_level=$val['user_level'];
				$profile_image=$val['profile_image'];
				$id_jabatan=$val['data_jabatan'][0]['id_jabatan'];
				$nama_jabatan=$val['data_jabatan'][0]['nama_jabatan'];
				
				$id_jabatan_atasan=$val['data_jabatan_atasan'][0]['id_jabatan'];
				$nama_jabatan_atasan=$val['data_jabatan_atasan'][0]['nama_jabatan'];
				
				$id_jabatan_atasan_user=$val['nama_jabatan_atasan'][0]['id'];
				$nama_jabatan_atasan_user=$val['nama_jabatan_atasan'][0]['first_name'];
				
				
					$id=$val['id'];
		}
	
	?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            VIEW PROFILE 
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
			
            <li class="active">View Profile </li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-body">
							<div class="col-md-6" style="text-align:center">
							
								<img src="<?php echo base_url();?>/upload/foto_user/<?php echo $profile_image; ?>" style="width:200px;height:200px;margin-bottom: 20px;" class="img-circle" alt="User Image">	
								<input type="file" name="profile_image" class="form-control" id="profile_image" > <br />
								<input type="hidden" name="id" id="id_user_set" class="form-control"  value="<?php echo $id; ?>"> <br />
								
								
							</div>
							
							<div class="col-md-6">
								<table class="table">
								<tr>
									<td colspan="2" STYLE="text-align:center"><b>DATA PROFIL</b></td>
								</tr>
									<TR>
										<td>Nama</td>
										<td><?php echo $first_name; ?></td>
									</tr>
									
									<TR>
										<td>Nama Unit Kerja</td>
										<td><?php echo $nama_unit_kerja; ?></td>
									</tr>
										<TR>
										<td>Nama Jabatan</td>
										<td><?php echo $nama_jabatan; ?></td>
									</tr>
									<TR>
										<td>Jabatan Atasan</td>
										<td><?php echo $nama_jabatan_atasan; ?></td>
									</tr>
									<TR>
										<td>Nama Jabatan Atasan</td>
										<td><?php echo $nama_jabatan_atasan_user; ?></td>
									</tr>
									<TR>
										<td>User Level</td>
										<td><?php echo $user_level; ?></td>
									</tr>
								</table>
								
							</div>
							<div class="col-md-12">
							
								
							</div>
							
					</div><!-- /.box -->
				</div>	
			</div>
			</div>

        </section><!-- /.content -->
		
	
	
	
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
			$(document).ready(function(){
            $.ajax({
                url     : '<?php echo base_url() ?>index.php/data_user/get_data_jabatan',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						$('#jabatan').append('<option value="<?php echo $id_jabatan; ?>"><?php echo $nama_jabatan; ?></option>');
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
						$('#atasan_jabatan').append('<option value="<?php echo $id_jabatan_atasan; ?>"><?php echo $nama_jabatan_atasan; ?></option><option value="-">Tidak Ada Atasan</option>');
                    $.each(data_master_equipment.data, function(i, item){
                        $('#atasan_jabatan').append('<option value="'+item.id_jabatan+'">'+item.nama_jabatan+'</option>');
                    })
                }
            })
		});
</script>
<script>
	$('#form_input_shoes').submit(function(e){
	
		formData = new FormData($(this)[0]);
			$.ajax({
					url 	: '<?php echo base_url() ?>/index.php/data_user/edit_data_user_profil',
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
																	location.reload();
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
	<script src="<?php echo"".base_url().""; ?>/assets/js/admin.js"></script>
	

	<script src="<?php echo"".base_url().""; ?>/assets/plugins/node-waves/waves.js"></script>

<script>
$(document).ready(function(){
 $(document).on('change', '#profile_image', function(){
  var name = document.getElementById("profile_image").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("profile_image").files[0]);
  var f = document.getElementById("profile_image").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 10000)
  {
   alert("Ukuran File Gambar Terlalu Besar Maksimal 2MB");
  }
  else
  {
   form_data.append("profile_image", document.getElementById('profile_image').files[0]);
   $.ajax({
   url 	: '<?php echo base_url() ?>/index.php/data_user/edit_data_user_profil_ipload',
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Sedang Mengupload Gambar...</label>");
    },
    success:function(data)
    {
	
		$.post( "<?php echo base_url() ?>/index.php/data_user/edit_data_user_profil", { id: $("#id_user_set").val(),profile_image : name})
		  .done(function( data ) {
				location.reload();
		  });
   
    }
   });
  }
 });
});
</script>