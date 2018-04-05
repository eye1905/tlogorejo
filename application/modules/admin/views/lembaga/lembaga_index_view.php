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
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-add"><i class="fa fa-pencil"></i> Tambah Lembaga</button>
              </div>
            </div>
          </div> -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="btn-action-bar"><a href="" data-target="#modal-add" data-toggle="modal" class="btn-action-bar-item primary"><i class="fa fa-plus"></i></a></li>
              <li class="active"><a href="#user-unlock" data-toggle="tab"><i class="fa fa-check"></i> Ditampilkan</a></li>
              <li><a href="#user-lock" data-toggle="tab"><i class="fa fa-trash"></i> Recycle Bin</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="user-unlock">
                <section id="user-unlock">
                  <div class="table-responsive">
                    <table id="example1" class="table table-hover">
                      <thead>
                        <tr>
                          <th width="5%" class="text-center">
                            <button class="btn btn-sm btn-default" type="button"><input type="checkbox" name="id[]" onchange="checkAll(this)"></button>
                          </th>
                          <th width="30%">
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
                        <?php foreach ($lembaga as $row) { ?>
                        <tr>
                          <td class="text-center"><input type="checkbox" name="id[]"></td>
                          <td>
                            <span class="text-primary"><?php echo $row->lembaga_nama ?></span><br>
                            <a href="<?php echo base_url('admin/C_lembaga/edit?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            <?php if($row->lembaga_soft_delete == TRUE) { ?>
                            <a href="<?php echo base_url('admin/C_lembaga/restore?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Restore</a>
                            <?php } else { ?>
                            <a href="<?php echo base_url('admin/C_lembaga/delete?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                            <?php } ?>
                            <a href="<?php echo base_url('admin/C_lembaga/detail?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Lihat</a>
                          </td>
                          <td class="text-muted"><?php echo $row->lembaga_deskripsi ?></td>
                          <td class="text-center">
                            <?php if($row->lembaga_soft_delete == TRUE) { ?>
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
                    <table id="example2" class="table table-hover">
                      <thead>
                        <tr>
                          <th width="5%" class="text-center">
                            <button class="btn btn-sm btn-default" type="button"><input type="checkbox" name="id[]" onchange="checkAll(this)"></button>
                          </th>
                          <th width="30%">
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
                      <?php if(!empty($lembaga_nonaktif)) { ?>
                        <?php foreach ($lembaga_nonaktif as $row) { ?>
                        <tr>
                          <td class="text-center"><input type="checkbox" name="id[]"></td>
                          <td>
                            <span class="text-primary"><?php echo $row->lembaga_nama ?></span><br>
                            <a href="<?php echo base_url('admin/C_lembaga/edit?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            <?php if($row->lembaga_soft_delete == TRUE) { ?>
                            <a href="<?php echo base_url('admin/C_lembaga/restore?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-success"><i class="fa fa-refresh"></i> Restore</a>
                            <?php } else { ?>
                            <a href="<?php echo base_url('admin/C_lembaga/delete?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                            <?php } ?>
                            <a href="<?php echo base_url('admin/C_lembaga/detail?id='.$row->lembaga_id) ?>" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Lihat</a>
                          </td>
                          <td class="text-muted"><?php echo $row->lembaga_deskripsi ?></td>
                          <td class="text-center">
                            <?php if($row->lembaga_soft_delete == TRUE) { ?>
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
                <form class="form-horizontal" action="<?php echo base_url('admin/C_lembaga/save') ?>" method="post" enctype="multipart/form-data">
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

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  var table, tableNon;
  //datatables
  table = $('#table1').DataTable({ 

      "processing": true, 
      "serverSide": true, 
      "order": [],
      // "aoColumnDefs": [{
      //   'bSortable': false,
      //   'aTargets': [ 0, 2, 3 ]
      // }],
       
      "ajax": {
          "url": "<?php echo site_url('admin/C_lembaga/get_data_lembaga')?>",
          "type": "POST",
          "data": {
            'soft_delete': '0'
          }
      },

       
      "columnDefs": [
      { 
          "targets": [ 0 ], 
          "orderable": false, 
      },
      ],

  });

  tableNon = $('#table2').DataTable({ 

      "processing": true, 
      "serverSide": true, 
      "order": [],
      // "aoColumnDefs": [{
      //   'bSortable': false,
      //   'aTargets': [ 0, 2, 3 ]
      // }],
       
      "ajax": {
          "url": "<?php echo site_url('admin/C_lembaga/get_data_lembaga')?>",
          "type": "POST",
          "data": {
            'soft_delete': '1'
          }
      },

       
      "columnDefs": [
      { 
          "targets": [ 0 ], 
          "orderable": false, 
      },
      ],

  });

  $('#example1').DataTable({
   'paging'      : true,
   'lengthChange': false,
   'searching'   : false,
   'ordering'    : false,
   'info'        : true,
   'autoWidth'   : false
  });

  $('#example2').DataTable({
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