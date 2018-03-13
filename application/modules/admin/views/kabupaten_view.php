<style type="text/css">
  .th{
    text-align: center;
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
               <span class="input-group-addon" style="background-color: #b4b4b4"><i class="glyphicon glyphicon-search"></i></span>
              <input type="text" class="form-control" id="cari_nama" placeholder="Ketikan Nama" name="cari_nama">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
              <thead style="background-color: #DCDCDC">
                <tr role="row">
                  <th class="sorting_asc th" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" width="10%">
                    <center>No</center></th>
                    <th class="sorting th" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" width="40%">Nama Provinsi</th>
                  <th class="sorting th" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" width="50%">Nama Kabupaten</th>
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
                  <td>
                    <input type="text" name="id_kabupaten" id="id_kabupaten" hidden="true">
                  </td>
                  <td>
                     <div class="form-group has-success has-feedback">
                        <select class="form-control" id="pilih_provinsi">
                          <option value="0">--- Pilih Provinsi ---</option>
                        </select>
                      </div>
                  </td>
                  <td>
                    <div class="form-group has-feedback" id="for_prov">
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kabupaten" placeholder="Masukan Nama Kabupaten">
                      </div>
                       <label class="col-sm-2 control-label"><p id="error_provinsi"></p></label>
                    </div>
                  </td>
                  <td>
                    <center>
                    <button class="btn btn-success btn-sm" id="plus_provinsi" type="button">
                    Simpan Data</button></center>
                  </td>
                </tr>
              </tbody>
            </table>
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

  $("#plus_provinsi").click(function(){
        var formData = {'kabupaten': $("#nama_kabupaten").val(),
                        'id_kabupaten': $("#id_provinsi").val(),
                        'id_provinsi': $("#pilih_provinsi").val()
                          };
        var url;
        var id = $("#id_kabupaten").val();

        if(id == "")
        {
              url = "<?php echo site_url('admin/c_kota/simpan_kabupaten')?>";
        }else
        {
            url = "<?php echo site_url('admin/c_kota/update_kabupaten')?>";
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
            $("#nama_kabupaten").attr("placeholder", textStatus).placeholder();
            $("#nama_kabupaten").val(data);
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

    $("#pilih").on('change', function() {
        var formData = {'page': this.value};

        $.ajax({
        url : "<?php echo site_url('admin/c_kota/get_value')?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
          document.location.href = "<?php echo base_url(); ?>admin/c_kota/reload/"+data;
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    })

    function get_provinsi() {
      $.ajax({
        url : "<?php echo site_url('admin/c_kabupaten/get_provinsi')?>",
        type: "POST",
        dataType: "JSON",
        success: function(data)
        { 
            var obj = Object.values(data);
            $.each(obj, function (index, value) {
                $("#pilih_provinsi").append('<option value='+value['id_provinsi']+'>'+value['nama_provinsi']+'</option>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    }
</script>