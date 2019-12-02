		<div class="row">
			<div class="col-md-12">
        <div class="panel panel-default">

        <div id="pageAJAX">

				<div class="panel panel-default">
					<div class="panel-heading">
						Pemilih Dengan NPM : <strong><?= $npm ?></strong>
						Dengan Nama : <strong><?= $nama ?></strong>
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body timeline-container">
            <?php if(!empty($pemilihs)): ?>
            <h5>Jumlah Data : <strong><?= $jumlahsearchPemilihByAdmin ?></strong></h5>
						<table class="table">
							<tr>
								<th>No</th>
								<th>NPM Pemilih</th>
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
								<td><?= $pemilih->npm_pemilih ?></td>
								<td><?= $pemilih->nama_pemilih ?></td>
								<td class="status">
                <?php if($pemilih->telah_memilih === 'ya'): ?>
                  <span class="fa fa-check text-center"></span>
                <?php else: ?>
                  <span class="fa fa-times"></span>
                <?php endif ?>
                </td>
								<td><?= $pemilih->terakhir_login ?></td>
							</tr>
            <?php endforeach ?>
						</table>
          <?php else: ?>
            <h2 class="text-center">Data Tidak Ditemukan</h2>
          <?php endif ?>
					</div>
				</div>
      </div>
    </div>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- BEM-VOTE -->
