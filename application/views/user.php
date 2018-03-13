<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Helpdesk</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/assa_rent_car_logo.png" type="image/x-icon">

    <!-- Google Fonts -->
  
	<link href="<?php echo base_url(); ?>/assets/font/font.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/font/font2.css" rel="stylesheet">
 <link href="<?php echo base_url(); ?>/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>/assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>/assets/plugins/animate-css/animate.css" rel="stylesheet" />

  

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>/assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url(); ?>/assets/css/themes/all-themes.css" rel="stylesheet" />
	 <link href="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
</head>

<body class="login-page2">
    <div class="login-box" >
        <div class="logo" style="text-align:center">
            <a href="javascript:void(0);">HELP<b>DESK</b></a>
            
        </div>
        <div class="card">
            <div class="body">
              
                   <div class="msg" style="text-align:center">  <img src="<?php echo base_url(); ?>assets/images/assa_rent_car_logo.png" ></div>
                    <div class="input-group">
                        
                      <form id="form_input_user" >
							<div class="form-group form-float">
                                    <table class="table " style="width:100%">
										
										<tr>
											<td>
											Tanggal
											</td>
											<td>:</td>
																	<td>
																		<select name="hari" class="form-control">
																			<option value="">Hari</option>
																			<?php
																				for($i=1;$i<=31;$i++){
																					echo"
																					<option value='$i'>$i</option>
																					";
																				}
																			?>
																		</select>
																	</td>
																	<td>
																			<select type="text" name="bulan" id="bulan" class="form-control">
																				<option value="">Bulan</option>
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
																	<td>
																			<select type="text" name="tahun" id="tahun" class="form-control">
																				<option value="">Tahun</option>
																				<?php
																				for($i=2010;$i<=2050;$i++){
																					echo"<option value='$i'>$i</option>";
																				}
																				?>
																			</select>
																	</td>
																</tr>
										<tr>
											<td>Area</td>
											<td>:</td>
											<td colspan="3">
											<select name="area" class="form-control show-tick" id="area" required>
								<option value="">Pilih Area</option>
								<?php
								foreach($data as $val){
								echo"
								<option value='".$val['id_area']."'>".$val['area']."</option>
								";
								}
								?>
								</select>
											</td>
										</tr>
										<tr>
											<td>Nama</td>
											<td>:</td>
											<td colspan="3">
											 <input type="text" class="form-control" name="nama" required>
											</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>:</td>
											<td colspan="3">
											 <input type="text" class="form-control" name="email" required>
											</td>
										</tr>
										<tr>
											<td>Status Tiket</td>
											<td>:</td>
											<td colspan="3">
											<select name="status_tiket" class="form-control show-tick" id="status_tiket" required>
											<option value="">Pilih Status Tiket</option>
											<option value="1">Segera</option>
											<option value="0">Kapanpun</option>
								
									</select>
											</td>
										</tr>
										
									</table>
                                </div>
                               
							
								
							
								
								
								<h4>PROBLEM</h4>
                              <textarea id="problem" name="problem">
                                
                            </textarea>
                               
                               <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SUBMIT</button>
 
                            </form>

                   
                
               
            </div>
        </div>
    </div>
 <script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<script>
$(function () {
    //CKEditor
    CKEDITOR.replace('problem');
    CKEDITOR.config.height = 300;

 
});

</script>
	
	   <script>
	$('#form_input_user').submit(function(e){
		

					formData = new FormData($(this)[0]);
			
    formData.append('problem', CKEDITOR.instances.problem.getData());
			$.ajax({
					url 	: '<?php echo base_url() ?>index.php/tiket/save_tiket',
					type	: 'POST',
					data	: formData,
					async	: false,
					cache	: false,
					processData : false,
					contentType	: false,
					success:function (data){
					//console.log(data);
		
						if(data.is_logged_in==true){
							
						sweetAlert({
	                                                   title: "Berhasil!", 
                                                        text: "Tiket Berhasil Disimpan!", 
                                                        type: "success",
														
														 timer: 1200,
														 showCancelButton: false,//There won't be any cancle button
															showConfirmButton  : false ,
                                                        }
														, function() {
																	location.reload();
																}
														);
							//location.href = "<?php echo base_url() ?>index.php/data_user";
							
						}else{
							sweetAlert({
	                                                   title: "Gagal!", 
                                                        text: "Data Gagal Disimpan!", 
                                                        type: "error",
                                                        });
						}
					}
				})
		
		
			return false;
	});
	</script>
    <!-- Jquery Core Js -->
  
    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>/assets/plugins/node-waves/waves.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>/assets/plugins/ckeditor/ckeditor.js"></script>

</body>

</html>