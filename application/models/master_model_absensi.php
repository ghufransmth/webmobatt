<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Master_model_absensi extends CI_Model {
		
		public function data_master_absensi($id_shoes_category=false){
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
		
			$get_query=$this->db->get('tb_geoatt');
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_absensi($id_shoes_category=false){
			$date=date("Y-m-d");
			 $get_query=$this->db->query("select top 1 convert(varchar,start_date,8)as jam_masuk from tb_geoatt where user_id=".$id_shoes_category." and convert(varchar(10),start_date,120)='".$date."' ORDER BY id DESC");
		
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_absensi_max($id_shoes_category=false){
			$bulan=date("m");
			$tahun=date("Y");
			
			$get_query=$this->db->query('select top 1 user_id,COUNT(user_id)as total_data from tb_geoatt where MONTH(start_date) ='.$bulan.' and YEAR(start_date)='.$tahun.'  group BY user_id ORDER BY total_data DESC');
			
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function total_data_absensi($user_id=false){
		$bulan=date("m");
			$tahun=date("Y");
			
			 $get_query=$this->db->query('select COUNT(user_id)as total_data from tb_geoatt where MONTH(start_date) ="'.$bulan.'" and YEAR(start_date)="'.$tahun.'"  and user_id="'.$user_id.'"');
		
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_absensi_total($id_shoes_category=false){
			$date=date("Y-m-d");
			 $get_query=$this->db->query('select count(*)as total from tb_geoatt where user_id="'.$id_shoes_category.'" and DATE(start_date)="'.$date.'"  ');
		
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function data_absensi_laporan($data=false){
			$date=date("Y-m-d");
			 $get_query=$this->db->query('select a.*,b.*,TIME(a.start_date)as jam_masuk_set,DATE(a.start_date)as tanggal_masuk,TIME(a.end_date)as jam_keluar_set from tb_geoatt a JOIN tb_users b ON a.user_id=b.id where a.user_id="'.$data['id_pegawai'].'" and MONTH(a.start_date)="'.$data['bulan'].'" and YEAR(a.start_date)="'.$data['tahun'].'" ORDER BY start_date ASC');
		
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		
		public function get_status_absensi($id_shoes_category=false){
			$date = date("Y-m-d");
			$get_query=$this->db->query("select top 1 count(*)as total from tb_geoatt where user_id=".$id_shoes_category." and convert(varchar(10),start_date,120)='".$date."'");
		
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		
				public function data_master_absensi_setuju($id_shoes_category=false){
		
			 $get_query=$this->db->query("select * from tb_geoatt where status_approv='0' ORDER BY id DESC LIMIT 0,4 ");
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		public function total_absensi_setuju($offset=false,$number=false){
			
		
		
			 $status=$this->db->query("select * from tb_geoatt where status_approv='0'");
		
		
			
				$result=$status->num_rows();
			 
			
			 return $result;
		}
		
				public function data_master_absensi2($day=false,$month=false,$year=false,$id_kategori=false){
			$id_pegawai = $id_kategori;
			$get_query=$this->db->query("SELECT
	convert(varchar,start_date,8)as jam_masuk,
	convert(varchar,end_date,8)as jam_keluar,
	status_approv,id
FROM
	 tb_geoatt
WHERE
	DAY (start_date) = '".$day."'
AND MONTH (start_date) = '".$month."'
AND YEAR (start_date) = '".$year."'
AND user_id ='".$id_pegawai."'
ORDER BY start_date ASC
");
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
		
		public function approval_absensi($id_shoes_category){
			
		
			$query=$this->db->query("update tb_geoatt  set status_approv='0'  WHERE id='".$id_shoes_category."'");
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
		public function reject_absensi($id_shoes_category){
			
		
			$query=$this->db->query('update tb_geoatt  set status_approv="1"  WHERE id="'.$id_shoes_category.'"');
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
		public function reject_absensi2($id_shoes_category){
			
		
			$query=$this->db->query("update tb_geoatt  set status_approv='2'  WHERE id='".$id_shoes_category."'");
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
		public function hapus_file($id_shoes_category){
			
		
			$query=$this->db->query('update tb_geoatt  set status_approv="1"  WHERE id="30"');
			
			if($query){
				return true;
			}else{
				return false;
			}
		}
		
		public function data_master_absensi_approval($id_shoes_category=false){
			if($this->session->userdata('user_level') == "admin"){
				if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			if($this->session->userdata('user_level') == "admin"){
				
			}else{
				$this->db->where('user_id',$this->session->userdata('id_user'));
			}
			$this->db->where('status_approv',1);
			$get_query=$this->db->get('tb_geoatt');
			}
			
			else{
					$tanggal=date("Y-m-d");
				$get_query=$this->db->query('select a.*,b.*,c.* from  tb_users a JOIN tb_geoatt b ON a.id=b.user_id JOIN  tb_delegate c ON b.user_id=c.delegate_for where a.nama_unit_kerja="'.$this->session->userdata('nama_unit_kerja').'" and c.delegate_by="'.$this->session->userdata('atasan_2').'" and b.status_approv="1" and c.delegate_date>="'.$tanggal.'"');
			
			}
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		
			public function delegated_set($id_shoes_category=false){
			if($this->session->userdata('user_level') == "admin"){
			
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			if($this->session->userdata('user_level') == "admin"){
				
			}else{
				$this->db->where('id',$this->session->userdata('id_user'));
			}
			
			$get_query=$this->db->get('tb_users');
			}
			
			else{
				
				$get_query=$this->db->query('select a.* from tb_users a where a.atasan_1="'.$this->session->userdata('jabatan').'" and a.atasan_2="'.$this->session->userdata('id_user').'" ');
			
			}
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
				public function delegated_set_view($id_shoes_category=false){
			if($this->session->userdata('user_level') == "admin"){
			
			if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			
			if($this->session->userdata('user_level') == "admin"){
				
			}else{
				$this->db->where('delegate_by',$this->session->userdata('id_user'));
			}
			
			$get_query=$this->db->get('tb_delegate');
			}
			
			else{
				if($id_shoes_category!=false){
			$get_query=$this->db->query('select a.*,b.* from tb_users a JOIN tb_delegate b ON a.id=b.delegate_by where a.atasan_1="'.$this->session->userdata('jabatan').'" and a.atasan_2="'.$this->session->userdata('id_user').'" and b.id="'.$id_shoes_category.'"');
				}else{
			$get_query=$this->db->query('select a.*,b.* from tb_users a JOIN tb_delegate b ON a.id=b.delegate_by where a.atasan_1="'.$this->session->userdata('jabatan').'" and a.atasan_2="'.$this->session->userdata('id_user').'" ');
				
			}
				
			}
			if($get_query){
				$result=$get_query->result_array();
			}else{
				$result=0;
			}
			return $result;
		}
		
		
		public function data_master_absensi_approval_reject($id_shoes_category=false){
			if($this->session->userdata('user_level') == "admin"){
				if($id_shoes_category!=false){
				$this->db->where('id',$id_shoes_category);
			}
			if($this->session->userdata('user_level') == "admin"){
				
			}else{
				$this->db->where('user_id',$this->session->userdata('id_user'));
			}
			$this->db->where('status_approv',0);
			$get_query=$this->db->get('tb_geoatt');
			}
			
			else{
				
				$get_query=$this->db->query('select a.*,b.* from  tb_users a JOIN tb_geoatt b ON a.id=b.user_id where a.atasan_1="'.$this->session->userdata('jabatan').'" and a.atasan_2="'.$this->session->userdata('id_user').'" and b.status_approv="1"');
			
			}
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
	
		
		public function save_data_absensi($data){
			$date=date("Y-m-d");
			$status2=$this->db->query("select COUNT(*)as total_data from tb_geoatt where  user_id='".$data['user_id']."' and CAST(start_date AS DATE)='".$date."'");
			$result2=$status2->result_array();
			if($result2[0]['total_data'] > 0){
			
				$data_barang['end_date']="".$date."		".$data['start_date']."";
				$data_barang['keterangan']='nope';
				
				
			//	$insert=$this->db->insert('tb_geoatt',$data_barang);
					// $this->db->where('user_id',$data['user_id']);
					// 	$this->db->where('convert(varchar(10),start_date,120)',$date);
					// $insert=$this->db->update('tb_geoatt',$data_barang);
					$insert=$this->db->query("UPDATE tb_geoatt SET end_date = CONVERT(varchar,GETDATE(),120), keterangan = '".$data_barang['keterangan']."' WHERE user_id =".$data['user_id']."AND convert(varchar(10),start_date,120) = '".$date."'");
			
				
				if($insert){
					return true;
				}else{
					return true;
				}
			}else{
				
			//echo"select COUNT(*)as total_data from tb_geoatt where  user_id='".$data['user_id']."' and CAST(start_date AS DATE)='".$date."'";
			
				$data_barang['user_id']=$data['user_id'];
				$data_barang['start_date']="".$date."	".$data['start_date']."";
				$data_barang['start_date']="0000-00-00	".$data['start_date']."";
				
				$data_barang['keterangan']='nope';
				$data_barang['lat']=$data['lat'];
				$data_barang['lang']=$data['long'];
				$data_barang['status_approv']=1;
				$data_barang['work']=1;
				$data_barang['ijin_pulang_cepat']=1;
				$data_barang['approve_by']=1;
				$data_barang['seen']=1;
				$data_barang['created_on']="".$date."	".$data['start_date']."";
				
				
				//$insert=$this->db->insert('tb_geoatt',$data_barang);
				
			$insert=$this->db->query("INSERT INTO tb_geoatt(image,user_id,start_date,end_date,keterangan,lat,lang,status_approv,work,ijin_pulang_cepat,approve_by,seen,created_on)
			VALUES('-','".$data['user_id']."',GETDATE(),null,'nope','".$data['lat']."','".$data['long']."','1',
			'1','1','1','1',GETDATE())");
			
		
				
				if($insert){
					return true;
				}else{
					return false;
				}
			}
		}
		
		public function save_data_absensi_ijin_cepat($data){
			$date=date("Y-m-d");
			$status2=$this->db->query("select COUNT(*)as total_data from tb_geoatt where  user_id=".$data['user_id']." and CONVERT(varchar(10),start_date,120)='".$date."'");
			$result2=$status2->result_array();
			if($result2[0]['total_data'] > 0){
			
				$data_barang['end_date']="".$date."		".$data['start_date']."";
				$data_barang['keterangan']='nope';
				$data_barang['work']=0;
				
				
			//	$insert=$this->db->insert('tb_geoatt',$data_barang);
					// $this->db->where('user_id',$data['user_id']);
					// 	$this->db->where('date(start_date)',$date);
					// $insert=$this->db->update('tb_geoatt',$data_barang);
				$insert=$this->db->query("UPDATE tb_geoatt SET end_date = CONVERT(varchar,GETDATE(),120), keterangan = '".$data_barang['keterangan']."',work = 0 WHERE user_id =".$data['user_id']."AND convert(varchar(10),start_date,120) = '".$date."'");
			
				
				if($insert){
					return true;
				}else{
					return true;
				}
			}else{
				
			
					return false;
				
			}
		}
		
		
		public function edit($data){
				//$fileprofil_ = explode('.', $_FILES['nama_file']['name']);
				//$file_profil_save=md5($_FILES['nama_file']['name']).'.'.$fileprofil_[1].'';
				
				//$data['gambar']=$file_profil_save;
				if($_FILES['profile_image']['name'] == ""){
					$file_name_foto_profil=$data['gambar_profil_db'];
					
					$data_barang['profile_image']=$file_name_foto_profil;
				}else{
					$fileprofil_ = explode('.', $_FILES['profile_image']['name']);
				$file_profil_save=md5($_FILES['profile_image']['name']).'.'.$fileprofil_[1].'';
				
				$data_barang['profile_image']=$file_profil_save;
				}
				
				
				
				$data_barang['username']=$data['username'];
			//	$data_barang['password']=md5($data['password']);
				$data_barang['first_name']=$data['first_name'];
				$data_barang['kode_jabatan']=$data['kode_jabatan'];
				$data_barang['nama_jabatan']=$data['nama_jabatan'];
				$data_barang['kode_unit']=$data['kode_unit'];
				$data_barang['nama_unit_kerja']=$data['nama_unit_kerja'];
				$data_barang['atasan_1']=$data['atasan_1'];
				$data_barang['atasan_2']=$data['atasan_2'];
				
					
					$this->db->where('id',$data['id']);
					$update=$this->db->update('tb_users',$data_barang);
					
					
			
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
			
		
			$query=$this->db->query('update master_data_user set deleted="1" WHERE id="'.$id_shoes_category.'"');
			
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
		
			public function save_delegated($data){
		
				
			
				$data_barang['delegate_by']=$data['user_id'];
				$data_barang['delegate_for']=$data['id_pegawai'];
				$data_barang['delegate_date']=$data['delegated_date'];
				$data_barang['undelegate_date']=$data['undelegated_date'];
			
				$insert=$this->db->insert('tb_delegate',$data_barang);
				
			
				
				if($insert){
					return true;
				}else{
					return true;
				}
			
		}
		
			public function edit_delegated($data){
		
				
			
				$data_barang['delegate_by']=$data['user_id'];
				$data_barang['delegate_for']=$data['id_pegawai'];
				$data_barang['delegate_date']=$data['delegated_date'];
				$data_barang['undelegate_date']=$data['undelegated_date'];
			$this->db->where('id',$data['id']);
				$insert=$this->db->update('tb_delegate',$data_barang);
				
			
				
				if($insert){
					return true;
				}else{
					return true;
				}
			
		}
		
	}

?>
