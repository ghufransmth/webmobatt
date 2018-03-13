<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_bpjs extends CI_Controller {

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
$this->load->model('master_model_bpjs');
$this->load->model('master_model_user');


	
	}

	public function index()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_bpjs/index.php');
		$this->load->view('footer.php');
	}
		public function index_staff()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_bpjs/index_staff.php');
		$this->load->view('footer.php');
	}
	
	public function input_data_bpjs()
	{
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_bpjs/input_bpjs.php');
		$this->load->view('footer.php');
	}
	
	public function get_data_bpjs($id_user=false){
			$data['data']=$this->master_model_bpjs->data_master_bpjs2($id_user);
			for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_user']=$this->master_model_user->data_master_user($data['data'][$i]['id_pegawai']);
			$data['data'][$i]['data_bpjs']=$this->master_model_bpjs->get_bpjs($data['data'][$i]['username']);
			
				
			}
		
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function get_data_bpjs2($id_user=false){
			$data['data']=$this->master_model_bpjs->data_master_bpjs23($id_user);
			for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_user']=$this->master_model_user->data_master_user($data['data'][$i]['id_pegawai']);
			$data['data'][$i]['data_bpjs']=$this->master_model_bpjs->get_bpjs($data['data'][$i]['username']);
			
				
			}
		
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}

		public function view_edit_data_bpjs($id_user=false)
	{
		$data['data']=$this->master_model_bpjs->data_master_bpjs($id_user);
			for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_user']=$this->master_model_user->data_master_user($data['data'][$i]['id_pegawai']);
			
				
			}
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_bpjs/edit_bpjs.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
	
		public function save_data_bpjs()
	{
			$data_devisi=$_POST;
			$foto['file_bpjs'] 		= pathinfo($_FILES['file_bpjs']['name'], 	PATHINFO_FILENAME);
			if ($foto['file_bpjs'] !='') {
			$file_bpjs 			= $this->master_model_bpjs->upload_foto_kk('file_bpjs', $_FILES['file_bpjs']['name']);
			$options['file_bpjs']  = substr($file_bpjs, 0, -4);	
			}
			else{
				unset($foto['file_bpjs']);
			}
			$data_devisi_get=$this->master_model_bpjs->save_bpjs($data_devisi);
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
	
		public function edit_data_bpjs()
	{
			$data_devisi=$_POST;
			$foto['file_bpjs'] 		= pathinfo($_FILES['file_bpjs']['name'], 	PATHINFO_FILENAME);
			if ($foto['file_bpjs'] !='') {
			$file_bpjs 			= $this->master_model_bpjs->upload_foto_kk('file_bpjs', $_FILES['file_bpjs']['name']);
			$options['file_bpjs']  = substr($file_bpjs, 0, -4);	
			}
			else{
				unset($foto['file_bpjs']);
			}
			$data_devisi_get=$this->master_model_bpjs->edit_bpjs($data_devisi);
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
	
	
	public function delete_data_bpjs($id_devisi=false)
	{
		$data_devisi=$this->master_model_bpjs->delete_bpjs($id_devisi);
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
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */