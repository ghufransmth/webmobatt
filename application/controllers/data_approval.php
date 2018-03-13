<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_approval extends CI_Controller {

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
		$this->load->model('master_model_data_overtime');
		$this->load->model('master_model_get_data');

		
	}

	public function index()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_approval/index.php');
		$this->load->view('footer.php');
	}
	public function index_absensi()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_approval/index_absensi.php');
		$this->load->view('footer.php');
	}
	public function index_lembur()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_approval/index_lembur.php');
		$this->load->view('footer.php');
	}
	public function get_data_overtime($id_user=false){
			$data['data']=$this->master_model_data_overtime->data_master_overtime($id_user);
			
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	public function input_data_overtime()
	{
				
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_overtime/input_data_overtime.php');
		$this->load->view('footer.php');
	}
	
		public function save_overtime()
	{
			$data_devisi=$_POST;
	
			$data_devisi_get=$this->master_model_data_overtime->save_data_overtime($data_devisi);
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
	
	public function edit_data_overtime($id_user=false)
	{
		$data['data']=$this->master_model_data_overtime->data_master_overtime($id_user);
			
			
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_overtime/edit_data_overtime.php',$data);
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
	
		public function edit_overtime()
	{
			$data_devisi=$_POST;
		
			$data_devisi_get=$this->master_model_data_overtime->edit($data_devisi);
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
	

	
	public function delete_overtime($id_devisi=false)
	{
		$data_devisi=$this->master_model_data_overtime->delete_data_overtime($id_devisi);
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
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */