  <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MANTAP</title>
	<link rel="icon" type="image/png" href="<?PHP echo base_url(); ?>/assets/dist/img/taspen.JPEG">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/bootstrap/css/bootstrap.min.css">
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo"".base_url().""; ?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo"".base_url().""; ?>/assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	 <link href="<?php echo"".base_url().""; ?>/assets/css/global.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/css/bootstrap-select.css">
    <link href="<?php echo"".base_url().""; ?>/assets/css/font-get.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
	  <link href="<?php echo"".base_url().""; ?>/assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link href="<?php echo"".base_url().""; ?>/assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo"".base_url().""; ?>/assets/css/bootstrap-datepicker.css">
	 <link href="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Theme style -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
	
	$("#start_date").val( h + ":" + m + ":" + s);
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
	<style>
#map {
      height: 100%;
    }

    .skin-blue .main-header .logo {
        background-color: #18365E !important;
    }

    .skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
        background-color: #18365E !important;
    }
	.skin-blue .main-header .navbar {
    background-color: white;
	border-top:solid 3px #FFA07A;
}

    .user-panel {
        position: relative;
        width: 100%;
        padding: 10px;
        overflow: hidden;
        height: 300px !important;
    }
    .user-panel>.image>img {
        width: 100%;
        max-width: 50% !important;
        height: auto;
        margin-left:25%;
    }
    .user-panel>.image>.logo {
        width: 100%;
        max-width: 80% !important;
        height: auto;
        margin-left:10%;
        padding-bottom: 50px;
    }
</style>

  </head>