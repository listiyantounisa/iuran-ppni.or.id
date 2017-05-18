
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Pembayaran Read</h3>
        <table class="table table-bordered">
	    <tr><td>Id Peserta</td><td><?php echo $id_peserta; ?></td></tr>
	    <tr><td>Tahun Pembayaran</td><td><?php echo $tahun_pembayaran; ?></td></tr>
	    <tr><td>Iuran Anggota</td><td><?php echo $iuran_anggota; ?></td></tr>
	    <tr><td>Uang Pangkal</td><td><?php echo $uang_pangkal; ?></td></tr>
	    <tr><td>Cetak Kta</td><td><?php echo $cetak_kta; ?></td></tr>
	    <tr><td>Icn</td><td><?php echo $icn; ?></td></tr>
	    <tr><td>Rekomendasi</td><td><?php echo $rekomendasi; ?></td></tr>
	    <tr><td>Kontribusi Gedung</td><td><?php echo $kontribusi_gedung; ?></td></tr>
	    <tr><td>Status Transfer Dpw</td><td><?php echo $status_transfer_dpw; ?></td></tr>
	    <tr><td>Status Transfer Dpp</td><td><?php echo $status_transfer_dpp; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->