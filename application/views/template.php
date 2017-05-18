<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Aplikasi Jadwal Poliklinik</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/font-awesome-4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/ionicons-2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.css">
		<!-- daterange picker -->
		<link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/daterangepicker/daterangepicker-bs3.css">
		<!-- Select2 -->
		<link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/select2/select2.min.css">
		<!-- Bootstrap time Picker -->
		<link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/timepicker/bootstrap-timepicker.min.css">
		<!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/skins/_all-skins.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo site_url()?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Dashboard Manager</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">



                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url()?>template/dist/img/user-general.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php
							$user = $this->ion_auth->user()->row();
							echo $user->first_name; ?> <?php
							$user = $this->ion_auth->user()->row();
							echo $user->last_name; ?></span>
                                </a>
								
								
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url()?>template/dist/img/user-general.png" class="img-circle" alt="User Image">
                                        <p>
                                            <?php $user = $this->ion_auth->user()->row(); echo $user->username; ?> - 
											<?php $user_groups = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->result();
											foreach ($user_groups as $v) { echo $v->name;} ?> Group
                                            <small><?php $user = $this->ion_auth->user()->row(); echo $user->email; ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <?php
                                            echo anchor('auth/logout','Sign Out',array('class'=>'btn btn-default btn-flat'));
                                            ?>
                                            
                                        </div>
                                    </li>
                                </ul>
                            </li>
                           
                            
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url()?>template/dist/img/user-general.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php
							$user = $this->ion_auth->user()->row();
							echo $user->email; ?>
							</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>							
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">

                        <li>
                            <a href="<?php echo site_url('home'); ?>">
                                <i class="fa fa-laptop"></i> <span>DASHBOARD</span>
                            </a>
                        </li>
                        <?php
						$user_groups = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->result();
						foreach ($user_groups as $v) {
							$grup_id = $v->id;
							if($grup_id == 1){
								//Menu Untuk Administrator
								$menu = $this->db->get_where('menu', array('is_parent' => 0,'is_active'=>1));
								foreach ($menu->result() as $m) {
									// chek ada sub menu
									$submenu = $this->db->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1));
									if($submenu->num_rows()>0){
										// tampilkan submenu
										echo "<li class='treeview'>
											".anchor('#',  "<i class='$m->icon'></i>".strtoupper($m->name).' <i class="fa fa-angle-left pull-right"></i>')."
												<ul class='treeview-menu'>";
										foreach ($submenu->result() as $s){
											 echo "<li>" . anchor($s->link, "<i class='$s->icon'></i> <span>" . strtoupper($s->name)) . "</span></li>";
										}
										   echo"</ul>
											</li>";
									}else{
										echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . strtoupper($m->name)) . "</span></li>";
									}
									
								}
							}elseif($grup_id == 2){
								//Menu Untuk Member
								//Menu Untuk Administrator
								$menu = $this->db->get_where('menu', array('is_parent' => 0,'is_active'=>1,'menu_group'=>2));
								foreach ($menu->result() as $m) {
									// chek ada sub menu
									$submenu = $this->db->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1,'menu_group'=>2));
									if($submenu->num_rows()>0){
										// tampilkan submenu
										echo "<li class='treeview'>
											".anchor('#',  "<i class='$m->icon'></i>".strtoupper($m->name).' <i class="fa fa-angle-left pull-right"></i>')."
												<ul class='treeview-menu'>";
										foreach ($submenu->result() as $s){
											 echo "<li>" . anchor($s->link, "<i class='$s->icon'></i> <span>" . strtoupper($s->name)) . "</span></li>";
										}
										   echo"</ul>
											</li>";
									}else{
										echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . strtoupper($m->name)) . "</span></li>";
									}
									
								}
							}elseif($grup_id == 3){
								//Menu Untuk Member
								//Menu Untuk Administrator
								$menu = $this->db->get_where('menu', array('is_parent' => 0,'is_active'=>1,'menu_group'=>3));
								foreach ($menu->result() as $m) {
									// chek ada sub menu
									$submenu = $this->db->get_where('menu',array('is_parent'=>$m->id,'is_active'=>1,'menu_group'=>3));
									if($submenu->num_rows()>0){
										// tampilkan submenu
										echo "<li class='treeview'>
											".anchor('#',  "<i class='$m->icon'></i>".strtoupper($m->name).' <i class="fa fa-angle-left pull-right"></i>')."
												<ul class='treeview-menu'>";
										foreach ($submenu->result() as $s){
											 echo "<li>" . anchor($s->link, "<i class='$s->icon'></i> <span>" . strtoupper($s->name)) . "</span></li>";
										}
										   echo"</ul>
											</li>";
									}else{
										echo "<li>" . anchor($m->link, "<i class='$m->icon'></i> <span>" . strtoupper($m->name)) . "</span></li>";
									}
									
								}
							}else{
								
							}
						}
						
						
						
                        
                        ?>
						
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->

                <?php echo $contents; ?>
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; RSUD Kota Yk</strong> All rights reserved.
            </footer>

            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url() ?>template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url() ?>template/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<!-- Select2 -->
		<script src="<?php echo base_url() ?>template/plugins/select2/select2.full.min.js"></script>
		<!-- InputMask -->
		<script src="<?php echo base_url() ?>template/plugins/input-mask/jquery.inputmask.js"></script>
		<script src="<?php echo base_url() ?>template/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="<?php echo base_url() ?>template/plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- date-range-picker -->
		<script src="<?php echo base_url() ?>template/plugins/daterangepicker/moment.min.js"></script>
		<script src="<?php echo base_url() ?>template/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- bootstrap color picker -->
		<script src="<?php echo base_url() ?>template/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
		<!-- bootstrap time picker -->
		<script src="<?php echo base_url() ?>template/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() ?>template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() ?>template/plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() ?>template/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() ?>template/dist/js/demo.js"></script>
        <!-- page script -->
		<script src="<?php echo base_url() ?>template/plugins/ckeditor/ckeditor.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="<?php echo base_url() ?>template/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		
        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
				$(".select2").select2();
				
				//Date range picker
				$('#datepicker').daterangepicker({
					singleDatePicker: true,
					format: 'YYYY-MM-DD',        
				});
				
				$('#datepicker2').daterangepicker({
					singleDatePicker: true,
					format: 'YYYY-MM-DD',        
				});
				
				//Datemask dd/mm/yyyy
				$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
				
				//Datemask2 mm/dd/yyyy
				$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
				
				//Money Euro
				$("[data-mask]").inputmask();
				$(".timepicker").timepicker({
				  showInputs: false
				});
				
				// Replace the <textarea id="editor1"> with a CKEditor
				// instance, using default configuration.
				CKEDITOR.replace('editor1');
				//bootstrap WYSIHTML5 - text editor
				$(".textarea").wysihtml5();
				
            });
        </script>
		
    </body>
</html>
