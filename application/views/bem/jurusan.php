<!-- BEM-VOTE -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">jurusan</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Jurusan</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Jurusan
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body timeline-container">
            <h5>Jumlah Data : <strong><?= $totalJurusan ?></strong></h5>
						<table class="table">
							<tr>
								<th>No</th>
								<th>Nama Jurusan</th>
								<th>Action</th>
							</tr>
              <?php
                $i = 1;
                foreach($jurusans as $jurusan):
              ?>
							<tr>
								<td><?= $i++ ?></td>
								<td class="jurusan"><?= cetak($jurusan->nama_jurusan) ?></td>
								<td>
									<a href="<?= base_url('jurusan/edit/'.$jurusan->id_jurusan) ?>" class="btn btn-warning pull-left" style="color:white;">Edit</a>
                  <?= form_open('jurusan/delete') ?>
                    <input type="hidden" name="id_jurusan" value="<?= $jurusan->id_jurusan ?>">
                    <input type="submit" value="Hapus" class="btn btn-danger pull-left" style="color:white;">
                  <?= form_close() ?>
								</td>
							</tr>
            <?php endforeach ?>
						</table>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						Tambah Jurusan
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
            <?= form_open('jurusan/post', ['class' => 'form-horizontal']) ?>
              <?= validation_errors() ?>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Jurusan</label>
									<div class="col-md-9">
                    <?= form_input('nama_jurusan', $input->nama_jurusan, ['class' => 'form-control', 'placeholder' => 'Teknik']) ?>
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
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
