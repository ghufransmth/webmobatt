<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_logged_in')!=1) {
			redirect(base_url('index.php'));
		}
		$this->load->model('model_users');
		$this->load->model('model_skpd');
	}

	public function index($id_user=false)
	{
		$data['users']	= $this->model_users->get($id_user);

		if ($id_user!=false) {
			$data['skpd']	= $this->model_skpd->get_skpd_all($id_skpd=false);
			$this->load->model('model_buka_tutup');
		$buka_tutup['buka_tutup'] 	= $this->model_buka_tutup->get();
		for ($i=0; $i < count($buka_tutup['buka_tutup']); $i++) { 
			$buka_tutup['buka_tutup'][$i]['nama_usulan']	= $this->model_buka_tutup->get_usulan($buka_tutup['buka_tutup'][$i]['usulan']);
		}
		$this->load->view('template/header.php', $buka_tutup);
			$this->load->view('content/master/user_edit', $data);
			$this->load->view('template/footer.php');
			// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
		else{
			$this->load->model('model_buka_tutup');
		$buka_tutup['buka_tutup'] 	= $this->model_buka_tutup->get();
		for ($i=0; $i < count($buka_tutup['buka_tutup']); $i++) { 
			$buka_tutup['buka_tutup'][$i]['nama_usulan']	= $this->model_buka_tutup->get_usulan($buka_tutup['buka_tutup'][$i]['usulan']);
		}
		$this->load->view('template/header.php', $buka_tutup);
			$this->load->view('content/master/user_index', $data);
			$this->load->view('template/footer.php');
		}
	}

	public function add()
	{
		$data['skpd']	= $this->model_skpd->get_skpd_all($id_skpd=false);
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		$this->load->model('model_buka_tutup');
		$buka_tutup['buka_tutup'] 	= $this->model_buka_tutup->get();
		for ($i=0; $i < count($buka_tutup['buka_tutup']); $i++) { 
			$buka_tutup['buka_tutup'][$i]['nama_usulan']	= $this->model_buka_tutup->get_usulan($buka_tutup['buka_tutup'][$i]['usulan']);
		}
		$this->load->view('template/header.php', $buka_tutup);
		$this->load->view('content/master/user_add', $data);
		$this->load->view('template/footer.php');
	}

	public function submit()
	{
		$data['skpd']	= $this->model_skpd->get_skpd_all($id_skpd=false);

		$this->load->helper('form');
		$this->load->library('form_validation');


		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[scuser.username]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('template/header');
			$this->load->view('content/master/user_add', $data);
			$this->load->view('template/footer');
		}
		else
		{
			// $this->output->set_content_type('application/json')->set_output(json_encode($_POST));
			$insert = $this->model_users->add();
			if ($insert==true) {
				redirect(base_url('index.php/users'));
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}
	}

	public function edit()
	{
		$data['skpd']	= $this->model_skpd->get_skpd_all($id_skpd=false);

		$this->load->helper('form');
		$this->load->library('form_validation');


		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['users']	= $this->model_users->get($this->input->post('id_user'));
			$this->load->view('template/header');
			$this->load->view('content/master/user_edit', $data);
			$this->load->view('template/footer');
		}
		else
		{
			// $this->output->set_content_type('application/json')->set_output(json_encode($_POST));
			$insert = $this->model_users->edit();
			if ($insert==true) {
				redirect(base_url('index.php/users'));
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}
	}

	public function delete($id_user)
	{
		$this->model_users->delete($id_user);
		redirect(base_url('index.php/users'));
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */