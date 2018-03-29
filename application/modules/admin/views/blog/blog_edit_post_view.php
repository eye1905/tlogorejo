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
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <?php foreach($artikel as $row){ ?>
            <form class="form-horizontal" action="<?php echo base_url('admin/c_blog/update') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-md-1 control-label">Entri</label>
                <div class="col-md-10">
                  <input type="hidden" class="form-control" name="artikel_id" value="<?php echo $row->artikel_id ?>">
                  <input type="hidden" class="form-control" name="artikel_author" value="Abdul Rozak R.">
                  <input type="text" class="form-control" name="artikel_judul" value="<?php echo $row->artikel_judul ?>" placeholder="Judul postingan" autocomplete="off">
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputFile" class="col-md-1 control-label">Gambar</label>
                <div class="col-md-10">
                  <input type="file" id="exampleInputFile" name="artikel_image">
                  <br>
                  <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-default">Ganti Banner</button>
                  <hr>
                  <?php foreach($kategori as $kat) { ?>
                    <label class="radio-inline"><input type="radio" name="artikel_kategori" value="<?php echo $kat->kategori_slug ?>"><?php echo $kat->kategori_nama ?></label>
                  <?php } ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-1 hidden-sm"></label>
                <div class="col-md-10">
                  <textarea id="ckeditor" name="artikel_isi" rows="10" cols="80">
                    <?php echo $row->artikel_isi ?>
                  </textarea>                  
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-1 control-label hidden-sm"></label>
                <div class="col-md-10 col-offset-1">
                  <label class="control-label" style="font-weight: normal;">Memposting sebagai&nbsp;&nbsp;
                    <span class="text-bold">Abdul Rozak Romadhoni</span>
                  </label>
                  &nbsp;&nbsp;
                  <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                  &nbsp;&nbsp;
                  <!-- <button class="btn btn-sm btn-default">Simpan</button> -->
                </div>
              </div>
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
                        <img src="<?php echo base_url("assets/img/berita/$row->artikel_image") ?>" class="img-thumbnail">
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <form action="<?php echo base_url('admin/c_blog/change_banner') ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input type="hidden" name="artikel_id" value="<?php echo $row->artikel_id ?>">
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
            <!-- /.modal -->
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
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
</script>