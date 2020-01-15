<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function cek_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
						'username' => $username,
						'password' => md5($password)
						 );
		$cek = $this->db->get_where('user', $where)->num_rows();

		if ($cek > 0) {
			$data_session = array(
									'nama' => $username ,
									'status' => "login" 
									 );

			$this->session->set_userdata($data_session);
			redirect('kasir');

		}else{
			redirect('login/login_salah');
		}
	}

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */