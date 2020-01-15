		<div class="panel panel-default">
		 <div class="panel-body">
		 	<form class="form-horizontal" id="form_transaksi" role="form" method="POST" action="<?php echo site_url('kasir'); ?>">
	      	<div class="col-md-8">
			    <div class="form-group">
			      <label class="control-label col-md-3" for="id_barang">Id Barang :</label>
			      <div class="col-md-8">
			        <input list="list_barang" autofocus="" class="form-control reset" placeholder="Isi id..." name="id_barang" id="id_barang" autocomplete="off" onchange="showBarang(this.value)">
	                  <datalist id="list_barang">
	                  	<?php foreach ($barang as $barang): ?>
	                  		<option value="<?= $barang->id_barang ?>"><?= $barang->nama_barang ?></option>
	                  	<?php endforeach ?>
	                  </datalist>
			      </div>
			    </div>

			    <div id="barang">
				    <div class="form-group">
				      <label class="control-label col-md-3" for="nama_barang">Nama Barang :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" name="nama_barang" id="nama_barang" readonly="readonly">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="control-label col-md-3" for="harga_barang">Harga (Rp) :</label>
				      <div class="col-md-8">
				        <input type="text" class="form-control reset" name="harga_barang" id="harga_barang" readonly="readonly">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="control-label col-md-3" for="qty">Quantity :</label>
				      <div class="col-md-8">
				        <input type="number" class="form-control reset" onchange="subTotal(this.value)" onkeyup="subTotal(this.value)" id="qty" min="0" name="qty" placeholder="Isi qty...">
				      </div>
				    </div>
			    </div><!-- end id barang -->

			    <div class="form-group">
			      <label class="control-label col-md-3" for="sub_total">Sub-Total (Rp):</label>
			      <div class="col-md-8">
			        <input type="text" class="form-control reset" name="sub_total" id="sub_total" readonly="readonly">
			      </div>
			    </div>

			    <div class="form-group">
			    	<div class="col-md-offset-3 col-md-3">
			    		<!-- <input type="submit" name="submit" class="btn btn-primary" value="Tambah"> -->
			      		<!-- <button type="submit" class="btn btn-primary" onclick="addbarang()"><i class="fa fa-cart-plus"></i> 
			      			Tambah
			      		</button> -->
			      		<input class="btn btn-primary btn-lg" type="submit" name="submit" value="Tambah">
			    	</div>
			    </div>
	      	</div><!-- end col-md-8 -->

	      	<div class="col-md-4 mb">
				<div class="col-md-12">
				  	<div class="form-group">
				      <label for="total" class="besar">Total (Rp) :</label>	
				      <?php foreach ($total as $row) { ?>
				      	<input type="text" class="form-control input-lg" id="total" name="total" value="<?php echo number_format($row->jumlah, 0 , '' , '.' ) ?>" placeholder="0" readonly="readonly">
				      <?php }; ?>																
				      	<!-- <input type="text" class="form-control input-lg" name="total" id="total" placeholder="0" readonly="readonly"> -->
				    </div>

				    <div class="form-group">
				      <label for="bayar" class="besar">Bayar (Rp) :</label>
				        <input type="text" class="form-control input-lg uang" name="bayar" placeholder="0" autocomplete="off" id="bayar" onkeyup="showKembali(this.value)">
				    </div>

				    <div class="form-group">
				      <label for="kembali" class="besar">Kembali (Rp) :</label>
				      	<input type="text" class="form-control input-lg" name="kembali" id="kembali" placeholder="0" readonly="readonly">
				    </div>

				    <div class="form-group">
				    		<a href="<?php echo site_url('kasir/kosong_keranjang') ?>">
							<button type="button" style="width: 100%;" class="btn btn-primary btn-lg">Selesai</button>
						</a>
					</div>

				</div>
	      	</div><!-- end col-md-4 -->
	      	</form>

	      	<table class="table table-striped table-bordered">
				<thead>
				 	<tr>
					   	<th>No</th>
					   	<th>Id Barang</th>
					   	<th>Nama Barang</th>
					   	<th>Harga</th>
					   	<th>Quantity</th>
					   	<th>Sub-Total</th>
					   	<th>Aksi</th>
				 	</tr>
				</thead>
				<tbody>
					<?php $no= 1; 
					foreach ($keranjang as $row) { ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row->id_barang; ?></td>
							<td><?php echo $row->nama_barang; ?></td>
							<td><?php echo number_format($row->harga_barang, 0 , '' , '.' ); ?></td>
							<td><?php echo $row->quantity; ?></td>
							<td><?php echo $row->total; ?></td>
							<td>
								<a href="<?php echo site_url('kasir/hapus/'.$row->id_keranjang) ?>"><i class="glyphicon glyphicon-remove"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
	      </div>
	    </div>
	</div><!-- end col-md-9 -->
