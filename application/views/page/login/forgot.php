<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>MANTAP</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?PHP echo base_url(); ?>/assets/dist/img/mandiri.png">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Ribbon Login Form Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
<link href="<?php echo base_url() ?>/assets/login/css/style.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!--/webfonts--> <link href="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
</head>
<body>
<!--start-main-->
<h1>Welcome!<span>Please login...</span></h1>
 
<div class="login-box2">
		  <form id="login">
		 <input type="text" class="text" value="Username" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
		 <input type="hidden" class="text" value="0" name="total" id="total"  >
			
		
		<div class="clear"> </div>
		<div class="btn">
			<input type="submit" value="KIRIM DATA" ><br /><div style="color:white">
			<a href="http://rekrutmen.bankmantap.co.id" style="color:white">Register</a>||<a href="<?php echo base_url(); ?>/index.php/login/index" style="color:white">Login</a></div>
		</div>
</form>

		<div class="clear"> </div>
		
</div>
<script src="<?php echo"".base_url().""; ?>/assets/js/jquery.min.js" type="text/javascript"></script>
	 <script src="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
  	<script>
		$('#login').submit(function(e){
			var total=0;
			e.preventDefault();
			formData = new FormData($(this)[0]);
			$.ajax({
				url 	: '<?php echo base_url(); ?>/index.php/login/save_data_user',
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
                                                        text: "Berhasil Dikirim!", 
                                                        type: "success",
														
														 timer: 1200,
														 showCancelButton: false,//There won't be any cancle button
															showConfirmButton  : false ,
                                                        }
														, function() {
																location.href = "<?php echo base_url() ?>index.php/login/index";
														}
														);
						//console.log(usernamee.username);
						//alert(usernamee.username);
						

					}else{
							alert("Username Tidak Ditemukan");
						
					}
				}
			})
			return false;
		})
	</script>
<!--//end-copyright-->		
</body>
</html>