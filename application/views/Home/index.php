<!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Notification</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
			  <div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h4><i class="icon fa fa-info"></i>Perhatian..!!</h4>
				Selamat datang <?php $user = $this->ion_auth->user()->row(); echo $user->username; ?>, di Aplikasi Penjadwalan Poliklinik.
			  </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Rumah Sakit Jogja - RSUD Kota Yogyakarta
            </div><!-- /.box-footer-->
        </div><!-- /.box -->
        </section><!-- /.content -->