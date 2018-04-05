<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-tags"></i> List Kategori</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="btn-action-bar"><a href="" data-target="#modal-add" data-toggle="modal" class="btn-action-bar-item primary"><i class="fa fa-plus"></i></a></li>
              <li class="active"><a href="#user-unlock" data-toggle="tab"><i class="fa fa-tags"></i> List kategori</a></li>
              <li><a href="#user-lock" data-toggle="tab"><i class="fa fa-trash"></i> Recycle Bin</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="user-unlock">
                <section id="user-unlock">
                  <div class="table-responsive">
                    <table id="example2" class="table table-hover">
                      <thead>
                        <tr>
                          <th width="5%" class="text-center">
                            <button class="btn btn-sm btn-default" type="button"><input type="checkbox" name="id[]" onchange="checkAll(this)"></button>
                          </th>
                          <th>
                            <div class="pull-left">
                              <div class="btn-group">
                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-trash"></i></button>
                              </div>
                            </div>
                          </th>
                          <th class="text-center" width="15%">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($kategori)) { ?>
                        <?php foreach ($kategori as $row) { ?>
                        <tr>
                          <td class="text-center"><input type="checkbox" name="id[]"></td>
                          <td>
                            <span class="text-primary"><?php echo $row->kategori_nama ?></span><br>
                            <a href="#" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="<?php echo base_url('admin/C_kategori/delete?id='.$row->kategori_id) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                          </td>
                          <td class="text-center">
                            <?php if($row->kategori_soft_delete !== TRUE) { ?>
                            <span class="badge">Aktif</span>
                            <?php } else { ?>
                            <span class="badge">Nonaktif</span>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                        <tr>
                          <form action="<?php echo base_url('admin/C_kategori/save') ?>" method="post">
                          <td></td>
                          <td>
                            <input type="text" name="kategori_nama" class="form-control" style="width: 100%;">
                          </td>
                          <td class="text-center"><button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button></td>
                          </form>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </section>
              </div>

              <div class="tab-pane" id="user-lock">
                <section id="user-lock">
                  <div class="table-responsive">
                    <table id="example3" class="table table-hover">
                      <thead>
                        <tr>
                          <th width="5%" class="text-center">
                            <button class="btn btn-sm btn-default" type="button"><input type="checkbox" name="id[]" onchange="checkAll(this)"></button>
                          </th>
                          <th>
                            <div class="pull-left">
                              <div class="btn-group">
                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-trash"></i></button>
                              </div>
                            </div>
                          </th>
                          <th class="text-center" width="15%">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($kategori_nonaktif)) { ?>
                        <?php foreach ($kategori_nonaktif as $row) { ?>
                        <tr>
                          <td class="text-center"><input type="checkbox" name="id[]"></td>
                          <td>
                            <span class="text-primary"><?php echo $row->kategori_nama ?></span><br>
                            <a href="#" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="<?php echo base_url('admin/C_kategori/restore?id='.$row->kategori_id) ?>" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Restore</a>
                            <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Hapus Permanent</a>
                          </td>
                          <td class="text-center">
                            <?php if($row->kategori_soft_delete !== TRUE) { ?>
                            <span class="badge">Aktif</span>
                            <?php } else { ?>
                            <span class="badge">Nonaktif</span>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-add">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah User</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <form action="" method="">
                  <div class="form-group">
                    <input type="text" name="" class="form-control" placeholder="Nama Pengguna">
                  </div>
                  <div class="form-group">
                    <input type="text" name="" class="form-control" placeholder="User Id">
                  </div>
                  <div class="form-group">
                    <input type="password" name="" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <input type="password" name="" class="form-control" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-edituser">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit User</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-detailuser">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Detail User</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">

  $('#example2').DataTable({
   'paging'      : true,
   'lengthChange': false,
   'searching'   : false,
   'ordering'    : false,
   'info'        : true,
   'autoWidth'   : false
  });

  $('#example3').DataTable({
   'paging'      : true,
   'lengthChange': false,
   'searching'   : false,
   'ordering'    : false,
   'info'        : true,
   'autoWidth'   : false
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