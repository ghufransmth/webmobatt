<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Master_menu extends CI_Controller {
		function __construct(){
			header('Access-Control-Allow-Origin: *');
    		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('master_model_menu');
		}
		

		public function get_master_menu_utama($id_equipment=false){
			$data_equipment=$this->master_model_menu->data_master_menu_utama($id_equipment);
			$data_equipment_get['data']=$data_equipment;
		
			for($i=0;$i< count($data_equipment_get['data']) ; $i++){
				$data_equipment_get['data'][$i]['sub_menu']=$this->master_model_menu->data_master_menu_child($data_equipment_get['data'][$i]['menu_id'],$id_equipment);
			}
			$this->output->set_content_type('application/json')->set_output(json_encode($data_equipment_get));	
		}
		
		public function data_master_menu_child($id_equipment=false){
			$data_equipment=$this->master_model_menu->data_master_menu_child($id_equipment);
			$data_equipment_get['data']=$data_equipment;
			$data_equipment_get['data'][0]['total_equipment']=count($data_equipment);
			
			$this->output->set_content_type('application/json')->set_output(json_encode($data_equipment_get));	
		}
	}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */