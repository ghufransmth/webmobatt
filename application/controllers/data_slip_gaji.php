<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_slip_gaji extends CI_Controller {

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
$this->load->model('master_model_slip_gaji');
$this->load->model('master_model_user');


	
	}

	public function index()
	{
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_slip_gaji/index.php');
		$this->load->view('footer.php');
	}
	
	public function search()
	{
			$datanya=$_POST;
		$data['data']=$this->master_model_slip_gaji->data_master_slip_gaji_set($datanya);
			for($i=0;$i<count($data['data']);$i++){
				//$data['data'][$i]['data_user']=$this->master_model_user->data_master_user($data['data'][$i]['nama_pegawai']);
			
				
			}
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_slip_gaji/search.php',$data);
		$this->load->view('footer.php');
	}
	public function input_data_slip_gaji()
	{
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_slip_gaji/input_data_slip_gaji.php');
		$this->load->view('footer.php');
	}
	
	public function get_data_slip_gaji($id_user=false){
			$data['data']=$this->master_model_slip_gaji->data_master_slip_gaji($id_user);
			for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_user']=$this->master_model_user->data_master_user($data['data'][$i]['nama_pegawai']);
			
				
			}
		
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}

		public function view_edit_data_slip_gaji($id_user=false)
	{
		$data['data']=$this->master_model_slip_gaji->data_master_slip_gaji($id_user);
			for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_user']=$this->master_model_user->data_master_user($data['data'][$i]['nama_pegawai']);
			
				
			}
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_slip_gaji/edit_slip_gaji.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
	
		public function save_data_slip_gaji()
	{
			$data_devisi=$_POST;
			$foto['file_slip_gaji'] 		= pathinfo($_FILES['file_slip_gaji']['name'], 	PATHINFO_FILENAME);
			if ($foto['file_slip_gaji'] !='') {
			$file_slip_gaji 			= $this->master_model_slip_gaji->upload_foto_kk('file_slip_gaji', $_FILES['file_slip_gaji']['name']);
			$options['file_slip_gaji']  = substr($file_slip_gaji, 0, -4);	
			}
			else{
				unset($foto['file_slip_gaji']);
			}
			$data_devisi_get=$this->master_model_slip_gaji->save_data_slip_gaji($data_devisi);
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
	
		public function edit_data_slip_gaji()
	{
				$data_devisi=$_POST;
			$foto['file_slip_gaji'] 		= pathinfo($_FILES['file_slip_gaji']['name'], 	PATHINFO_FILENAME);
			if ($foto['file_slip_gaji'] !='') {
			$file_slip_gaji 			= $this->master_model_slip_gaji->upload_foto_kk('file_slip_gaji', $_FILES['file_slip_gaji']['name']);
			$options['file_slip_gaji']  = substr($file_slip_gaji, 0, -4);	
			}
			else{
				unset($foto['file_slip_gaji']);
			}
			$data_devisi_get=$this->master_model_slip_gaji->edit_data_slip_gaji($data_devisi);
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
	
	
	public function delete_data_slip_gaji($id_devisi=false)
	{
		$data_devisi=$this->master_model_slip_gaji->delete_slip_gaji($id_devisi);
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