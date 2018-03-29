<style type="text/css">
  .th{
    text-align: center !important;
  }
  .table{
    margin-top: 10pt;
  }
  #foto_view{
    width: 100%;
    height: 100%;
  }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <center><h3 class="box-title"><b>List Struktur Organisasi</b></h3></center>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-4" style="margin-right: 10pt">
               <!-- <div class="input-group">
                <span class="input-group-addon" style="background-color: #337ab7; color: #fff;"><i class="glyphicon glyphicon-search"></i></span>
              <input type="text" class="form-control" id="cari_nama" placeholder="Ketikan Nama" name="cari_nama">
            </div> -->
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive" id="tabel">
              <table id="example2" class="table table-hover" role="grid" aria-describedby="example2_info">
                <thead class="bg-shadow bg-primary">
                  <tr>
                    <th width="3%">No</th>
                    <th width="18%">Jabatan</th>
                    <th width="18%">Nama Pejabat</th>
                    <th width="2%">Foto</th>
                    <th width="20%"><center>Parent Id</center></th>
                    <th><center>Aksi</center></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($struktur as $key => $value) {?>
                <tr>
                  <td><?= $value->id; ?></td>
                  <td><?= $value->Jabatan; ?></td>
                  <td><?= $value->nama; ?></td>
                  <td><span class="btn glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#myModal" onclick="view_foto(<?php echo $value->id;?>)"></span></td>
                  <td><center><?= $value->id_role; ?></center></td>
                  <td><center><button class="btn btn-sm btn-primary" onclick="edit_data(<?php echo $value->id;?>)">Update</button>
                    <button class="btn btn-sm btn-danger" onclick="hapus_data(<?php echo $value->id;?>)">Delete</button></center></td>
                </tr> 
                <?php $sisa = $no+1;} ?>
                  <tr>
                  <td><center><?php echo $sisa; ?><input type="hidden" id="id_jabat" value="0" /></center></td>
                  <td>
                    <div class="form-group has-feedback" id="form_jabatan">
                    <input type="text"  class="form-control" id="Jabatan" placeholder="Masukan Jabatan" />
                    </div>
                    </td>
                  <td>
                    <div class="form-group has-feedback" id="form_nama">
                    <input type="text"  class="form-control" id="Nama" placeholder="Masukan Nama" />
                    </div>
                  </td>
                  <td><input type="file" id="Foto"/></td>
                   <td>
                    <div class="form-group has-feedback" id="form_child">
                    <input type="number"  class="form-control" id="child" placeholder="Masukan Parent Id" />
                    </div>
                    </td>
                  <td><center><button class="btn btn-success" id="Simpan">Simpan</button></center></td> 
                  </tr>                   
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="box-footer">
<!--         Footer here -->
      </div>
    </div>
  </section>
</div>


<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
     //
    });
    var poto;

    function view_foto(id) {
      $.ajax({
        url : "<?php echo site_url('admin/C_list_struktur/select_foto')?>/"+ id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        { 
            $("#foto_view").attr("src", data);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(textStatus);
        }
      });
    }

    function edit_data(id) {
       $.ajax({
        url : "<?php echo site_url('admin/C_list_struktur/select_data')?>/"+ id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        { 
          poto = data.foto;
          $("#id_jabat").val(data.id);
          $("#Jabatan").val(data.Jabatan);
          $("#Nama").val(data.nama);
          $("#child").val(data.id_role);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(textStatus);
        }
      });        
    }

    function hapus_data(id) {
      $.ajax({
        url : "<?php echo site_url('admin/C_list_struktur/delete_data')?>/"+ id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        { 
          if (data=="success") {
            document.location.href = "<?php echo site_url('admin/C_list_struktur')?>";
          } else{
            alert(data);
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(textStatus);
        }
      });        
    }

    $("#Simpan").on('click', function() {
      var ide = $("#id_jabat").val();
      var Jabatan = $("#Jabatan").val();
      var Nama = $("#Nama").val();
      var Child = $("#child").val();
      var foto = $("#Foto").val();
      var file_asli = poto;
      var file_data = $('#Foto').prop('files')[0];
      var form_data = new FormData();

      form_data.append('ide', ide);
      form_data.append('Jabatan', Jabatan);
      form_data.append('Nama', Nama);
      form_data.append('child', Child);
      form_data.append('foto', foto);
      form_data.append('file_asli', file_asli);
      form_data.append('file', file_data);

      var url;
      if($("#id_jabat").val() == "0")
      {
          url = "<?php echo site_url('admin/C_list_struktur/insert')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/C_list_struktur/update')?>";
      }

      $.ajax({
        url : url,
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        dataType: "JSON",
        success: function(data)
        { 
          if (data=="success") {
            document.location.href = "<?php echo site_url('admin/C_list_struktur')?>";
          } else{
            $("#form_jabatan").addClass("has-error");
            $("#form_nama").addClass("has-error");
            $("#form_child").addClass("has-error");
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(textStatus);
        }
      });
    });
</script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="headfoto"></h4>
        </div>
        <div class="modal-body">
          <center><img src="" id="foto_view"></center>
        </div>
      </div>
    </div>
  </div>