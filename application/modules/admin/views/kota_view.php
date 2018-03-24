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
        <center><h3 class="box-title"><b>Data Wilayah</b></h3></center>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-3" style="margin-left: 10pt">
               <select class="form-control" id="pilih_provinsi" name="pilih_provinsi">
                <?php foreach ($provinsi as $value){
                  echo "<option value='$value->id'>PROVINSI $value->name</option>";
                }?>
                </select>
          </div>
          <div class="col-sm-3" style="margin-left: 10pt">
               <select class="form-control" id="pilih_kabupaten" name="pilih_kabupaten">
                
                </select>
          </div>
          <div class="col-sm-4 pull-right" style="margin-right: 10pt">
               <div class="input-group">
                <span class="input-group-addon" style="background-color: #337ab7; color: #fff;"><i class="glyphicon glyphicon-search"></i></span>
              <input type="text" class="form-control" id="cari_nama" placeholder="Ketikan Nama" name="cari_nama">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive" id="tabel">
              <table id="example2" class="table table-hover" role="grid" aria-describedby="example2_info">
                <thead class="bg-shadow bg-primary">
                  <tr>
                    <th width="10%">No</th>
                    <th>Nama Kecamatan</th>
                    <th>Nama Desa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  
                  $no = 0;
                  foreach ($kecamatan as $key) {$no++;?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td width="50%"><?php echo "KECAMATAN ".$key->name; ?></td>
                      <td>
                        <?php
                        foreach ($desa as $key2) {
                            if ($key->id==$key2->district_id) {
                                echo "- ".$key2->name."</br>";
                            }
                        }
                        ?>
                      </td>
                    </tr>
                 <?php }?>                   
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
      get_kabupaten();
    });

    function get_kabupaten() {
       var formData = {'pilih_provinsi': $("#pilih_provinsi").val()};

      $.ajax({
        url : "<?php echo site_url('admin/c_kota/get_kabupaten')?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
            var obj = Object.values(data);
            $.each(obj, function (index, value) {
                $("#pilih_kabupaten").append('<option value='+value['id']+'>'+value['name']+'</option>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    }


    $("#pilih_provinsi").on('change', function() {
      var formData = {'pilih_provinsi': $("#pilih_provinsi").val()};

      $.ajax({
        url : "<?php echo site_url('admin/c_kota/get_kabupaten')?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
            $('#pilih_kabupaten').empty();
            var obj = Object.values(data);
            $.each(obj, function (index, value) {
                $("#pilih_kabupaten").append('<option value='+value['id']+'>'+value['name']+'</option>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    });

    $("#pilih_kabupaten").on('change', function() {
      var formData = {'pilih_kabupaten': $("#pilih_kabupaten").val()};

      $.ajax({
        url : "<?php echo site_url('admin/c_kota/get_kecamatan')?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
           $("#tabel").html(html);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    });
</script>