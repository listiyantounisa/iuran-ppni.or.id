<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-4">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Input Data Pasien</h3>
                </div><!-- /.box-header -->
                <div class="box box-primary">
                <!-- form start -->
                <form action="<?php echo $action; ?>" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Pasien</label>
                      <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Nama Pasien" value="<?php echo $nama_pasien; ?>" />
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Lahir</label>
                      <input type="text" class="form-control" name="usia_pasien" id="usia_pasien" placeholder="Tanggal Lahir" value="<?php echo $usia_pasien; ?>" />
                    </div>
					 <div class="form-group">
                      <label for="exampleInputPassword1">No RM</label>
                      <input type="text" class="form-control" name="no_rm" id="no_rm" placeholder="No Rm" value="<?php echo $no_rm; ?>" />
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
					<input type="hidden" name="id_pasien" value="<?php echo $id_pasien; ?>" /> 
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              </div><!-- /.box -->
            </div><!-- /.col -->
			<div class="col-md-8">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Daftar Pasien Kemoterapi</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
					<th>Nama Pasien</th>
					<th>Usia Pasien</th>
					<th>No Rm</th>
					<th>Action</th>
						</tr>
					</thead>
				<tbody>
					<?php
					$start = 0;
					foreach ($pasien_data as $pasien)
					{
						?>
						<tr>
					<td><?php echo ++$start ?></td>
					<td><?php echo $pasien->nama_pasien ?></td>
					<td><?php echo $pasien->usia_pasien ?></td>
					<td><?php echo $pasien->no_rm ?></td>
					<td style="text-align:center" width="140px">
					<?php 
					echo anchor(site_url('pasien/read/'.$pasien->id_pasien),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
					echo '  '; 
					echo anchor(site_url('pasien/update/'.$pasien->id_pasien),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
					echo '  '; 
					echo anchor(site_url('pasien/delete/'.$pasien->id_pasien),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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