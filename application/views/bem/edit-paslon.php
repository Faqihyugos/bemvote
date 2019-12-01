  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Paslon</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Paslon</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Paslon
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
              <?= form_open_multipart('paslon/patch', ['class' => 'form-horizontal']) ?>
						     <?= validation_errors() ?>
						     <?= form_hidden('id_paslon', $paslon->id_paslon) ?>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Paslon</label>
									<div class="col-md-9">
                    <?= form_input('nama_paslon', $paslon->nama_paslon, ['class' => 'form-control']) ?>
									</div>
								</div>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Koalisi</label>
									<div class="col-md-9">
                    <?= form_input('nama_koalisi', $paslon->nama_koalisi, ['class' => 'form-control']) ?>
									</div>
								</div>
								<!-- Desc body -->
								<div class="form-group">
									<label class="col-md-3 control-label" for="message">Fakultas Koalisi</label>
									<div class="col-md-9">
                    <?= form_textarea('fakultas_koalisi', $paslon->fakultas_koalisi, ['class' => 'form-control', 'cols' => '8', 'row' => '3']) ?>
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Nomor Urut</label>
									<div class="col-md-9">
                    <?= form_input('nomor_urut', $paslon->nomor_urut, ['class' => 'form-control']) ?>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Visi & Misi</label>
									<div class="col-md-9">
                    <?= form_textarea('visimisi', $paslon->visimisi, ['class' => 'form-control paslon', 'rows' => '20', 'cols' => '80']) ?>
									</div>
								</div>
								<br><br><br>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Capres</label>
									<div class="col-md-9">
                    <?= form_input('nama_capres', $paslon->nama_capres, ['class' => 'form-control']) ?>
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Cawapres</label>
									<div class="col-md-9">
                    <?= form_input('nama_cawapres', $paslon->nama_cawapres, ['class' => 'form-control']) ?>
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Fakultas Capres</label>
									<div class="col-md-9">
                    <?= form_input('fakultas_capres', $paslon->fakultas_capres, ['class' => 'form-control']) ?>
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Fakultas Cawapres</label>
									<div class="col-md-9">
                    <?= form_input('fakultas_cawapres', $paslon->fakultas_cawapres, ['class' => 'form-control']) ?>
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Jurusan Capres</label>
									<div class="col-md-9">
                    <?= form_input('jurusan_capres', $paslon->jurusan_capres, ['class' => 'form-control']) ?>
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Jurusan Cawapres</label>
									<div class="col-md-9">
                    <?= form_input('jurusan_cawapres', $paslon->jurusan_cawapres, ['class' => 'form-control']) ?>
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Prodi Capres</label>
									<div class="col-md-9">
                    <?= form_input('prodi_capres', $paslon->prodi_cawapres, ['class' => 'form-control']) ?>
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Prodi Cawapres</label>
									<div class="col-md-9">
                    <?= form_input('prodi_cawapres', $paslon->prodi_cawapres, ['class' => 'form-control']) ?>
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Angkatan Capres</label>
									<div class="col-md-9">
                    <?= form_input('angkatan_capres', $paslon->angkatan_capres, ['class' => 'form-control']) ?>
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Angkatan Cawapres</label>
									<div class="col-md-9">
                    <?= form_input('angkatan_cawapres', $paslon->angkatan_cawapres, ['class' => 'form-control']) ?>
									</div>
								</div>

                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Foto Capres</label>
									<div class="col-md-9">
                    <input type="file" name="gambar_capres" class="form-control-file">
									</div>
								</div>
                <div class="form-group">
									<label class="col-md-3 control-label" for="name">Foto Cawapres</label>
									<div class="col-md-9">
                    <input type="file" name="gambar_cawapres" class="form-control-file">
									</div>
								</div>

								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
                    <?= form_submit(null, 'Edit', ['class' => 'btn btn-default btn-md pull-right']) ?>
									</div>
								</div>
            <?= form_close() ?>
					</div>
				</div>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
  <!-- BEM-VOTE -->
