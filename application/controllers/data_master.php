<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_master extends CI_Controller {

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
		$this->load->model('master_model_data');

	
	}

	public function index_master_jabatan()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_master_jabatan/index.php');
		$this->load->view('footer.php');
	}
	public function get_data_user($id_user=false){
			$data['data']=$this->master_model_user->data_master_user($id_user);
			for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_jabatan']=$this->master_model_user->data_jabatan($data['data'][$i]['nama_jabatan']);
				if($data['data'][$i]['atasan_1'] == "-"){
				$data['data'][$i]['data_jabatan_atasan']=array(array("nama_jabatan"=>"Tidak Ada Atasan"));		
					
				}else{
				$data['data'][$i]['data_jabatan_atasan']=$this->master_model_user->data_jabatan($data['data'][$i]['atasan_1']);			
					
				}
				
				if($data['data'][$i]['atasan_2'] == "0"){
				$data['data'][$i]['nama_jabatan_atasan']=array(array("first_name"=>"Top Level"));		
					
				}else{
				$data['data'][$i]['nama_jabatan_atasan']=$this->master_model_user->data_master_user($data['data'][$i]['atasan_2']);			
					
				}
				
			}
		
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function get_data_jabatan($id_user=false){
			$data['data']=$this->master_model_data->data_master_jabatan($id_user);
			
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function get_data_unit_kerja($id_user=false){
			$data['data']=$this->master_model_data->data_master_unit_kerja($id_user);
			
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	
	
	
	public function input_master_data_jabatan()
	{
				
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_master_jabatan/input_master_data_jabatan.php');
		$this->load->view('footer.php');
	}
	
		public function save_data_master_jabatan()
	{
			$data_devisi=$_POST;
			
			$data_devisi_get=$this->master_model_data->save_data_jabatan($data_devisi);
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
	
	public function view_edit_data_master_jabatan($id_user=false)
	{
		$data['data']=$this->master_model_data->data_master_jabatan($id_user);
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_master_jabatan/edit_master_data_jabatan.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
		public function edit_data_master_jabatan()
	{
			$data_devisi=$_POST;
			
			$data_devisi_get=$this->master_model_data->edit_data_jabatan($data_devisi);
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
	
	public function delete_master_jabatan($id_user=false){
			if($id_user!=false){
				$delete=$this->master_model_data->delete_master_data_jabatan($id_user);
				if($delete){
					$data['result']="Data Berhasil dihapus";
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}else{
					$data['result']="Data Tidak Berhasil dihapus";
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}
			}else{
					$data['result']	="Id tidak ada";
					$data['error']	=true;
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
		}
		
		public function index_unit_kerja()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_master_unit_kerja/index.php');
		$this->load->view('footer.php');
	}
	
	public function input_master_data_unit_kerja()
	{
				
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_master_unit_kerja/input_master_data_unit_kerja.php');
		$this->load->view('footer.php');
	}
	
	
		public function save_data_master_unit_kerja()
	{
			$data_devisi=$_POST;
			
			$data_devisi_get=$this->master_model_data->save_data_unit_kerja($data_devisi);
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
	
	
	public function view_edit_data_master_unit_kerja($id_user=false)
	{
		$data['data']=$this->master_model_data->data_master_unit_kerja($id_user);
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_master_unit_kerja/edit_master_data_unit_kerja.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
	
		public function edit_data_master_unit_kerja()
	{
			$data_devisi=$_POST;
			
			$data_devisi_get=$this->master_model_data->edit_data_unit_kerja($data_devisi);
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
	
		public function delete_master_unit_kerja($id_user=false){
			if($id_user!=false){
				$delete=$this->master_model_data->delete_master_unit_kerja($id_user);
				if($delete){
					$data['result']="Data Berhasil dihapus";
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}else{
					$data['result']="Data Tidak Berhasil dihapus";
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}
			}else{
					$data['result']	="Id tidak ada";
					$data['error']	=true;
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
		}
		
		
		
		
			public function index_perijinan()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_master_perijinan/index.php');
		$this->load->view('footer.php');
	}
	
	public function input_master_data_perijinan()
	{
				
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_master_perijinan/input_master_data_perijinan.php');
		$this->load->view('footer.php');
	}
	
	
		public function save_data_master_perijinan()
	{
			$data_devisi=$_POST;
			
			$data_devisi_get=$this->master_model_data->save_data_perijinan($data_devisi);
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
	
	
	public function view_edit_data_master_perijinan($id_user=false)
	{
	$data['data']=$this->master_model_data->data_master_perijinan($id_user);
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_master_perijinan/edit_master_data_perijinan.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
	
		public function edit_data_master_perijinan()
	{
			$data_devisi=$_POST;
			
			$data_devisi_get=$this->master_model_data->edit_data_perijinan($data_devisi);
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
	
		public function delete_master_perijinan($id_user=false){
			if($id_user!=false){
				$delete=$this->master_model_data->delete_master_perijinan($id_user);
				if($delete){
					$data['result']="Data Berhasil dihapus";
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}else{
					$data['result']="Data Tidak Berhasil dihapus";
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}
			}else{
					$data['result']	="Id tidak ada";
					$data['error']	=true;
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
		}
		
		public function get_data_perijinan($id_user=false)
	{
		$data['data']=$this->master_model_data->data_master_perijinan($id_user);
	
		
	$this->output->set_content_type('application/json')->set_output(json_encode($data));	
		
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */