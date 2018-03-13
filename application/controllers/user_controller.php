<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_controller extends CI_Controller {

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
		if($this->session->userdata('id_user')){
			 
		}else{
			redirect('default_controller');
		}
	}

	public function index()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
	
		$this->load->view('page/user/user_admin.php');
		$this->load->view('footer.php');
	}
	public function view_create_user_admin()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/user/input_master_user_admin.php');
		$this->load->view('footer.php');
	}

	public function save_user_admin()
	{
		
			
		
			
			$data_bags=$_POST;
			$data_bags_get=$this->master_model_user->save_user_admin($data_bags);
			if($data_bags_get){
				$data['result']="Data Berhasil Diedit";
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

	public function edit_user_admin()
	{
		
			
		
			
			$data_bags=$_POST;
			$data_bags_get=$this->master_model_user->edit_user_admin($data_bags);
			if($data_bags_get){
				$data['result']="Data Berhasil Diedit";
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

    
	
	public function delete_user_admin($data_bags=false)
	{
		
			
		
			
			$data_bags_get=$this->master_model_user->delete_user_admin($data_bags);
			if($data_bags_get){
				$data['result']="Data Berhasil Diedit";
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
	
	public function get_data_user_admin($id_pembelian=false){
			$data_brands=$this->master_model_user->data_master_user_admin($id_pembelian);
			$data_brands_get['data']=$data_brands;
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}


	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */