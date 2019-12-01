<!-- BEM-VOTE -->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Statistik Pemilih</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Statistik Pemilih</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<h3 style="margin-left:25px">Statistik Pemilih Tiap Jurusan</h3>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Sistem Informasi</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?= $totalSuaraMasukSIStat ?>" ><span class="percent"><?= $totalSuaraMasukSIStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukSI ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihSI ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihSI ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Sistem Komputer</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?= $totalSuaraMasukSKStat ?>" ><span class="percent"><?= $totalSuaraMasukSKStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukSK ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihSK ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihSK ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Manajemen Informasi</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?= $totalSuaraMasukMIStat ?>" ><span class="percent"><?= $totalSuaraMasukMIStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukMI ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihMI ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihMI ?></strong></h5>
					</div>
				</div>
			</div>
			
			
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->
