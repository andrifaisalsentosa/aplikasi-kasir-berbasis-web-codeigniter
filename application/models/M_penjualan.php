<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {

	public function tampil()
	{
		$this->db->order_by('id_penjualan', 'desc');
		$this->db->select('*');
		$this->db->join('barang', 'barang.id_barang = penjualan.id_barang', 'left');
		return $this->db->get('penjualan')->result();
	}

	public function total()
	{
		$this->db->select('sum(total) as jumlah');
		$this->db->join('barang', 'barang.id_barang = penjualan.id_barang', 'left');
		return $this->db->get('penjualan')->result();
	}

}

/* End of file M_penjualan.php */
/* Location: ./application/models/M_penjualan.php */