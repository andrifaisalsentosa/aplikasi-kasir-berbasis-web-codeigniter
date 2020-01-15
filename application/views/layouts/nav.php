<div class="col-md-3">
		<div class="panel panel-default">
		  <div class="panel-body">
			<ul class="nav nav-pills nav-stacked">
			<li style="text-align: center;">
				<span style="font-size: 18px;font-weight: bold; color: #337ab7;">Welcome <?php echo $this->session->userdata('nama'); ?></span>
				<br>	
				<br>	
			</li>
			  <li class="active">
			  	<a data-toggle="collapse" data-parent="#accordion" 
			  		href="#collapse1"><i class="fa fa-shopping-cart"></i> Penjualan</a>
			  		<div id="collapse1" class="panel-collapse collapse in">
				  		<ul>
				  			<li class="active"><a href="<?php echo site_url('kasir') ?>"><i class="fa fa-cart-plus"></i>
				  				Tambah Penjualan</a></li>
				  			<li><a href="<?php echo site_url('kasir/penjualan') ?>"><i class="fa fa-list-ul"></i>
				  				List Data Penjualan</a></li>
				  		</ul>
			  		</div>
			  	</li>
			  <li><a data-toggle="collapse" data-parent="#accordion" 
			  		href="#collapse2"><i class="fa fa-cubes"></i> Barang</a>
			  		<div id="collapse2" class="panel-collapse collapse">
				        <ul>
				  			<li><a href="<?php echo site_url('barang/tambah') ?>"><i class="fa fa-plus"></i>
				  				Tambah Barang</a></li>
				  			<li><a href="<?php echo site_url('barang') ?>"><i class="fa fa-list-ul"></i>
				  				List Data Barang</a></li>
				  		</ul>
			      	</div>	
			  </li>
			  <li><a data-toggle="collapse" data-parent="#accordion" 
			  		href="#collapse3"><i class="fa fa-user"></i> User</a>
			  		<div id="collapse3" class="panel-collapse collapse">
				        <ul>
				  			<li><a href="<?php echo site_url('user/tambah') ?>"><i class="fa fa-plus"></i>
				  				Tambah User</a></li>
				  			<li><a href="<?php echo site_url('user') ?>"><i class="fa fa-list-ul"></i>
				  				List Data User</a></li>
				  		</ul>
			      	</div>	
			  </li>
			  <li><a href="<?php echo site_url('login/logout') ?>"><i class="glyphicon glyphicon-eject"></i> Logout</a></li>
			</ul>
		  </div>
		</div>
	</div>
	<div class="col-md-9">