<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Master_user extends CI_Controller {
		function __construct(){
			header('Access-Control-Allow-Origin: *');
    		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('master_model_user');
			$this->load->model('master_model_divisi');
		}
		

		public function get_master_user($id_user=false){
			$data_user=$this->master_model_user->data_master_user($id_user);
			for($i=0;$i<count($data_user);$i++){
				$data_user[$i]['data_divisi']=$this->master_model_divisi->data_master_divisi($data_user[$i]['id_divisi']);
			}
			$data_user_get['data']=$data_user;
			$this->output->set_content_type('application/json')->set_output(json_encode($data_user_get));	
		}
		
		public function master_direktur($id_user=false){
			$data_user=$this->master_model_user->data_direktur($id_user);
			
			$data_user_get['data']=$data_user;
			$this->output->set_content_type('application/json')->set_output(json_encode($data_user_get));	
		}
		
		public function master_status($id_user=false){
			$data_user=$this->master_model_user->data_status($id_user);
			
			$data_user_get['data']=$data_user;
			$this->output->set_content_type('application/json')->set_output(json_encode($data_user_get));	
		}


		public function create_master_user(){
			$create_user=$_POST;
			$create_model=$this->master_model_user->create_master_user($create_user);
			if($create_model){
				$data['result']="Data Berhasil Masuk";
				$data['status']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Masuk";
				$data['status']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
		}


		public function update_master_user(){
			$update_user=$_POST;
			$update_model=$this->master_model_user->update_model_user($update_user);
			if($update_model){
				$data['result']="Data Berhasil Diedit";
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
		}


		public function delete_master_user($id_user=false){
			if($id_user!=false){
				$delete=$this->master_model_user->delete_model_user($id_user);
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
	}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */