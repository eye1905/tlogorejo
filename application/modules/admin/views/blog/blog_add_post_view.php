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
            <form class="form-horizontal">
              <div class="form-group">
                <label for="artikel_judul" class="col-md-1 control-label">Entri</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" placeholder="Judul postingan">
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputFile" class="col-md-1 control-label">Gambar</label>
                <div class="col-md-10 col-offset-1">
                  <input type="file" id="exampleInputFile">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-1 hidden-sm"></label>
                <div class="col-md-10">
                  <textarea id="ckeditor" name="ckeditor" rows="10" cols="80">
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
                  <button class="btn btn-sm btn-primary">Publikasikan</button>
                  &nbsp;&nbsp;
                  <button class="btn btn-sm btn-default">Simpan</button>
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