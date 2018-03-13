<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_hc_info extends CI_Controller {

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
$this->load->model('master_model_data_hc_info');

	
	}

	public function index_struktur()
	{
		$data['data']=$this->master_model_data_hc_info->data_struktur();
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_hc_info/index_struktur.php',$data);
		$this->load->view('footer.php');
	}
	
	public function index_tutorial()
	{
		$data['data']=$this->master_model_data_hc_info->data_tutorial();
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_hc_info/index_tutorial.php',$data);
		$this->load->view('footer.php');
	}
	public function index_visi_misi()
	{
		$data['data']=$this->master_model_data_hc_info->data_visi_misi();
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_hc_info/index_visi_misi.php',$data);
		$this->load->view('footer.php');
	}
	
	public function index_budaya_kerja()
	{
		$data['data']=$this->master_model_data_hc_info->data_budaya_kerja();
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_hc_info/index_budaya_kerja.php',$data);
		$this->load->view('footer.php');
	}
	

	
		public function save_data_struktur_organisasi()
	{
			$data_devisi=$_POST;
			$foto['profile_image'] 		= pathinfo($_FILES['profile_image']['name'], 	PATHINFO_FILENAME);
			if ($foto['profile_image'] !='') {
			$profile_image 			= $this->master_model_data_hc_info->upload_foto_kk('profile_image', $_FILES['profile_image']['name']);
			$options['profile_image']  = substr($profile_image, 0, -4);	
			}
			else{
				unset($foto['profile_image']);
			}
			$data_devisi_get=$this->master_model_data_hc_info->save_struktur($data_devisi);
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
	
	
		public function save_data_tutorial()
	{
			$data_devisi=$_POST;
			$foto['profile_image'] 		= pathinfo($_FILES['profile_image']['name'], 	PATHINFO_FILENAME);
			if ($foto['profile_image'] !='') {
			$profile_image 			= $this->master_model_data_hc_info->upload_tutorial('profile_image', $_FILES['profile_image']['name']);
			$options['profile_image']  = substr($profile_image, 0, -4);	
			}
			else{
				unset($foto['profile_image']);
			}
			$data_devisi_get=$this->master_model_data_hc_info->save_tutorial($data_devisi);
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
	
	
			public function save_data_visi_misi()
	{
			$data_devisi=$_POST;
			
			$data_devisi_get=$this->master_model_data_hc_info->save_data_visi_misi($data_devisi);
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
				public function save_budaya_kerja()
	{
			$data_devisi=$_POST;
			
			$data_devisi_get=$this->master_model_data_hc_info->save_data_budaya_kerja($data_devisi);
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
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */