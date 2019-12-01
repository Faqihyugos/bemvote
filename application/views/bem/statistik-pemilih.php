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
			<h3 style="margin-left:25px">Statistik Pemilih Tiap Fakultas</h3>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Teknik</h4>
						<div class="easypiechart" id="easypiechart-blue" data-percent="<?= $totalSuaraMasukTeknikStat ?>" ><span class="percent"><?= $totalSuaraMasukTeknikStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukTeknik ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihTeknik ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihTeknik ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Olahraga & Kesehatan</h4>
						<div class="easypiechart" id="easypiechart-orange" data-percent="<?= $totalSuaraMasukFOKStat ?>" ><span class="percent"><?= $totalSuaraMasukFOKStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFOK ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFOK ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFOK ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Ekonomi</h4>
						<div class="easypiechart" id="easypiechart-teal" data-percent="<?= $totalSuaraMasukEkonomiStat ?>" ><span class="percent"><?= $totalSuaraMasukEkonomiStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukEkonomi ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihEkonomi ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihEkonomi ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Ilmu Sosial</h4>
						<div class="easypiechart" id="easypiechart-red" data-percent="<?= $totalSuaraMasukFISStat ?>" ><span class="percent"><?= $totalSuaraMasukFISStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFIS ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFIS ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFIS ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Ilmu Pendidikan</h4>
						<div class="easypiechart" id="easypiechart-maroon" data-percent="<?= $totalSuaraMasukFIPStat ?>" ><span class="percent"><?= $totalSuaraMasukFIPStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFIP ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFIP ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFIP ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Hukum</h4>
						<div class="easypiechart" id="easypiechart-green" data-percent="<?= $totalSuaraMasukHukumStat ?>" ><span class="percent"><?= $totalSuaraMasukHukumStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukHukum ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihHukum ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihHukum ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Pertanian</h4>
						<div class="easypiechart" id="easypiechart-yellow" data-percent="<?= $totalSuaraMasukFapertaStat ?>" ><span class="percent"><?= $totalSuaraMasukFapertaStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFaperta ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFaperta ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFaperta ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Sosial & Budaya</h4>
						<div class="easypiechart" id="easypiechart-navy" data-percent="<?= $totalSuaraMasukFSBStat ?>" ><span class="percent"><?= $totalSuaraMasukFSBStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFSB ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFSB ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFSB ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Ilmu Kelautan</h4>
						<div class="easypiechart" id="easypiechart-tur" data-percent="<?= $totalSuaraMasukFIKStat ?>" ><span class="percent"><?= $totalSuaraMasukFIKStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukFIK ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihFIK ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihFIK ?></strong></h5>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>MIPA</h4>
						<div class="easypiechart" id="easypiechart-coral" data-percent="<?= $totalSuaraMasukMIPAStat ?>" ><span class="percent"><?= $totalSuaraMasukMIPAStat ?>%</span></div>
						<h5>Total Suara Masuk : <strong><?= $totalSuaraMasukMIPA ?></strong></h5>
            <h5>Total Pemilih : <strong><?= $totalPemilihMIPA ?></strong></h5>
            <h5>Total Belum Memilih : <strong><?= $totalTidakMemilihMIPA ?></strong></h5>
					</div>
				</div>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->
