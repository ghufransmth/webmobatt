<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Master_model_data extends CI_Model {
		
		public function data_master_jabatan($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id_jabatan',$id_shoes_category);
			}
		$this->db->where('deleted',0);
			$get_query=$this->db->get('tb_jabatan');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function data_master_unit_kerja($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			$this->db->where('deleted',0);
			$get_query=$this->db->get('tb_unit_kerja_picklist');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		

	public function data_master_perijinan($id_shoes_category=false){
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
		
		public function save_data_jabatan($data){
				$data_barang['nama_jabatan']=$data['nama_jabatan'];
				$insert=$this->db->insert('tb_jabatan',$data_barang);
				
			
				
				if($insert){
					return true;
				}else{
					return true;
				}
			//}
		}
		
		
		public function edit_data_jabatan($data){
			$data_barang['nama_jabatan']=$data['nama_jabatan'];
					
					$this->db->where('id_jabatan',$data['id_jabatan']);
					$update=$this->db->update('tb_jabatan',$data_barang);
					
					
			
				if($update){
					return true;
				}else{
					return false;
				}
			
		}
		
		public function delete_master_data_jabatan($id_shoes_category){
			
		
			$query=$this->db->query('update tb_jabatan set deleted="1" WHERE id_jabatan="'.$id_shoes_category.'"');
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
		
				public function save_data_unit_kerja($data){
				$data_barang['kode']=$data['kode'];
				$data_barang['nama_unit_kerja']=$data['nama_unit_kerja'];
				$insert=$this->db->insert('tb_unit_kerja_picklist',$data_barang);
				
			
				
				if($insert){
					return true;
				}else{
					return true;
				}
			//}
		}
				public function edit_data_unit_kerja($data){
			$data_barang['kode']=$data['kode'];
				$data_barang['nama_unit_kerja']=$data['nama_unit_kerja'];
					
					$this->db->where('id',$data['id']);
					$update=$this->db->update('tb_unit_kerja_picklist',$data_barang);
					
					
			
				if($update){
					return true;
				}else{
					return false;
				}
			
		}
		
			public function delete_master_unit_kerja($id_shoes_category){
			
		
			$query=$this->db->query('update tb_unit_kerja_picklist set deleted="1" WHERE id="'.$id_shoes_category.'"');
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
		public function save_data_perijinan($data){
				
				$data_barang['reason_desc']=$data['reason_desc'];
				$insert=$this->db->insert('tb_reason_timeoff_picklist',$data_barang);
				
			
				
				if($insert){
					return true;
				}else{
					return true;
				}
			//}
		}
		
			public function delete_master_perijinan($id_shoes_category){
			
		
			$query=$this->db->query('update tb_reason_timeoff_picklist set deleted="1" WHERE id="'.$id_shoes_category.'"');
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
					public function edit_data_perijinan($data){
			$data_barang['reason_desc']=$data['reason_desc'];
					
					$this->db->where('id',$data['id']);
					$update=$this->db->update('tb_reason_timeoff_picklist',$data_barang);
					
					
			
				if($update){
					return true;
				}else{
					return false;
				}
			
		}
		
	}

?>
