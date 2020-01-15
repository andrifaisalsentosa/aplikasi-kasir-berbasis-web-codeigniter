<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keranjang extends CI_Model {

	public function tampil()
	{
		$this->db->order_by('id_keranjang', 'desc');
		$this->db->select('*');
		$this->db->join('barang', 'barang.id_barang = keranjang.id_barang', 'left');
		return $this->db->get('keranjang')->result();
	}

	public function tambah()
	{
		$data = array(
						'id_barang'    => $this->input->post('id_barang') ,
						'quantity'     => $this->input->post('qty'),
						'total'     => $this->input->post('sub_total')
					);

		$this->db->insert('keranjang', $data);
		$this->db->insert('penjualan', $data);
	}

	public function total()
	{
		$this->db->select('sum(total) as jumlah');
		$this->db->join('barang', 'barang.id_barang = keranjang.id_barang', 'left');
		return $this->db->get('keranjang')->result();
	}

}

/* End of file M_keranjang.php */
/* Location: ./application/models/M_keranjang.php */