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
          <a href="<?php echo site_url('admin/C_post/create') ?>" class="btn btn-sm btn-primary btn-rounded"><i class="fa fa-plus"></i> Tambah Data</a>
          <a href="" class="btn btn-sm btn-default btn-rounded hidden-xs"><i class="fa fa-refresh"></i> Refresh</a>


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
                    <th width="6%" style="padding-left: 20px;">
                      <div class="material-switch">
                        <input id="multiSelect" type="checkbox" onchange="checkAll(this)"/>
                        <label for="multiSelect" class="label-primary"></label>
                      </div>
                    </th>
                    <th>Judul</th>
                    <th width="17%">Durasi</th>
                    <!-- <th width="8%">Status</th> -->
                    <th>Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="padding-left: 20px;">
                      <div class="material-switch">
                        <input id="singleSelect" onchange="checkSingle(this)" name="id[]" type="checkbox" />
                        <label for="singleSelect" class="label-primary"></label>
                      </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
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