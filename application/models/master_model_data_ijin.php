<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Master_model_data_ijin extends CI_Model {
		
		public function data_master_ijin($id_shoes_category=false){
		
			
			if($this->session->userdata('user_level') == "admin"){
				if($id_shoes_category!=false){
					$get_query=$this->db->query("select a.*,b.* from tb_users a JOIN tb_timeoff  b ON b.user_id=a.id where  b.id='".$id_shoes_category."'");
				}else{
					$get_query=$this->db->query("select a.*,b.* from tb_users a JOIN tb_timeoff  b ON b.user_id=a.id");
				}
			}else{
				if($id_shoes_category!=false){
					$get_query=$this->db->query("select a.*,b.* from tb_users  a JOIN tb_timeoff b ON b.user_id=a.id where b.user_id='".$this->session->userdata('id_user')."' and b.id='".$id_shoes_category."'");
				}else{
					$get_query=$this->db->query("select a.*,b.* from tb_users a JOIN tb_timeoff  b ON b.user_id=a.id where b.user_id='".$this->session->userdata('id_user')."'");
				}
					
			}
			
		
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_master_ijin_search_laporan($data=false){
		
			
					$get_query=$this->db->query('select a.*,b.*,DATE(a.start_date)as tanggal_mulai,DATE(a.end_date)as tanggal_selesai from tb_timeoff a JOIN tb_users b ON a.user_id=b.id where a.user_id="'.$data['id_pegawai'].'" and MONTH(start_date)="'.$data['bulan'].'" and YEAR(end_date)="'.$data['tahun'].'" ORDER BY a.start_date ASC');
		
			
		
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_master_ijin_setuju_index($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			if($this->session->userdata('user_level') == "admin"){
				
			}else{
				$this->db->where('user_id',$this->session->userdata('id_user'));
			}
			$this->db->where('status_approv',0);
			$get_query=$this->db->get('tb_timeoff');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function data_master_ijin_setuju($id_shoes_category=false){
		
			 $get_query=$this->db->query("select * from tb_timeoff where status_approv='0' ORDER BY id DESC LIMIT 0,4 ");
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function total_ijin_setuju($offset=false,$number=false){
			
		
		
			 $status=$this->db->query("select * from tb_timeoff where status_approv='0'");
		
		
			
				$result=$status->num_rows();
			 
			
			 return $result;
		}
		
		public function data_master_ijin_list($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			$this->db->where('deleted',0);
			
			$get_query=$this->db->get('tb_reason_timeoff_picklist');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_master_ijin_approval($id_shoes_category=false){
			if($this->session->userdata('user_level') == "admin"){
				if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			if($this->session->userdata('user_level') == "admin"){
				
			}else{
				$this->db->where('user_id',$this->session->userdata('id_user'));
			}
			$this->db->where('status_approv',1);
			$get_query=$this->db->get('tb_timeoff');
			}else{
				
				$get_query=$this->db->query('select a.*,b.* from  tb_users a JOIN tb_timeoff b ON a.id=b.user_id where a.atasan_1="'.$this->session->userdata('jabatan').'" and a.atasan_2="'.$this->session->userdata('id_user').'" and b.status_approv="1"');
			
			}
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_master_ijin_approval_delegated($id_shoes_category=false){
			if($this->session->userdata('user_level') == "admin"){
				if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			if($this->session->userdata('user_level') == "admin"){
				
			}else{
				$this->db->where('user_id',$this->session->userdata('id_user'));
			}
			$this->db->where('status_approv',1);
			$get_query=$this->db->get('tb_timeoff');
			}else{
				$tanggal=date("Y-m-d");
				$get_query=$this->db->query('select a.*,b.*,c.* from  tb_users a JOIN tb_timeoff b ON a.id=b.user_id JOIN  tb_delegate c ON b.user_id=c.delegate_for where a.nama_unit_kerja="'.$this->session->userdata('nama_unit_kerja').'" and c.delegate_by="'.$this->session->userdata('atasan_2').'" and b.status_approv="1" and c.delegate_date>="'.$tanggal.'" ');
			
			}
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function data_master_ijin_approval_sudah_setuju($id_shoes_category=false){
			if($this->session->userdata('user_level') == "admin"){
				if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			if($this->session->userdata('user_level') == "admin"){
				
			}else{
				$this->db->where('user_id',$this->session->userdata('id_user'));
			}
			$this->db->where('status_approv',0);
			$get_query=$this->db->get('tb_timeoff');
			}else{
				
				$get_query=$this->db->query('select a.*,b.* from  tb_users a JOIN tb_timeoff b ON a.id=b.user_id where a.atasan_1="'.$this->session->userdata('jabatan').'" and a.atasan_2="'.$this->session->userdata('id_user').'" and b.status_approv="1"');
			
			}
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		
		
			public function data_master_area($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id_area',$id_shoes_category);
			}
			
			$this->db->where('deleted',0);
				$this->db->order_by('id_area','ASC');
			$get_query=$this->db->get('master_data_area');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		
		
			public function data_master_area_tidak_terpilih($id_shoes_category=false){
			$get_query=$this->db->query('select * from master_data_area where deleted="0" and id_area NOT IN (select otoritas from master_data_otoritas where deleted="0" and id_user_insert="'.$id_shoes_category.'")');
			
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_master_area_set($id_shoes_category=false){
			
			$get_query=$this->db->query('select a.*,b.* from master_data_otoritas a JOIN master_data_area b ON a.otoritas=b.id_area where a.deleted="0" and id_user_insert="'.$id_shoes_category.'"');
			
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_master_area_set_area($id_shoes_category=false){
			
			$get_query=$this->db->query('select a.*,b.* from master_data_otoritas a JOIN master_data_user b ON a.id_user_insert=b.id where a.deleted="0" and b.deleted="0" and a.otoritas="'.$id_shoes_category.'"');
			
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
	
		
		public function save_ijin($data){
			
				if(isset($data['is_libur_nasional'])){
					$libur=0;
				}else{
					$libur=1;
				}
				$data_barang['user_id']=$data['user_id'];
				
				$data_barang['start_date']=$data['start_date'];
				$data_barang['end_date']=$data['end_date'];
				$data_barang['reason']=$data['reason'];
				$data_barang['status_approv']=1;
				$data_barang['approve_by']=1;
				$data_barang['is_libur_nasional']=$libur;
				$data_barang['seen']=1;
				$data_barang['created_on']=$data['start_date'];
				$data_barang['modified_on']=$data['start_date'];
				
				
				$insert=$this->db->insert('tb_timeoff',$data_barang);
			/*$insert=$this->db->query("INSERT INTO tb_timeoff (user_id,start_date,end_date,reason,status_approv,approve_by,seen,is_libur_nasional,created_on,modified_on)
			VALUES('".$data['user_id']."','".$data['start_date']."','".$data['end_date']."','".$data['reason']."','1','1','2','2','".$data['end_date']."','".$data['end_date']."')
			");*/
			
				
				if($insert){
				//	return true;
				}else{
					//return false;
				}
			
		}
		
		
		public function edit($data){
					if(isset($data['is_libur_nasional'])){
					$libur=0;
				}else{
					$libur=1;
				}
				
				$data_barang['is_libur_nasional']=$libur;
				$data_barang['start_date']=$data['start_date'];
				$data_barang['end_date']=$data['end_date'];
				$data_barang['reason']=$data['reason'];
				$data_barang['status_approv']=1;
				$data_barang['approve_by']=1;
				$data_barang['is_libur_nasional']=$libur;
				$data_barang['seen']=1;
				$data_barang['created_on']=$data['start_date'];
				$data_barang['modified_on']=$data['start_date'];
				
					$this->db->where('id',$data['id']);
					$update=$this->db->update('tb_timeoff',$data_barang);
					
					
			
				if($update){
					return true;
				}else{
					return false;
				}
			
		}
		
			public function edit_profil($data_set){
				
				if($_FILES['nama_file']['name'] == ""){
					$file_name_foto_profil=$data_set['nama_file_db'];
					$data_set['gambar']=$file_name_foto_profil;
				}else{
					$fileprofil_ = explode('.', $_FILES['nama_file']['name']);
				$file_profil_save=md5($_FILES['nama_file']['name']).'.'.$fileprofil_[1].'';
				
				$data['gambar']=$file_profil_save;
				}
				if($data_set['password'] == ""){
					
					$password=$data_set['password_db'];
				}else{
					$password=md5($data_set['password']);
				}
				$data['username']=$data_set['username'];
				$data['nama']=$data_set['nama'];
				$data['no_telepon']=$data_set['no_telepon'];
				$data['email']=$data_set['email'];
				$data['user_id']=$data_set['user_id'];
				$data['password']=$password;
				
					
					$this->db->where('id',$data_set['id']);
					$update=$this->db->update('master_data_user',$data);
					
					
			
				if($update){
					return true;
				}else{
					return false;
				}
			
		}
		
		public function edit_password($data){
					$status2=$this->db->query('select COUNT(username)AS cek_code_brands from master_data_user where deleted="0" and password="'.md5($data['password_lama']).'"');
			$result2=$status2->result_array();
			if($result2[0]['cek_code_brands'] > 0){
				$data_set['password']=md5($this->input->post('password_baru'));
					$this->db->where('id',$data['id_ubah_pwd']);
					$update=$this->db->update('master_data_user',$data_set);
				if($update){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
					
			
		}
		
		public function delete_ijin($id_shoes_category){
			
		
			$query=$this->db->query("delete from tb_timeoff WHERE id='".$id_shoes_category."'");
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
		public function approval_ijin($id_shoes_category){
			
		
			$query=$this->db->query("update tb_timeoff  set status_approv='0',approve_by='".$this->session->userdata('id_user')."'  WHERE id='".$id_shoes_category."'");
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
			public function reject_approval_ijin($id_shoes_category){
			
		
			$query=$this->db->query('update tb_timeoff  set status_approv="1"  WHERE id="'.$id_shoes_category.'"');
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
				public function reject_approval_ijin2($id_shoes_category){
			
		
			$query=$this->db->query("update tb_timeoff  set status_approv='2'  WHERE id='".$id_shoes_category."'");
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
		public function delete_oto($id_shoes_category){
			$query=$this->db->query('delete from master_data_otoritas  WHERE id_otoritas="'.$id_shoes_category.'"');
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
		public function backup_user(){
			 $data=date('d_m_y h_i_s A');
			$get_query=$this->db->query("select * from master_data_user where deleted='0' into outfile 'D:\\ backup_$data.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n';");
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function upload_foto_kk($name, $file_name){
			$file_ = explode('.', $file_name);
			// $config['file_name']		= '';
			$nama_file = explode('.', $file_name);
			
			$config['upload_path'] 		= './upload/foto_user/';
			$config['allowed_types'] 	= 'jpg|png';
			$config['max_size']			= '1000';
			$config['file_name']		= md5($file_name);

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload($name)) {
				$data = array('error' => $this->upload->display_errors());
			}
			else{
				$data = array('upload_data' => $this->upload->data());
			}

			return $file_name;
		}
		
		
	}

?>
