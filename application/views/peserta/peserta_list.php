
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PESERTA LIST <?php echo anchor('peserta/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('peserta/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Peserta</th>
		    <th>No Ktp</th>
		    <th>No Anggota</th>
		    <th>Tanggal Terdaftar</th>
		    <th>Komisariat</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($peserta_data as $peserta)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $peserta->nama_peserta ?></td>
		    <td><?php echo $peserta->no_ktp ?></td>
		    <td><?php echo $peserta->no_anggota ?></td>
		    <td><?php echo $peserta->tanggal_terdaftar ?></td>
		    <td><?php echo $peserta->komisariat ?></td>
		    <td style="text-align:center" width="140px">
			
                <div class="dropdown">
                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">Pilihan
                <span class="caret"></span></button>
                <ul class="dropdown-menu">
                <li><a href="peserta/detail_pembayaran/<?php echo $peserta->id_peserta ?>" title="Detail Pembayaran">Detail Pembayaran</a></li>
                <li><a href="peserta/pembayaran/<?php echo $peserta->id_peserta ?>" title="detail">Pembayaran</a></li>
                <li><a href="peserta/read/<?php echo $peserta->id_peserta ?>" title="detail">Detail Peserta</a></li>
                <li><a href="peserta/update/<?php echo $peserta->id_peserta ?>" title="detail">Edit Data Peserta</a></li>
                <li class="divider"></li>
                <li><a href="peserta/delete/<?php echo $peserta->id_peserta ?>" title="delete" onclick="javasciprt: return confirm("Apakah anda yakin ?")">Hapus Records</a></li>
                </ul>
                </div>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->