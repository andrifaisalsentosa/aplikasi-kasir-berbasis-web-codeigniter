<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

		public function tampil()
	{
		return $this->db->get('user')->result();
	}

	public function tambah()
	{
		$data = array(
						'nama'     => $this->input->post('nama') , 
						'email'    => $this->input->post('email') , 
						'telepon'  => $this->input->post('telepon') , 
						'username' => $this->input->post('username') , 
						'password' => md5($this->input->post('password')) , 
						'tanggal'  => date('dmy') 

					);

		$this->db->insert('user', $data);
	}

	public function ubah($id)
	{
		$data = array(
						'nama'     => $this->input->post('nama') , 
						'email'    => $this->input->post('email') , 
						'telepon'  => $this->input->post('telepon') , 
						'username' => $this->input->post('username') , 
						'password' => md5($this->input->post('password')) , 
						'tanggal'  => date('dmy')
					);
		
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}

	public function ubah_tampil($id)
	{
		return $this->db->get_where('user', array('id_user' => $id))->row();
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */