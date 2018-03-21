<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_user extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('master_model_user');
$this->load->model('master_model_data');
	
	}

	public function index()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_user/index.php');
		$this->load->view('footer.php');
	}
	public function get_data_user($id_user=false){
			$data['data']=$this->master_model_user->data_master_user($id_user);
			for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_jabatan']=$this->master_model_user->data_jabatan($data['data'][$i]['nama_jabatan']);
				if($data['data'][$i]['atasan_1'] == "-"){
				$data['data'][$i]['data_jabatan_atasan']=array(array("nama_jabatan"=>"Tidak Ada Atasan"));		
					
				}else{
				$data['data'][$i]['data_jabatan_atasan']=$this->master_model_user->data_jabatan($data['data'][$i]['atasan_1']);			
					
				}
				
				if($data['data'][$i]['atasan_2'] == "0"){
				$data['data'][$i]['nama_jabatan_atasan']=array(array("first_name"=>"Top Level"));		
					
				}else{
				$data['data'][$i]['nama_jabatan_atasan']=$this->master_model_user->data_master_user($data['data'][$i]['atasan_2']);			
					
				}
				
			}
		
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	
	
		 public function total_forgot(){     //fungsi load_row untuk menampilkan jlh data pada navbar secara realtime
       
			echo $this->master_model_data_ijin->total_ijin_forgot_password(); //jumlah data akan langsung di tampilkan
		
    }
	
	public function get_data_jabatan($id_user=false){
			$data['data']=$this->master_model_user->data_jabatan($id_user);
			
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function get_data_unit_kerja($id_user=false){
			$data['data']=$this->master_model_user->data_unit_kerja($id_user);
			
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function get_data_atasan($id_user=false)
	{
		$data['data']=$this->master_model_user->data_master_user_jabatan($id_user);
	
		
	$this->output->set_content_type('application/json')->set_output(json_encode($data));	
		
	}
	
	
	public function input_master_data_user()
	{
				
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_user/input_master_data_user.php');
		$this->load->view('footer.php');
	}
	
		public function save_data_user()
	{
			$data_devisi=$_POST;
			$foto['profile_image'] 		= pathinfo($_FILES['profile_image']['name'], 	PATHINFO_FILENAME);
			if ($foto['profile_image'] !='') {
			$profile_image 			= $this->master_model_user->upload_foto_kk('profile_image', $_FILES['profile_image']['name']);
			$options['profile_image']  = substr($profile_image, 0, -4);	
			}
			else{
				unset($foto['profile_image']);
			}
			$data_devisi_get=$this->master_model_user->save_data_user($data_devisi);
			if($data_devisi_get){
				$data['result']="Data Successfully Deleted";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
	public function view_edit_data_user($id_user=false)
	{
		$data['data']=$this->master_model_user->data_master_user($id_user);
		for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_jabatan']=$this->master_model_user->data_jabatan($data['data'][$i]['nama_jabatan']);
				if($data['data'][$i]['atasan_1'] == "-"){
				$data['data'][$i]['data_jabatan_atasan']=array(array("nama_jabatan"=>"Tidak Ada Atasan","id_jabatan"=>"-"));		
					
				}else{
				$data['data'][$i]['data_jabatan_atasan']=$this->master_model_user->data_jabatan($data['data'][$i]['atasan_1']);			
					
				}
				
				if($data['data'][$i]['atasan_2'] == "0"){
				$data['data'][$i]['nama_jabatan_atasan']=array(array("first_name"=>"Top Level","id"=>"0"));		
					
				}else{
				$data['data'][$i]['nama_jabatan_atasan']=$this->master_model_user->data_master_user($data['data'][$i]['atasan_2']);			
					
				}
					$data['data'][$i]['unit_kerja']=$this->master_model_data->data_master_unit_kerja($data['data'][$i]['nama_unit_kerja']);
				
			}
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_user/edit_master_data_user.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
	
	public function view_profil($id_user=false)
	{
			$data['data']=$this->master_model_user->data_master_user($id_user);
		for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_jabatan']=$this->master_model_user->data_jabatan($data['data'][$i]['nama_jabatan']);
				if($data['data'][$i]['atasan_1'] == "-"){
				$data['data'][$i]['data_jabatan_atasan']=array(array("nama_jabatan"=>"Tidak Ada Atasan","id_jabatan"=>"-"));		
					
				}else{
				$data['data'][$i]['data_jabatan_atasan']=$this->master_model_user->data_jabatan($data['data'][$i]['atasan_1']);			
					
				}
				
				if($data['data'][$i]['atasan_2'] == "0"){
				$data['data'][$i]['nama_jabatan_atasan']=array(array("first_name"=>"Top Level","id"=>"0"));		
					
				}else{
				$data['data'][$i]['nama_jabatan_atasan']=$this->master_model_user->data_master_user($data['data'][$i]['atasan_2']);			
					
				}
				
			}
		
		error_reporting(0);
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_user/view_master_data_user.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
	
		public function edit_data_user()
	{
			$data_devisi=$_POST;
			$foto['profile_image'] 		= pathinfo($_FILES['profile_image']['name'], 	PATHINFO_FILENAME);
			if ($foto['profile_image'] !='') {
			$profile_image 			= $this->master_model_user->upload_foto_kk('profile_image', $_FILES['profile_image']['name']);
			$options['profile_image']  = substr($profile_image, 0, -4);	
			}
			else{
				unset($foto['profile_image']);
			}
			$data_devisi_get=$this->master_model_user->edit($data_devisi);
			if($data_devisi_get){
				$data['result']="Data Successfully Deleted";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
			public function edit_data_user_profil()
	{
			$data_devisi=$_POST;
			$foto['profile_image'] 		= pathinfo($_FILES['profile_image']['name'], 	PATHINFO_FILENAME);
			if ($foto['profile_image'] !='') {
			$profile_image 			= $this->master_model_user->upload_foto_kk('profile_image', $_FILES['profile_image']['name']);
			$options['profile_image']  = substr($profile_image, 0, -4);	
			}
			else{
				unset($foto['profile_image']);
			}
			$data_devisi_get=$this->master_model_user->edit_user_profil($data_devisi);
			if($data_devisi_get){
				$data['result']="Data Successfully Deleted";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
			public function edit_data_user_profil_ipload()
	{
			$data_devisi=$_POST;
			$foto['profile_image'] 		= pathinfo($_FILES['profile_image']['name'], 	PATHINFO_FILENAME);
			if ($foto['profile_image'] !='') {
			$profile_image 			= $this->master_model_user->upload_foto_kk('profile_image', $_FILES['profile_image']['name']);
			$options['profile_image']  = substr($profile_image, 0, -4);	
			}
			else{
				unset($foto['profile_image']);
			}
			//$data_devisi_get=$this->master_model_user->edit_user_profil($data_devisi);
			if($data_devisi_get){
				$data['result']="Data Successfully Deleted";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
	public function edit_master_data_user_profil()
	{
			$data_devisi=$_POST;
				$data_devisi=$_POST;
			$foto['nama_file'] 		= pathinfo($_FILES['nama_file']['name'], 	PATHINFO_FILENAME);
			if ($foto['nama_file'] !='') {
			$nama_file 			= $this->master_model_user->upload_foto_kk('nama_file', $_FILES['nama_file']['name']);
			$options['nama_file']  = substr($nama_file, 0, -4);	
			}
			else{
				unset($foto['nama_file']);
			}
			$data_devisi_get=$this->master_model_user->edit_profil($data_devisi);
			if($data_devisi_get){
				$data['result']="Data Successfully Deleted";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
	public function edit_master_data_user_password()
	{
			$data_devisi=$_POST;
			$data_devisi_get=$this->master_model_user->edit_password($data_devisi);
			if($data_devisi_get){
				$data['result']="Data Successfully Deleted";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
	public function delete_master_data_user($id_devisi=false)
	{
		$data_devisi=$this->master_model_user->delete($id_devisi);
			if($data_devisi){
				$data['result']="Data Berhasil Dihapus";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Dihapus";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
		public function delete_master_data_user_oto($id_devisi=false)
	{
		$data_devisi=$this->master_model_user->delete_oto($id_devisi);
			if($data_devisi){
				$data['result']="Data Berhasil Dihapus";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Dihapus";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
		public function excel_user()
	{
		$data['data']=$this->master_model_user->data_master_user();
		$this->load->view('page/data_user/excel_user.php',$data);
		
	}
	
		public function backup_user()
	{
		$data['data']=$this->master_model_user->backup_user();
		redirect('data_user');
	}
	
		public function update_user_blocked($data_devisi=false)
	{
		
			
			$data_devisi_get=$this->master_model_user->delete($data_devisi);
			if($data_devisi_get){
				$data['result']="Data Successfully Deleted";
				$data['status']	= true;
				$data['is_logged_in']=true;
				$data['cek_code']=true;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));	
			}else{
				$data['result']="Data Gagal Diedit";
				$data['status']	= false;
				$data['is_logged_in']=false;
				$data['cek_code']=false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
	}
	
	 public function total_forgot_password(){     //fungsi load_row untuk menampilkan jlh data pada navbar secara realtime
       
			echo $this->master_model_user->total_ijin_forgot_password(); //jumlah data akan langsung di tampilkan
		
    }
	
	public function load_total_forgot_password(){    //fungsi load_data untuk menampilkan isi data pada navbar secara realtime
		
				$datas=$this->master_model_user->data_master_forgot_password();
		
        $no=0;
		
        foreach($datas as $rdata){ $no++;
            if($no % 2==0){$strip='strip1';}
                    else{$strip='strip2';}
            echo" 
			 <li>
						
						<ul class=\"menu\">
						  <li>
							<table class='table' >
								<tr>
									<td>Nama Pegawai</td>
									<td>:</td>
									<td>".$rdata['first_name']." </td>
								</tr>
									
								<tr style='border-bottom:solid 1px'>
									<td colspan='3' style='text-align:center;border-bottom:solid 1px'><a href='".base_url()."/index.php/data_user/view_edit_data_user/".$rdata['id']."'>Action</a></td>
								</tr>
							</table>
							
						  </li>
						 
						</ul>
					  </li>";
        }
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */