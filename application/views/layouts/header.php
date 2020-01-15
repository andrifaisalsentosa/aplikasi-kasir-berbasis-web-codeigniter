<?php 	
if ($this->session->userdata('status')!= "login") {
			redirect('login');
		}
		 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kasir</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="<?= base_url('assets/bootstrap-3.3.5/css/bootstrap.min.css') ?>">
  	<link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
  	<link rel="stylesheet" href="<?= base_url('assets/datatables/css/dataTables.bootstrap.css') ?>">

  	<script src="<?= base_url('assets/jquery-2.1.4.min.js') ?>"></script>
  	<script src="<?= base_url('assets/bootstrap-3.3.5/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>
  	<script src="<?= base_url('assets/maskMoney/jquery.maskMoney.min.js') ?>"></script>
  	<style type="text/css">
	  	#header,#footer{
	  		background-color: #337ab7;
	  		color: #fff;
	  		text-align: center;
	  	}
	  	#header{
	  		margin-bottom: 30px;
	  	}
	  	#header h1{
	  		margin: 0;
	  		padding: 15px;
	  	}
	  	#footer{
	  		padding: 3px;
	  	}
	  	.btn{
			border-radius: 2px;
		}
		.btn-kecil{
			padding: 0 6px 0 6px;
		}
		.form-control[disabled], .form-control[readonly], 
		fieldset[disabled] .form-control{
			background-color: #EBF2F8;
		}
		.besar{
			font-size: 20px;
			font-weight: 300;
		}
		table th,table td{
			text-align: center;
		}
		form{
			margin-top: 20px;
		}
		.mb{
			margin-bottom: 30px;
		}
		.nav ul li{
			list-style: none;
		}
		.nav ul{
			padding-left: 20px;
			
		}
		.nav ul li a{
			text-decoration: none;
			display: block;
			padding: 4px;
			margin: 3px;
		}
		.nav ul li a:hover{
			text-decoration: none;
			color: #fff;
			background-color: #337ab7;
			border-radius: 2px;
		}
		.nav>li>a:hover{
			background-color: #337ab7;
			color: #fff;
		}
		.nav ul .active{
			background-color: #337ab7;
			border-radius: 2px;
		}
		.nav ul .active a{
			color: #fff;
		}
		.nav li a:active,.nav li a:focus{
			background-color: #337ab7;
			border-radius: 2px;
			color: #fff;
		}
  	</style>
</head>
<body>
<div id="header">
<h1><?php echo $title; ?></h1>
</div><!-- end header -->
<div class="container">
	<div class="row">
		
