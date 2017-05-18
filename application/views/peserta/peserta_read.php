
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Peserta Read</h3>
        <table class="table table-bordered">
	    <tr><td>Nama Peserta</td><td><?php echo $nama_peserta; ?></td></tr>
	    <tr><td>No Ktp</td><td><?php echo $no_ktp; ?></td></tr>
	    <tr><td>No Anggota</td><td><?php echo $no_anggota; ?></td></tr>
	    <tr><td>Tanggal Terdaftar</td><td><?php echo $tanggal_terdaftar; ?></td></tr>
	    <tr><td>Komisariat</td><td><?php echo $komisariat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('peserta') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->