<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Login extends CI_Controller {
		function __construct(){
			header('Access-Control-Allow-Origin: *');
    		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('master_login');
		$this->load->model('master_model_get_data');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('master_model_data');
			$this->load->model('master_model_user');
		}
		
		public function index()
	{

		
		$this->load->view('page/login/index.php');
	}
	
		
		public function forgot()
	{

		
		$this->load->view('page/login/forgot.php');
	}
	
	public function admin()
	{
		$this->load->view('user/style.php');
		$this->load->view('user/menu_header.php');
		$this->load->view('user/index.php');
		$this->load->view('user/footer.php');
		
	}
	
		public function save_data_user()
	{
			$data_devisi=$_POST;
			
			$data_devisi_get=$this->master_model_user->login_user_send($data_devisi);
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
	
		public function login_user(){
			
		
				$data=array(
				'username' => $this->input->post('username',TRUE),
				
				'password' => $this->input->post('password',TRUE)
				);
				$result=$this->master_login->get_cek_login($data);
				if($result->num_rows() > 0){
					$hasil= $result->result_array();
					//echo"$hasil";
					$data_jabatan['data_set']=$this->master_model_data->data_master_jabatan($hasil[0]['nama_jabatan']);
					$nama_jabatan=$data_jabatan['data_set'][0]['nama_jabatan'];
					
					$data['id_user'] = $hasil[0]['id'];
					$data['nama_user'] = $hasil[0]['username'];
					
					$data['status']  ="BERHASIL LOGIN";
					
					$data['is_logged_in']=true;
					$data_session = array(
						'id_user' => $hasil[0]['id'],
						'jabatan_nama' => $nama_jabatan,
						'jabatan' =>  $hasil[0]['nama_jabatan'],
						'nama_user' => $hasil[0]['username'],
						'nama' => $hasil[0]['first_name'],
						'gambar' => $hasil[0]['profile_image'],
						'user_level' => $hasil[0]['user_level'],
						'atasan_1' => $hasil[0]['atasan_1'],
						'atasan_2' => $hasil[0]['atasan_2'],
						'nama_unit_kerja' =>  $hasil[0]['nama_unit_kerja'],
						'status_user' =>1,
						'status_login_mandiri' => "mandiri",
						'status' => "login"
						);
 
					$this->session->set_userdata($data_session);
				}
				else{
					$datanya=$_POST;
						$user_error=$this->master_login->data_login($datanya);
							$hasil3= $user_error->result_array();
					$username =$hasil3[0]['totalnya'];
					$id =$hasil3[0]['id'];
					$data['status']="GAGAL LOGIN";
					$data['is_logged_in']=false;
					$data['total']=1;
					$data['id']=$id;
					if($username == 0){
						$data['total']=0;
					}else{
						$data['total']=1;
					}
					
				}
		
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
				
			
				
		}

			public function logout()
	{
		//$this->session->sess_destroy();
		 $this->session->unset_userdata('nama_user');
		 $this->session->unset_userdata('jabatan');
		 $this->session->unset_userdata('id_user');
		 $this->session->unset_userdata('nama');
		 $this->session->unset_userdata('status_login_mandiri');
		 $this->session->unset_userdata('user_level');
		 $this->session->unset_userdata('atasan_1');
		 $this->session->unset_userdata('atasan_2');
		  $this->session->unset_userdata('status_user');
		   $this->session->unset_userdata('status');
		   $this->session->unset_userdata('gambar');
		     $this->session->unset_userdata('nama_unit_kerja');
		 redirect('./login/index');
	}

	}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */