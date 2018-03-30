<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-pencil"></i> Lembaga</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-body">
            <div class="pull-left">
              <div class="btn-group">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-adduser"><i class="fa fa-pencil"></i> Tambah Lembaga</button>
              </div>
            </div>
          </div> -->
          <div class="nav-tabs-custom" style="margin-top: 0.4vh;">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#user-unlock" data-toggle="tab"><i class="fa fa-check"></i> Ditampilkan</a></li>
              <li><a href="#user-lock" data-toggle="tab"><i class="fa fa-trash"></i> Recycle Bin</a></li>
              <li><a href="#" class="btn" data-toggle="modal" data-target="#modal-add" style="box-shadow: 1px 1px 1px 0px #bfbfbf; background-color: #0093E1; color: #FFF; border-radius: 100%;"><i class="fa fa-plus"></i></a></li>
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
                          <th width="35%">
                            <div class="pull-left">
                              <div class="btn-group">
                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-trash"></i></button>
                              </div>
                            </div>
                          </th>
                          <th>Deskripsi</th>
                          <th class="text-center" width="10%">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(!empty($lembaga)) { ?>
                        <?php foreach ($lembaga as $row1) { ?>
                        <tr>
                          <td class="text-center"><input type="checkbox" name="id[]"></td>
                          <td>
                            <span class="text-primary"><?php echo $row1->lembaga_nama ?></span><br>
                            <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#modal-edit"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-lock"></i> Lock</a>
                            <a href="#" class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal-detail"><i class="fa fa-eye"></i> Lihat</a>
                          </td>
                          <td class="text-muted"><?php echo $row1->lembaga_deskripsi ?></td>
                          <td class="text-center">
                            <?php if($row1->lembaga_soft_delete == TRUE) { ?>
                            <span class="badge">Tidak Tampil</span>
                            <?php } else { ?>
                            <span class="badge">Tampil</span>
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
                          <th width="50%">Password</th>
                          <th class="text-center" width="15%">Status</th>
                        </tr>
                      </thead>
                      <tbody>

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
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Deskripsi</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <form class="form-horizontal" action="<?php echo base_url('admin/c_lembaga/save') ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-md-1 control-label">Lembaga</label>
                    <div class="col-md-10">
                      <input type="hidden" class="form-control" name="artikel_author" value="Abdul Rozak R.">
                      <input type="text" class="form-control" name="lembaga_nama" placeholder="Judul postingan" autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile" class="col-md-1 control-label">Gambar</label>
                    <div class="col-md-10">
                      <input type="file" id="exampleInputFile" name="lembaga_gambar">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-1 hidden-sm"></label>
                    <div class="col-md-10">
                      <textarea id="ckeditor1" name="lembaga_deskripsi" rows="10" cols="80">
                        This is my textarea to be replaced with <b>CKEditor</b>.
                      </textarea>                  
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-1 control-label hidden-sm"></label>
                    <div class="col-md-10 col-offset-1">
                      <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Deskripsi</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <form class="form-horizontal" action="<?php echo base_url('admin/c_lembaga/save') ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-md-1 control-label">Lembaga</label>
                    <div class="col-md-10">
                      <input type="hidden" class="form-control" name="artikel_author" value="Abdul Rozak R.">
                      <input type="text" class="form-control" name="lembaga_nama" placeholder="Judul postingan" autocomplete="off">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile" class="col-md-1 control-label">Gambar</label>
                    <div class="col-md-10">
                      <input type="file" id="exampleInputFile" name="lembaga_gambar">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-1 hidden-sm"></label>
                    <div class="col-md-10">
                      <textarea id="ckeditor2" name="lembaga_deskripsi" rows="10" cols="80">
                        This is my textarea to be replaced with <b>CKEditor</b>.
                      </textarea>                  
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-1 control-label hidden-sm"></label>
                    <div class="col-md-10 col-offset-1">
                      <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-detail">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Detail</h4>
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