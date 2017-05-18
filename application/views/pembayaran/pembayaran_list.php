
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>PEMBAYARAN LIST <?php echo anchor('pembayaran/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?php echo anchor(site_url('pembayaran/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div><!-- /.box-header -->
                <div class='box-body'>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Id Peserta</th>
		    <th>Tahun Pembayaran</th>
		    <th>Iuran Anggota</th>
		    <th>Uang Pangkal</th>
		    <th>Cetak Kta</th>
		    <th>Icn</th>
		    <th>Rekomendasi</th>
		    <th>Kontribusi Gedung</th>
		    <th>Status Transfer Dpw</th>
		    <th>Status Transfer Dpp</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($pembayaran_data as $pembayaran)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $pembayaran->id_peserta ?></td>
		    <td><?php echo $pembayaran->tahun_pembayaran ?></td>
		    <td><?php echo $pembayaran->iuran_anggota ?></td>
		    <td><?php echo $pembayaran->uang_pangkal ?></td>
		    <td><?php echo $pembayaran->cetak_kta ?></td>
		    <td><?php echo $pembayaran->icn ?></td>
		    <td><?php echo $pembayaran->rekomendasi ?></td>
		    <td><?php echo $pembayaran->kontribusi_gedung ?></td>
		    <td><?php echo $pembayaran->status_transfer_dpw ?></td>
		    <td><?php echo $pembayaran->status_transfer_dpp ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('pembayaran/read/'.$pembayaran->id_pembayaran),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('pembayaran/update/'.$pembayaran->id_pembayaran),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('pembayaran/delete/'.$pembayaran->id_pembayaran),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
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