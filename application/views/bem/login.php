<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BEM VOTE Login</title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/datepicker3.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet">
	<link rel="icon" rel="icon" href="<?= base_url('assets/img/bemvotelogo.jpg') ?>">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<style media="screen">
		body{
			background-image: url(<?= base_url('assets/img/1.jpg') ?>);
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: bottom;
			background-size: cover;
		}
		h2, h1{
			color: white;
			text-align: center;
			text-transform: uppercase;
			font-family: cursive;
		}
		h1{
		}
	</style>
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<h1>Ayo Memilih!</h1>
		<h2>Jangan sia-siakan suara anda untuk STMIK JAKARTA yang Lebih Baik!</h2>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<?php if(!empty($this->session->flashdata('error_msg'))): ?>
        		<p class="btn btn-outline-danger text-center" style="border: red 1px solid; color:red; width:100%; text-align:center; margin-bottom:15px;"><?= $this->session->flashdata('error_msg') ?></p>
      		<?php endif ?>

						<?= form_open('login/index', ['role' => 'form']) ?>
						<fieldset>
							<div class="form-group">
								<?= form_input('npm', $input->npm, ['class' => 'form-control', 'placeholder' => 'Username']) ?>
							</div>
							<div class="form-group">
								<?= form_input('tgl_lahir', $input->tgl_lahir, ['class' => 'form-control', 'placeholder' => 'Password']) ?>
							</div>
						</label>
							<?= form_submit(null, 'Login', ['class' => 'btn btn-primary']) ?>
						<?= form_close() ?>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


<script src="<?= base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>
