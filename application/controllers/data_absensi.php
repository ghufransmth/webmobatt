<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_absensi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_model_user');
		$this->load->model('master_model_data_ijin');
		$this->load->model('master_model_get_data');
	$this->load->model('master_model_absensi');
		
	}
	
	 public function total_absensi_setuju(){     //fungsi load_row untuk menampilkan jlh data pada navbar secara realtime
       
			echo $this->master_model_absensi->total_absensi_setuju(); //jumlah data akan langsung di tampilkan
		
    }
		public function load_absensi_setuju(){    //fungsi load_data untuk menampilkan isi data pada navbar secara realtime
		
				$datas=$this->master_model_absensi->data_master_absensi_setuju();
		
        $no=0;
		
        foreach($datas as $rdata){ $no++;
            if($no % 2==0){$strip='strip1';}
                    else{$strip='strip2';}
            echo" 
			 <li>
						
						<ul class=\"menu\">
						  <li>
							<table class='table' >
								<tr>
									<td>Tanggal Masuk</td>
									<td>:</td>
									<td>".$rdata['start_date']." </td>
								</tr>
									<tr>
									<td>Tanggal Keluar</td>
									<td>:</td>
									<td>".$rdata['end_date']." </td>
								</tr>
								<tr style='border-bottom:solid 1px'>
									<td colspan='3' style='border-bottom:solid 1px'></td>
								</tr>
							</table>
							
						  </li>
						 
						</ul>
					  </li>";
        }
    }
	
	public function index()
	{
		$month=date('m');
				$year=date('Y');
		$data['data']=$this->master_model_user->data_master_user_absensi($this->session->userdata('id_user'));
		for($i=0;$i<count($data['data']);$i++){
			for($a=1;$a<=31;$a++){
				$data['data'][$i]['data_absensi'][$a]=$this->master_model_absensi->data_master_absensi2($a,$month,$year,$this->session->userdata('id_user'));
			}
		}
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_absensi/index.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function approval_absensi($id_devisi=false)
	{
		$data_devisi=$this->master_model_absensi->approval_absensi($id_devisi);
			if($data_devisi){
				$data['result']="Data Berhasil Dihapus";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Dihapus";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
		public function hapus_file($id_devisi=false)
	{
		$data_devisi=$this->master_model_absensi->hapus_file();
			if($data_devisi){
				$data['result']="Data Berhasil Dihapus";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Dihapus";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
		public function reject_absensi($id_devisi=false)
	{
		$data_devisi=$this->master_model_absensi->reject_absensi($id_devisi);
			if($data_devisi){
				$data['result']="Data Berhasil Dihapus";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Dihapus";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
		public function reject_absensi2($id_devisi=false)
	{
		$data_devisi=$this->master_model_absensi->reject_absensi2($id_devisi);
			if($data_devisi){
				$data['result']="Data Berhasil Dihapus";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Dihapus";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
		public function get_data_absensi_approval($id_user=false){
			$data['data']=$this->master_model_absensi->data_master_absensi_approval($id_user);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
		
				
		}
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
		public function get_data_absensi_approval_delegated($id_user=false){
			$data['data']=$this->master_model_absensi->data_master_absensi_approval($id_user);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
		
				
		}
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function get_total_absensi($id_user=false){
			$data['data']=$this->master_model_absensi->data_absensi_total($id_user);
			
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
		public function get_data_absensi_approval_reject($id_user=false){
			$data['data']=$this->master_model_absensi->data_master_absensi_approval_reject($id_user);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
		
				
		}
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function history()
	{
		$month=date('m');
				$year=date('Y');
		$data['data']=$this->master_model_user->data_master_user_absensi_history($this->session->userdata('id_user'));
		for($i=0;$i<count($data['data']);$i++){
			for($a=1;$a<=31;$a++){
				$data['data'][$i]['data_absensi'][$a]=$this->master_model_absensi->data_master_absensi2($a,$month,$year,$this->session->userdata('id_user'));
			}
		}
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_history/index.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
		public function search_absen()
	{
		$month=$_POST['bulan'];
				$year=$_POST['tahun'];
		$data['data']=$this->master_model_user->data_master_user($this->session->userdata('id_user'));
		for($i=0;$i<count($data['data']);$i++){
			for($a=1;$a<=31;$a++){
				$data['data'][$i]['data_absensi'][$a]=$this->master_model_absensi->data_master_absensi2($a,$month,$year,$this->session->userdata('id_user'));
			}
		}
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_absensi/index.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	
	public function search_absen_history()
	{
		$month=$_POST['bulan'];
				$year=$_POST['tahun'];
		$data['data']=$this->master_model_user->data_master_user($this->session->userdata('id_user'));
		for($i=0;$i<count($data['data']);$i++){
			for($a=1;$a<=31;$a++){
				$data['data'][$i]['data_absensi'][$a]=$this->master_model_absensi->data_master_absensi2($a,$month,$year,$this->session->userdata('id_user'));
			}
		}
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_history/index.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
		public function index_admin()
	{
		$month=date('m');
				$year=date('Y');
		$data['data']=$this->master_model_user->data_master_user();
		for($i=0;$i<count($data['data']);$i++){
			for($a=1;$a<=31;$a++){
				$data['data'][$i]['data_absensi'][$a]=$this->master_model_absensi->data_master_absensi2($a,$month,$year,$data['data'][$i]['id']);
			}
		}
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_absensi/index_admin.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
		public function search_admin()
	{
		$month=$_POST['bulan'];
				$year=$_POST['tahun'];
		$data['data']=$this->master_model_user->data_master_user();
		for($i=0;$i<count($data['data']);$i++){
			for($a=1;$a<=31;$a++){
				$data['data'][$i]['data_absensi'][$a]=$this->master_model_absensi->data_master_absensi2($a,$month,$year,$data['data'][$i]['id']);
			}
		}
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_absensi/index_admin.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function get_data_ijin($id_user=false){
			$data['data']=$this->master_model_data_ijin->data_master_ijin($id_user);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
					
				}
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
				
		}
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
		public function get_data_absen($id_user=false){
			$data['data']=$this->master_model_absensi->data_absensi($this->session->userdata('id_user'));
		
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function input_data_ijin()
	{
				
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_ijin/input_data_ijin.php');
		$this->load->view('footer.php');
	}
	
		public function save_data_absensi()
	{
			$data_devisi=$_POST;
	
			$data_devisi_get=$this->master_model_absensi->save_data_absensi($data_devisi);
			if($data_devisi_get){
				$data['result']="Data Successfully Inserted";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$data['dev']=$data_devisi_get;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
		public function save_data_absensi_ijin_cepat()
	{
			$data_devisi=$_POST;
	
			$data_devisi_get=$this->master_model_absensi->save_data_absensi_ijin_cepat($data_devisi);
			if($data_devisi_get){
				$data['result']="Data Successfully Deleted";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
	public function detail_absensi($id_user=false,$id=false)
	{
		$data['data']=$this->master_model_absensi->data_master_absensi($id_user);
		
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_absensi/detail_absensi.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
	
		public function view_data_pegawai($id_user=false)
	{
	$data['data']=$this->master_model_pegawai->data_master_pegawai($id_user);
			for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_pangkat']=$this->master_model_get_data->data_pangkat($data['data'][$i]['pangkat']);
				$data['data'][$i]['data_pendidikan']=$this->master_model_get_data->data_pendidikan($data['data'][$i]['pendidikan']);
				$data['data'][$i]['data_jabatan']=$this->master_model_get_data->data_jabatan($data['data'][$i]['struktur_jabatan']);
				$data['data'][$i]['data_jenjang_pendidikan']=$this->master_model_get_data->data_jenjang_pendidikan($data['data'][$i]['jenjang_pendidikan']);
				$data['data'][$i]['data_posisi']=$this->master_model_get_data->data_posisi($data['data'][$i]['posisi']);
			}
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_pegawai/view_data_pegawai.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
	
		public function edit_data_ijin_action()
	{
			$data_devisi=$_POST;
		
			$data_devisi_get=$this->master_model_data_ijin->edit($data_devisi);
			if($data_devisi_get){
				$data['result']="Data Successfully Deleted";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	

	
	public function delete_ijin($id_devisi=false)
	{
		$data_devisi=$this->master_model_data_ijin->delete_ijin($id_devisi);
			if($data_devisi){
				$data['result']="Data Berhasil Dihapus";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Dihapus";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
	public function approval_ijin($id_devisi=false)
	{
		$data_devisi=$this->master_model_data_ijin->approval_ijin($id_devisi);
			if($data_devisi){
				$data['result']="Data Berhasil Dihapus";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Dihapus";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
		public function delete_master_data_user_oto($id_devisi=false)
	{
		$data_devisi=$this->master_model_user->delete_oto($id_devisi);
			if($data_devisi){
				$data['result']="Data Berhasil Dihapus";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Dihapus";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
		public function excel_user()
	{
		$data['data']=$this->master_model_user->data_master_user();
		$this->load->view('page/data_user/excel_user.php',$data);
		
	}
	
		public function backup_user()
	{
		$data['data']=$this->master_model_user->backup_user();
		redirect('data_user');
	}
	
	public function get_master_data_pangkat($id_user=false){
			$data_brands=$this->master_model_get_data->data_pangkat($id_user);
			$data_brands_get['data']=$data_brands;
				
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}
	public function get_master_data_pendidikan($id_user=false){
			$data_brands=$this->master_model_get_data->data_pendidikan($id_user);
			$data_brands_get['data']=$data_brands;
				
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}
	public function get_master_data_jabatan($id_user=false){
			$data_brands=$this->master_model_get_data->data_jabatan($id_user);
			$data_brands_get['data']=$data_brands;
				
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}
	public function get_master_data_jenjang_pendidikan($id_user=false){
			$data_brands=$this->master_model_get_data->data_jenjang_pendidikan($id_user);
			$data_brands_get['data']=$data_brands;
				
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}
	public function get_master_data_posisi($id_user=false){
			$data_brands=$this->master_model_get_data->data_posisi($id_user);
			$data_brands_get['data']=$data_brands;
				
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}
	
	public function status_absensi($id_user=false){
			$data['data']=$this->master_model_absensi->get_status_absensi($id_user);
			
				if($data['data'][0]['total']  == 0){
					$data['data'][0]['status_absensi']="Absen Masuk";
				}else{
					$data['data'][0]['status_absensi']="Absen Keluar";
				}
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */