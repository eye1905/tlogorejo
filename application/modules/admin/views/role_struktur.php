<style>
.w3-half {height:20px; }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <center><h3 class="box-title"><b>Role Struktur Organisasi</b></h3></center>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-4" style="margin-right: 10pt">
               <div class="input-group">
                <span class="input-group-addon" style="background-color: #337ab7; color: #fff;"><i class="glyphicon glyphicon-search"></i></span>
              <input type="text" class="form-control" id="cari_nama" placeholder="Ketikan Nama" name="cari_nama">
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive" id="tabel">
              <table id="example2" class="table table-hover" role="grid" aria-describedby="example2_info">
                <thead class="bg-shadow bg-primary">
                  <tr>
                    <th width="10%" style="padding-left: 10pt">No</th>
                    <th><center>Nama Role</center></th>
                    <th><center>Prioritas Role</center></th>
                    <th><center>Warna Label</center></th>
                    <th><center>Aksi</center></th>
                  </tr>
                </thead>
                <tbody> 
                    <?php
                    $no = 0;
                    foreach ($role as $key => $value) {$no++;
                    ?>
                    <tr>
                      <td><center><?php echo $no; ?></center></td>
                      <td><?php echo $value->nama_role; ?></td>
                      <td><?php echo $value->prioritas_role; ?></td>
                      <td><div class="w3-half w3-center" style="background:<?php echo $value->head_color; ?>"></td>
                      <td><center>
                        <button class="btn btn-info btn-sm" id="Edit" onclick="edit_role(<?php echo $value->id_role;?>)">Update</button>  
                        <button class="btn btn-danger btn-sm" id="Edit"  onclick="delete_role(<?php echo $value->id_role;?>)">Delete</button></center></td>
                    </tr>
                    <?php
                      $sisa = $no+1;}
                    ?>
                    <tr>
                    <td><center><?php echo $sisa; ?><input type="hidden" id="id_role" value="0" /></center></td>
                    <td><input type="text"  class="form-control" id="Nama" placeholder="Masukan Nama" /></td>
                    <td>
                      <div>
                        <input type="number"  class="form-control" id="Prioritas" placeholder="Masukan Prioritas" />
                      </div>
                    </td>
                    <td><input type="color"  class="form-control" id="Warna" /></td>
                    <td><center><button class="btn btn-success" id="Simpan">Simpan Role</button></center></td> 
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
      var formData = {'Nama': $("#Nama").val(),'Prioritas': $("#Prioritas").val(),'Warna': $("#Warna").val(), 
      'id_role' : $("#id_role").val()};

      var url;
      if($("#id_role").val() == "0")
      {
          url = "<?php echo site_url('admin/c_role_struktur/save_role')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/c_role_struktur/update_role')?>";
      }

      $.ajax({
        url : url,
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
          if (data=="success") {
            document.location.href = "<?php echo site_url('admin/c_role_struktur')?>";
          } else{
            alert(data);
            /*$("#Nama").val(data);
            $("#Prioritas").val(data);*/
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
        url : "<?php echo site_url('admin/c_role_struktur/select_role')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          //alert(data.head_color);
          $("#id_role").val(data.id_role);
          $("#Nama").val(data.nama_role);
          $("#Prioritas").val(data.prioritas_role);
          $("#Warna").val(data.head_color);
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
        url : "<?php echo site_url('admin/c_role_struktur/delete_role')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          //alert(data);
          document.location.href = "<?php echo site_url('admin/c_role_struktur')?>";
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(jqXHR);
        }
    });
    }
</script>