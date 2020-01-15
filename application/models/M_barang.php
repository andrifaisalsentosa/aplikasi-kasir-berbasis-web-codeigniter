<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_barang extends CI_Model{

	private $primary_key = 'id_barang';
	private $table_name	= 'barang';

	public function __construct()
	{
	
		parent::__construct();
		$this->load->model('M_barang');
	
	}

	public function get() 
	{
	  	
	  	$this->db->select('id_barang,nama_barang');

		return $this->db->get($this->table_name)->result();
	
	}

	public function get_by_id($id)
	{
	  
	  	$this->db->where($this->primary_key,$id); 
	  
	  	return $this->db->get($this->table_name)->row();
	
	}









	public function tampil()
	{
		return $this->db->get('barang')->result();
	}

	public function tambah()
	{
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$keterangan = $this->input->post('keterangan');

		$data = array(
						'id_barang' => $kode , 
						'nama_barang' => $nama , 
						'harga_barang' => $harga , 
						'stok_barang' => $stok , 
						'keterangan_barang' => $keterangan , 
					);
		$this->db->insert('barang', $data);
	}

	public function ubah($id)
	{
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');
		$keterangan = $this->input->post('keterangan');

		$data = array(
						'id_barang' => $kode , 
						'nama_barang' => $nama , 
						'harga_barang' => $harga , 
						'stok_barang' => $stok , 
						'keterangan_barang' => $keterangan , 
					);
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}

	public function ubah_tampil($id)
	{
		return $this->db->get_where('barang', array('id_barang' => $id))->row();
	}


}