<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-plus"></i> Edit Postingan</small>
    </h1>
  </section>
  <!-- Main content -->
  <?php if(!empty($artikel)){ ?>
  <section class="content">
    <?php $this->load->view('message') ?>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-title">
          <a href="<?php echo site_url('admin/C_blog') ?>" class="btn btn-sm btn-default btn-rounded"><i class="fa fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool no-shadow" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool no-shadow" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="row">
          <?php foreach($artikel as $post) { ?>
          <form id="formInput" action="<?php echo site_url('admin/c_blog/update') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="artikel_id" value="<?php echo $post->artikel_id ?>">
            <div class="col-md-4">
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">1</span> <label class="with-padding"> Upload Image</label> <small><em>Ukuran gambar 1 Mb</em></small>
                </div>
                <div class="input-group input-file" name="Fichier1">
                  <input type="file" id="do-upload" name="artikel_image" class="form-control" placeholder='Choose a file...' />
                  <span class="input-group-btn">
                   <!-- <label for="do-upload" class="btn btn-primary btn-choose" type="button"><i class="fa fa-upload"></i> Browse</label> -->
                   <button type="submit" name="upload" class="btn btn-default"><i class="fa fa-upload"></i></button>
                   <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default"><i class="fa fa-eye"></i></button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">2</span> <label class="with-padding"> Judul Artikel</label>
                </div>
                <input type="text" name="artikel_judul" class="form-control" placeholder="Judul Artikel" value="<?php echo $post->artikel_judul ?>" autocomplete="off">
              </div>
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">3</span> <label class="with-padding"> Kategori Artikel</label>
                </div>
                <select name="artikel_kategori" class="form-control select2" style="width: 100%;">
                  <option selected="selected" value="">Pilih Kategori</option>
                  <?php
                    $kat = $post->artikel_kategori;
                    $no=1; foreach($kategori as $row) { ?>
                  <option value="<?php echo $row->kategori_id ?>" <?php echo ($row->kategori_id == $kat) ? 'selected="selected"' : '' ?>><?php echo $row->kategori_nama ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <div class="label-circle">
                  <span class="dot">4</span> <label class="with-padding"> Deskripsi</label>
                </div>
                <textarea id="summernote" name="artikel_isi"><?php echo $post->artikel_isi ?></textarea>
              </div>
            </div>

            <!-- Helper Hidden Button -->
            <input type="submit" name="submit" id="submit-form" class="hidden">
            <input type="reset" name="" id="reset-form" class="hidden">
          </form>

          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Form Ganti Foto</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6 col-sm-6">
                      <img src="<?php echo base_url("assets/img/berita/".$post->artikel_image) ?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <form action="<?php echo base_url('admin/c_blog/change_banner') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <input type="hidden" name="artikel_id" value="<?php echo $post->artikel_id ?>">
                          <input type="file" name="artikel_image">
                        </div>
                        <div class="form-group">
                          <button class="btn btn-sm btn-primary">Simpan Foto</button>
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

          <?php } ?>
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
  <?php } else { ?>
    <?php $this->load->view('error_404') ?>
  <?php } ?>
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
</script>