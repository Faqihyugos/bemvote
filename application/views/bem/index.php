<!-- BEM-VOTE -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Home</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Home</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="row">
					<?php foreach ($paslons as $paslon): ?>
				<div class="col-xs-12 col-md-12 col-lg-6 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding">
							<div class="image">
								<img src="<?= base_url('assets/img/'.$paslon->gambar_capres) ?>" style="width:150px;border-radius:50%;">
								<img src="<?= base_url('assets/img/'.$paslon->gambar_cawapres) ?>" style="width:150px;border-radius:50%;">
							</div>
							<div class="large"><?= $paslon->nomor_urut ?></div>
							<h2><?= $paslon->nama_paslon ?></h2>
							<h4><strong><?= $paslon->fakultas_koalisi ?></strong></h4>
							<?php if($this->session->has_userdata('pemilih')): ?>
								<?= form_open('vote/index', ['style' => 'display:inline-block; margin:15px 15px 0 15px']) ?>
									<input type="hidden" name="id_pemilih" value="<?= $this->session->userdata('id_pemilih') ?>">
									<input type="hidden" name="id_paslon" value="<?= $paslon->id_paslon ?>">
									<input type="submit" value="Coblos" class="btn btn-primary" name="coblos">
								<?= form_close() ?>
							<?php endif ?>
							<a href="<?= base_url('paslon/'.$paslon->id_paslon) ?>" class="btn btn-info">Detail</a>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div><!--/.row-->
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Visi & Misi
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<?php foreach ($paslons as $paslon): ?>
						<h2><?= $paslon->nama_paslon ?></h2>
						<p><?= $paslon->visimisi ?></p>
						<?php if($this->session->has_userdata('pemilih')): ?>
							<?= form_open('vote/index') ?>
								<input type="hidden" name="id_pemilih" value="<?= $this->session->userdata('id_pemilih') ?>">
								<input type="hidden" name="id_paslon" value="<?= $paslon->id_paslon ?>">
								<input type="submit" value="Coblos" class="btn btn-primary btn-block" name="coblos">
							<?= form_close() ?>
						<?php endif ?>
						<a href="<?= base_url('paslon/'.$paslon->id_paslon) ?>" class="btn btn-info btn-block" style="margin:15px 0">Detail</a>
						<hr>
					<?php endforeach ?>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- BEM-VOTE -->
