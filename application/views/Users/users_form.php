<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>USERS</h3>
                      <div class='box box-primary'>
        <?php echo form_open('users/create');?>
		<table class='table table-bordered'>
	    <tr><td width="25%">Nama Depan<?php echo form_error('first_name') ?></td>
            <td>
			<?php
        echo form_error('first_name');
        echo form_input('first_name',set_value('first_name'),'class="form-control"');
        ?>
        </td></tr>
	    <tr><td>Nama Belakang<?php echo form_error('last_name') ?></td>
            <td><?php
        echo form_error('last_name');
        echo form_input('last_name',set_value('last_name'),'class="form-control"');
        ?>
        </td></tr>
		<tr><td>Username<?php echo form_error('username') ?></td>
            <td><?php
        echo form_error('username');
        echo form_input('username',set_value('username'),'class="form-control"');
        ?>
        </td></tr>
		<tr><td>Email <?php echo form_error('email') ?></td>
            <td><?php
        echo form_error('email');
        echo form_input('email','','class="form-control"');
        ?>
        </td></tr>
	    <tr><td>Grup User <?php echo form_error('phone') ?></td>
            <td><?php
				if(isset($groups))
				{
				  echo form_label('Groups','groups[]');
				  foreach($groups as $group)
				  {
					echo '<div class="checkbox">';
					echo '<label>';
					echo form_checkbox('groups[]', $group->id, set_checkbox('groups[]', $group->id));
					echo ' '.$group->name;
					echo '</label>';
					echo '</div>';
				  }
				}
				?>
        </td></tr>
		<tr><td>No. HP <?php echo form_error('phone') ?></td>
            <td><?php
        echo form_error('phone');
        echo form_input('phone',set_value('phone'),'class="form-control"');
        ?>
        </td></tr>
		<tr><td>Password <?php echo form_error('password') ?></td>
            <td><?php
        echo form_error('password');
        echo form_password('password','','class="form-control"');
        ?>
        </td></tr>
		<tr><td>Password Confirm <?php echo form_error('password_confirm') ?></td>
            <td><?php
        echo form_error('password_confirm');
        echo form_password('password_confirm','','class="form-control"');
        ?>
        </td></tr>
	    <tr><td colspan='2'>
		<?php echo form_submit('submit', 'Create user', 'class="btn btn-primary"');?>
	    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table>
	<?php echo form_close();?>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->