<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>PESERTA</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nama Peserta <?php echo form_error('nama_peserta') ?></td>
            <td><input type="text" class="form-control" name="nama_peserta" id="nama_peserta" placeholder="Nama Peserta" value="<?php echo $nama_peserta; ?>" />
        </td>
	    <tr><td>No Ktp <?php echo form_error('no_ktp') ?></td>
            <td><input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No Ktp" value="<?php echo $no_ktp; ?>" />
        </td>
	    <tr><td>No Anggota <?php echo form_error('no_anggota') ?></td>
            <td><input type="text" class="form-control" name="no_anggota" id="no_anggota" placeholder="No Anggota" value="<?php echo $no_anggota; ?>" />
        </td>
	    <tr><td>Tanggal Terdaftar <?php echo form_error('tanggal_terdaftar') ?></td>
            <td><input type="text" class="form-control" name="tanggal_terdaftar" id="tanggal_terdaftar" placeholder="Tanggal Terdaftar" value="<?php echo $tanggal_terdaftar; ?>" />
        </td>
	    <tr><td>Komisariat <?php echo form_error('komisariat') ?></td>
            <td><input type="text" class="form-control" name="komisariat" id="komisariat" placeholder="Komisariat" value="<?php echo $komisariat; ?>" />
        </td>
	    <input type="hidden" name="id_peserta" value="<?php echo $id_peserta; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('peserta') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->