<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-plus"></i> Membuat Postingan</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <?php $this->load->view('message') ?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-title">
          <a href="<?php echo site_url('admin/C_blog') ?>" class="btn btn-sm btn-default btn-rounded"><i class="fa fa-chevron-left"></i> Kembali</a>
          <label for="submit-form" tabindex="0" class="btn btn-sm btn-primary btn-rounded"><i class="fa fa-save"></i> Simpan Data</label>
        </div>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool no-shadow" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool no-shadow" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <form id="formInput" action="<?php echo site_url('admin/C_blog/save') ?>" method="post" enctype="multipart/form-data">
            <div class="col-md-4">
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">1</span> <label class="with-padding"> Upload Image</label> <small><em>Ukuran maks 1 Mb</em></small>
                </div>
                <div class="input-group input-file" name="Fichier1">
                  <input type="file" id="do-upload" name="artikel_image" class="form-control" placeholder='Choose a file...' />
                  <span class="input-group-btn">
                   <label for="do-upload" class="btn btn-primary btn-choose" type="button"><i class="fa fa-upload"></i> Browse</label>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">2</span> <label class="with-padding"> Judul Artikel</label>
                </div>
                <input type="text" name="artikel_judul" class="form-control" placeholder="Judul Artikel" autocomplete="off">
              </div>
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">3</span> <label class="with-padding"> Kategori Artikel</label>
                </div>
                <select name="artikel_kategori" class="form-control select2" style="width: 100%;">
                  <option selected="selected" value="">Pilih Kategori</option>
                  <?php $no=1; foreach($kategori as $row) { ?>
                  <option value="<?php echo $row->kategori_id ?>"><?php echo $row->kategori_nama ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">4</span> <label class="with-padding"> Deskripsi</label>
                </div>
                <textarea id="summernote" name="artikel_isi"></textarea>
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
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
  });

  $(document).ready(function() {
      $('#summernote').summernote();
  });
</script>