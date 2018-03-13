<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <small><i class="fa fa-pencil"></i> Semua postingan</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="alert bg-info alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Indicates a successful or positive action.
            </div>
            <a href="<?php echo site_url('admin/blog/form') ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Entri Baru</a>
            <br>
            <br>
          </div>

          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-hover" id="example1">
                <thead>
                  <tr>
                    <th width="5%" class="text-center">
                      <button class="btn btn-sm btn-default"><input type="checkbox" name=""></button>
                    </th>
                    <th>
                      <div class="pull-left">
                        <div class="btn-group">
                          <a href="#" class="btn btn-sm btn-default">Publikasikan</a>
                          <a href="#" class="btn btn-sm btn-default">Draft</a>
                          <a href="#" class="btn btn-sm btn-default"><i class="fa fa-trash"></i></a>
                        </div>
                      </div>
                      <div class="pull-right">
                        <form>
                          <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-default disabled">Sorting ASC</a>
                          </div>
                        </form>
                      </div>
                    </th>
                    <th width="8%"></th>
                    <th width="10%"></th>
                    <th width="7%"></th>
                  </tr>
                </thead>
                <tbody>
                  <!-- DataTable ServerSide -->
                </tbody>
              </table>
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
                "url": "<?php echo site_url('admin/blog/get_data_blog')?>",
                "type": "POST"
            },
 
             
            "columnDefs": [
            { 
                "targets": [ 0 ], 
                "orderable": false, 
            },
            ],
 
        });
 
    });
</script>