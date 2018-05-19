<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-pencil"></i> Lembaga</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-title">
          <a href="<?php echo site_url('admin/C_lembaga') ?>" class="btn btn-sm btn-default btn-rounded hidden-xs"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool no-shadow" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <a href="" class="btn btn-box-tool no-shadow"><i class="fa fa-refresh"></i></a>
          <button type="button" class="btn btn-box-tool no-shadow" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <form action="<?php echo base_url('admin/c_lembaga/multiple_delete') ?>" method="post">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th width="5%">
                        <div class="material-switch">
                          <input id="multiSelect" name="id[]" type="checkbox" onchange="checkAll(this)"/>
                          <label for="multiSelect" class="label-primary"></label>
                        </div>
                      </th>
                      <th>Nama Lembaga</th>
                      <th>Status</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($lembaga)) { ?> 
                    <?php $id=1; $for=1; foreach($lembaga as $row) { ?>
                    <tr>
                      <td>
                        <div class="material-switch"><input id="singleSelect<?php echo $id++ ?>" name="id[]" type="checkbox"/><label for="singleSelect<?php echo $for++ ?>" class="label-primary"></label></div>
                      </td>
                      <td><?php echo $row->lembaga_nama ?></td>
                      <td>
                        <?php if($row->lembaga_soft_delete == TRUE) { ?>
                        <span class="badge">Tidak Tampil</span>
                        <?php } else { ?>
                        <span class="badge">Tampil</span>
                        <?php } ?>
                      </td>
                      <td>
                        <a href="<?php echo base_url('admin/C_lembaga/edit?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                        <?php if($row->lembaga_soft_delete == TRUE) { ?>
                        <a href="<?php echo base_url('admin/C_lembaga/restore?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Restore</a>
                        <?php } else { ?>
                        <a href="<?php echo base_url('admin/C_lembaga/delete?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php } ?>
                  <?php } ?>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
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

  $(function () {
    CKEDITOR.replace('ckeditor1')
    CKEDITOR.replace('ckeditor2')
  });

  function checkAll(ele) {
       var checkboxes = document.getElementsByTagName('input');
       if (ele.checked) {
           for (var i = 0; i < checkboxes.length; i++) {
               if (checkboxes[i].type == 'checkbox') {
                   checkboxes[i].checked = true;
               }
           }
       } else {
           for (var i = 0; i < checkboxes.length; i++) {
               console.log(i)
               if (checkboxes[i].type == 'checkbox') {
                   checkboxes[i].checked = false;
               }
           }
       }
  }
</script>