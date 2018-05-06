<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-link"></i> Blank Sample</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <?php $message = $this->session->flashdata('message'); if(!empty($message)){ ?>
    <div class="alert alert-info">
      <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
      <strong>Alert!</strong> <?php echo $message ?>
    </div>
    <?php } ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <a href="<?php echo site_url('admin/C_user/index') ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Kembali"><i class="fa fa-chevron-left"></i> Kembali</a>
          </div>
        </div>
        <div class="row">
        <?php echo form_open(uri_string());?>
          <div class="col-md-6">
            <div class="form-group">
              <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
              <?php echo form_input($first_name);?>
            </div>
            <div class="form-group">
              <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
              <?php echo form_input($last_name);?>
            </div>
            <div class="form-group">
              <?php echo lang('edit_user_company_label', 'company');?> <br />
              <?php echo form_input($company);?>
            </div>
            <div class="form-group">
              <?php echo lang('edit_user_phone_label', 'phone');?> <br />
              <?php echo form_input($phone);?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <?php echo lang('edit_user_password_label', 'password');?> <br />
              <?php echo form_input($password);?>
            </div>
            <div class="form-group">
              <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
              <?php echo form_input($password_confirm);?>
            </div>
            <div class="form-group">
            <?php if ($this->ion_auth->is_admin()): ?>

                <h3>User Level</h3>
                <?php foreach ($groups as $group):?>
                    <?php
                        $gID = $group['id'];
                        $checked = null;
                        $item = null;
                        foreach($currentGroups as $grp) {
                            if ($gID == $grp->id) {
                                $checked= ' checked="checked"';
                            break;
                            }
                        }
                    ?>
                    <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                    <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                    </label>
                <?php endforeach?>

            <?php endif ?>
            </div>

            <?php echo form_hidden('id', $user->id);?>
            <?php echo form_hidden($csrf); ?>

            <p><?php echo form_submit('submit', lang('edit_user_submit_btn'), "class='btn btn-md btn-primary'");?></p>
          </div>

        <?php echo form_close();?>
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
  $(".alert").fadeIn(1000);
    setTimeout(function(){
    $(".alert").hide(); 
  }, 2000);
    // $(".alert").fadeOut(2500);
</script>