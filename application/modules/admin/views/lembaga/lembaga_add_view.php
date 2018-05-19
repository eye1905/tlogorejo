<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-plus"></i> Tambah Lembaga</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-title">
          <a href="<?php echo site_url('admin/C_lembaga') ?>" class="btn btn-sm btn-default btn-rounded"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool no-shadow" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-box-tool no-shadow dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-wrench"></i>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </div>
          <button type="button" class="btn btn-box-tool no-shadow" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <form id="formInput" action="<?php echo site_url('admin/C_lembaga/save') ?>" method="post" enctype="multipart/form-data">
            <div class="col-md-4">
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">1</span> <label class="with-padding"> Upload Image</label> <small><em>Ukuran gambar 1 Mb</em></small>
                </div>
                <div class="input-group input-file" name="Fichier1">
                  <input type="file" id="do-upload" name="lembaga_gambar" class="form-control" placeholder='Choose a file...' />
                  <span class="input-group-btn">
                   <label for="do-upload" class="btn btn-primary btn-choose" type="button"><i class="fa fa-upload"></i> Browse</label>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">2</span> <label class="with-padding"> Nama Lembaga</label>
                </div>
                <input type="text" name="lembaga_nama" class="form-control" placeholder="Nama Lembaga">
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">4</span> <label class="with-padding"> Deskripsi</label>
                </div>
                <textarea id="summernote" name="lembaga_deskripsi"></textarea>
              </div>
            </div>

            <!-- Helper Hidden Button -->
            <input type="submit" name="" id="submit-form" class="hidden">
            <input type="reset" name="" id="reset-form" class="hidden">
          </form>
        </div>
      </div>
      <div class="box-footer">
        <div class="pull-left">
          <label for="reset-form" tabindex="0" class="btn btn-sm btn-warning btn-rounded"><i class="fa fa-refresh"></i> Reset</label>
          <label for="submit-form" tabindex="0" class="btn btn-sm btn-primary btn-rounded"><i class="fa fa-save"></i> Simpan Data</label>
        </div>
      </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(function () {
    CKEDITOR.replace('ckeditor')
  });

  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
  });

  $(document).ready(function() {
      $('#summernote').summernote();
  });
</script>s