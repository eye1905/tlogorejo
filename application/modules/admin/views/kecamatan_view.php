<style type="text/css">
  .th{
    text-align: center !important;
  }
  .table{
    margin-top: 10pt;
  }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <center><h3 class="box-title"><b>Data Kabupaten</b></h3></center>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-3">
            <div class="input-group">
               <span class="input-group-addon" style="background-color: #337ab7; color: #fff;"><i class="glyphicon glyphicon-search"></i></span>
              <input type="text" class="form-control" id="cari_nama" placeholder="Ketikan Nama" name="cari_nama">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive">
              <table id="example2" class="table table-hover" role="grid" aria-describedby="example2_info">
                <thead class="bg-shadow bg-primary">
                  <tr>
                    <th width="5%">No</th>
                    <th>Nama Provinsi</th>
                    <th>Nama Kabupaten</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>     
                  <?php
                    //print_r($kabupaten);
                    $no = $this->uri->segment('3') + 1;
                    foreach ($provinsi as $key){?>
                  <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><?php echo $key->nama_provinsi;?></td>
                    <td>
                      <?php
                          foreach ($kabupaten as $key2) {
                              if ($key->id_provinsi == $key2->id_provinsi) {
                                  echo "- ".$key2->nama_kabupaten."<br>"."<br>";
                              }
                          }
                      ?>
                    </td>
                    <td>
                      <?php
                      foreach ($kabupaten as $key2) {
                              if ($key->id_provinsi == $key2->id_provinsi) {
                      ?>
                      <center>
                        <button class="btn btn-warning btn-xs" type="button" onclick="edit_kabupaten(<?php echo $key2->id_kabupaten;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                        <button class="btn btn-danger btn-xs" onclick="delete_kabupaten(<?php echo $key2->id_kabupaten;?>)"><i class="glyphicon glyphicon-remove"></i></button>
                      </center><br>
                      <?php
                                  }
                          }
                      ?>
                    </td>
                  </tr>
                  <?php $no++;
                  $tambah = $no;
                }?>
                  <tr>
                    <form action="<?php echo base_url(). 'admin/C_kabupaten/insert'; ?>" method="post">
                    <td>
                      <input type="text" name="id_kabupaten" id="id_kabupaten" hidden="true">
                    </td>
                    <td>
                       <div class="form-group has-success has-feedback">
                          <select class="form-control" id="pilih_provinsi" name="pilih_provinsi">
                            <option>--- Pilih Provinsi ---</option>
                          </select>
                        </div>
                    </td>
                    <td>
                      <div class="form-group has-feedback" id="for_prov">
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama_kabupaten" id="nama_kabupaten" placeholder="Masukan Nama Kabupaten">
                        </div>
                         <label class="col-sm-2 control-label"><p id="error_provinsi"></p></label>
                      </div>
                    </td>
                    <td>
                      <center>
                      <button class="btn btn-success btn-sm" id="plus_kabupaten" type="button"><i class="fa fa-save"></i> Simpan Data</button>
                      </center>
                    </td>
                  </form>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group has-success has-feedback">
              <select class="form-control" id="pilih">
                <option value="10">Pilih Tampilkan Data</option>
                <option value="10">Tampilkan 10 Data</option>
                <option value="50">Tampilkan 50 Data</option>
                <option value="100">Tampilkan 100 Data</option>
                <option value="500">Tampilkan 500 Data</option>
                <option value="600">Tampilkan Semua Data</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer">
        Footer here
      </div>
    </div>
  </section>
</div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
      $(document).ready(function() {
     get_provinsi(); 
    });

    function get_provinsi() {
      $.ajax({
        url : "<?php echo site_url('admin/c_kabupaten/get_provinsi')?>",
        type: "POST",
        dataType: "JSON",
        success: function(data)
        { 
            var obj = Object.values(data);
            $.each(obj, function (index, value) {
                $("#pilih_provinsi").append('<option value='+value['ideprov']+'>'+value['namaprov']+'</option>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    }

    $("#plus_kabupaten").click(function(){
        var formData = {'pilih_provinsi': $("#pilih_provinsi").val(),'nama_kabupaten': $("#nama_kabupaten").val(),'id_kabupaten': $("#id_kabupaten").val()};

        var url;
        var id = $("#id_kabupaten").val();

        if(id == "")
        {
              url = "<?php echo site_url('admin/c_kabupaten/insert')?>";
        }else
        {
            url = "<?php echo site_url('admin/c_kabupaten/update')?>";
        }

        $.ajax({
        url : url,
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        {
            if (data=='success') {
                document.location.href = "<?php echo base_url(); ?>admin/c_kabupaten";
            }else{
              $("#for_prov").addClass("has-error");
              $("#nama_kabupaten").attr("placeholder", data).placeholder();
              $("#nama_kabupaten").val(data);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {    
            $("#for_prov").addClass("has-error");
            $("#nama_kabupaten").attr("placeholder", data).placeholder();
            $("#nama_kabupaten").val(data);
        }
      });
    });


   function edit_kabupaten(id)
      {
        var formData = {'id_kabupaten': id};

        $.ajax({
        url : "<?php echo site_url('admin/c_kabupaten/select_kabupaten')?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
          $("#id_kabupaten").val(data.id_kabupaten);
          $("#nama_kabupaten").val(data.nama_kabupaten);
          $("#pilih_provinsi").val(data.id_provinsi);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    }

    function delete_kabupaten(id)
      {
        var formData = {'id_kabupaten': id};

        $.ajax({
        url : "<?php echo site_url('admin/c_kabupaten/delete_kabupaten')?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
          if (data=='success') {
                document.location.href = "<?php echo base_url(); ?>admin/c_kabupaten";
            }else{
              $("#for_prov").addClass("has-error");
              $("#nama_kabupaten").attr("placeholder", data).placeholder();
              $("#nama_kabupaten").val(data);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    }

    $("#pilih").on('change', function() {
        var formData = {'page': this.value};

        $.ajax({
        url : "<?php echo site_url('admin/c_kabupaten/get_value')?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
          document.location.href = "<?php echo base_url(); ?>admin/c_kabupaten/reload/"+data;
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    })

    $( "#cari_nama" ).on( "keydown", function(event) {
      if(event.which == 13){
         var formData = {'page': this.value};
          $.ajax({
            url : "<?php echo site_url('admin/c_kabupaten/get_value')?>",
            type: "POST",
            data: formData,
            dataType: "JSON",
            success: function(data)
            { 
              document.location.href = "<?php echo base_url(); ?>admin/c_kabupaten/view_nama/"+data;
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log(textStatus);
            }
        });
      }
    });

</script>