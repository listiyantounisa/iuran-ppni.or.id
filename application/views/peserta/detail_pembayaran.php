		
        <!-- Main content -->
        <section class='content'>
          
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Detail Pembayaran</h3>
				<table class="table table-bordered">
					<tr><td width="20%">Nama Peserta</td><td><?php echo $nama_peserta; ?></td></tr>
					<tr><td>No Ktp</td><td><?php echo $no_ktp; ?></td></tr>
					<tr><td>No Anggota</td><td><?php echo $no_anggota; ?></td></tr>
					<tr><td>Tanggal Terdaftar</td><td><?php echo $tanggal_terdaftar; ?></td></tr>
					<tr><td>Komisariat</td><td><?php echo $komisariat; ?></td></tr>
				</table>
	
				</div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
        </section><!-- /.content -->
        <section class="content">
		<div class="col-md-12">
		  			<?php $tahundaftar = substr($tanggal_terdaftar,0,-6); ?>
			<?php if($tahundaftar == 2013) { ?>
				<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
				  <li class="active"><a href="#detail2013" data-toggle="tab">Detail Pembayaran 2013</a></li>
                  <li><a href="#detail2014" data-toggle="tab">Detail Pembayaran 2014</a></li>
                  <li><a href="#detail2015" data-toggle="tab">Detail Pembayaran 2015</a></li>
                  <li><a href="#detail2016" data-toggle="tab">Detail Pembayaran 2016</a></li>
                  <li><a href="#detail2017" data-toggle="tab">Detail Pembayaran 2017</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="detail2013">
                   <div class="row">
					<table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2013</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPP</th>
						<th>DPW</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2013_data as $pembayaran2013)
							$iuran_anggota2013 = $pembayaran2013->iuran_anggota;
							$uang_pangkal2013 = $pembayaran2013->uang_pangkal;
							$cetak_kta2013 = $pembayaran2013->cetak_kta;
							$icn2013 = $pembayaran2013->icn;
							$rekomendasi2013 = $pembayaran2013->rekomendasi;
							$kontribusi_gedung2013 = $pembayaran2013->kontribusi_gedung;
						{ ?>
							<tr>
						<?php if ($pembayaran2013 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2013->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2013->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2013->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2013->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2013->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2013->kontribusi_gedung) ?></td>
						
						<td><?php if($pembayaran2013->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="<?php echo site_url('update_status_dpw'.$pembayaran2013->id_pembayaran);?>">Ubah Status</a></td>
						<td><?php if($pembayaran2013->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2013->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2013->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				  </table>
				  </div><!-- /.row -->
                  </div><!-- /.tab-pane -->
				  <div class="tab-pane" id="detail2014">
					<div class="row">
					<table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2014</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2014_data as $pembayaran2014)
						{ ?>
							<tr>
						<?php if ($pembayaran2014 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2014->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2014->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2014->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2014->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2014->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2014->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2014->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2014->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2014->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2014->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
					</div>
				  </div>
				  <div class="tab-pane" id="detail2015">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2015</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2015_data as $pembayaran2015)
						{ ?>
							<tr>
						<?php if ($pembayaran2015 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2015->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2015->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2015->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2015->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2015->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
					</table>
				  </div><!-- /.row -->
                  </div>
                  <div class="tab-pane" id="detail2016">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2016</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2016_data as $pembayaran2016)
						{ ?>
							<tr>
							<?php if ($pembayaran2016 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2016->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2016->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
				  </div><!-- /.row -->
                  </div>
                  <div class="tab-pane" id="detail2017">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2017</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2017_data as $pembayaran2017)
						{ ?>
							<tr>
						<?php if ($pembayaran2017 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2017->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2017->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
				  </div><!-- /.row -->
                  </div>
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
              </div><!-- /.nav-tabs-custom -->
			<?php }elseif($tahundaftar == 2014){ ?>
				<div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#detail2014" data-toggle="tab">Detail Pembayaran 2014</a></li>
                  <li><a href="#detail2015" data-toggle="tab">Detail Pembayaran 2015</a></li>
                  <li><a href="#detail2016" data-toggle="tab">Detail Pembayaran 2016</a></li>
                  <li><a href="#detail2017" data-toggle="tab">Detail Pembayaran 2017</a></li>
                </ul>
                <div class="tab-content">
				  <div class="active tab-pane" id="detail2014">
					<div class="row">
					<table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2014</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2014_data as $pembayaran2014)
						{ ?>
							<tr>
						<?php if ($pembayaran2014 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2014->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2014->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2014->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2014->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2014->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2014->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2014->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2014->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2014->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2014->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
					</div>
				  </div>
				  <div class="tab-pane" id="detail2015">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2015</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2015_data as $pembayaran2015)
						{ ?>
							<tr>
						<?php if ($pembayaran2015 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2015->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2015->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2015->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2015->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2015->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
					</table>
				  </div><!-- /.row -->
                  </div>
                  <div class="tab-pane" id="detail2016">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2016</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2016_data as $pembayaran2016)
						{ ?>
							<tr>
							<?php if ($pembayaran2016 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2016->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2016->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
				  </div><!-- /.row -->
                  </div>
                  <div class="tab-pane" id="detail2017">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2017</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2017_data as $pembayaran2017)
						{ ?>
							<tr>
						<?php if ($pembayaran2017 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2017->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2017->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
				  </div><!-- /.row -->
                  </div>
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
              </div><!-- /.nav-tabs-custom -->
              <?php }elseif($tahundaftar == 2015){ ?>
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#detail2015" data-toggle="tab">Detail Pembayaran 2015</a></li>
                  <li><a href="#detail2016" data-toggle="tab">Detail Pembayaran 2016</a></li>
                  <li><a href="#detail2017" data-toggle="tab">Detail Pembayaran 2017</a></li>
                </ul>
                <div class="tab-content">
				  <div class="active tab-pane" id="detail2015">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2015</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2015_data as $pembayaran2015)
						{ ?>
							<tr>
						<?php if ($pembayaran2015 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2015->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2015->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2015->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2015->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2015->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2015->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
					</table>
				  </div><!-- /.row -->
                  </div>
                  <div class="tab-pane" id="detail2016">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2016</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2016_data as $pembayaran2016)
						{ ?>
							<tr>
							<?php if ($pembayaran2016 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2016->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2016->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
				  </div><!-- /.row -->
                  </div>
                  <div class="tab-pane" id="detail2017">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2017</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2017_data as $pembayaran2017)
						{ ?>
							<tr>
						<?php if ($pembayaran2017 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2017->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2017->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
				  </div><!-- /.row -->
                  </div>
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
              </div><!-- /.nav-tabs-custom -->
              <?php }elseif($tahundaftar == 2016){ ?>
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#detail2016" data-toggle="tab">Detail Pembayaran 2016</a></li>
                  <li><a href="#detail2017" data-toggle="tab">Detail Pembayaran 2017</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="detail2016">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2016</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2016_data as $pembayaran2016)
						{ ?>
							<tr>
							<?php if ($pembayaran2016 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2016->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2016->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2016->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="<?php echo site_url('peserta/update_status_dpp/'.$pembayaran2016->id_pembayaran.'')?>">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="<?php echo site_url('peserta/update_status_dpw/'.$pembayaran2016->id_pembayaran.'')?>">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="<?php echo site_url('peserta/update_status_dpd/'.$pembayaran2016->id_pembayaran.'')?>">Ubah Status</a></td>
						<td><?php if($pembayaran2016->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="<?php echo site_url('peserta/update_status_dpk/'.$pembayaran2016->id_pembayaran.'')?>">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
				  </div><!-- /.row -->
                  </div>
                  <div class="tab-pane" id="detail2017">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2017</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2017_data as $pembayaran2017)
						{ ?>
							<tr>
						<?php if ($pembayaran2017 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2017->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2017->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
				  </div><!-- /.row -->
                  </div>
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
              </div><!-- /.nav-tabs-custom -->
              <?php }elseif($tahundaftar == 2017){ ?>
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#detail2017" data-toggle="tab">Detail Pembayaran 2017</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="detail2017">
                    <div class="row">
                    <table class="table table-bordered table-striped" id="mytable">
					<thead>
					<tr>
						<th colspan="10"><center>Pembayaran Tahun 2017</center></th>
					</tr>
					<tr>
						<th width="20px">No</th>
						<th>Iuran Anggota</th>
						<th>Uang Pangkal</th>
						<th>Cetak Kta</th>
						<th>Icn</th>
						<th>Rekomendasi</th>
						<th>Kontribusi Gedung</th>
						<th>DPW</th>
						<th>DPP</th>
						<th>DPD</th>
						<th>DPK</th>
					</tr>
					</thead>
					<tbody>
						<?php
						$start = 0;
						foreach ($detail_pembayaran2017_data as $pembayaran2017)
						{ ?>
							<tr>
						<?php if ($pembayaran2017 == NULL){?>
						<td rowspan="9">Data belum ada / Belum dimasukkan </td>
						<?php }else{ ?>
						<td><?php echo ++$start ?></td>
						<td><?php echo format_rupiah($pembayaran2017->iuran_anggota) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->uang_pangkal) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->cetak_kta) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->icn) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->rekomendasi) ?></td>
						<td><?php echo format_rupiah($pembayaran2017->kontribusi_gedung) ?></td>
						<td><?php if($pembayaran2017->status_transfer_dpp == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpw == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpd == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<td><?php if($pembayaran2017->status_transfer_dpk == 0){echo 'belum';}else{echo'sudah';} ?> - <a href="#">Ubah Status</a></td>
						<?php }} ?>
					</tbody>
				</table>
				  </div><!-- /.row -->
                  </div>
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
              </div><!-- /.nav-tabs-custom -->
              <?php }else{ ?>
				<td><input type="number" class="form-control" name="iuran_anggota" id="iuran_anggota" placeholder="0" value="0" />
			<?php } ?>  
          
        </section><!-- /.content -->