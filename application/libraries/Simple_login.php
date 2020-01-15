<?php

if (!defined('BASEPATH'))
    exit('Akses langsung tidak diperbolehkan');

class Simple_login {

// SET SUPER GLOBAL
    var $CI = NULL;

    public function __construct() {
        $this->CI = & get_instance();
    }

// Fungsi login
    public function login($username, $password) {
        $query = $this->CI->db->get_where('user', array('username' => $username, 'password' => md5($password)));
        if ($query->num_rows() == 1) {
            $row = $this->CI->db->query('SELECT id_user FROM user where username = "' . $username . '"');
            $admin = $row->row();
            $id = $admin->id_user;
            $this->CI->session->set_userdata('username', $username);
            $this->CI->session->set_userdata('id_login', uniqid(rand()));
            $this->CI->session->set_userdata('id', $id);
            redirect('kasir');
        } else {
            $this->CI->session->set_flashdata('sukses', 'Maaf... Username/password salah');
            redirect('login');
        }
        return false;
    }

// Proteksi halaman
    public function cek_login() {
        if ($this->CI->session->userdata('username') == '') {
            $this->CI->session->set_flashdata('sukses', 'Anda belum login');
            redirect('login');
        }
    }

// Fungsi logout
    public function logout() {
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('id_login');
        $this->CI->session->unset_userdata('id');
        $this->CI->session->set_flashdata('sukses', 'Anda berhasil logout');
        redirect('login');
    }

}
