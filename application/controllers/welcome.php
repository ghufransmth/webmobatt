<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->model('model_login');
			$this->load->model('master_model_user');
		$this->load->model('master_model_data_ijin');
		$this->load->model('master_model_get_data');
	$this->load->model('master_model_absensi');
	if($this->session->userdata('status_login_mandiri')){
			 
		}else{
			redirect('default_controller');
		}
	}
	

		
	public function index()
	{
			$data['data']=$this->master_model_absensi->data_absensi_max();
		for($i=0;$i<count($data['data']);$i++){

				//$data['data'][$i]['data_absensi']=$this->master_model_absensi->total_data_absensi($this->session->userdata('id_user'));
			
		}	
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('index.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	
	
	public function page_blank()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page_blank.php');
		$this->load->view('footer.php');
		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */