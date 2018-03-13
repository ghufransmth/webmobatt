<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usulan extends CI_Controller {

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
		if ($this->session->userdata('is_logged_in')!=1) {
			redirect(base_url('index.php'));
		}
		$this->load->model('model_usulan');
		$this->load->model('model_skpd');
		$this->load->model('model_kecamatan');
		$this->load->model('model_plafond');
		$this->load->model('model_maps');
		}

	public function usulan_index($id_usulan)
	{
		

		if ($this->session->userdata('id_skpd')==0) {
			$data['id_usulan']		= $id_usulan;
			$data['nama_usulan']	= $this->model_usulan->get_usulan($id_usulan);
			$data['skpd'] 			= $this->model_skpd->get_skpd_all();
			$data['total_anggaran'] 			= null;
			$data['plafond_anggaran'] 			= null;

			$this->load->model('model_buka_tutup');
			$buka_tutup['buka_tutup'] 	= $this->model_buka_tutup->get();
			for ($i=0; $i < count($buka_tutup['buka_tutup']); $i++) { 
				$buka_tutup['buka_tutup'][$i]['nama_usulan']	= $this->model_buka_tutup->get_usulan($buka_tutup['buka_tutup'][$i]['usulan']);
			}
			
			$this->load->view('template/header.php');
			$this->load->view('content/usulan/usulan_index', $data);
			$this->load->view('template/footer.php');
		}
		else{
			$skpd 							= $this->session->userdata('id_skpd');
			$usul 							= $id_usulan;
			$data['data']['id_usulan']		= $id_usulan;
			$data['data']['nama_usulan']	= $this->model_usulan->get_usulan($id_usulan);
			$data['data'] 					= $this->model_usulan->get_urusan_skpd($skpd,$usul);
			$data['total_anggaran'] 		= $this->model_usulan->check_anggaran($skpd, $this->session->userdata('tahun'), $usul);
			$data['plafond_anggaran'] 		= $this->model_plafond->get_plafond_skpd($skpd, $this->session->userdata('tahun'));
			$this->load->model('model_buka_tutup');
			$buka_tutup['buka_tutup'] 	= $this->model_buka_tutup->get();
			for ($i=0; $i < count($buka_tutup['buka_tutup']); $i++) { 
				$buka_tutup['buka_tutup'][$i]['nama_usulan']	= $this->model_buka_tutup->get_usulan($buka_tutup['buka_tutup'][$i]['usulan']);
			}
			$this->load->view('template/header.php');
			$this->load->view('content/usulan/usulan_skpd_index', $data);
			$this->load->view('template/footer.php');
			// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		}

		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}

	public function usulan_kegiatan1($skpd,$usul)
	{
		// $skpd = $this->model_skpd->get_skpd_all();
		// for ($i=0; $i < count($skpd); $i++) { 
		// 	$data[$i] = $this->model_usulan->get_urusan_skpd($skpd[$i]['id_skpd']);
		// }
		$data 					= $this->model_usulan->get_urusan_skpd($skpd,$usul);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
		// 
		$this->load->view('template/header.php');
		// $this->load->view('content/usulan/renja_index');
		// $this->load->view('template/footer.php');
	}

	public function usulan_kegiatan()
	{
		// $skpd = $this->model_skpd->get_skpd_all();
		// for ($i=0; $i < count($skpd); $i++) { 
		// 	$data[$i] = $this->model_usulan->get_urusan_skpd($skpd[$i]['id_skpd']);
		// }
		$skpd 								= $this->input->post('skpd');
		$data['urusan'] 					= $this->input->post('urusan');
		$usul   							= $this->input->post('usulan');
		$data['id_usulan']   				= $this->input->post('usulan');
		$data['nama_usulan']				= $this->model_usulan->get_usulan($data['id_usulan']);
		$data['skpd'] 						= $this->model_skpd->get_skpd_all();
		$data['data'] 						= $this->model_usulan->get_urusan_skpd($skpd,$usul);
		$data['total_anggaran'] 			= $this->model_usulan->check_anggaran($skpd, $this->session->userdata('tahun'), $usul);
		$data['plafond_anggaran'] 			= $this->model_plafond->get_plafond_skpd($skpd, $this->session->userdata('tahun'));
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		
		$this->load->view('template/header.php');
		$this->load->view('content/usulan/usulan_index', $data);
		$this->load->view('template/footer.php');
	}

	public function get_usulan_kegiatan($id_usulan)
	{
		
		$data['usulan']								= $this->model_usulan->get_usulan_kegiatan($id_usulan);
		$data['total_pagu_indikatif']				= $this->model_usulan->get_total_anggaran($id_usulan);
		$data['total_pagu_indikatif_perubahan']		= $this->model_usulan->get_total_anggaran_perubahan($id_usulan);
		$data['usulan'][0]['sub_usulan']			= $this->model_usulan->get_sub_usulan_kegiatan($id_usulan);
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		
		$this->load->view('template/header.php');
		$this->load->view('content/usulan/usulan_detail', $data);
		$this->load->view('template/footer.php');
	}

	public function usulan_add($usul)
	{
		$data['id_usulan'] 		= $usul;
		$data['skpd'] 			= $this->model_skpd->get_skpd_all();
		$data['kecamatan'] 		= $this->model_kecamatan->get_kecamatan();
		$data['usul'] 			= $this->model_usulan->get_usulan($usul);
		$data['prioritasnas'] 	= $this->model_usulan->get_prioritas_nasional($this->session->userdata('tahun'));
		$data['prioritasprov'] 	= $this->model_usulan->get_prioritas_provinsi($this->session->userdata('tahun'));
		$data['prioritaskab'] 	= $this->model_usulan->get_prioritas_kabupaten($this->session->userdata('tahun'));
		$data['sumberdana'] 	= $this->model_usulan->get_sumberdana($this->session->userdata('tahun'));
		$data['jeniskegiatan'] 	= $this->model_usulan->get_jenis_kegiatan($this->session->userdata('tahun'));
		$data['penanggungjawab']= $this->model_usulan->get_penanggungjawab($this->session->userdata('tahun'));
		$data['catatan'] 		= $this->model_usulan->get_catatan();
		$data['jenis'] 			= $this->model_maps->get_jenis();
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		
		$this->load->view('template/header.php');
		$this->load->view('content/usulan/usulan_add', $data);
		$this->load->view('template/footer.php');
	}

	public function usulan_add_skpd($usul)
	{
		$data 					= $this->model_skpd->get_urusan_skpd($this->session->userdata('id_skpd'));
		$data['id_usulan'] 		= $usul;
		$data['usul'] 			= $this->model_usulan->get_usulan($usul);
		$data['kecamatan'] 		= $this->model_kecamatan->get_kecamatan();
		$data['prioritasnas'] 	= $this->model_usulan->get_prioritas_nasional($this->session->userdata('tahun'));
		$data['prioritasprov'] 	= $this->model_usulan->get_prioritas_provinsi($this->session->userdata('tahun'));
		$data['prioritaskab'] 	= $this->model_usulan->get_prioritas_kabupaten($this->session->userdata('tahun'));
		$data['sumberdana'] 	= $this->model_usulan->get_sumberdana($this->session->userdata('tahun'));
		$data['jeniskegiatan'] 	= $this->model_usulan->get_jenis_kegiatan($this->session->userdata('tahun'));
		$data['penanggungjawab']= $this->model_usulan->get_penanggungjawab($this->session->userdata('tahun'));
		$data['catatan'] 		= $this->model_usulan->get_catatan();
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		
		$this->load->view('template/header.php');
		$this->load->view('content/usulan/usulan_add_skpd', $data);
		$this->load->view('template/footer.php');
	}

	public function usulan_submit()
	{
		$this->form_validation->set_rules('skpd', 'SKPD', 'required');
		$this->form_validation->set_rules('id_urusan', 'Urusan', 'required');
		$this->form_validation->set_rules('id_program', 'Program', 'required');
		$this->form_validation->set_rules('id_kegiatan', 'Kegiatan', 'required');
		$this->form_validation->set_rules('id_nasional', 'Prioritas Nasional', 'required');
		$this->form_validation->set_rules('id_provinsi', 'Prioritas Provinsi', 'required');
		$this->form_validation->set_rules('id_kabupaten', 'Prioritas Daerah', 'required');
		$this->form_validation->set_rules('id_sasaran', 'Sasaran Daerah', 'required');
		
		$this->form_validation->set_rules('lokasi', 'Klik tambah lokasi terlebih dahulu kemudian klik tambah output, Data', 'required');


		$data['count_sub']	= count($_POST['induk']);
		if ($this->form_validation->run() == FALSE) {
			$error				= str_replace('<p>The ', '', validation_errors());
			$error 				= str_replace('field is required.', 'Tidak Boleh Kosong', $error);
			$error 				= str_replace('</p>', '', $error);

			$data['status'] 	= false;
			$data['response'] 	= $error;	
		}
		else{
			$data['status'] 	= true;
			$data['response'] 	= 'Data Telah Ditambahkan';	
			$this->model_usulan->set_usulan();
			$data['usul'] 		= $this->input->post('usul');
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function usulan_edit_submit()
	{
		$this->form_validation->set_rules('skpd', 'SKPD', 'required');
		$this->form_validation->set_rules('id_urusan', 'Urusan', 'required');
		$this->form_validation->set_rules('id_program', 'Program', 'required');
		$this->form_validation->set_rules('id_kegiatan', 'Kegiatan', 'required');
		$this->form_validation->set_rules('id_nasional', 'Nasional', 'required');
		$this->form_validation->set_rules('id_provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'required');
		$this->form_validation->set_rules('induk', 'Pagu Induk', 'required');
		$this->form_validation->set_rules('perubahan', 'Pagu Perubahan', 'required');
		$this->form_validation->set_rules('pagunext', 'Pagu Tahun+1', 'required');
		$this->form_validation->set_rules('keluaran', 'Keluaran Sub Kegiatan', 'required');
		$this->form_validation->set_rules('id_jawab', 'Penanggung Jawab Kegiatan', 'required');
		$this->form_validation->set_rules('id_jenis', 'Jenis Kegiatan', 'required');
		$this->form_validation->set_rules('id_sumberdana', 'Sumber Dana Kegiatan', 'required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
		$this->form_validation->set_rules('target_induk', 'Target Induk', 'required');
		$this->form_validation->set_rules('target_perubahan', 'Target Perubahan', 'required');

		$data['count_sub']	= count($_POST['induk']);
		if ($this->form_validation->run() == FALSE) {
			$error				= str_replace('<p>The ', '', validation_errors());
			$error 				= str_replace('field is required.', 'Tidak Boleh Kosong', $error);
			$error 				= str_replace('</p>', '', $error);

			$data['status'] 	= false;
			$data['response'] 	= $error;	
		}
		else{
			$data['status'] 	= true;
			$data['response'] 	= 'Data Telah Dirubah';	
			$this->model_usulan->edit_usulan();
			$data['usul'] 		= $this->input->post('usul');
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
		// $this->model_usulan->edit_usulan();
		// $data['response'] 	= 'Data Telah Diubah';
		// $data['usul'] 		= $this->input->post('usul');
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		// echo "Data Telah Diubah";
		// redirect(base_url('index.php/usulan/detail/'.$this->input->post('id_usulan')));
	}

	public function usulan_hapus($id_usulan, $usulan)
	{
		// echo json_encode($_POST);
		$this->model_usulan->delete_usulan($id_usulan);
		$this->model_usulan->delete_subusulan($id_usulan);
		redirect('/usulan/'.$usulan);
	}

	public function edit_usulan_kegiatan($id_usulan)
	{
		$data['skpd'] 						= $this->model_skpd->get_skpd_all();
		$data['kecamatan'] 					= $this->model_kecamatan->get_kecamatan();
		$data['prioritasnas'] 				= $this->model_usulan->get_prioritas_nasional($this->session->userdata('tahun'));
		$data['prioritasprov'] 				= $this->model_usulan->get_prioritas_provinsi($this->session->userdata('tahun'));
		$data['prioritaskab'] 				= $this->model_usulan->get_prioritas_kabupaten($this->session->userdata('tahun'));
		$data['sumberdana'] 				= $this->model_usulan->get_sumberdana($this->session->userdata('tahun'));
		$data['jeniskegiatan'] 				= $this->model_usulan->get_jenis_kegiatan($this->session->userdata('tahun'));
		$data['penanggungjawab']			= $this->model_usulan->get_penanggungjawab($this->session->userdata('tahun'));
		$data['catatan'] 					= $this->model_usulan->get_catatan();
		$data['usulan']						= $this->model_usulan->get_usulan_kegiatan($id_usulan);
		$data['usulan'][0]['sub_usulan']	= $this->model_usulan->get_sub_usulan_kegiatan($id_usulan);
		$data['urusan']						= $this->model_skpd->get_urusan($data['usulan'][0]['id_skpd']);
		$data['program']					= $this->model_skpd->get_program($data['usulan'][0]['id_urusan']);
		$data['kegiatan']					= $this->model_skpd->get_kegiatan($data['usulan'][0]['id_urusan'], $data['usulan'][0]['id_program']);
		$data['sasarankab']					= $this->model_skpd->get_sasarankab($data['usulan'][0]['id_kabupaten']);
		$data['nama_usulan'] 				= $this->model_usulan->get_usulan($data['usulan'][0]['usulan']);		
		$data['jenis'] 						= $this->model_maps->get_jenis();
		for ($i=0; $i < count($data['usulan'][0]['sub_usulan']); $i++) { 
			$data['usulan'][0]['sub_usulan'][$i]['lokasi'] = $this->model_maps->get_lokasi_by_id_sub($data['usulan'][0]['sub_usulan'][$i]['id']);
		}
		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		
		$this->load->view('template/header.php');
		$this->load->view('content/usulan/usulan_edit', $data);
		$this->load->view('template/footer.php');
	}

	public function edit_usulan_kegiatan_skpd($id_usulan)
	{
		$data 								= $this->model_skpd->get_urusan_skpd($this->session->userdata('id_skpd'));
		$data['kecamatan'] 					= $this->model_kecamatan->get_kecamatan();
		$data['prioritasnas'] 				= $this->model_usulan->get_prioritas_nasional($this->session->userdata('tahun'));
		$data['prioritasprov'] 				= $this->model_usulan->get_prioritas_provinsi($this->session->userdata('tahun'));
		$data['prioritaskab'] 				= $this->model_usulan->get_prioritas_kabupaten($this->session->userdata('tahun'));
		$data['sumberdana'] 				= $this->model_usulan->get_sumberdana($this->session->userdata('tahun'));
		$data['jeniskegiatan'] 				= $this->model_usulan->get_jenis_kegiatan($this->session->userdata('tahun'));
		$data['penanggungjawab']			= $this->model_usulan->get_penanggungjawab($this->session->userdata('tahun'));
		$data['catatan'] 					= $this->model_usulan->get_catatan();
		$data['usulan']						= $this->model_usulan->get_usulan_kegiatan($id_usulan);
		$data['usulan'][0]['sub_usulan']	= $this->model_usulan->get_sub_usulan_kegiatan($id_usulan);
		$data['urusan']						= $this->model_skpd->get_urusan($data['usulan'][0]['id_skpd']);
		$data['program']					= $this->model_skpd->get_program($data['usulan'][0]['id_urusan']);
		$data['kegiatan']					= $this->model_skpd->get_kegiatan($data['usulan'][0]['id_urusan'], $data['usulan'][0]['id_program']);
		$data['sasarankab']					= $this->model_skpd->get_sasarankab($data['usulan'][0]['id_kabupaten']);
		$data['nama_usulan'] 				= $this->model_usulan->get_usulan($data['usulan'][0]['usulan']);

		// $this->output->set_content_type('application/json')->set_output(json_encode($data));
		
		$this->load->view('template/header.php');
		$this->load->view('content/usulan/usulan_edit_skpd', $data);
		$this->load->view('template/footer.php');
	}

	public function check_usulan_kegiatan($id_skpd, $id_urusan, $id_program, $id_kegiatan, $usul)
	{
		$data = $this->model_usulan->check_usulan_kegiatan($id_skpd, $id_urusan, $id_program, $id_kegiatan, $usul);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */