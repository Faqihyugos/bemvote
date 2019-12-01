<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BEM VOTE</title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/datepicker3.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet">
	<link rel="icon" rel="icon" href="<?= base_url('assets/img/bemvotelogo.jpg') ?>">
	<script src="<?= base_url('assets/tinymce/tinymce.min.js') ?>"></script>
	<script>tinymce.init({ selector:'.paslon' });</script>
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/BEM-VOTELOGOTRANS.png') ?>" class="img-responsive"><span>BEM</span>VOTE</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="<?= base_url('assets/img/bemvotelogo.jpg') ?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?= $this->session->userdata('user') ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="<?= base_url('') ?>"><em class="fa fa-dashboard">&nbsp;</em> Home</a></li>
			<?php if(!empty($this->session->userdata('rektor')) || !empty($this->session->userdata('dekan')) || !empty($this->session->userdata('operator')) || !empty($this->session->userdata('admin'))): ?>
				<li><a href="<?= base_url('paslon') ?>"><em class="fa fa-user">&nbsp;</em> Paslon</a></li>
			<?php endif ?>
			<?php if(!empty($this->session->userdata('operator'))): ?>
				<li><a href="<?= base_url('pemilih') ?>"><em class="fa fa-users">&nbsp;</em> Pemilih</a></li>
			<?php endif ?>
			<?php if(!empty($this->session->userdata('rektor')) || !empty($this->session->userdata('dekan')) || !empty($this->session->userdata('admin'))): ?>
				<li><a href="<?= base_url('pemilih-admin') ?>"><em class="fa fa-users">&nbsp;</em> Pemilih</a></li>
			<?php endif ?>
			<?php if(!empty($this->session->userdata('admin'))): ?>
				<li><a href="<?= base_url('jurusan') ?>"><em class="fa fa-flag">&nbsp;</em> Jurusan</a></li>
				<li><a href="<?= base_url('admin') ?>"><em class="fa fa-eye">&nbsp;</em> Admin</a></li>
				<li><a href="<?= base_url('suara-masuk') ?>"><em class="fa fa-comment">&nbsp;</em> Suara Masuk</a></li>
			<?php endif ?>
			<?php if(!empty($this->session->userdata('rektor')) || !empty($this->session->userdata('dekan')) || !empty($this->session->userdata('admin'))): ?>
			<li><a href="<?= base_url('statistik-pemilih') ?>"><em class="fa fa-bar-chart">&nbsp;</em> Statistik Pemilih</a></li>
			<?php endif ?>
			<?php if(!empty($this->session->userdata('operator'))): ?>
			<li><a href="<?= base_url('statistik-jurusan/'.$this->session->userdata('slug_jurusan')); ?>"><em class="fa fa-bar-chart">&nbsp;</em> Statistik Jurusan</a></li>
			<li><a href="<?= base_url('live-count-jurusan/'.$this->session->userdata('slug_jurusan')); ?>"><em class="fa fa-database">&nbsp;</em> Live Count Jurusan</a></li>
			<?php endif ?>
			<?php if(!empty($this->session->userdata('rektor')) || !empty($this->session->userdata('dekan')) || !empty($this->session->userdata('operator')) || !empty($this->session->userdata('admin'))): ?>
			<li><a href="<?= base_url('live-count') ?>"><em class="fa fa-database">&nbsp;</em> Live Count</a></li>
			<?php endif ?>
			<?php if(!empty($this->session->userdata('admin'))): ?>
				<li><a href="<?= base_url('laporan') ?>"><em class="fa fa-file-pdf-o">&nbsp;</em> Laporan</a></li>
			<?php endif ?>
			<?php if(!empty($this->session->userdata('operator'))): ?>
				<li><a href="<?= base_url('laporan-operator') ?>"><em class="fa fa-file-pdf-o">&nbsp;</em> Laporan</a></li>
			<?php endif ?>
			<li><a href="<?= base_url('logout') ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
