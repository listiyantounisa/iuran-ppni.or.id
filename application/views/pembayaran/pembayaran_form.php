<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PEMBAYARAN</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Id Peserta <?php echo form_error('id_peserta') ?></td>
            <td><input type="text" class="form-control" name="id_peserta" id="id_peserta" placeholder="Id Peserta" value="<?php echo $id_peserta; ?>" />
        </td>
	    <tr><td>Tahun Pembayaran <?php echo form_error('tahun_pembayaran') ?></td>
            <td><input type="text" class="form-control" name="tahun_pembayaran" id="tahun_pembayaran" placeholder="Tahun Pembayaran" value="<?php echo $tahun_pembayaran; ?>" />
        </td>
	    <tr><td>Iuran Anggota <?php echo form_error('iuran_anggota') ?></td>
            <td><input type="text" class="form-control" name="iuran_anggota" id="iuran_anggota" placeholder="Iuran Anggota" value="<?php echo $iuran_anggota; ?>" />
        </td>
	    <tr><td>Uang Pangkal <?php echo form_error('uang_pangkal') ?></td>
            <td><input type="text" class="form-control" name="uang_pangkal" id="uang_pangkal" placeholder="Uang Pangkal" value="<?php echo $uang_pangkal; ?>" />
        </td>
	    <tr><td>Cetak Kta <?php echo form_error('cetak_kta') ?></td>
            <td><input type="text" class="form-control" name="cetak_kta" id="cetak_kta" placeholder="Cetak Kta" value="<?php echo $cetak_kta; ?>" />
        </td>
	    <tr><td>Icn <?php echo form_error('icn') ?></td>
            <td><input type="text" class="form-control" name="icn" id="icn" placeholder="Icn" value="<?php echo $icn; ?>" />
        </td>
	    <tr><td>Rekomendasi <?php echo form_error('rekomendasi') ?></td>
            <td><input type="text" class="form-control" name="rekomendasi" id="rekomendasi" placeholder="Rekomendasi" value="<?php echo $rekomendasi; ?>" />
        </td>
	    <tr><td>Kontribusi Gedung <?php echo form_error('kontribusi_gedung') ?></td>
            <td><input type="text" class="form-control" name="kontribusi_gedung" id="kontribusi_gedung" placeholder="Kontribusi Gedung" value="<?php echo $kontribusi_gedung; ?>" />
        </td>
	    <tr><td>Status Transfer Dpw <?php echo form_error('status_transfer_dpw') ?></td>
            <td><input type="text" class="form-control" name="status_transfer_dpw" id="status_transfer_dpw" placeholder="Status Transfer Dpw" value="<?php echo $status_transfer_dpw; ?>" />
        </td>
	    <tr><td>Status Transfer Dpp <?php echo form_error('status_transfer_dpp') ?></td>
            <td><input type="text" class="form-control" name="status_transfer_dpp" id="status_transfer_dpp" placeholder="Status Transfer Dpp" value="<?php echo $status_transfer_dpp; ?>" />
        </td>
	    <input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->