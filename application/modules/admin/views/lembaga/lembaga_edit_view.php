<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-pencil"></i> Edit <?php  ?></small>
    </h1>
  </section>
  <?php if(!empty($lembaga)){ ?>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <?php foreach($lembaga as $row): ?>
            <form class="form-horizontal" action="<?php echo base_url('admin/C_lembaga/update') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="col-md-1 control-label">Entri</label>
                <div class="col-md-10">
                  <input type="hidden" name="lembaga_id" value="<?php echo $row->lembaga_id ?>">
                  <input type="text" class="form-control" name="lembaga_nama" placeholder="Lembaga" autocomplete="off" value="<?php echo $row->lembaga_nama ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="exampleInputFile" class="col-md-1 control-label">Gambar</label>
                <div class="col-md-10">
                  <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-default">Ganti Banner</button>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-1 hidden-sm"></label>
                <div class="col-md-10">
                  <textarea id="ckeditor" name="lembaga_deskripsi" rows="10" cols="80">
                    <?php echo $row->lembaga_deskripsi ?>
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
            <?php endforeach; ?>

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
                        <img src="<?php echo base_url("assets/img/lembaga/".$row->lembaga_gambar) ?>" class="img-thumbnail">
                      </div>
                      <div class="col-md-6 col-sm-6">
                        <form action="<?php echo base_url('admin/C_lembaga/change_banner') ?>" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <input type="hidden" name="lembaga_id" value="<?php echo $row->lembaga_id ?>">
                            <input type="file" name="lembaga_gambar">
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
          </div>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
  <?php } else { ?>
    <?php $this->load->view('error_404') ?>
  <?php } ?>
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(function () {
    CKEDITOR.replace('ckeditor')
  });
</script>