<!-- BEM-VOTE -->

  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Daftar Semua Pemilih</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Daftar Semua Pemilih</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
        <div class="panel panel-default">
					<div class="panel-heading">
            Cari Pemilih Semua Fakultas
					</div>
					<div class="panel-body">
              <?= form_open('pemilih/searchpemilihadmin', ['class' => 'form-inline', 'method' => 'get']) ?>
                <div class="form-group">
                  <label>NIM </label>
                  <input type="text" class="form-control" placeholder="531416020" name="nim" value="<?= $nim ?>">
                </div>
                <span>Dengan Nama &nbsp;</span>
                <div class="form-group">
                  <label>Nama </label>
                  <input type="text" class="form-control" placeholder="Adnan Kasim" name="nama" value="<?= $nama ?>">
                </div>
                <button type="submit" class="btn btn-default">Cari</button>
              <?= form_close() ?>
					</div>
				</div>

				<div class="panel panel-default ">
					<div class="panel-heading">
						Pemilih Dengan NIM : <strong><?= $nim ?></strong>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
						Dengan Nama : <strong><?= $nama ?></strong>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body timeline-container">
            <?php if(!empty($pemilihs)): ?>
            <h5>Jumlah Data : <strong><?= $jumlahsearchPemilihByAdmin ?></strong></h5>
						<table class="table">
							<tr>
								<th>No</th>
								<th>NIM Pemilih</th>
								<th>Nama Pemilih</th>
								<th>Status Pemilih</th>
								<th>Telah Pemilih</th>
								<th>Terakhir Login</th>
								<th>Action</th>
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
                <?php if($pemilih->status_pemilih === 'ya'): ?>
                  <span class="fa fa-check"></span>
                <?php else: ?>
                  <span class="fa fa-times"></span>
                <?php endif ?>
                </td>
								<td class="status">
                <?php if($pemilih->telah_memilih === 'ya'): ?>
                  <span class="fa fa-check"></span>
                <?php else: ?>
                  <span class="fa fa-check"></span>
                <?php endif ?>
                </td>
								<td><?= $pemilih->terakhir_login ?></td>
								<td>
                  <?= form_open('pemilih/delete') ?>
                    <input type="hidden" name="id_pemilih" value="<?= $pemilih->id_pemilih ?>">
                    <input type="submit" value="Hapus" class="btn btn-danger pull-left" style="color:white;">
                  <?= form_close() ?>
								</td>
							</tr>
            <?php endforeach ?>
						</table>
          <?php else: ?>
            <h2 class="text-center">Data Tidak Ditemukan</h2>
          <?php endif ?>
					</div>
				</div>

			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- BEM-VOTE -->
