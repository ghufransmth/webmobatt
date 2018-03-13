<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Master_model_user extends CI_Model {
		
		public function data_master_user($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			$this->db->where('blocked',1);
			$get_query=$this->db->get('tb_users');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function total_ijin_forgot_password($offset=false,$number=false){
			
		
		
			 $status=$this->db->query("select * from tb_forgot_password where status_ganti='1'");
		
		
			
				$result=$status->num_rows();
			 
			
			 return $result;
		}
		
		public function data_master_forgot_password($id_shoes_category=false){
		
			 $get_query=$this->db->query("select a.*,b.* from tb_forgot_password a join tb_users b ON a.id_user=b.id where a.status_ganti='1'");
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_master_user_absensi($id_shoes_category=false){
			if($this->session->userdata('user_level') == "admin"){
			
			
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
		
			$get_query=$this->db->get('tb_users');
			
			
			
			}else{
				
				$get_query=$this->db->query('select a.* from  tb_users a  where a.atasan_1="'.$this->session->userdata('jabatan').'" and a.atasan_2="'.$this->session->userdata('id_user').'" OR a.id="'.$this->session->userdata('id_user').'"');
			
			}
			
			
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function data_master_user_absensi_history($id_shoes_category=false){
			
				$this->db->where('id',$id_shoes_category);
			
		
			$get_query=$this->db->get('tb_users');
			
			
			
		
			
			
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		
		public function data_master_user_jabatan($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('nama_jabatan',$id_shoes_category);
			}
		
			$get_query=$this->db->get('tb_users');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function data_jabatan($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id_jabatan',$id_shoes_category);
			}
		
			$get_query=$this->db->get('tb_jabatan');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function data_unit_kerja($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
		
			$get_query=$this->db->get('tb_unit_kerja_master');
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
	
		
		public function save_data_user($data){
			/*$status2=$this->db->query('select COUNT(username)AS cek_code_brands from tb_users where  username="'.$data['username'].'"');
			$result2=$status2->result_array();
			if($result2[0]['cek_code_brands'] > 0){
				return false;
			}else{*/
				
				$fileprofil_ = explode('.', $_FILES['profile_image']['name']);
				$file_profil_save=md5($_FILES['profile_image']['name']).'.'.$fileprofil_[1].'';
				$data_barang['profile_image']=$file_profil_save;
				$data_barang['username']=$data['username'];
				$data_barang['password']=$data['password'];
				$data_barang['first_name']=$data['first_name'];
				$data_barang['nama_jabatan']=$data['nama_jabatan'];
				
				$data_barang['nama_unit_kerja']=$data['nama_unit_kerja'];
				$data_barang['atasan_1']=$data['atasan_1'];
				$data_barang['atasan_2']=$data['atasan_2'];
				
				$data_barang['user_level']=$data['user_level'];
				$insert=$this->db->insert('tb_users',$data_barang);
				
			
				
				if($insert){
					return true;
				}else{
					return true;
				}
			//}
		}
		
		
			public function login_user_send($data){
			
				
			
				$status2=$this->db->query('select COUNT(*)AS cek_code_brands from tb_users where  username="'.$data['username'].'" and blocked="1"');
						$result2=$status2->result_array();
						if($result2[0]['cek_code_brands'] > 0){
						$data_barang['status_ganti']=1;
				$data_barang['id_user']=1;
							$insert=$this->db->insert('tb_forgot_password',$data_barang);
				
							
							if($insert){
								return true;
							}else{
								return false;
							}
						}
						
						else{
								return false;
						}
		}
		
		
				public function edit_user_profil($data){
			
					$fileprofil_ = explode('.', $data['profile_image']);
				$file_profil_save=md5($data['profile_image']).'.'.$fileprofil_[1].'';
				
				$data_barang['profile_image']=$file_profil_save;
				
				
			
					
					$this->db->where('id',$data['id']);
					$update=$this->db->update('tb_users',$data_barang);
					
					
			
				if($update){
					return true;
				}else{
					return false;
				}
			
		}
		public function edit($data){
				//$fileprofil_ = explode('.', $_FILES['nama_file']['name']);
				//$file_profil_save=md5($_FILES['nama_file']['name']).'.'.$fileprofil_[1].'';
				
				//$data['gambar']=$file_profil_save;
				
				
				if($data['password'] == ""){
					
				}else{
					$data_barang['password']=$data['password'];
				}
			
					
					$this->db->where('id',$data['id']);
					$update=$this->db->update('tb_users',$data_barang);
					
						$status2=$this->db->query('select COUNT(*)AS cek_code_brands from tb_forgot_password where  id_user="'.$data['id'].'" and status_ganti="1"');
						$result2=$status2->result_array();
						if($result2[0]['cek_code_brands'] > 0){
							$data_barang2['status_ganti']=0;
							$this->db->where('id_user',$data['id']);
							$update2=$this->db->update('tb_forgot_password',$data_barang2);
						}
						
						else{
							
						}
			
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
		
		public function delete($id_shoes_category){
			
		
			$query=$this->db->query('update tb_users set blocked="0" WHERE id="'.$id_shoes_category.'"');
			
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
			$config['max_size']			= '10000000';
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
