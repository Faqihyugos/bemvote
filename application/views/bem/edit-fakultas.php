<!-- BEM-VOTE -->
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Edit Fakultas</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Fakultas</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Fakultas
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
              <?= form_open('fakultas/patch', ['class' => 'form-horizontal']) ?>
						     <?= validation_errors() ?>
						     <?= form_hidden('id_fakultas', $fakultas->id_fakultas) ?>
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">Nama Fakultas</label>
									<div class="col-md-9">
                    <?= form_input('nama_fakultas', $fakultas->nama_fakultas, ['class' => 'form-control']) ?>
									</div>
								</div>
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
                      <?= form_submit(null, 'Edit', ['class' => 'btn btn-default btn-md pull-right']) ?>
									</div>
								</div>
            </form>
					</div>
				</div>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
