<!-- BEM-VOTE -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Live Count <?= $this->session->userdata('fakultas') ?></li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Live Count <?= $this->session->userdata('fakultas') ?></h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-6 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding">
							<div class="large"><?= $paslonSatu->nomor_urut ?></div>
							<h2><?= $paslonSatu->nama_paslon ?></h2>
							<h4><strong><?= $paslonSatu->fakultas_koalisi ?></strong></h4>
              <div class="panel-body easypiechart-panel">
    						<div class="easypiechart" id="easypiechart-orange" data-percent="<?= $totalSuaraMasukSatuFakultasStat ?>" ><span class="percent"><?= $totalSuaraMasukSatuFakultasStat ?>%</span></div>
    					</div>
              <h3><strong><?= $totalSuaraMasukSatuFakultas ?> Suara</strong> </h3>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-md-12 col-lg-6 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding">
							<div class="large"><?= $paslonDua->nomor_urut ?></div>
							<h2><?= $paslonDua->nama_paslon ?></h2>
							<h4><strong><?= $paslonDua->fakultas_koalisi ?></strong></h4>
              <div class="panel-body easypiechart-panel">
    						<div class="easypiechart" id="easypiechart-teal" data-percent="<?= $totalSuaraMasukDuaFakultasStat ?>" ><span class="percent"><?= $totalSuaraMasukDuaFakultasStat ?>%</span></div>
    					</div>
              <h3><strong><?= $totalSuaraMasukDuaFakultas ?> Suara</strong> </h3>
						</div>
					</div>
				</div>

        <div class="col-xs-12 col-md-12 col-lg-12 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding">
							<div class="panel-body easypiechart-panel">
    						<div class="easypiechart" id="easypiechart-green" data-percent="<?= $totalSuaraMasukFakultasStat ?>" ><span class="percent"><?= $totalSuaraMasukFakultasStat ?>%</span></div>
    					</div>
							<div class="large">Statistik Pemilihan <?= $this->session->userdata('fakultas') ?></div>
							<h3>Total Suara Masuk <?= $this->session->userdata('fakultas') ?> : <strong><?= $totalSuaraMasukFakultas ?></strong></h3>
              <h3>Total Pemilih <?= $this->session->userdata('fakultas') ?> :  <strong><?= $totalPemilihFakultas ?></strong> </h3>
							<h3>Total Tidak Memilih <?= $this->session->userdata('fakultas') ?> : <strong><?= $totalTidakMemilihFakultas ?></strong></h3>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
	</div>	<!--/.main-->
