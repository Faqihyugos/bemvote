<!-- BEM-VOTE -->
	<!-- <script src="<?= base_url('assets/js/jquery-1.11.1.min.js') ?>"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/chart.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/chart-data.js') ?>"></script>
	<script src="<?= base_url('assets/js/easypiechart.js') ?>"></script>
	<script src="<?= base_url('assets/js/easypiechart-data.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
	<script src="<?= base_url('assets/js/custom.js') ?>"></script>
	<script>
	$(document).ready(function(){

		var delay = (function(){
			var timer = 0;
			return function(callback, ms){
				clearTimeout(timer);
				timer = setTimeout(callback, ms);
			}
		})();

		// Search AJAX untuk Operator
    function cariPemilihAJAX(e){
				// e.preventDefault();
        var nim = $("#formNIM").val();
        var nama = $("#formNama").val();
        $.ajax({
						type: "GET",
            url: "<?= base_url('pemilih/searchajax') ?>",
            data: 'nim='+nim+"&nama="+nama,
            cache: false,
            success: function(data){
                $("#pageAJAX").html(data);
            }
        })
    }

    $("#formNIM").keyup(function(){
			delay(function(){
				cariPemilihAJAX();
			}, 1000);
		});
    $("#formNama").keyup(function(){
			delay(function(){
				cariPemilihAJAX();
			}, 1000);
		});

		// Search AJAX untuk Admin, Dekan & Rektor
    function cariPemilihByAdminAJAX(e){
				// e.preventDefault();
        var nim = $("#formNIMAdmin").val();
        var nama = $("#formNamaAdmin").val();
        $.ajax({
						type: "GET",
            url: "<?= base_url('pemilih/searchadminajax') ?>",
            data: 'nim='+nim+"&nama="+nama,
            cache: false,
            success: function(data){
                $("#pageAJAX").html(data);
            }
        })
    }

    $("#formNIMAdmin").keyup(function(){
			delay(function(){
				cariPemilihByAdminAJAX();
			}, 1000);
		});
    $("#formNamaAdmin").keyup(function(){
			delay(function(){
				cariPemilihByAdminAJAX();
			}, 1000);
		});

		$(document).bind("contextmenu", function(e){
			alert("Oops.. Jangan Tekan Itu...");
			return false;
		});

	});
	</script>

	<?php if($this->session->has_userdata('mencoblos')): ?>
		<div class="modal fade" id="coblosModal">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>BEM-VOTE</h2>
				</div>
				<div class="modal-body">
					<h3>Selamat Suara Anda Telah Direkam!</h3>
					<h4>Terima Kasih Telah Memilih</h4>
				</div>
				<div class="modal-footer">
					<a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		</div>

		<script type="text/javascript">
			$('#coblosModal').modal('show');
		</script>
	<?php endif ?>

	<?php if($this->session->has_userdata('msg')): ?>
		<div class="modal fade" id="msgModal">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>BEM-VOTE</h2>
				</div>
				<div class="modal-body">
					<h3><?= $this->session->userdata('msg') ?>!</h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		</div>

		<script type="text/javascript">
			$('#msgModal').modal('show');
		</script>
	<?php endif ?>

	<?php if($this->session->has_userdata('token')): ?>
		<div class="modal fade" id="msgModal">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2>Operator BEM-VOTE</h2>
				</div>
				<div class="modal-body">
					<h3>Token Anda : <strong><?= $this->session->userdata('token') ?></strong></h3>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
		</div>

		<script type="text/javascript">
			$('#msgModal').modal('show');
		</script>
	<?php endif ?>

</body>
</html>
