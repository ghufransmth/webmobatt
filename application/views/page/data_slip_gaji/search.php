    <style>
		.datepicker{
			z-index:1151 !important;
		}
	</style>
	<?php
	if(isset($data)){
		$NIP="";
		foreach($data as $val){
			$NIP=$val['NIP'];
			$NAMA_LENGKAP=$val['NAMA_LENGKAP'];
			$NAMA_JABATAN=$val['NAMA_JABATAN'];
			$GRADE=$val['GRADE'];
			$DIREKTORAT=$val['DIREKTORAT'];
			$DIVISI=$val['DIVISI'];
			$KANTOR=$val['KANTOR'];
			$UNIT=$val['UNIT'];
			$YYYYMM=$val['YYYYMM'];
			$GAPOK=$val['GAPOK'];
			$TJ_KEHADIRAN=$val['TJ_KEHADIRAN'];
			$TJ_JAB=$val['TJ_JAB'];
			$TJ_BPJS_TK=$val['TJ_BPJS_TK'];
			$TJ_BPJS_KES=$val['TJ_BPJS_KES'];
			$TJ_BPJS_PEN=$val['TJ_BPJS_PEN'];
			$TJ_UTILITIES=$val['TJ_UTILITIES'];
			$TJ_ZONA=$val['TJ_ZONA'];
			$LEMBUR=$val['LEMBUR'];
			$TJ_PAJAK=$val['TJ_PAJAK'];
			$JUMLAH=$val['JUMLAH'];
			$IUR_BPJS_KES=$val['IUR_BPJS_KES'];
			$IUR_BPJS_TK=$val['IUR_BPJS_TK'];
			$IUR_BPJS_PEN=$val['IUR_BPJS_PEN'];
			$DPLK=$val['DPLK'];
			$IUR_KOPERASI=$val['IUR_KOPERASI'];
			$KRD_KOPERASI=$val['KRD_KOPERASI'];
			$POTONGAN=$val['POTONGAN'];
			$TAKE_HOME_PAY=$val['TAKE_HOME_PAY'];
			$REKENING_MANTAP=$val['REKENING_MANTAP'];
			$TJ_COP=$val['TJ_COP'];
			$TJ_KOST=$val['TJ_KOST'];
			$HOME_BASE=$val['HOMEBASE'];
			
		}
	}else{
		$NIP=0;
	}

	?>
	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DATA SLIP GAJI  
          </h1>
          <ol class="breadcrumb">
             <li><a href="<?php echo base_url() ?>index.php/home"><i class="fa fa-home"></i> Home</a></li>
           <li class="active">Data Slip Gaji </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
					<?php
						if($NIP == 0){
		
	}else{?>
						<div class="box-body">
						<div class="col-md-12">
								<div class="col-md-6" style="border:1px solid">
									<img src="<?php echo base_url(); ?>/assets/dist/img/mandiri.PNG" style="width:300px;height:100px;margin-left:100px">
								</div>
								<div class="col-md-6" style="text-align:center">
									
										<h2>SLIP GAJI PEGAWAI</h2>
										
								</div>
						</div>
						<div class="col-md-12"><br/><br/>
								<div class="col-md-6" >
									<table class="table table-bordered">
										<tr>
											<td>NIP</td>
											<td>:</td>
											<td><?PHP echo $NIP; ?></td>
										</tr>
										<tr>
											<td>Nama</td>
											<td>:</td>
											<td><?PHP echo $NAMA_LENGKAP; ?></td>
										</tr>
										<tr>
											<td>Jabatan</td>
											<td>:</td>
											<td><?PHP echo $NAMA_JABATAN; ?></td>
										</tr>
										<tr>
											<td>Grade</td>
											<td>:</td>
											<td><?PHP echo $GRADE; ?></td>
										</tr>
										<tr>
											<td>Direktorat</td>
											<td>:</td>
											<td><?PHP echo $DIREKTORAT; ?></td>
										</tr>
									</table>
								</div>
								<div class="col-md-6" style="text-align:center">
									<table class="table table-bordered">
										<tr>
											<td>Periode</td>
											<td>:</td>
											<td><?PHP echo $YYYYMM; ?></td>
										</tr>
										<tr>
											<td>Divisi</td>
											<td>:</td>
											<td><?PHP echo $DIVISI; ?></td>
										</tr>
										<tr>
											<td>Kantor</td>
											<td>:</td>
											<td><?PHP echo $KANTOR; ?></td>
										</tr>
										<tr>
											<td>Unit</td>
											<td>:</td>
											<td><?PHP echo $UNIT; ?></td>
										</tr>
									</table>
								</div>
							</div>
							<div class="col-md-12"><br/><br/>
								<div class="col-md-4" style="">
									<table class="table">
										<tr>
											<td colspan="2" style="font-weight:bolder;font-size:20px;text-align:center;border-bottom:solid 2px">PENDAPATAN</td>
										</tr>
										<tr>
											<td>Gapok</td>
											<td>:</td>
											<td><?PHP echo $GAPOK; ?></td>
										</tr>
										<tr>
											<td>Tunjangan Kehadiran</td>
											<td>:</td>
											<td><?PHP echo $TJ_KEHADIRAN; ?></td>
										</tr>
										<tr>
											<td>Tunjangan Jabatan</td>
											<td>:</td>
											<td><?PHP echo $TJ_JAB; ?></td>
										</tr>
										<tr>
											<td>Tunjangan BPJS Tenaga Kerja</td>
											<td>:</td>
											<td><?PHP echo $TJ_BPJS_TK; ?></td>
										</tr>
										<tr>
											<td>Tunjangan BPJS Kesehatan</td>
											<td>:</td>
											<td><?PHP echo $TJ_BPJS_KES; ?></td>
										</tr>
										<tr>
											<td>Tunjangan BPJS Pendidikan</td>
											<td>:</td>
											<td><?PHP echo $TJ_BPJS_PEN; ?></td>
										</tr>
										<tr>
											<td>Tunjangan Utilites</td>
											<td>:</td>
											<td><?PHP echo $TJ_UTILITIES; ?></td>
										</tr>
										<tr>
											<td>Tunjangan Zona</td>
											<td>:</td>
											<td><?PHP echo $TJ_ZONA; ?></td>
										</tr>
										<tr>
											<td>Tunjangan Pajak</td>
											<td>:</td>
											<td><?PHP echo $TJ_PAJAK; ?></td>
										</tr>
										<tr>
											<td>Tunjangan COP</td>
											<td>:</td>
											<td><?PHP echo $TJ_COP; ?></td>
										</tr>
										<tr>
											<td>Tunjangan KOST</td>
											<td>:</td>
											<td><?PHP echo $TJ_KOST; ?></td>
										</tr>
										<tr>
											<td>JUMLAH</td>
											<td>:</td>
											<td><?PHP echo $JUMLAH; ?></td>
										</tr>
									</table>
								</div>
								<div class="col-md-4" style="">
									<table class="table">
										<tr>
											<td colspan="2" style="font-weight:bolder;font-size:20px;text-align:center;border-bottom:solid 2px">POTONGAN</td>
										</tr>
										<tr>
											<td>Iuran BPJS Kesehatan</td>
											<td>:</td>
											<td><?PHP echo $IUR_BPJS_KES; ?></td>
										</tr>
										<tr>
											<td>Iuran BPJS Tenaga Kerja</td>
											<td>:</td>
											<td><?PHP echo $IUR_BPJS_TK; ?></td>
										</tr>
										<tr>
											<td>Iuran BPJS Pendidikan</td>
											<td>:</td>
											<td><?PHP echo $IUR_BPJS_PEN; ?></td>
										</tr>
										<tr>
											<td>DPLK</td>
											<td>:</td>
											<td><?PHP echo $DPLK; ?></td>
										</tr>
										<tr>
											<td>Iuran Koperasi</td>
											<td>:</td>
											<td><?PHP echo $IUR_KOPERASI; ?></td>
										</tr>
										<tr>
											<td>KRD Koperasi</td>
											<td>:</td>
											<td><?PHP echo $KRD_KOPERASI; ?></td>
										</tr>
										<tr>
											<td>Potongan</td>
											<td>:</td>
											<td><?PHP echo $POTONGAN; ?></td>
										</tr>
										
									</table>
								</div>
								<div class="col-md-4" style="">
								<table class="table">
										<tr>
											<td colspan="2" style="font-weight:bolder;font-size:20px;text-align:center;border-bottom:solid 2px">LAIN-LAIN</td>
										</tr>
										<tr>
											<td>Lembur</td>
											<td>:</td>
											<td><?PHP echo $LEMBUR; ?></td>
										</tr>
									</table>
								</div>
							
							</div>
							<div class="col-md-12"><br/><br/>
								<table class="table">
									<tr>
										<td>TAKE HOME PAY</td>
										<td>:</td>
										<td><?PHP echo $TAKE_HOME_PAY; ?></td>
									</tr>
									<tr>
										<td>REKENING MANTAP</td>
										<td>:</td>
										<td><?PHP echo $REKENING_MANTAP; ?></td>
									</tr>
									<tr>
										<td>HOME BASE</td>
										<td>:</td>
										<td><?PHP echo $HOME_BASE; ?></td>
									</tr>
								</table>
							</div>
						</div><!-- /.box-body -->
							<?php
	}
		?>
					</div><!-- /.box -->
				</div>	
			</div>
					
				
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
	
	<script src="<?php echo"".base_url().""; ?>/assets/js/jquery.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function(){ 
			$("#data-brands").dataTable({
					"bPaginate": true,
					"bLengthChange": true,
					"bFilter": true,
					"bSort": true,
					"bInfo": true,
					"bAutoWidth": false,
					"processing": true,
					"ajax": '<?php echo base_url() ?>/index.php/data_slip_gaji/get_data_slip_gaji',
					"columns": [
						{ "data": "data_user.0.first_name" },
						 /* { "data": "NOMOR_PENGAJUAN_PIB", 
							"render" : function(data){
										var data_array 					= data.split('-');
										var data_nomor_pengajuan 		= data_array[0];
										
                   							return '<a href="#"><button type="button" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#myModal_bea_cukai" style="border-radius:0px;" onclick="edit_pib_bea_cukai('+data_array+')";><i class="fa fa-check"></i></button></a>'
						 }}, */
						 <?php
										if($this->session->userdata('user_level') == "admin"){
				
										?>
						{ "data": "id", 
						"render" : function(data){
							return '<a href="<?php echo base_url()?>index.php/data_slip_gaji/view_edit_data_slip_gaji/'+data+'"><button type="button" class="btn btn-success btn-sm"   style="border-radius:0px;" ><i class="fa fa-pencil-square-o"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="#"><button type="button" onclick="delete_master_shoes_category('+data+')" class="btn btn-danger btn-sm" style="border-radius:0px;" ><i class="fa fa-trash-o"></i></button></a>'
						}}
						
						<?php
										}
						?>
					]
			});
			

			
				
		});
	</script>
	
	
	<script>
		function delete_master_shoes_category(id){
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
	
     url_edit = '<?php echo base_url()?>index.php/data_slip_gaji/delete_data_slip_gaji/'+id,
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
    <script src="<?php echo"".base_url().""; ?>/assets/js/admin.js"></script>
	

	<script src="<?php echo"".base_url().""; ?>/assets/plugins/node-waves/waves.js"></script>


	
