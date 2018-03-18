<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-plus"></i> Membuat Postingan</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal" action="<?php echo base_url('admin/blog/save') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-md-1 control-label">Entri</label>
                <div class="col-md-10">
                  <input type="hidden" class="form-control" name="artikel_author" value="Abdul Rozak R.">
                  <input type="text" class="form-control" name="artikel_judul" placeholder="Judul postingan">
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputFile" class="col-md-1 control-label">Gambar</label>
                <div class="col-md-10">
                  <input type="file" id="exampleInputFile" name="artikel_image">
                  <hr>
                  <?php foreach($kategori as $row) { ?>
                    <label class="radio-inline"><input type="radio" name="artikel_kategori" value="<?php echo $row->kategori_id ?>"><?php echo $row->kategori_nama ?></label>
                  <?php } ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-1 hidden-sm"></label>
                <div class="col-md-10">
                  <textarea id="ckeditor" name="artikel_isi" rows="10" cols="80">
                    This is my textarea to be replaced with <b>CKEditor</b>.
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
                  <button type="submit" class="btn btn-sm btn-primary">Publikasikan</button>
                  &nbsp;&nbsp;
                  <!-- <button class="btn btn-sm btn-default">Simpan</button> -->
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
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
</script>