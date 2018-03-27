<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_ijin extends CI_Controller {

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

		
	}
	
	
	public function index()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_ijin/index.php');
		$this->load->view('footer.php');
	}
	public function pengajuan_ijin_cepat()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_ijin/pengajuan_ijin_cepat.php');
		$this->load->view('footer.php');
	}
	
		public function index_setuju()
	{
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_ijin/index_setuju.php');
		$this->load->view('footer.php');
	}
	
	 public function total_ijin_setuju(){     //fungsi load_row untuk menampilkan jlh data pada navbar secara realtime
       
			echo $this->master_model_data_ijin->total_ijin_setuju(); //jumlah data akan langsung di tampilkan
		
    }
		public function load_ijin_setuju(){    //fungsi load_data untuk menampilkan isi data pada navbar secara realtime
		
				$datas=$this->master_model_data_ijin->data_master_ijin_setuju();
		
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
									<td>Tanggal Mulai Ijin</td>
									<td>:</td>
									<td>".$rdata['start_date']." </td>
								</tr>
									<tr>
									<td>Tanggal Selesai Ijin</td>
									<td>:</td>
									<td>".$rdata['end_date']." </td>
								</tr>
								<tr style='border-bottom:solid 1px'>
									<td colspan='3' style='border-bottom:solid 1px'></td>
								</tr>
							</table>
							
						  </li>
						 
						</ul>
					  </li>";
        }
    }
	
	public function get_data_ijin($id_user=false){
			$data['data']=$this->master_model_data_ijin->data_master_ijin($id_user);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
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
			
		}
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}

	public function get_data_ijin_cepat($id_user=false){
			$data['data']=$this->master_model_data_ijin->data_master_ijin_cepat($id_user);
		// for($i=0;$i<count($data['data']);$i++){
		// 		// if($data['data'][$i]['status_approv'] == 1){
		// 		// 	$data['data'][$i]['data_approval_status']="Belum Disetujui";
		// 		// }else{
		// 		// 	$data['data'][$i]['data_approval_status']="Disetujui";
					
		// 		// }
		// 		// $data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
		// 		// $data['data'][$i]['data_ijin_list2']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
			
		// 		// if(isset($data['data'][$i]['data_ijin_list2'][0]['reason_desc'])){
		// 		// $data['data'][$i]['data_ijin_list']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
				
		// 		// }else{
		// 		// $data['data'][$i]['data_ijin_list']=array(array("reason_desc"=>"-"));
				
		// 		// }
		// 		// if($data['data'][$i]['status_approv'] == 1){
		// 		// 	$data['data'][$i]['data_action']='<a href="'.base_url().'/index.php/data_ijin/edit_data_ijin/'.$data['data'][$i]['id'].'"><button type="button" class="btn btn-success btn-sm"   style="border-radius:0px;" ><i class="fa fa-pencil-square-o"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="#"><button type="button" onclick="delete_master_shoes_category('.$data['data'][$i]['id'].')" class="btn btn-danger btn-sm" style="border-radius:0px;" ><i class="fa fa-trash-o"></i></button></a>';
		
		// 		// }else{
		// 		// 	$data['data'][$i]['data_action']='<button type="button" class="btn btn-warning btn-sm"   style="border-radius:0px;" >Sudah Disetujui</button>';
					
					
		// 		// }
			
		// }
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
		public function get_data_ijin_sudah_disetujui($id_user=false){
			$data['data']=$this->master_model_data_ijin->data_master_ijin_setuju_index($id_user);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
				$data['data'][$i]['data_ijin_list']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_action']='<a href="'.base_url().'/index.php/data_ijin/edit_data_ijin/'.$data['data'][$i]['id'].'"><button type="button" class="btn btn-success btn-sm"   style="border-radius:0px;" ><i class="fa fa-pencil-square-o"></i></button></a>&nbsp;&nbsp;&nbsp;<a href="#"><button type="button" onclick="delete_master_shoes_category('.$data['data'][$i]['id'].')" class="btn btn-danger btn-sm" style="border-radius:0px;" ><i class="fa fa-trash-o"></i></button></a>';
		
				}else{
					$data['data'][$i]['data_action']='<button type="button" class="btn btn-warning btn-sm"   style="border-radius:0px;" >Sudah Disetujui</button>';
					
					
				}
			
		}
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	
	public function get_data_ijin_list($id_user=false){
			$data['data']=$this->master_model_data_ijin->data_master_ijin_list($id_user);
	
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}

		public function get_data_ijin_approval($id_user=false){
			$data['data']=$this->master_model_data_ijin->data_master_ijin_approval($id_user);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
					$data['data'][$i]['data_ijin_list2']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
				if(isset($data['data'][$i]['data_ijin_list2'][0]['reason_desc'])){
					$data['data'][$i]['data_ijin_list']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
				}else{
					$data['data'][$i]['data_ijin_list']=array(array("reason_desc"=>"-"));
				}
		}
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
		public function get_data_ijin_approval_delegated($id_user=false){
			$data['data']=$this->master_model_data_ijin->data_master_ijin_approval_delegated($id_user);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
						$data['data'][$i]['data_ijin_list2']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
				if(isset($data['data'][$i]['data_ijin_list2'][0]['reason_desc'])){
					$data['data'][$i]['data_ijin_list']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
				}else{
					$data['data'][$i]['data_ijin_list']=array(array("reason_desc"=>"-"));
				}
				
		}
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	public function get_data_ijin_approval_sudah_setuju($id_user=false){
			$data['data']=$this->master_model_data_ijin->data_master_ijin_approval_sudah_setuju($id_user);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Disetujui";
					
				}
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
					$data['data'][$i]['data_ijin_list']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
				
		}
			$this->output->set_content_type('application/json')->set_output(json_encode($data));	
	}
	
	
	public function input_data_ijin()
	{
				
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_ijin/input_data_ijin.php');
		$this->load->view('footer.php');
	}
	
		public function save_data_ijin()
	{
			$data_devisi=$_POST;
	
			$data_devisi_get=$this->master_model_data_ijin->save_ijin($data_devisi);
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
	
	public function edit_data_ijin($id_user=false)
	{
		$data['data']=$this->master_model_data_ijin->data_master_ijin($id_user);
		for($i=0;$i<count($data['data']);$i++){
				if($data['data'][$i]['status_approv'] == 1){
					$data['data'][$i]['data_approval_status']="Disetujui";
				}else{
					$data['data'][$i]['data_approval_status']="Belum Disetujui";
					
				}
				//$data['data'][$i]['nama_user_set']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
				
				$data['data'][$i]['nama_user']=$this->master_model_user->data_master_user($data['data'][$i]['user_id']);
				$data['data'][$i]['data_ijin_list']=$this->master_model_data_ijin->data_master_ijin_list($data['data'][$i]['reason']);
		}
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_ijin/edit_data_ijin.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
	
		public function view_data_pegawai($id_user=false)
	{
	$data['data']=$this->master_model_pegawai->data_master_pegawai($id_user);
			for($i=0;$i<count($data['data']);$i++){
				$data['data'][$i]['data_pangkat']=$this->master_model_get_data->data_pangkat($data['data'][$i]['pangkat']);
				$data['data'][$i]['data_pendidikan']=$this->master_model_get_data->data_pendidikan($data['data'][$i]['pendidikan']);
				$data['data'][$i]['data_jabatan']=$this->master_model_get_data->data_jabatan($data['data'][$i]['struktur_jabatan']);
				$data['data'][$i]['data_jenjang_pendidikan']=$this->master_model_get_data->data_jenjang_pendidikan($data['data'][$i]['jenjang_pendidikan']);
				$data['data'][$i]['data_posisi']=$this->master_model_get_data->data_posisi($data['data'][$i]['posisi']);
			}
		
		
		$this->load->view('style.php');
		$this->load->view('menu_header.php');
		$this->load->view('page/data_pegawai/view_data_pegawai.php',$data);
		$this->load->view('footer.php');
		//$this->output->set_content_type('application/json')->set_output(json_encode($data));
		
	}
	
		public function edit_data_ijin_action()
	{
			$data_devisi=$_POST;
		
			$data_devisi_get=$this->master_model_data_ijin->edit($data_devisi);
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
	

	
	public function delete_ijin($id_devisi=false)
	{
		$data_devisi=$this->master_model_data_ijin->delete_ijin($id_devisi);
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
	
	public function approval_ijin($id_devisi=false)
	{
		$data_devisi=$this->master_model_data_ijin->approval_ijin($id_devisi);
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
	
		public function reject_ijin($id_devisi=false)
	{
		$data_devisi=$this->master_model_data_ijin->reject_approval_ijin($id_devisi);
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
	
		public function reject_ijin2($id_devisi=false)
	{
		$data_devisi=$this->master_model_data_ijin->reject_approval_ijin2($id_devisi);
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
	
	public function get_master_data_pangkat($id_user=false){
			$data_brands=$this->master_model_get_data->data_pangkat($id_user);
			$data_brands_get['data']=$data_brands;
				
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}
	public function get_master_data_pendidikan($id_user=false){
			$data_brands=$this->master_model_get_data->data_pendidikan($id_user);
			$data_brands_get['data']=$data_brands;
				
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}
	public function get_master_data_jabatan($id_user=false){
			$data_brands=$this->master_model_get_data->data_jabatan($id_user);
			$data_brands_get['data']=$data_brands;
				
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}
	public function get_master_data_jenjang_pendidikan($id_user=false){
			$data_brands=$this->master_model_get_data->data_jenjang_pendidikan($id_user);
			$data_brands_get['data']=$data_brands;
				
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}
	public function get_master_data_posisi($id_user=false){
			$data_brands=$this->master_model_get_data->data_posisi($id_user);
			$data_brands_get['data']=$data_brands;
				
			$this->output->set_content_type('application/json')->set_output(json_encode($data_brands_get));	
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */