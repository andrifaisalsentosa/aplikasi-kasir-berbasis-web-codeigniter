<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
	}

	public function index()
	{
		$data = array(
						'title'=>'Manajemen Barang',
						'isi' => 'barang/barang_tampil',
						'barang' => $this->m_barang->tampil()
					);
		$this->load->view('layouts/wrapper',$data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('kode', 'Kode', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
							'title' => 'Tambah Barang' , 
							'isi' => 'barang/barang_tambah' , 
						);

			$this->load->view('layouts/wrapper',$data);

		} else {

			$this->m_barang->tambah();
			redirect('barang');
		}
		
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('kode', 'Kode', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('harga', 'Harga', 'required');
		$this->form_validation->set_rules('stok', 'Stok', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array(
							'title' => 'Edit Barang' , 
							'isi' => 'barang/barang_edit' , 
							'barang' => $this->m_barang->ubah_tampil($id) 
						);

			$this->load->view('layouts/wrapper',$data);

		} else {

			$this->m_barang->ubah($id);
			redirect('barang');
		}
		
	}

	public function hapus($id)
    {
        $this->db->delete('barang', array('id_barang' => $id));
        redirect('barang');
    }

}

/* End of file barang.php */
/* Location: ./application/controllers/barang.php */