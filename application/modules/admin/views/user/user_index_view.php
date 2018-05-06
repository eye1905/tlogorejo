<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-link"></i> Blank Sample</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <?php $pesan = $this->session->flashdata('message'); if(!empty($pesan)){ ?>
    <div class="alert alert-info">
      <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
      <?php echo $pesan ?>
    </div>
    <?php } ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <a href="<?php echo site_url('admin/C_user/create_user') ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah User"><i class="fa fa-plus"></i> Tambah User</a>
            <table class="table table-hover" id="example1">
              <thead>
                <tr>
                  <th><?php echo lang('index_fname_th');?></th>
                  <th><?php echo lang('index_lname_th');?></th>
                  <th><?php echo lang('index_email_th');?></th>
                  <th><?php echo lang('index_groups_th');?></th>
                  <th><?php echo lang('index_status_th');?></th>
                  <th><?php echo lang('index_action_th');?></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($users as $user):?>
                <tr>
                  <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                  <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                  <td class="text-primary"><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                  <td>
                    <?php foreach ($user->groups as $group):?>
                    <!-- <?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'), "class='btn btn-xs btn-primary'") ;?><br /> -->
                    <button class="btn btn-xs btn-primary"><?php echo $group->name ?></button>
                    <?php endforeach?>
                  </td>
                  <td><?php echo ($user->active) ? anchor("admin/C_user/deactivate/".$user->id, lang('index_active_link'), "class='badge success'") : anchor("admin/C_user/activate/". $user->id, lang('index_inactive_link'), "class='badge default'");?></td>
                  <td>
                    <a href="<?php echo site_url("admin/C_user/edit_user/".$user->id) ?>" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit <?php echo $user->first_name ?>"><i class="fa fa-pencil"></i></a>
                  </td>
                </tr>
              <?php endforeach;?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="box-footer">
        Footer
      </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $('#example1').DataTable({
   'paging'      : true,
   'lengthChange': false,
   'searching'   : true,
   'ordering'    : false,
   'info'        : true,
   'autoWidth'   : false
  });

  $(".alert").fadeIn(1000);
    setTimeout(function(){
    $(".alert").hide(); 
  }, 2000);
    // $(".alert").fadeOut(2500);

  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
  });
</script>