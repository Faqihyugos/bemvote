<!-- BEM-VOTE -->

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Daftar Pemilih <?= $this->session->userdata('fakultas') ?></li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Daftar Pemilih <?= $this->session->userdata('fakultas') ?></h1>
			</div>
		</div><!--/.row-->

		<div class="row" id>
			<div class="col-md-12">
        <div class="panel panel-default">
					<div class="panel-heading">
						Cari Pemilih <?= $this->session->userdata('jurusan') ?>
					</div>
					<div class="panel-body">
              <?= form_open('pemilih/search', ['class' => 'form-inline', 'method' => 'get']) ?>
                <div class="form-group">
                  <label>NPM </label>
                  <input type="text" class="form-control" name="npm" id="formNPM">
                </div>
                <span>Dengan Nama &nbsp;</span>
                <div class="form-group">
                  <label>Nama </label>
                  <input type="text" class="form-control" name="nama" id="formNama">
                </div>
                <button type="submit" class="btn btn-default">Cari</button>
              <?= form_close() ?>
					</div>
				</div>

      <div id="pageAJAX">

				<div class="panel panel-default">
					<div class="panel-heading">
						Daftar Semua Pemilih <?= $this->session->userdata('jurusan') ?>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body timeline-container">
            <h5>Jumlah Data : <strong><?= $jumlahPemilih ?></strong></h5>
						<table class="table">
							<tr>
								<th>No</th>
								<th>NIM Pemilih</th>
								<th>Nama Pemilih</th>
								<th>Telah Pemilih</th>
								<th>Terakhir Login</th>
							</tr>
              <?php
                $i = 1;
                foreach($pemilihs as $pemilih):
              ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $pemilih->nim_pemilih ?></td>
								<td><?= $pemilih->nama_pemilih ?></td>
								<td class="status">
                <?php if($pemilih->telah_memilih === 'ya'): ?>
                  <span class="fa fa-check"></span>
                <?php else: ?>
                  <span class="fa fa-times"></span>
                <?php endif ?>
                </td>
								<td><?= $pemilih->terakhir_login ?></td>
							</tr>
            <?php endforeach ?>
						</table>

            <nav style="width:100%;text-align:center">
            <ul class="pagination text-center" style="margin:0 auto">
              <?= $pagination ?>
            </ul>
            </nav>

					</div>
				</div>
      </div>

        <div class="panel panel-default ">
					<div class="panel-heading">
						Daftar Pemilih Tidak/Belum Memilih
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body timeline-container">
            <h5>Jumlah Data : <strong><?= $jumlahBelumPemilih ?></strong></h5>
						<table class="table">
							<tr>
								<th>No</th>
								<th>NIM Pemilih</th>
								<th>Nama Pemilih</th>
								<th>Terakhir Login</th>
    
							</tr>
              <?php
                $i = 1;
                foreach($belumMemilihs as $pemilih):
              ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $pemilih->nim_pemilih ?></td>
								<td><?= $pemilih->nama_pemilih ?></td>
								<td><?= $pemilih->terakhir_login ?></td>
							</tr>
            <?php endforeach ?>
						</table>

            <nav style="width:100%;text-align:center">
            <ul class="pagination text-center" style="margin:0 auto">
              <?= $pagination ?>
            </ul>
            </nav>


					</div>
				</div>

			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- BEM-VOTE -->
