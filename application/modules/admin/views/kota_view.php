<style type="text/css">
  .btn{
    border:none;
    color: white;
  }
  .th{
    text-align: center;
  }
</style>
<div class="content-wrapper">
    <br>
    <section class="content container-fluid">
      <div class="col-sm-12 col-md-12">
      <div class="box" style="padding: 20pt">
        <div class="box-header">
             <center><h3 class="box-title"><b>Data Provinsi</b></h3></center>
            </div>
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row">
                    <div class="col-sm-6">
                     
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                      <thead style="background-color: #DCDCDC">
                      <tr role="row">
                        <th class="sorting_asc th" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" width="10%">
                          <center>No</center></th>
                        <th class="sorting th" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" width="60%">Nama Provinsi</th>
                        <th class="sorting th" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      
                      <?php $no = $this->uri->segment('3') + 1;
                      foreach($aku as $book){?>
                      <tr>
                        <td><center><?php echo $no; ?></center></td>
                        <td><?php echo $book->nama_provinsi;?></td>
                        <td>
                          <center>
                            <button class="btn btn-warning btn-sm" type="button" onclick="edit_provinsi(<?php echo $book->id_provinsi;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="delete_provinsi(<?php echo $no;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                          </center>
                        </td>
                      </tr>
                      <?php $no++;
                      $tambah = $no;
                      }?>
                      <tr>
                        <td><center><input type="text" name="id_provinsi" id="id_provinsi" hidden="true"></center></td>
                        <td>
                          <div class="form-group has-feedback" id="for_prov">
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="nama_provinsi" placeholder="Masukan Nama Provinsi">
                            </div>
                             <label class="col-sm-2 control-label"><p id="error_provinsi"></p></label>
                          </div>
                        </td>
                        <td>
                          <center>
                          <button class="btn btn-success btn-sm" id="plus_provinsi" type="button"><b>
                          Simpan Data</b></button></center>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                   <!--  <?php 
                    echo $this->pagination->create_links();
                    ?> -->
                  </div>
                </div>
              </div>
          </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    
    });

  $("#plus_provinsi").click(function(){
        var formData = {'provinsi': $("#nama_provinsi").val(),'id_provinsi': $("#id_provinsi").val()};
        var url;
        var id = $("#id_provinsi").val();

        if(id == "")
        {
              url = "<?php echo site_url('admin/c_kota/simpan_provinsi')?>";
        }else
        {
            url = "<?php echo site_url('admin/c_kota/update_provinsi')?>";
        }

        $.ajax({
        url : url,
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        {
            if (data=='success') {
                document.location.href = "<?php echo base_url(); ?>admin/c_kota";
            }else{
              $("#for_prov").addClass("has-error");
              $("#nama_provinsi").attr("placeholder", data).placeholder();
              $("#nama_provinsi").val(data);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {    
            $("#for_prov").addClass("has-error");
            $("#nama_provinsi").attr("placeholder", textStatus).placeholder();
            $("#nama_provinsi").val(data);
        }
      });
    });

   function edit_provinsi(id)
      {
        var formData = {'id_provinsi': id};

        $.ajax({
        url : "<?php echo site_url('admin/c_kota/select_provinsi')?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
          $("#id_provinsi").val(data.id_provinsi);
          $("#nama_provinsi").val(data.nama_provinsi);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    }

    function delete_provinsi(id)
      {
        var formData = {'id_provinsi': id};

        $.ajax({
        url : "<?php echo site_url('admin/c_kota/delete_provinsi')?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
          document.location.href = "<?php echo base_url(); ?>admin/c_kota";
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    }

</script>