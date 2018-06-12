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
        </div>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool no-shadow" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool no-shadow" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <form action="<?php echo site_url('admin/blog/save_blog') ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group col-md-8">
              <div class="label-circle">
                <span class="dot">1</span> <label class="with-padding"> Judul</label> <small><em>Masukan Judul Postingan</em></small>
              </div>
              <input type="text" name="judul" class="form-control" placeholder="Judul Postingan" autocomplete="off">
            </div>

            <div class="form-group col-md-4">
              <div class="label-circle">
                <span class="dot">2</span> <label class="with-padding"> Kategori</label> <small><em>Pilih Kategori Postingan</em></small>
              </div>
              <select name="id_kategori" class="form-control select2" style="width: 100%;">
                <option selected="selected" value="">Pilih Kategori</option>
                <?php foreach($kategori as $row): ?>
                <option value="<?php echo $row->id ?>"><?php echo $row->kategori ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group col-md-8">
              <div class="label-circle">
                <span class="dot">3</span> <label class="with-padding"> Isi</label> <small><em>Masukan Isi Postingan</em></small>
              </div>
              <textarea id="summernote" name="konten"><strong>Hello</strong> <em>Summer Note</em></textarea>
            </div>

            <div class="form-group col-md-4">
              <div class="label-circle">
                <span class="dot">4</span> <label class="with-padding"> Banner Preview</label> <small><em>Ukuran maks 1 Mb</em></small>
              </div>
              <div class="input-group input-file" name="Fichier1">
                <input type="file" id="do-upload" name="gambar" class="form-control" placeholder='Choose a file...' />
                <span class="input-group-btn">
                 <label for="do-upload" class="btn btn-primary btn-choose" type="button"><i class="fa fa-upload"></i> Browse</label>
                </span>
              </div>
            </div>

            <div class="form-group col-md-4">
              <label class="with-padding"> Tag</label>
              <input type="text" name="tag" class="form-control" placeholder="Contoh : informasi, berita, dst" autocomplete="off">
            </div>

            <div class="form-group col-md-4">
              <div class="material-switch">
                <input id="multiSelect" type="checkbox" name="status" value="1" />
                <label for="multiSelect" class="label-primary"></label> &nbsp;Publikasikan
              </div>
            </div>

          </div>

          <input type="submit" id="submit-form" class="hidden">
        </form>
      </div>
      <div class="box-footer">
        <div class="pull-left">
          <label for="reset-form" tabindex="0" class="btn btn-sm btn-warning btn-rounded"><i class="fa fa-refresh"></i> Reset</label>
          <label for="submit-form" tabindex="0" class="btn btn-sm btn-primary btn-rounded"><i class="fa fa-save"></i> Simpan</label>
        </div>
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

  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip(); 
  });

  $(document).ready(function() {
      $('#summernote').summernote();
  });

</script>