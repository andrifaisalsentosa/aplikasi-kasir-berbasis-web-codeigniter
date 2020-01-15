		<div class="panel panel-default">
		 <div class="panel-body">
		 	<div class="row">

					<div class="col-md-4">
						<div class="form-group">
					      <label for="total" class="besar">Pendapatan (Rp) :</label>
					      <?php foreach ($total as $row) { ?>
					      	<input type="text" class="form-control input-lg" name="total" id="total" placeholder="0" readonly="readonly"  value="<?php echo number_format($row->jumlah, 0 , '' , '.' ) ?>">
					    	<?php } ?>
					    </div>
					</div>
					<div class="col-md-6"></div>

					<div class="col-md-2" style="margin-top:20px">
						<div class="form-group">
						<a href="<?php echo site_url('kasir/kosong_penjualan') ?>">
							<button class="btn btn-primary btn-lg">Selesai <i class="fa fa-angle-double-right"></i></button>
						</a>
						</div>
					</div>
		 		
		 	</div>

	      	<table class="table table-striped table-bordered">
				<thead>
				 	<tr>
					   	<th>No</th>
					   	<th>Id Barang</th>
					   	<th>Nama Barang</th>
					   	<th>Harga</th>
					   	<th>Quantity</th>
					   	<th>Sub-Total</th>
				 	</tr>
				</thead>
				<tbody>
					<?php $no= 1; 
					foreach ($penjualan as $row) { ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row->id_barang; ?></td>
							<td><?php echo $row->nama_barang; ?></td>
							<td><?php echo number_format($row->harga_barang, 0 , '' , '.' ); ?></td>
							<td><?php echo $row->quantity; ?></td>
							<?php $total = $row->harga_barang * $row->quantity; ?>
							<td><?php echo number_format($total, 0 , '' , '.' ); ?></td>
						</tr>
					<?php } ?>
					
				</tbody>
			</table>
	      </div>
	    </div>
	</div><!-- end col-md-9 -->
