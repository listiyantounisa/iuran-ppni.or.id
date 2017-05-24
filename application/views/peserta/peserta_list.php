
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
        <table class="table table-bordered table-striped" id="table">
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
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
            {
                return {
                    "iStart": oSettings._iDisplayStart,
                    "iEnd": oSettings.fnDisplayEnd(),
                    "iLength": oSettings._iDisplayLength,
                    "iTotal": oSettings.fnRecordsTotal(),
                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                };
            };
            
            table = $("#table").dataTable({
                initComplete: function() {
                    var api = this.api();
                    $('#table_filter input')
                            .off('.DT')
                            .on('keyup.DT', function(e) {
                                if (e.keyCode == 13) {
                                    api.search(this.value).draw();
                        }
                    });
                },
                oLanguage: {
                    sProcessing: "Loading Data, please wait..."
                },
                processing: true,
                serverSide: true,
                ajax: {"url": "peserta/json", "type": "POST"},
                columns: [
                    {
                        "data": "id_peserta",
                        "orderable": false
                    },
                    {"data": "nama_peserta"},
                    {"data": "no_ktp"},
                    {"data": "no_anggota"},
                    {"data": "tanggal_terdaftar"},
                    {"data": "komisariat"},
                    {
                        "data" : "action",
                        "orderable": false,
                        "className" : "text-center"
                    }
                ],
                order: [[0, 'desc']],
                rowCallback: function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });
        });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->