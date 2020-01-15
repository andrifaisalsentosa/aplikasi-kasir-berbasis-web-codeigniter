<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$data = array(
						'title'=>'Manajemen User',
						'isi' => 'user/user_tampil',
						'user' => $this->m_user->tampil()
					);
		$this->load->view('layouts/wrapper',$data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('telepon', 'telepon', 'required|max_length[12]');
		$this->form_validation->set_rules('username', 'username', 'required|min_length[8]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
							'title' => 'Tambah user' , 
							'isi' => 'user/user_tambah' , 
						);

			$this->load->view('layouts/wrapper',$data);

		} else {

			$this->m_user->tambah();
			redirect('user');
		}
		
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('nama', 'nama', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('telepon', 'telepon', 'required|max_length[12]');
		$this->form_validation->set_rules('username', 'username', 'required|min_length[8]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
							'title' => 'Edit user' , 
							'isi' => 'user/user_ubah' , 
							'user' => $this->m_user->ubah_tampil($id) 
						);

			$this->load->view('layouts/wrapper',$data);

		} else {

			$this->m_user->ubah($id);
			redirect('user');
		}
		
	}

	public function hapus($id)
    {
        $this->db->delete('user', array('id_user' => $id));
        redirect('user');
    }


}

/* End of file user.php */
/* Location: ./application/controllers/user.php */