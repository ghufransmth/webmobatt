<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_rekap extends CI_Controller {

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
		$this->load->model('master_model_data_ijin');
		$this->load->model('master_model_get_data');
	$this->load->model('master_model_absensi');
	$this->load->model('master_model_data_overtime');
	$this->load->model('master_model_data');
	
		
		
	}
	
	
	public function rekap_absensi()
	{
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_rekap/rekap_absensi.php');
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	public function rekap_ijin()
	{
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_rekap/rekap_ijin.php');
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	public function rekap_lembur()
	{
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_rekap/rekap_lembur.php');
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	public function print_rekap_ijin()
	{
		$dataset=$_POST;
			$data['data']=$this->master_model_data_ijin->data_master_ijin_search_laporan($dataset);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
					for($x=0;$x<count($data['data'][$i]['nama_user']);$x++){
						$data['data'][$i]['nama_user'][$x]['jabatan']=$this->master_model_user->data_jabatan($data['data'][$i]['nama_user'][$x]['nama_jabatan']);
				$data['data'][$i]['nama_user'][$x]['unit_kerja']=$this->master_model_data->data_master_unit_kerja($data['data'][$i]['nama_user'][$x]['nama_unit_kerja']);
				
					}
				$data['data'][$i]['data_ijin_list2']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
			
				if(isset($data['data'][$i]['data_ijin_list2'][0]['reason_desc'])){
				$data['data'][$i]['data_ijin_list']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
				
				}else{
				$data['data'][$i]['data_ijin_list']=array(array("reason_desc"=>"-"));
				
				}
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_action']='<a href="'.base_url().'/index.php/data_ijin/edit_data_ijin/'.$data['data'][$i]['id'].'"><button type="button" class="btn btn-success btn-sm"   style="border-radius:0px;" ><i class="fa fa-pencil-square-o"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="#"><button type="button" onclick="delete_master_shoes_category('.$data['data'][$i]['id'].')" class="btn btn-danger btn-sm" style="border-radius:0px;" ><i class="fa fa-trash-o"></i></button></a>';
		
				}else{
					$data['data'][$i]['data_action']='<button type="button" class="btn btn-warning btn-sm"   style="border-radius:0px;" >Sudah Disetujui</button>';
					
					
				}
				$data['data'][$i]['tanggal']=array(array("bulan"=>$_POST['bulan'],"tahun"=>$_POST['tahun']));
				
			
		}
		
		$this->load->view('page/data_rekap/print_rekap_ijin.php',$data);
	
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	
	public function print_rekap_lembur()
	{
		$dataset=$_POST;
		$data['data']=$this->master_model_data_overtime->data_master_overtime_laporan($dataset);
			for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
					for($x=0;$x<count($data['data'][$i]['nama_user']);$x++){
						$data['data'][$i]['nama_user'][$x]['jabatan']=$this->master_model_user->data_jabatan($data['data'][$i]['nama_user'][$x]['nama_jabatan']);
				$data['data'][$i]['nama_user'][$x]['unit_kerja']=$this->master_model_data->data_master_unit_kerja($data['data'][$i]['nama_user'][$x]['nama_unit_kerja']);
				
					}
				
			
				$data['data'][$i]['tanggal']=array(array("bulan"=>$_POST['bulan'],"tahun"=>$_POST['tahun']));
				
			
		}
		
		$this->load->view('page/data_rekap/print_rekap_lembur.php',$data);
	
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
		
	public function print_rekap_absensi()
	{
		$dataset=$_POST;
		$data['data']=$this->master_model_absensi->data_absensi_laporan($dataset);
			for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
					for($x=0;$x<count($data['data'][$i]['nama_user']);$x++){
						$data['data'][$i]['nama_user'][$x]['jabatan']=$this->master_model_user->data_jabatan($data['data'][$i]['nama_user'][$x]['nama_jabatan']);
				$data['data'][$i]['nama_user'][$x]['unit_kerja']=$this->master_model_data->data_master_unit_kerja($data['data'][$i]['nama_user'][$x]['nama_unit_kerja']);
				
					}
				
			
				$data['data'][$i]['tanggal']=array(array("bulan"=>$_POST['bulan'],"tahun"=>$_POST['tahun']));
				
			
		}
		
		$this->load->view('page/data_rekap/print_rekap_absensi.php',$data);
	
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */