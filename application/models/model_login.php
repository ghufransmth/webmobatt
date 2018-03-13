<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Model_login extends CI_Model {
		

		public function get_cek_login($data){
			
			 $query=$this->db->get_where('master_data_user',$data);
				return $query;
		
		}
	}

?>
