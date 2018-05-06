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
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name);?>
            <?php echo form_error('first_name'); ?>
          </div>
          <div class="form-group">
            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
            <?php echo form_input($last_name);?>
            <?php echo form_error('last_name'); ?>
          </div>
          <div class="form-group">
            <?php
            if($identity_column!=='email') {
                echo '<p>';
                echo lang('create_user_identity_label', 'identity');
                echo '<br />';
                echo form_error('identity');
                echo form_input($identity);
                echo '</p>';
            }
            ?>
          </div>
          <div class="form-group">
            <?php echo lang('create_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>
            <?php echo form_error('company'); ?>
          </div>
          <div class="form-group">
            <?php echo lang('create_user_email_label', 'email');?> <br />
            <?php echo form_input($email);?>
            <?php echo form_error('email'); ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <?php echo lang('create_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>
            <?php echo form_error('phone'); ?>
          </div>
          <div class="form-group">
            <?php echo lang('create_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>
            <?php echo form_error('password'); ?>
          </div>
          <div class="form-group">
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
            <?php echo form_input($password_confirm);?>
            <?php echo form_error('password_confirm'); ?>
          </div>
          <div class="form-group">
            <?php echo form_submit('submit', lang('create_user_submit_btn'), "class='btn btn-md btn-primary'");?>
          </div>
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