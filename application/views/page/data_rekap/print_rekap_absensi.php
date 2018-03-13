 <?php

	
 ?>
 <style type="text/css" media="print">
    @page {
  size: A4;
  margin-top: 20px;
  margin-left:20px;
  margin-right:20px;
}
@media print {
  html, body {
    width: 210mm;
    height: 297mm;
  }
  /* ... the rest of the rules ... */
}
#panjang{
	width:100%;
}
    </style>
	
	<?php
	foreach($data as $val){
			$nama_pegawai=$val['nama_user'][0]['first_name'];
			$nama_unit_kerja=$val['nama_user'][0]['unit_kerja'][0]['nama_unit_kerja'];
			$nama_jabatan=$val['nama_user'][0]['jabatan'][0]['nama_jabatan'];
			$bulan=$val['tanggal'][0]['bulan'];
			$tahun=$val['tanggal'][0]['tahun'];
			
			if($bulan == 1){
				$nama_bulan="Januari";
			}else if($bulan == 2){
				$nama_bulan="Februari";
			}
			else if($bulan == 3){
				$nama_bulan="Maret";
			}
			else if($bulan == 4){
				$nama_bulan="April";
			}
			else if($bulan == 5){
				$nama_bulan="Mei";
			}
			else if($bulan == 6){
				$nama_bulan="Juni";
			}
			else if($bulan == 7){
				$nama_bulan="Juli";
			}
			else if($bulan == 8){
				$nama_bulan="Agustus";
			}
			else if($bulan == 9){
				$nama_bulan="September";
			}
			else if($bulan == 10){
				$nama_bulan="Oktober";
			}
			else if($bulan == 11){
				$nama_bulan="November";
			}
			else if($bulan == 12){
				$nama_bulan="Desember";
			}
			
			
	}
	$content ="
	
	<div style=\"background-color:white;height:98%;width:100%;border:1px solid\">
			<div style=\"height:1020px;width:100%;border-bottom:1px solid\">
					 <div ><br />
						<img src=\"".base_url()."assets/dist/img/mandiri_oke.png\" style='width:300px;height:100px'>
					 </div>
					
						 <div  style=\"text-align:center\">
							<h2 style='font-size:19px'><b>REKAP DATA ABSENSI</b></h2>
						 </div>
						<div  style=\"width:100%;height:120px\">
							<table style=\"width:100%;\" >
								<td style=\"width:47%;border:1px solid;height:120px;float:left\">
								<div  style='font-size:12px;margin-top:15px'>
									
									<table>
										<tr>
											<td style='height:30px'>Nama Pegawai</td>
											<td style='width:10px'>:</td>
											<td>$nama_pegawai</td>
										</tr>
										<tr>
											<td>Jabatan</td>
											<td style='width:10px'>:</td>
											<td>$nama_jabatan</td>
										</tr>
									</table>
								
								</div>
								</td>
									<td style='width:60px'></td>
								<td style=\"width:40%;border:1px solid;float:left;height:120px\">
								<br />
									<table style='font-size:12px;'>
										<tr>
											<td style='height:30px'>Unit Kerja</td>
											<td style='width:10px'>:</td>
											<td>$nama_unit_kerja</td>
										</tr>
										<tr>
											<td>Bulan/Tahun Rekap</td>
											<td>:</td>
											<td>$nama_bulan / $tahun</td>
										</tr>
									</table>
								</td>
								</table>
								
						</div>
					
					
						 
				
							";
						
							
								//foreach($data as $val){
								
									$content .="
									<BR /><BR /><BR />
									<table style='text-align:center;border-collapse: collapse;width:100%;border=1; ' border ='1'>
										
											<tr>
												<td style='height:25px;width:200px;'>Tanggal </td>
												<td style='width:150px'>Jam Masuk</td>
												<td style='width:150px'>Jam Keluar</td>
												
											</tr>
										";
										foreach($data as $val){
											
											$content .="
												<tr>
													<td style='height:20px'>".$val['tanggal_masuk']."</td>
													<td>".$val['jam_masuk_set']."</td>
													<td>".$val['jam_keluar_set']."</td>
												
												</tr>
											";
										}
										
										
									$content .="
									</table>
									<br /><br />
						
							
										";
									
									
								//}
							$content .="
								</div>
								<table>
							<tr>
								<td style=\"font-size:12px;width:80px\">No. Rekap</td>
								<td>:</td>
								<td style='font-size:12px'>RP-LBR-$bulan-$tahun</td>
							</tr>
							
						</table>
	</div>
								";	
										
          
			require_once('./html2pdf/html2pdf.class.php');
			$html2pdf = new HTML2PDF ('P','A4','en');
			$html2pdf->WriteHTML($content);
			ob_end_clean();
			$html2pdf->Output('PURCHASE ORDER.pdf');
    

?>		   
		