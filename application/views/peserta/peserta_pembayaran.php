<!-- Main content -->
<?php $tahundaftar = substr($tanggal_terdaftar,0,-6); 
echo $tahundaftar;
?>
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                 <h3 class='box-title'>Peserta Read</h3>
        <table class="table table-bordered">
	    <tr><td width="20%">Nama Peserta</td><td><?php echo $nama_peserta; ?></td></tr>
	    <tr><td>No Ktp</td><td><?php echo $no_ktp; ?></td></tr>
	    <tr><td>No Anggota</td><td><?php echo $no_anggota; ?></td></tr>
	    <tr><td>Tanggal Terdaftar</td><td><?php echo $tanggal_terdaftar; ?></td></tr>
	    <tr><td>Komisariat</td><td><?php echo $komisariat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('peserta') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
                  <h3 class='box-title'>PEMBAYARAN</h3>
					<div class='box box-primary'>
					<form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
					<tr><td width="20%">Tahun Pembayaran <?php echo form_error('tahun_pembayaran') ?></td>
						<td>
							<?php if($tahundaftar == 2013) { ?>
								<input type="radio" name="tahun_pembayaran" value="2013">2013
	                        	&nbsp&nbsp
								<input type="radio" name="tahun_pembayaran" value="2014">2014
								&nbsp&nbsp
								<input type="radio" name="tahun_pembayaran" value="2015">2015
								&nbsp&nbsp
								<input type="radio" name="tahun_pembayaran" value="2016">2016
								&nbsp&nbsp
								<input type="radio" name="tahun_pembayaran" value="2017">2017
								&nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2018">2018
							<?php }elseif($tahundaftar == 2014){ ?>
								<input type="radio" name="tahun_pembayaran" value="2014">2014
	                       		&nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2015">2015
	                        	&nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2016">2016
	                        	&nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2017">2017
	                            &nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2018">2018
	                        <?php }elseif($tahundaftar == 2015){ ?>
	                            <input type="radio" name="tahun_pembayaran" value="2015">2015
	                         	&nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2016">2016
	                        	&nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2017">2017
	                            &nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2018">2018
	                        <?php }elseif($tahundaftar == 2016){ ?>
	                            <input type="radio" name="tahun_pembayaran" value="2016">2016
	                        	&nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2017">2017
	                            &nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2018">2018
	                        <?php }elseif($tahundaftar == 2017){ ?>
	                            <input type="radio" name="tahun_pembayaran" value="2017">2017
	                            &nbsp&nbsp
	                            <input type="radio" name="tahun_pembayaran" value="2018">2018
	                        <?php }elseif($tahundaftar == 2018){ ?>
	                            <input type="radio" name="tahun_pembayaran" value="2018">2018
							<?php }else{ ?>
								<td><input type="number" class="form-control" name="iuran_anggota" id="iuran_anggota" placeholder="0" value="0" />
							<?php } ?>  
						</td>
					<tr><td>Iuran Anggota <?php echo form_error('iuran_anggota') ?></td>
						<?php if($tahundaftar < 2016) { ?>
							<td><input type="number" class="form-control" name="iuran_anggota" id="iuran_anggota" placeholder="0" value="120000" />
						<?php }elseif($tahundaftar > 2015){ ?>
							<td><input type="number" class="form-control" name="iuran_anggota" id="iuran_anggota" placeholder="0" value="260000" />
						<?php }else{ ?>
							<td><input type="number" class="form-control" name="iuran_anggota" id="iuran_anggota" placeholder="0" value="" />
						<?php } ?>
					</td>
					<tr><td>Uang Pangkal <?php echo form_error('uang_pangkal') ?></td>
						<td><input type="number" class="form-control" name="uang_pangkal" id="uang_pangkal" placeholder="Uang Pangkal" value="100000" />
					</td>
					<tr><td>Cetak Kta <?php echo form_error('cetak_kta') ?></td>
						<td><input type="number" class="form-control" name="cetak_kta" id="cetak_kta" placeholder="Cetak Kta" value="25000" />
					</td>
					<tr><td>Icn <?php echo form_error('icn') ?></td>
						<td><input type="number" class="form-control" name="icn" id="icn" placeholder="0" value="" />
					</td>
					<tr><td>Rekomendasi <?php echo form_error('rekomendasi') ?></td>
						<td><input type="number" class="form-control" name="rekomendasi" id="rekomendasi" placeholder="0" value="" />
					</td>
					<tr><td>Kontribusi Gedung <?php echo form_error('kontribusi_gedung') ?></td>
						<td><input type="number" class="form-control" name="kontribusi_gedung" id="kontribusi_gedung" placeholder="0" value="" />
					</td>
					<input type="hidden" name="id_peserta" value="<?php echo $this->uri->segment(3); ?>" /> 
					<input type="hidden" name="status_transfer_dpw" value="0" /> 
					<input type="hidden" name="status_transfer_dpp" value="0" />
					<input type="hidden" name="status_transfer_dpd" value="0" />
					<input type="hidden" name="status_transfer_dpk" value="0" />
					<input type="hidden" name="tanggal_bayar" value="<?php echo date('Y-m-d')?>" /> 
					<tr><td colspan='2'><button type="submit" class="btn btn-primary">Lakukan Pembayaran</button> 
					<a href="<?php echo site_url('pembayaran') ?>" class="btn btn-default">Cancel</a></td></tr>
		
				</table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->