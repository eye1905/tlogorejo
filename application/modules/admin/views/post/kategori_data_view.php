<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header" style="background-color: #FFF; padding: 15px;">
    <h1>
      <small><i class="<?php echo $icon ?>"></i> <?php echo $header ?></small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <?php $this->load->view('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-title">
          <a href="<?php echo site_url('admin/blog') ?>" class="btn btn-sm btn-default btn-rounded"><i class="fa fa-chevron-left"></i> Kembali</a>
          <a href="#create" class="btn btn-sm btn-primary btn-rounded" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Kategori</a>

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
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="6%" style="padding-left: 20px;"></th>
                    <th width="50%">Judul</th>
                    <th>Dibuat Pada</th>
                    <th>Status</th>
                    <th class="text-center">Menu</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php if(!empty($kategori)) { ?>
                  <?php $for=0; $id=0; foreach($kategori as $row): ?>
                  <tr>
                    <td style="padding-left: 20px;">
                      <div class="material-switch">
                        <input id="singleSelect<?php echo $id++ ?>" onchange="checkSingle(this)" name="id[]" type="checkbox" />
                        <label for="singleSelect<?php echo $for++ ?>" class="label-primary"></label>
                      </div>
                    </td>
                    <td><?php echo $row->kategori ?></td>
                    <td></td>
                    <td><?php echo ($row->status == TRUE) ? '<span class="label success">Active</span>' : '<span class="label default">Inactive</span>' ?></td>
                    <td class="text-center"><input type="checkbox" /></td>
                    <td class="text-center">
                      <a href="#edit<?php echo $row->id ?>" class="btn btn-xs btn-warning" data-toggle="modal"><i class="fa fa-edit"></i></a>

                      <?php if($row->status == TRUE) { ?>
                      <a href="<?php echo site_url('admin/blog/delete_categories/'.$row->id) ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Hapus"><i class="fa fa-remove"></i></a>
                      <?php } else { ?>
                      <a href="<?php echo site_url('admin/blog/restore_categories/'.$row->id) ?>" class="btn btn-xs btn-success" data-toggle="tooltip" title="Pulihkan"><i class="fa fa-undo"></i></a>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                <?php } else { ?>
                  <tr>
                    <td colspan="5" class="text-center">Tidak Ada Data</td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <div class="pull-left">
          <button id="btnHapus" class="btn btn-sm btn-danger btn-rounded" disabled ><i class="fa fa-remove"></i> Hapus Semua</button>
        </div>
      </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="create">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Buat Kategori Baru</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <form action="save_categories" method="post">
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">1</span> <label class="with-padding"> Nama Kategori</label> <small><em>Masukan nama kategori</em></small>
                </div>
                <input type="text" name="kategori" class="form-control" placeholder="Nama Ketegori" autocomplete="off">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<?php foreach($kategori as $row): ?>
<div class="modal fade" id="edit<?php echo $row->id ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Kategori - <strong><?php echo $row->kategori ?></strong></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <form action="update_categories" method="post">
              <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $row->id ?>">
                <div class="label-circle">
                  <span class="dot">1</span> <label class="with-padding"> Nama Kategori</label> <small><em>Masukan nama kategori</em></small>
                </div>
                <input type="text" name="kategori" class="form-control" placeholder="Nama Ketegori" value="<?php echo $row->kategori ?>">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<script type="text/javascript">
  $(".alert").fadeIn(1000);
    setTimeout(function(){
    $(".alert").hide(); 
  }, 2000);
    // $(".alert").fadeOut(2500);

  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
  });

  function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     var btnHapus = document.getElementById("btnHapus");
     if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = true;
            btnHapus.disabled = multiSelect.checked ? false : true;
          }
        }
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = false;
            btnHapus.disabled = multiSelect.checked ? false : true;
          }
        }
    }
  }

  function checkSingle(ele) {
    var btnHapus = document.getElementById("btnHapus");

    // Javascript
    // var checkboxes = [].slice.call(document.querySelectorAll("[name='id[]']")).filter(function(e) {
    //   return e.checked; 
    // }).length;

    // Jquery
    var checkboxes = $("[name='id[]']:checked").length;

    if (checkboxes > 0) {
      btnHapus.disabled = false;
    } else {
      btnHapus.disabled = true;
    }
  }

</script>