<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-trash"></i> Recycle bin</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="pull-left">
              <div class="btn-group">
                <a href="<?php echo site_url('admin/C_blog') ?>" class="btn btn-sm btn-default"><i class="fa fa-chevron-left"></i> Kembali</a>
              </div>
            </div>
            <br>
            <br>
          </div>
          <div class="col-md-12">
            <div class="table-responsive">
              <form action="<?php echo base_url('admin/C_blog/multiple_restore') ?>" method="post">
                <table class="table table-hover" id="example1">
                  <thead>
                    <tr>
                      <th width="5%" class="text-center">
                        <button class="btn btn-sm btn-default" type="button"><input type="checkbox" name="id[]" onchange="checkAll(this)"></button>
                      </th>
                      <th>
                        <div class="pull-left">
                          <div class="btn-group">
                            <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-check-circle"></i></button>
                            <a href="#" class="btn btn-sm btn-default disabled">Publikasikan</a>
                            <a href="#" class="btn btn-sm btn-default disabled">Draft</a>
                          </div>
                        </div>
                      </th>
                      <th width="8%">Status</th>
                      <th width="10%">Author</th>
                      <th width="7%">Created at</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- DataTable ServerSide -->
                  </tbody>
                </table>
              </form>
            </div>
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
  var table;
  $(document).ready(function() {

      //datatables
      table = $('#example1').DataTable({ 

          "processing": true, 
          "serverSide": true, 
          "order": [],
          "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [ 0, 2, 3, 4 ]
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