<?php

/**
* 
*/
class Model_usulan extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_usulan($usul)
	{
		$usulan = array('RANCANGAN RENJA', 'FORUM SKPD', 'MUSRENBANG', 'RKPD', 'KUA-PPAS', 'APBD');
		return $usulan[$usul];
	}

	public function get_detail_urusan($id_urusan)
	{
		$this->db->select('urusan.kode_urusan, urusan.nama_urusan, sifat_urusan.nama_sifat_urusan');
		$this->db->from('urusan');
		$this->db->join('sifat_urusan', 'urusan.id_sifat_urusan = sifat_urusan.id_sifat_urusan', 'left');
		$this->db->where('urusan.id_urusan', $id_urusan);
		$this->db->where('urusan.deleted', 0);
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function get_program_urusan($id_urusan)
	{
		$this->db->select('id_program,kode_program,nama_program');
		$this->db->from('program');
		$this->db->where('id_urusan', $id_urusan);
		$this->db->where('deleted', 0);
		$this->db->order_by("kode_program", "asc");
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function get_nama_skpd($id_skpd)
	{
		$this->db->select('nama_skpd,id_user,sing_skpd');
		$this->db->from('skpd');
		$this->db->where('skpd.id_skpd', $id_skpd);
		$this->db->where('skpd.deleted', 0);
		
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function get_kegiatan_skpd($id_skpd,$id_urusan,$id_program,$tahun,$usul)
	{
		$this->db->select('usulan_skpd_new.id_usulan, kegiatan.nama_kegiatan,kegiatan.kode_kegiatan, usulan_skpd_new.id_urusan, usulan_skpd_new.id_program, usulan_skpd_new.id_kegiatan, usulan_skpd_new.skpd, usulan_skpd_new.tahun');
		$this->db->join('kegiatan', 'usulan_skpd_new.id_kegiatan = kegiatan.id_kegiatan', 'left');
		$this->db->from('usulan_skpd_new');
		$this->db->where('usulan_skpd_new.skpd', $id_skpd);
		$this->db->where('usulan_skpd_new.id_urusan', $id_urusan);
		$this->db->where('usulan_skpd_new.id_program', $id_program);
		$this->db->where('usulan_skpd_new.tahun', $tahun);
		$this->db->where('usulan_skpd_new.usul', $usul);
		$this->db->where('usulan_skpd_new.deleted', 0);
		$this->db->order_by("kode_kegiatan", "asc");
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function count_kegiatan_skpd($id_skpd,$id_urusan,$id_program,$tahun,$usul)
	{
		$this->db->select('usulan_skpd_new.id_usulan,kegiatan.nama_kegiatan,kegiatan.kode_kegiatan');
		$this->db->join('kegiatan', 'usulan_skpd_new.id_kegiatan = kegiatan.id_kegiatan', 'left');
		$this->db->from('usulan_skpd_new');
		$this->db->where('usulan_skpd_new.skpd', $id_skpd);
		$this->db->where('usulan_skpd_new.id_urusan', $id_urusan);
		$this->db->where('usulan_skpd_new.id_program', $id_program);
		$this->db->where('usulan_skpd_new.tahun', $tahun);
		$this->db->where('usulan_skpd_new.usul', $usul);
		$this->db->where('usulan_skpd_new.deleted', 0);
		$query 		= $this->db->get();
		$result  	= $query->num_rows();	
		return $result;
	}

	public function get_urusan_skpd($skpd, $usul)
	{
		$result['usulan'] 			= $usul;
		$result['nama_usulan'] 		= $this->get_usulan($usul);
		$result['id_skpd'] 			= $skpd;
		$nama_skpd 					= $this->get_nama_skpd($skpd);
		$result['nama_skpd'] 		= $nama_skpd[0]['nama_skpd'];
		$result['kode_skpd'] 		= $nama_skpd[0]['id_user'];
		$result['singkatan_skpd'] 	= $nama_skpd[0]['sing_skpd'];

		$this->db->select('id_urusan');
		$this->db->from('urusan_skpd');
		$this->db->where('urusan_skpd.id_skpd', $skpd);

		$query 						= $this->db->get();
		$result['count_urusan']  	= $query->num_rows();
		$result['urusan']  			= $query->result_array();

		for ($i=0; $i < count($result['urusan']); $i++) { 
			$total_jumlah_kegiatan = 0;
			$total_jumlah_sub_kegiatan = 0;
			$kode_urusan 							= $this->get_detail_urusan($result['urusan'][$i]['id_urusan']);
			$result['urusan'][$i]['sifat_urusan'] 	= $kode_urusan[0]['nama_sifat_urusan'];
			$result['urusan'][$i]['kode_urusan'] 	= $kode_urusan[0]['kode_urusan'];
			$result['urusan'][$i]['nama_urusan'] 	= $kode_urusan[0]['nama_urusan'];
			$result['urusan'][$i]['program'] 		= $this->get_program_urusan($result['urusan'][$i]['id_urusan']);

			for ($j=0; $j < count($result['urusan'][$i]['program']); $j++) { 
				$id_program = $result['urusan'][$i]['program'][$j]['id_program'];
				$result['urusan'][$i]['program'][$j]['count_kegiatan'] 	= $this->count_kegiatan_skpd($skpd, $result['urusan'][$i]['id_urusan'], $id_program, $this->session->userdata('tahun'), $usul);
				$result['urusan'][$i]['program'][$j]['kegiatan'] 		= $this->get_kegiatan_skpd($skpd, $result['urusan'][$i]['id_urusan'], $id_program, $this->session->userdata('tahun'), $usul);
				// $total_jumlah_sub_kegiatan								= $this->count_sub_usulan($result['urusan'][$i]['id_skpd'], $result['urusan'][$i]['id_urusan'], $result['urusan'][$i]['id_program'], $result['urusan'][$i]['id_kegiatan'], $result['urusan'][$i]['tahun']);
				$total_jumlah_kegiatan 									+= $result['urusan'][$i]['program'][$j]['count_kegiatan'];

			}

			$result['urusan'][$i]['total_kegiatan']	= $total_jumlah_kegiatan;
		}

		
		if ($result) {
			return $result;
		}
		else {
			return 0;
		}
	}

	public function get_usulan_kegiatan($id_usulan)
	{
		$this->db->select('	usulan_skpd_new.id_usulan 		as id_usulan,
							usulan_skpd_new.skpd 			as id_skpd,
							usulan_skpd_new.id_urusan 		as id_urusan,
							usulan_skpd_new.id_program 		as id_program,
							usulan_skpd_new.id_kegiatan 	as id_kegiatan,
							usulan_skpd_new.id_nasional 	as id_nasional,
							usulan_skpd_new.id_provinsi 	as id_provinsi,
							usulan_skpd_new.id_kabupaten 	as id_kabupaten,
							usulan_skpd_new.id_sasaran 		as id_sasaran,
							usulan_skpd_new.id_kegiatan 	as id_kegiatan,
							usulan_skpd_new.usul 			as usulan,
							usulan_skpd_new.tahun 			as tahun,
							usulan_skpd_new.common_output 	as common_output,
							skpd.nama_skpd 					as nama_skpd, 
							skpd.kode_skpd 					as kode_skpd, 
							urusan.nama_urusan 				as nama_urusan, 
							urusan.kode_urusan 				as kode_urusan, 
							program.nama_program 			as nama_program, 
							program.kode_program 			as kode_program, 
							kegiatan.kode_kegiatan 			as kode_kegiatan, 
							kegiatan.nama_kegiatan 			as nama_kegiatan, 
							prioritasnasional.prioritasnas 	as prioritasnas, 
							prioritasnasional.kode 			as kode_prioritas_nasional, 
							prioritasprovinsi.prioritasprov as prioritasprov,
							prioritasprovinsi.kode 			as kode_prioritas_provinsi,
							prioritaskabupaten.prioritaskab as prioritaskab,
							prioritaskabupaten.kode 		as kode_prioritas_kabupaten,
							sasarankab.sasarankab 			as nama_sasaran,
							sasarankab.kode 				as kode_sasaran,
							sumberdana.ket 					as sumberdana');
		$this->db->from('usulan_skpd_new');
		$this->db->join('skpd', 'skpd.id_skpd 						= usulan_skpd_new.skpd', 'left');
		$this->db->join('urusan', 'urusan.id_urusan 				= usulan_skpd_new.id_urusan', 'left');
		$this->db->join('program', 'program.id_program 				= usulan_skpd_new.id_program', 'left');
		$this->db->join('kegiatan', 'kegiatan.id_kegiatan 			= usulan_skpd_new.id_kegiatan', 'left');
		$this->db->join('prioritasnasional', 'prioritasnasional.id 	= usulan_skpd_new.id_nasional', 'left');
		$this->db->join('prioritasprovinsi', 'prioritasprovinsi.id 	= usulan_skpd_new.id_provinsi', 'left');
		$this->db->join('prioritaskabupaten', 'prioritaskabupaten.id= usulan_skpd_new.id_kabupaten', 'left');
		$this->db->join('sasarankab', 'sasarankab.id				= usulan_skpd_new.id_sasaran', 'left');
		$this->db->join('sumberdana', 'sumberdana.id				= usulan_skpd_new.anggaran', 'left');
		$this->db->where('usulan_skpd_new.id_usulan', $id_usulan);
		$this->db->where('usulan_skpd_new.deleted', 0);
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function get_sub_usulan_kegiatan($id_usulan)
	{
		$this->db->select('	sub_usulan_kegiatan.id 							as id,
							sub_usulan_kegiatan.id_usulan 					as id_usulan,
							sub_usulan_kegiatan.id_sumberdana 				as id_sumberdana,
							sub_usulan_kegiatan.id_jenis_kegiatan 			as id_jenis_kegiatan,
							sub_usulan_kegiatan.id_penanggungjawab_kegiatan as id_penanggungjawab_kegiatan,
							sub_usulan_kegiatan.catatan 					as id_catatan,
							sub_usulan_kegiatan.keluaran_kegiatan 			as keluaran_kegiatan,
							sub_usulan_kegiatan.target_kegiatan 			as target_kegiatan,
							sub_usulan_kegiatan.target_kegiatan_perubahan 	as target_kegiatan_perubahan,
							sub_usulan_kegiatan.lokasi_kegiatan 			as lokasi_kegiatan,
							sub_usulan_kegiatan.pagu_indikatif 				as pagu_indikatif,
							sub_usulan_kegiatan.pagu_indikatif_perubahan 	as pagu_indikatif_perubahan,
							sub_usulan_kegiatan.pagu_next 					as pagu_next,
							sub_usulan_kegiatan.usul 						as usul,
							skpdp.skpdp 									as penanggungjawab,
							catatan.catatan 								as catatan,
							jeniskegiatan.jeniskeg 							as jenis_kegiatan,
							sumberdana.ket 									as sumberdana');
		$this->db->from('sub_usulan_kegiatan');
		$this->db->join('skpdp', 'skpdp.id 						= sub_usulan_kegiatan.id_penanggungjawab_kegiatan', 'left');
		$this->db->join('jeniskegiatan', 'jeniskegiatan.id 		= sub_usulan_kegiatan.id_jenis_kegiatan', 'left');
		$this->db->join('sumberdana', 'sumberdana.id 			= sub_usulan_kegiatan.id_sumberdana', 'left');
		$this->db->join('catatan', 'catatan.id_catatan 			= sub_usulan_kegiatan.catatan', 'left');
		$this->db->where('sub_usulan_kegiatan.id_usulan', $id_usulan);
		$this->db->where('sub_usulan_kegiatan.deleted', 0);
		$query 	= $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function get_prioritas_nasional($tahun)
	{
		$this->db->select('prioritasnasional.id, prioritasnasional.kode, prioritasnasional.prioritasnas');
		$this->db->from('prioritasnasional');
		$this->db->where('prioritasnasional.tahun', $tahun);
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function get_prioritas_provinsi($tahun)
	{
		$this->db->select('prioritasprovinsi.id, prioritasprovinsi.kode, prioritasprovinsi.prioritasprov');
		$this->db->from('prioritasprovinsi');
		$this->db->where('prioritasprovinsi.tahun', $tahun);
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function get_prioritas_kabupaten($tahun)
	{
		$this->db->select('prioritaskabupaten.id, prioritaskabupaten.kode, prioritaskabupaten.prioritaskab');
		$this->db->from('prioritaskabupaten');
		$this->db->where('prioritaskabupaten.tahun', $tahun);
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function get_catatan()
	{
		$this->db->select('catatan.id_catatan, catatan.catatan, catatan.bobot');
		$this->db->from('catatan');
		$this->db->where('deleted', 0);
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}
	

	public function get_sumberdana()
	{
		$this->db->select('*');
		$this->db->from('sumberdana');
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function get_jenis_kegiatan()
	{
		$this->db->select('');
		$this->db->from('jeniskegiatan');
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function get_penanggungjawab()
	{
		$this->db->select('');
		$this->db->from('skpdp');
		$query 		= $this->db->get();
		$result  	= $query->result_array();	
		return $result;
	}

	public function get_total_anggaran_perubahan($id_usulan)
	{
		$this->db->select('sum(pagu_indikatif_perubahan) as total_pagu_indikatif_perubahan');
		$this->db->from('sub_usulan_kegiatan');
		$this->db->where('id_usulan', $id_usulan);
		$query 		= $this->db->get();
		$result  	= $query->row();	
		return $result->total_pagu_indikatif_perubahan;
	}

	public function get_total_anggaran($id_usulan)
	{
		$this->db->select('sum(pagu_indikatif) as total_pagu_indikatif');
		$this->db->from('sub_usulan_kegiatan');
		$this->db->where('id_usulan', $id_usulan);
		$query 		= $this->db->get();
		$result  	= $query->row();	
		return $result->total_pagu_indikatif;
	}

	public function set_usulan()
	{
		// echo count();
		/*
		|
		|
		|	Anggaran dan tahun ambil dari session
		|
		|
		*/
		for($j=$this->input->post('usul'); $j <= 5; $j++){
					$data = array(
								'skpd' 			=> $this->input->post('skpd'),
								'id_urusan'		=> $this->input->post('id_urusan'),
								'id_program'	=> $this->input->post('id_program'),
								'id_kegiatan'	=> $this->input->post('id_kegiatan'),
								'id_nasional'	=> $this->input->post('id_nasional'),
								'id_provinsi'	=> $this->input->post('id_provinsi'),
								'id_kabupaten'	=> $this->input->post('id_kabupaten'),
								'id_sasaran'	=> $this->input->post('id_sasaran'),
								'common_output'	=> trim($this->input->post('common_output')),
								'usul'			=> $j,
								'tahun'			=> $this->session->userdata('tahun'),
								'anggaran'		=> $this->session->userdata('anggaran'));
					$this->db->insert('usulan_skpd_new', $data);
					$insert_id = $this->db->insert_id();
					// echo $insert_id;
						
					if ( isset($_POST['keluaran']) ) {
							for ($i=0; $i < count( $this->input->post('keluaran') ); $i++) {
								
								
								$sub_usulan = array(
												'id_usulan' 					=> $insert_id,
												'skpd' 							=> $this->input->post('skpd'),
												'id_urusan'						=> $this->input->post('id_urusan'),
												'id_program'					=> $this->input->post('id_program'),
												'id_kegiatan'					=> $this->input->post('id_kegiatan'),
												'tahun'							=> $this->session->userdata('tahun'),
												'keluaran_kegiatan'				=> $_POST['keluaran'][$i],
												'target_kegiatan'				=> $_POST['target_induk'][$i],
												'target_kegiatan_perubahan'		=> $_POST['target_perubahan'][$i],
												'lokasi_kegiatan'				=> $_POST['nama_lokasi'][$i],
												'id_sumberdana'					=> $_POST['id_sumberdana'][$i],
												'id_jenis_kegiatan'				=> $_POST['id_jenis'][$i],
												'id_penanggungjawab_kegiatan'	=> $_POST['id_jawab'][$i],
												'pagu_indikatif'				=> $_POST['induk'][$i],
												'pagu_indikatif_perubahan'		=> $_POST['perubahan'][$i],
												'pagu_next'						=> $_POST['pagunext'][$i],
												'pagu_indikatif'				=> $_POST['induk'][$i],
												'usul'							=> $j,
												'catatan'						=> $_POST['id_catatan'][$i]
									);
								$this->db->insert('sub_usulan_kegiatan', $sub_usulan);
								$insert_id_sub_usulan = $this->db->insert_id();
								//insert lokasi per sub kegiatan
								$lokasi = explode(",", $_POST['lokasi'][$i]);
		
								for ($c=0; $c < count($lokasi); $c++) {

									$lok = array(
												'id_sub_usulan' 					=> $insert_id_sub_usulan,
												'id_usulan' 						=> $insert_id,
												'id_urusan' 						=> $this->input->post('id_urusan'),
												'id_program' 						=> $this->input->post('id_program'),
												'id_kegiatan'						=> $this->input->post('id_kegiatan'),
												'usul' 								=> $j,
												'tahun' 							=> $this->session->userdata('tahun'),
												'skpd' 								=> $this->input->post('skpd'),
												
												'id_lokasi'							=> $lokasi[$c]
									);
								$this->db->insert('lokasi_sub_kegiatan', $lok);
								}

							}
							
					}
				}
	}

	public function edit_usulan()
	{
		/*
		|
		|
		|	Anggaran dan tahun ambil dari session
		|
		|
		*/
		for ($i=$this->input->post('usul'); $i < 6; $i++) {

			$data = array(
						'skpd' 			=> $this->input->post('skpd'),
						'id_urusan'		=> $this->input->post('id_urusan'),
						'id_program'	=> $this->input->post('id_program'),
						'id_kegiatan'	=> $this->input->post('id_kegiatan'),
						'usul'			=> $i,
						'tahun'			=> $this->session->userdata('tahun'));
			$query = $this->db->delete('usulan_skpd_new', $data);
		}

		for ($i=$this->input->post('usul'); $i < 6; $i++) {
			$data = array(
						'skpd' 			=> $this->input->post('skpd'),
						'id_urusan'		=> $this->input->post('id_urusan'),
						'id_program'	=> $this->input->post('id_program'),
						'id_kegiatan'	=> $this->input->post('id_kegiatan'),
						'id_nasional'	=> $this->input->post('id_nasional'),
						'id_provinsi'	=> $this->input->post('id_provinsi'),
						'id_kabupaten'	=> $this->input->post('id_kabupaten'),
						'id_sasaran'	=> $this->input->post('id_sasaran'),
						'common_output'	=> trim($this->input->post('common_output')),
						'usul'			=> $i,
						'tahun'			=> $this->session->userdata('tahun'),
						'anggaran'		=> $this->session->userdata('anggaran'));
			$this->db->insert('usulan_skpd_new', $data);
			$insert_id = $this->db->insert_id();

			$this->db->delete('sub_usulan_kegiatan', 
										array(	'id_urusan' => $this->input->post('id_urusan'),
												'id_program' => $this->input->post('id_program'),
												'id_kegiatan' => $this->input->post('id_kegiatan'),
												'usul' => $i,
												'tahun' => $this->session->userdata('tahun'),
												'skpd' => $this->input->post('skpd'),
											)
									);
			$this->db->delete('lokasi_sub_kegiatan', 
										array(	'id_urusan' => $this->input->post('id_urusan'),
												'id_program' => $this->input->post('id_program'),
												'id_kegiatan' => $this->input->post('id_kegiatan'),
												'usul' => $i,
												'tahun' => $this->session->userdata('tahun'),
												'skpd' => $this->input->post('skpd'),
											)
									);
			if ( isset($_POST['keluaran']) ) {
					for ($j=0; $j < count( $this->input->post('keluaran') ); $j++) {
						$sub_usulan = array(
										'id_usulan' 					=> $insert_id,
										'skpd' 							=> $this->input->post('skpd'),
										'id_urusan'						=> $this->input->post('id_urusan'),
										'id_program'					=> $this->input->post('id_program'),
										'id_kegiatan'					=> $this->input->post('id_kegiatan'),
										'tahun'							=> $this->session->userdata('tahun'),
										'keluaran_kegiatan'				=> $_POST['keluaran'][$j],
										'target_kegiatan'				=> $_POST['target_induk'][$j],
										'target_kegiatan_perubahan'		=> $_POST['target_perubahan'][$j],
										'lokasi_kegiatan'				=> $_POST['nama_lokasi'][$j],
										'id_sumberdana'					=> $_POST['id_sumberdana'][$j],
										'id_jenis_kegiatan'				=> $_POST['id_jenis'][$j],
										'id_penanggungjawab_kegiatan'	=> $_POST['id_jawab'][$j],
										'pagu_indikatif'				=> $_POST['induk'][$j],
										'pagu_indikatif_perubahan'		=> $_POST['perubahan'][$j],
										'pagu_next'						=> $_POST['pagunext'][$j],
										'pagu_indikatif'				=> $_POST['induk'][$j],
										'usul'							=> $i,
										'catatan'						=> $_POST['id_catatan'][$j]
							);
						$this->db->insert('sub_usulan_kegiatan', $sub_usulan);
						$insert_id_sub_usulan = $this->db->insert_id();
								//insert lokasi per sub kegiatan
								$lokasi = explode(",", $_POST['lokasi'][$j]);
		
								for ($c=0; $c < count($lokasi); $c++) {

									$lok = array(
												'id_sub_usulan' 					=> $insert_id_sub_usulan,
												'id_usulan' 						=> $insert_id,
												'id_urusan' 						=> $this->input->post('id_urusan'),
												'id_program' 						=> $this->input->post('id_program'),
												'id_kegiatan'						=> $this->input->post('id_kegiatan'),
												'usul' 								=> $i,
												'tahun' 							=> $this->session->userdata('tahun'),
												'skpd' 								=> $this->input->post('skpd'),
												
												'id_lokasi'							=> $lokasi[$c]
									);
								$this->db->insert('lokasi_sub_kegiatan', $lok);
								}
					}		
			}
		}
	}

	public function delete_usulan($id_usulan)
	{	
		$data = array('deleted' => 1);
		$this->db->where('id_usulan', $id_usulan);
		$this->db->update('usulan_skpd_new', $data);
	}

	public function delete_subusulan($id_usulan)
	{	
		$data = array('deleted' => 1);
		$this->db->where('id_usulan', $id_usulan);
		$this->db->update('sub_usulan_kegiatan', $data);
	}

	public function check_usulan_kegiatan($id_skpd, $id_urusan, $id_program, $id_kegiatan, $usul)
	{
		$this->db->select('	usulan_skpd_new.id_usulan 		as id_usulan,
							usulan_skpd_new.skpd 			as id_skpd,
							usulan_skpd_new.id_urusan 		as id_urusan,
							usulan_skpd_new.id_program 		as id_program,
							usulan_skpd_new.id_kegiatan 	as id_kegiatan,
							usulan_skpd_new.id_nasional 	as id_nasional,
							usulan_skpd_new.id_provinsi 	as id_provinsi,
							usulan_skpd_new.id_kabupaten 	as id_kabupaten,
							usulan_skpd_new.id_sasaran 		as id_sasaran,
							usulan_skpd_new.id_kegiatan 	as id_kegiatan,
							usulan_skpd_new.usul 			as usulan,
							usulan_skpd_new.tahun 			as tahun,
							skpd.nama_skpd 					as nama_skpd, 
							skpd.kode_skpd 					as kode_skpd, 
							urusan.nama_urusan 				as nama_urusan, 
							urusan.kode_urusan 				as kode_urusan, 
							program.nama_program 			as nama_program, 
							program.kode_program 			as kode_program, 
							kegiatan.kode_kegiatan 			as kode_kegiatan, 
							kegiatan.nama_kegiatan 			as nama_kegiatan, 
							prioritasnasional.prioritasnas 	as prioritasnas, 
							prioritasnasional.kode 			as kode_prioritas_nasional, 
							prioritasprovinsi.prioritasprov as prioritasprov,
							prioritasprovinsi.kode 			as kode_prioritas_provinsi,
							prioritaskabupaten.prioritaskab as prioritaskab,
							prioritaskabupaten.kode 		as kode_prioritas_kabupaten,
							sasarankab.sasarankab 			as nama_sasaran,
							sasarankab.kode 				as kode_sasaran,
							sumberdana.ket 					as sumberdana');
		$this->db->from('usulan_skpd_new');
		$this->db->join('skpd', 'skpd.id_skpd 						= usulan_skpd_new.skpd', 'left');
		$this->db->join('urusan', 'urusan.id_urusan 				= usulan_skpd_new.id_urusan', 'left');
		$this->db->join('program', 'program.id_program 				= usulan_skpd_new.id_program', 'left');
		$this->db->join('kegiatan', 'kegiatan.id_kegiatan 			= usulan_skpd_new.id_kegiatan', 'left');
		$this->db->join('prioritasnasional', 'prioritasnasional.id 	= usulan_skpd_new.id_nasional', 'left');
		$this->db->join('prioritasprovinsi', 'prioritasprovinsi.id 	= usulan_skpd_new.id_provinsi', 'left');
		$this->db->join('prioritaskabupaten', 'prioritaskabupaten.id= usulan_skpd_new.id_kabupaten', 'left');
		$this->db->join('sasarankab', 'sasarankab.id				= usulan_skpd_new.id_sasaran', 'left');
		$this->db->join('sumberdana', 'sumberdana.id				= usulan_skpd_new.anggaran', 'left');
		$this->db->where('usulan_skpd_new.skpd', 		$id_skpd);
		$this->db->where('usulan_skpd_new.id_urusan', 	$id_urusan);
		$this->db->where('usulan_skpd_new.id_program', 	$id_program);
		$this->db->where('usulan_skpd_new.id_kegiatan', $id_kegiatan);
		// $this->db->where('usulan_skpd_new.usul', 		$usul);
		$this->db->where('usulan_skpd_new.tahun', 		$this->session->userdata('tahun'));
		$this->db->where('usulan_skpd_new.deleted', 0);
		$query 				= $this->db->get();
		$result['count']  	= $query->num_rows();
		$result['result']  	= $query->result_array();
		return $result;
	}

	public function check_anggaran($id_skpd, $tahun, $usulan)
	{
		$this->db->select('	sum(sub_usulan_kegiatan.pagu_indikatif) as total_pagu_indikatif,
							sum(sub_usulan_kegiatan.pagu_indikatif_perubahan) as total_pagu_indikatif_perubahan');
		$this->db->from('sub_usulan_kegiatan');
		$this->db->where('sub_usulan_kegiatan.usul', $usulan);
		$this->db->where('sub_usulan_kegiatan.tahun', $tahun);
		$this->db->where('sub_usulan_kegiatan.skpd', $id_skpd);
		$this->db->where('sub_usulan_kegiatan.deleted', 0);
		$query 				= $this->db->get();
		$result 		  	= $query->result_array();
		return $result;
	}

	public function count_sub_usulan($id_skpd, $id_urusan, $id_program, $id_kegiatan, $tahun)
	{
		$this->db->select('sum(pagu_indikatif) as total');
		$this->db->from('sub_usulan_kegiatan');
		$this->db->where('tahun', '2015');
		$this->db->where('skpd', $id_skpd);
		$this->db->where('id_urusan', $id_urusan);
		$this->db->where('id_program', $id_program);
		$this->db->where('id_kegiatan', $id_kegiatan);
		$this->db->where('usul', '4');
		$this->db->where('tahun', $tahun);
		$this->db->where('deleted', 0);

		$query 		= $this->db->get();
		$result  	= $query->row();
		return $result->total;
	}
}