<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_barang');
		$this->load->model('M_keranjang');
		$this->load->model('M_penjualan');
	}

	public function index()
	{
		if ($this->input->post('submit')) {
				$this->M_keranjang->tambah();
				redirect('kasir');
			}
			$data = array(
						'title'=>'Penjualan',
						'isi' => 'kasir',
						'barang' => $this->M_barang->get(),
						'keranjang' => $this->M_keranjang->tampil(),
						'total' => $this->M_keranjang->total()
					);

			$this->load->view('layouts/wrapper',$data);
	}

	public function getbarang($id)
	{

		$this->load->model('M_barang');

		$barang = $this->M_barang->get_by_id($id);

		if ($barang) {

			if ($barang->stok_barang == '0') {
				$disabled = 'disabled';
				$info_stok = '<span class="help-block badge" id="reset" 
					          style="background-color: #d9534f;">
					          stok habis</span>';
			}else{
				$disabled = '';
				$info_stok = '<span class="help-block badge" id="reset" 
					          style="background-color: #5cb85c;">stok : '
					          .$barang->stok_barang.'</span>';
			}

			echo '<div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="nama_barang">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="nama_barang" id="nama_barang" 
				        	value="'.$barang->nama_barang.'"
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga_barang">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" id="harga_barang" name="harga_barang" 
				        	value="'.number_format( $barang->harga_barang, 0 ,
				        	 '' , '.' ).'" readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	name="qty" placeholder="Isi qty..." autocomplete="off" 
				        	id="qty" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)" min="0"  
				        	max="'.$barang->stok_barang.'" '.$disabled.'>
				      </div>'.$info_stok.'
				    </div>';
	    }else{

	    	echo '<div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="nama_barang">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="nama_barang" id="nama_barang" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="harga_barang">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" 
				        	name="harga_barang" id="harga_barang" 
				        	readonly="readonly">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="control-label col-md-3" 
				      	for="qty">Quantity :</label>
				      <div class="col-md-4">
				        <input type="number" class="form-control reset" 
				        	autocomplete="off" onchange="subTotal(this.value)" 
				        	onkeyup="subTotal(this.value)" id="qty" min="0"  
				        	name="qty" placeholder="Isi qty...">
				      </div>
				    </div>';
	    }

	}

	public function ajax_list_transaksi()
	{

		$data = array();

		$no = 1; 
        
        foreach ($this->cart->contents() as $items){
        	
			$row = array();
			$row[] = $no;
			$row[] = $items["id"];
			$row[] = $items["name"];
			$row[] = 'Rp. ' . number_format( $items['price'], 
                    0 , '' , '.' ) . ',-';
			$row[] = $items["qty"];
			$row[] = 'Rp. ' . number_format( $items['subtotal'], 
					0 , '' , '.' ) . ',-';

			//add html for action
			$row[] = '<a 
				href="javascript:void()" style="color:rgb(255,128,128);
				text-decoration:none" onclick="deletebarang('
					."'".$items["rowid"]."'".','."'".$items['subtotal'].
					"'".')"> <i class="fa fa-close"></i> Delete</a>';
		
			$data[] = $row;
			$no++;
        }

		$output = array(
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function addbarang()
	{

		$data = array(
				'id' => $this->input->post('id_barang'),
				'name' => $this->input->post('nama_barang'),
				'price' => str_replace('.', '', $this->input->post(
					'harga_barang')),
				'qty' => $this->input->post('qty')
			);
		$insert = $this->cart->insert($data);
		echo json_encode(array("status" => TRUE));
	}

	public function deletebarang($rowid) 
	{

		$this->cart->update(array(
				'rowid'=>$rowid,
				'qty'=>0,));
		echo json_encode(array("status" => TRUE));
	}


	// ----------------------- Keranjang -----------------------
	public function kosong_keranjang()
	{
		$this->db->query('TRUNCATE TABLE KERANJANG');
		redirect('kasir');
	}

	public function hapus($id)
    {
        $this->db->delete('keranjang', array('id_keranjang' => $id));
        redirect('kasir');
    }

    public function penjualan()
    {
    	$data = array(
						'title'=>'Manajemen Penjualan',
						'isi' => 'penjualan',
						'penjualan' => $this->M_penjualan->tampil(),
						'total' => $this->M_penjualan->total()
					);

			$this->load->view('layouts/wrapper',$data);
    }


    // ----------------------- Penjualan -----------------------

    public function kosong_penjualan()
	{
		$this->db->query('TRUNCATE TABLE PENJUALAN');
		redirect('kasir/penjualan');
	}
}