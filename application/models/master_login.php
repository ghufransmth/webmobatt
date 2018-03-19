<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Master_login extends CI_Model {
		

		public function get_cek_login($data){
			$query=$this->db->get_where('dbo.tb_users',$data);
			
			//$status2=$this->db->query('select a.*,b.* from dbo.tb_users a JOIN tb_geoatt b ON a.id=b.user_id where b.status_approv="1" and a.username="'.$data['username'].'" and a.password="'.$data['password'].'" and (SELECT DATE_ADD(DATE(b.start_date), INTERVAL 7 DAY) as jatuh_tempo) = (select DATE(now()))');
			//echo'select a.*,b.* from tb_users a JOIN tb_geoatt b ON a.id=b.user_id where b.status_approv="1" and a.username="'.$data['username'].'" and a.password="'.$data['password'].'" and (SELECT DATE_ADD(DATE(b.start_date), INTERVAL 7 DAY) as jatuh_tempo) = (select DATE(now()))';
			$result2=$query->result_array();
			
			
			
				return $query;
		}
		
		public function get_cek_login_pegawai($data){
			$query=$this->db->get_where('dbo.tb_users',$data);
			 //$this->db->insert('data_session_log',$data_save);
			// $this->db->query('UPDATE master_data_user SET last_login=CURRENT_TIMESTAMP where password="'.$data['password'].'"');
				return $query;
		}
		public function data_login($data){
			$query=$this->db->query("select id totalnya from dbo.tb_users where username='".$data['username']."' and blocked=1");
			 //$this->db->insert('data_session_log',$data_save);
			// $this->db->query('UPDATE master_data_user SET last_login=CURRENT_TIMESTAMP where password="'.$data['password'].'"');
				return $query;
		}
	}

?>
