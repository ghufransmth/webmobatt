<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_users extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get($id_user=false)
	{
		$this->db->select('	scuser.id_user,
							scuser.username,
							scuser.id_skpd,
							scuser.fullname,
							scuser.password,
							scuser.instansi,
							scuser.jabatan,
							scuser.pangkat,
							scuser.nip,
							skpd.nama_skpd');
		$this->db->from('scuser');
		$this->db->join('skpd', 'skpd.id_skpd = scuser.id_skpd', 'left');
		if ($id_user!=false) {
			$this->db->where('scuser.id_user', $id_user);
		}
		$this->db->where('scuser.deleted', 0);
		$query 		= $this->db->get();
		$result 	= $query->result_array();
		return $result;
	}

	public function add()
	{
		$username 	= $this->input->post('username');
		$password 	= md5($this->input->post('password'));
		$fullname 	= $this->input->post('fullname');
		$id_skpd 	= $this->input->post('id_skpd');
		$instansi 	= $this->input->post('instansi');
		$jabatan 	= $this->input->post('jabatan');
		$pangkat 	= $this->input->post('pangkat');
		$nip 		= $this->input->post('nip');

		$object  	= array('username' 		=> $username,
							'password' 		=> $password,
							'fullname' 		=> $fullname,
							'id_skpd'		=> $id_skpd,
							'instansi' 		=> $instansi,
							'jabatan' 		=> $jabatan,
							'pangkat' 		=> $pangkat,
							'nip' 			=> $nip );

		$query = $this->db->insert('scuser', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	public function edit()
	{
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$fullname 	= $this->input->post('fullname');
		$id_skpd 	= $this->input->post('id_skpd');
		$instansi 	= $this->input->post('instansi');
		$jabatan 	= $this->input->post('jabatan');
		$pangkat 	= $this->input->post('pangkat');
		$nip 		= $this->input->post('nip');

		if ($this->input->post('password')!='') {
			$object  	= array('username' 		=> $username,
								'password' 		=> md5($password),
								'fullname' 		=> $fullname,
								'id_skpd'		=> $id_skpd,
								'instansi' 		=> $instansi,
								'jabatan' 		=> $jabatan,
								'pangkat' 		=> $pangkat,
								'nip' 			=> $nip );
		}
		else{
			$object  	= array('username' 		=> $username,
								'fullname' 		=> $fullname,
								'id_skpd'		=> $id_skpd,
								'instansi' 		=> $instansi,
								'jabatan' 		=> $jabatan,
								'pangkat' 		=> $pangkat,
								'nip' 			=> $nip );
		}
		$this->db->where('id_user', $this->input->post('id_user'));
		$query = $this->db->update('scuser', $object);

		if ($query) {
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($id_user)
	{
		$object = array('deleted' => 1);
		$this->db->where('id_user', $id_user);
		$this->db->update('scuser', $object);
	}

}

/* End of file model_users.php */
/* Location: ./application/models/model_users.php */