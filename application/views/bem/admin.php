
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Admin</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Admin</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default ">
					<div class="panel-heading">
						Admin
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body timeline-container">
            <h5>Jumlah Data : <strong><?= $totalAdmin ?></strong></h5>
						<table class="table">
							<tr>
								<th>No</th>
								<th>Nama Admin</th>
								<th>Username Admin</th>
								<th>Hak Akses</th>
								<th>Login Terakhir</th>
								<th>Action</th>
							</tr>
              <?php
                $i = 1;
                foreach($admins as $admin):
              ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $admin->nama_admin ?></td>
								<td><?= $admin->user_admin ?></td>
								<td><?= $admin->hak_akses ?></td>
								<td><?= $admin->login_terakhir ?></td>
								<td>
                  <?= form_open('admin/delete') ?>
                    <input type="hidden" name="id_admin" value="<?= $admin->id_admin ?>">
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
						Tambah Admin
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
              <?= form_open('admin/post', ['class' => 'form-horizontal']) ?>
                <?= validation_errors() ?>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Admin</label>
									<div class="col-md-9">
                    <?= form_input('nama_admin', $input->nama_admin, ['class' => 'form-control', 'placeholder' => 'Nama']) ?>
									</div>
								</div>

                <!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Username Admin</label>
									<div class="col-md-9">
                    <?= form_input('user_admin', $input->user_admin, ['class' => 'form-control', 'placeholder' => 'Username']) ?>
									</div>
								</div>

                <!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Password Admin</label>
									<div class="col-md-9">
                    <?= form_password('password_admin', $input->password_admin, ['class' => 'form-control', 'placeholder' => 'bla bla bla']) ?>
									</div>
								</div>

                <!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Hak Akses</label>
									<div class="col-md-9">
                    <select class="form-control" name="hak_akses">
                      <option value="dosen">Dosen</option>
                      <option value="wakil ketua III">Wakil ketua III</option>
                      <option value="admin">Admin</option>
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
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- BEM Vote  -->
