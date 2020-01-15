<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index(){
		$this->load->view('login/v_login');
	}

	public function login_salah(){
		
		$this->load->view('login/v_login_salah');
	}

	public function proses(){
		$this->M_login->cek_login();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login/login.php */