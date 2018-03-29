<style>
.w3-half {height:20px; }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <center><h3 class="box-title"><b>List Sumber Dana</b></h3></center>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive" id="tabel">
              <table id="example2" class="table table-hover" role="grid" aria-describedby="example2_info">
                <thead class="bg-shadow bg-primary">
                  <tr>
                    <th width="3%" style="padding-left: 10pt">Nomor</th>
                    <th width="30%"><center>Sumber Dana</center></th>
                    <th><center>Waktu Update</center></th>
                    <th><center>Aksi</center></th>
                  </tr>
                </thead>
                <tbody> 
                  <?php 
                  $no = 0;
                  foreach ($sumber as $key => $value) {$no++; ?>
                    <tr>
                      <td><center><?php echo $no; ?></center></td>
                      <td><center><?php echo $value->nama_sumber; ?></center></td>
                      <td><center><?php echo $value->log_time; ?></center></td>
                      <td>
                        <center><button class="btn btn-info" onclick="edit_role(<?= $value->id_sumber; ?>)">Update</button> 
                        <button class="btn btn-danger" onclick="delete_role(<?= $value->id_sumber; ?>)"">Delete</button></center>
                      </td>
                    </tr>
                  <?php $sisa = $no+1;}?>
                    <tr>
                    <td><center><?php echo $sisa; ?><input type="hidden" id="id_role" value="0" /></center></td>
                    <td>
                      <div class="form-group has-feedback" id="form_nama">
                      <input type="text"  class="form-control" id="Nama" placeholder="Masukan Sumber Dana" />
                      </div>
                      </td>
                    <td></td>
                    <td><center><button class="btn btn-success" id="Simpan">Simpan</button></center></td> 
                    </tr>                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="form-group has-success has-feedback">
              
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer">

      </div>
    </div>
  </section>
</div>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript"> 
  $(document).ready( function () {
      var save_method;
    } ); 

$("#Simpan").on('click', function() {
      var formData = {'Nama': $("#Nama").val(), 'Id': $("#id_role").val()};

      var url;
      if($("#id_role").val() == "0")
      {
          url = "<?php echo site_url('admin/C_sumber/save')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/C_sumber/update')?>";
      }

      $.ajax({
        url : url,
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
          if (data=="success") {
            document.location.href = "<?php echo site_url('admin/C_sumber')?>";
          } else{
            $("#form_nama").addClass("has-error");
            $("#Nama").val(data);            
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    });

 function edit_role(id)
    {
      $.ajax({
        url : "<?php echo site_url('admin/C_sumber/select_sumber')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $("#id_role").val(data.id_sumber);
          $("#Nama").val(data.nama_sumber);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('error'+textStatus);
        }
    });
    }

  function delete_role(id)
    {
      $.ajax({
        url : "<?php echo site_url('admin/C_sumber/delete_sumber')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          document.location.href = "<?php echo site_url('admin/C_sumber')?>";
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(jqXHR);
        }
    });
    }
</script>