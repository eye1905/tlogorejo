<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-pencil"></i> Postingan Nonaktif</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">

    <?php $this->load->view('message') ?>

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-title">
          <a href="<?php echo site_url('admin/C_blog') ?>" class="btn btn-sm btn-default btn-rounded"><i class="fa fa-chevron-left"></i> kembali</a>
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
              <form action="<?php echo base_url('admin/C_blog/multiple_restore') ?>" method="post">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th width="5%">
                        <div class="material-switch">
                          <input id="multiSelect" name="id[]" type="checkbox" onchange="checkAll(this)"/>
                          <label for="multiSelect" class="label-primary"></label>
                        </div>
                      </th>
                      <th>Judul Artikel</th>
                      <th>Status</th>
                      <th>Author</th>
                      <th>Created at</th>
                      <th width="20%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- DataTable ServerSide -->
                  </tbody>
                </table>
                <input type="submit" name="" id="multiple_delete" class="hidden">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <label type="button" class="btn btn-sm btn-default" for="multiple_delete">Restore All</label>
      </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  var table;
  $(document).ready(function() {

      //datatables
      table = $('#example1').DataTable({ 

          "processing": true, 
          "serverSide": true, 
          "order": [],
          "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [ 0, 2, 3, 4, 5 ]
          }],
           
          "ajax": {
              "url": "<?php echo site_url('admin/C_blog/get_data_artikel')?>",
              "type": "POST",
              "data": {
                'soft_delete': '1'
              }
          },

           
          "columnDefs": [
          { 
              "targets": [ 0 ], 
              "orderable": false, 
          },
          ],

      });

  });

  $(".alert").fadeIn(1000);
    setTimeout(function(){
    $(".alert").hide(); 
  }, 2000);

  function checkAll(ele) {
       var checkboxes = document.getElementsByTagName('input');
       if (ele.checked) {
           for (var i = 0; i < checkboxes.length; i++) {
               if (checkboxes[i].type == 'checkbox') {
                   checkboxes[i].checked = true;
               }
           }
       } else {
           for (var i = 0; i < checkboxes.length; i++) {
               console.log(i)
               if (checkboxes[i].type == 'checkbox') {
                   checkboxes[i].checked = false;
               }
           }
       }
   }
</script>