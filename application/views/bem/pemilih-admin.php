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
						Cari Pemilih <?= $this->session->userdata('fakultas') ?>
					</div>
					<div class="panel-body">
              <?= form_open('pemilih/searchpemilihadmin', ['class' => 'form-inline', 'method' => 'get']) ?>
                <div class="form-group">
                  <label>NIM </label>
                  <input type="text" class="form-control" name="npm" id="formNPMAdmin">
                </div>
                <span>Dengan Nama &nbsp;</span>
                <div class="form-group">
                  <label>Nama </label>
                  <input type="text" class="form-control" name="nama" id="formNamaAdmin">
                </div>
                <button type="submit" class="btn btn-default">Cari</button>
              <?= form_close() ?>
					</div>
				</div>

        <div id="pageAJAX">

				<div class="panel panel-default ">
					<div class="panel-heading">
						Daftar Semua Pemilih
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body timeline-container">
            <h5>Jumlah Data : <strong><?= $totalPemilihAdmin ?></strong></h5>
            <table class="table">
							<tr>
								<th>No</th>
								<th>NPM Pemilih</th>
								<th>Nama Pemilih</th>
								<th>Telah Pemilih</th>
								<th>Terakhir Login</th>
                <?php if($this->session->has_userdata('admin')): ?>
								<th>Action</th>
                <?php endif ?>
							</tr>
              <?php
                $i = 1;
                foreach($pemilihs as $pemilih):
              ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $pemilih->npm_pemilih ?></td>
								<td><?= $pemilih->nama_pemilih ?></td>
								<td class="status">
                <?php if($pemilih->telah_memilih === 'ya'): ?>
                  <span class="fa fa-check"></span>
                <?php else: ?>
                  <span class="fa fa-times"></span>
                <?php endif ?>
                </td>
								<td><?= $pemilih->terakhir_login ?></td>
                <?php if($this->session->has_userdata('admin')): ?>
								<td>
                  <?= form_open('pemilih/delete') ?>
                    <input type="hidden" name="id_pemilih" value="<?= $pemilih->id_pemilih ?>">
                    <input type="submit" value="Hapus" class="btn btn-danger pull-left" style="color:white;">
                  <?= form_close() ?>
								</td>
              <?php endif ?>
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
            <h5>Jumlah Data : <strong><?= $totalPemilihBelumMemilihAdmin ?></strong></h5>
						<table class="table">
							<tr>
								<th>No</th>
								<th>NPM Pemilih</th>
								<th>Nama Pemilih</th>
								<th>Terakhir Login</th>
                <?php if($this->session->has_userdata('admin')): ?>
								<th>Action</th>
                <?php endif ?>
							</tr>
              <?php
                $i = 1;
                foreach($belumMemilihs as $pemilih):
              ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $pemilih->npm_pemilih ?></td>
								<td><?= $pemilih->nama_pemilih ?></td>
								<td><?= $pemilih->terakhir_login ?></td>
                <?php if($this->session->has_userdata('admin')): ?>
								<td>
                  <?= form_open('pemilih/delete') ?>
                    <input type="hidden" name="id_pemilih" value="<?= $pemilih->id_pemilih ?>">
                    <input type="submit" value="Hapus" class="btn btn-danger pull-left" style="color:white;">
                  <?= form_close() ?>
								</td>
              <?php endif ?>
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

        <?php if($this->session->has_userdata('admin')): ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						Tambah Pemilih
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
              <?= form_open('pemilih/post', ['class' => 'form-horizontal']) ?>
                <?= validation_errors() ?>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Pemilih</label>
									<div class="col-md-9">
                    <?= form_input('nama_pemilih', $input->nama_pemilih, ['class' => 'form-control', 'placeholder' => 'Zulkifli Katili']) ?>
									</div>
								</div>

                <!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">NPM Pemilih</label>
									<div class="col-md-9">
                    <?= form_input('npm_pemilih', $input->npm_pemilih, ['class' => 'form-control', 'placeholder' => '10411111']) ?>
									</div>
								</div>
                <!-- Name input-->
				<div class="form-group">
									<label class="col-md-3 control-label" for="name">Tanggal lahir Pemilih</label>
									<div class="col-md-9">
										<div class="input-group date" data-provide="datepicker">
											<input type="text" class="form-control">
											<div class="input-group-addon">
												<span class="glyphicon glyphicon-th"></span>
											</div>
										</div>
									</div>
								</div>
                <!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Jurusan Pemilih</label>
									<div class="col-md-9">
                    <select class="form-control" name="id_fakultas">
                    <?php foreach($jurusans as $jurusan): ?>
                      <option value="<?= $jurusan->id_jurusan ?>"><?= $jurusan->nama_jurusan ?></option>
                    <?php endforeach ?>
                    </select>
									</div>
								</div>

								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
                    <?= form_submit(null, 'Tambah', ['class' => 'btn btn-default btn-md pull-right']) ?>
									</div>
								</div>
            <?= form_close() ?>
					</div>
				</div>
      <?php endif ?>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- BEM-VOTE -->

