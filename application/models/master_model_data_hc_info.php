<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Master_model_data_hc_info extends CI_Model {
		
		public function data_struktur($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
		
			$get_query=$this->db->get('tb_struktur_organisasi');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function data_tutorial($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
		
			$get_query=$this->db->get('tb_tutorial');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_visi_misi($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
		
			$get_query=$this->db->get('tb_visi_misi');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function data_budaya_kerja($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
		
			$get_query=$this->db->get('tb_budaya_kerja');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function save_struktur($data_set){
				
				if($_FILES['profile_image']['name'] == ""){
					$file_name_foto_profil=$data_set['nama_file_db'];
					$data['nama_file']=$file_name_foto_profil;
				}else{
					$fileprofil_ = explode('.', $_FILES['profile_image']['name']);
				$file_profil_save=md5($_FILES['profile_image']['name']).'.'.$fileprofil_[1].'';
				
				$data['nama_file']=$file_profil_save;
				}
			
				
					
					$this->db->where('id',$data_set['id']);
					$update=$this->db->update('tb_struktur_organisasi',$data);
					
					
			
				if($update){
					return true;
				}else{
					return false;
				}
			
		}
		
		public function save_tutorial($data_set){
				
				if($_FILES['profile_image']['name'] == ""){
					$file_name_foto_profil=$data_set['nama_file_db'];
					$data['nama_file']=$file_name_foto_profil;
				}else{
					$fileprofil_ = explode('.', $_FILES['profile_image']['name']);
				$file_profil_save=md5($_FILES['profile_image']['name']).'.'.$fileprofil_[1].'';
				
				$data['nama_file']=$file_profil_save;
				}
			
				
					
					$this->db->where('id',$data_set['id']);
					$update=$this->db->update('tb_tutorial',$data);
					
					
			
				if($update){
					return true;
				}else{
					return false;
				}
			
		}
		
		public function save_data_visi_misi($data_set){
				
				
				$data['visi_misi']=$data_set['visi_misi'];
				
			
				
					
					$this->db->where('id',$data_set['id']);
					$update=$this->db->update('tb_visi_misi',$data);
					
					
			
				if($update){
					return true;
				}else{
					return false;
				}
			
		}
		
			public function save_data_budaya_kerja($data_set){
				
				
				$data['budaya_kerja']=$data_set['budaya_kerja'];
				
			
				
					
					$this->db->where('id',$data_set['id']);
					$update=$this->db->update('tb_budaya_kerja',$data);
					
					
			
				if($update){
					return true;
				}else{
					return false;
				}
			
		}
		
		
		
			public function upload_foto_kk($name, $file_name){
			$file_ = explode('.', $file_name);
			// $config['file_name']		= '';
			$nama_file = explode('.', $file_name);
			
			$config['upload_path'] 		= './upload/upload_struktur/';
			$config['allowed_types'] 	= 'pdf|png|jpg|doc|docx|xls';
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
		
			public function upload_tutorial($name, $file_name){
			$file_ = explode('.', $file_name);
			// $config['file_name']		= '';
			$nama_file = explode('.', $file_name);
			
			$config['upload_path'] 		= './upload/upload_tutorial/';
			$config['allowed_types'] 	= 'pdf|png|jpg|doc|docx|xls';
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
