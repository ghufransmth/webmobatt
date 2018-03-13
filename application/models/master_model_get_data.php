<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Master_model_get_data extends CI_Model {
		
		public function data_pangkat($id_jenis_kelamin=false){
			if($id_jenis_kelamin!=false){
				$this->db->where('id_pangkat',$id_jenis_kelamin);
			}
			
			$get_query=$this->db->get('master_data_pangkat');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
			public function data_posisi($id_jenis_kelamin=false){
			if($id_jenis_kelamin!=false){
				$this->db->where('id_posisi',$id_jenis_kelamin);
			}
			
			$get_query=$this->db->get('master_data_posisi');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_jenjang_pendidikan($id_jenis_kelamin=false){
			if($id_jenis_kelamin!=false){
				$this->db->where('id_jenjang_pendidikan',$id_jenis_kelamin);
			}
			
			$get_query=$this->db->get('master_data_jenjang_pendidikan');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_jenis_kelamin_laki($id_jenis_kelamin=false){
		
			
			$get_query=$this->db->query('select count(*)as total from master_data_jenis_kelamin where deleted="0" and id_jenis_kelamin="1"');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_status($id_status=false){
			if($id_status!=false){
				$this->db->where('id_status',$id_status);
			}
			$this->db->order_by('id_status','ASC');
			$this->db->where('deleted',0);
			$get_query=$this->db->get('master_data_status');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_agama($id_agama=false){
			if($id_agama!=false){
				$this->db->where('id_agama',$id_agama);
			}
			$this->db->order_by('id_agama','ASC');
			$this->db->where('deleted',0);
			$get_query=$this->db->get('master_data_agama');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_pendidikan($id_pendidikan=false){
			if($id_pendidikan!=false){
				$this->db->where('id_pendidikan',$id_pendidikan);
			}
			$this->db->order_by('id_pendidikan','ASC');
			$this->db->where('deleted',0);
			$get_query=$this->db->get('master_data_pendidikan');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_bahasa($id_bahasa=false){
			if($id_bahasa!=false){
				$this->db->where('id_bahasa',$id_bahasa);
			}
			$this->db->order_by('id_bahasa','ASC');
			$this->db->where('deleted',0);
			$get_query=$this->db->get('master_data_bahasa');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_lokasi($id_lokasi=false){
			if($id_lokasi!=false){
				$this->db->where('id_lokasi',$id_lokasi);
			}
			$this->db->order_by('id_lokasi','ASC');
			$this->db->where('deleted',0);
			$get_query=$this->db->get('master_data_lokasi');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_jabatan($id_jabatan=false){
			if($id_jabatan!=false){
				$this->db->where('id_jabatan',$id_jabatan);
			}
			$this->db->order_by('id_jabatan','ASC');
			$this->db->where('deleted',0);
			$get_query=$this->db->get('master_data_jabatan');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_gaji($id_gaji=false){
			if($id_gaji!=false){
				$this->db->where('id_gaji',$id_gaji);
			}
			$this->db->order_by('id_gaji','ASC');
			$this->db->where('deleted',0);
			$get_query=$this->db->get('master_data_gaji');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
	
		
		
		
	}

?>
