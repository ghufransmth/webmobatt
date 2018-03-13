    <?php
		foreach($data as $val){
			$username=$val['username'];
			$password=$val['password'];
			$user_id=$val['user_id'];
			$id=$val['id'];
			$is_admin=$val['is_admin'];
			$nama=$val['nama'];
			$no_telepon=$val['no_telepon'];
			$email=$val['email'];
			$gambar=$val['gambar'];
			if($is_admin == 1){
				$set="Admin";
				$set_val=1;
			}else{
				$set="User";
				$set_val=0;
			}
		}
	 
	 ?>
  <section class="content">
        <div class="container-fluid">
     <div class="block-header">
                  <h2>PROFIL DATA MASTER USER MANAGEMENT</h2>
            </div>
        
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                      
                        <div class="body">
                            <form id="form_input_user" >
							<input id="id_user" name="id_user" type="hidden" value="<?php echo $this->session->userdata('id_user'); ?>">
							 <input id="id" name="id" type="hidden" value="<?php echo $id; ?>" autocomplete="off" required="required">
					   <input id="nama_file_db" name="nama_file_db" type="hidden" value="<?php echo $gambar; ?>">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="user_id" value="<?php echo $user_id; ?>" required>
                                        <label class="form-label">User ID</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" required>
                                        <label class="form-label">Username</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" >
										<input type="hidden" class="form-control" name="password_db" value="<?php echo $password; ?>">
										
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" required>
                                        <label class="form-label">Nama </label>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="no_telepon" value="<?php echo $no_telepon; ?>" required>
                                        <label class="form-label">Nomor Telepon</label>
                                    </div>
                                </div>
							
								<div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>
								
                               <div class="form-group form-float">
                                    <div class="form-line">
                                             <input type="file" name="nama_file" id="nama_file" placeholder="Pilih Foto">
                     <img src="<?php echo base_url() ?>upload/foto_user/<?php echo $gambar; ?>" style="width:150px;height:200px">
                                    </div>
                                </div>
					
						
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
							
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
            

            </div>
        </div>
    </section>
	  <script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>

	
	   <script>
	$('#form_input_user').submit(function(e){
		

				formData = new FormData($(this)[0]);
				//console.log(formData);
			$.ajax({
						url 	: '<?php echo base_url() ?>index.php/data_user/edit_master_data_user_profil',
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
                                                        text: "Data Berhasil diedit!", 
                                                        type: "success",
														
														// timer: 1200,
														 showCancelButton: false,//There won't be any cancle button
															showConfirmButton  : true ,
                                                        }
														, function() {
																	window.location = "<?php echo base_url(); ?>index.php/home";
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
  <script>
		function delete_user(id){
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
      url_edit = '<?php echo base_url()?>index.php/data_user/delete_master_data_user_oto/'+id,
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
  