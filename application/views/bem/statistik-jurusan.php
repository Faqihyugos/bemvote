<!-- BEM-VOTE -->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Statistik Fakultas <?= $this->session->userdata('fakultas') ?> </li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Statistik Fakultas <?= $this->session->userdata('fakultas') ?></h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<h3 style="margin-left:25px">Statistik Pemilih Fakultas <?= $this->session->userdata('fakultas') ?></h3>
			<div class="col-xs-6 col-md-12">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4><?= $this->session->userdata('fakultas') ?></h4>
						<div class="easypiechart" id="easypiechart-coral" data-percent="<?= $totalSuaraMasukFakultasStat ?>" ><span class="percent"><?= $totalSuaraMasukFakultasStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFakultas ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFakultas ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFakultas ?></strong></h5>
					</div>
				</div>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->
