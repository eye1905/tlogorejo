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
                    <th width="30%">Judul</th>
                    <th width="2%">Slider</th>
                    <th width="30%">Deskripsi</th>
                    <th><center>Aksi</center></th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=0; foreach ($struktur as $key => $value) { $no++;?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $value->judul; ?></td>
                  <td><span class="btn glyphicon glyphicon-eye-open" data-toggle="modal" data-target="#myModal" onclick="view_foto(<?php echo $value->id_slider;?>)"></span></td>
                  <td><?= $value->deskripsi; ?></td>
                  <td><center><button class="btn btn-sm btn-info glyphicon glyphicon-pencil" onclick="edit_data(<?php echo $value->id_slider;?>)"></button>
                    <button class="btn btn-sm btn-danger glyphicon glyphicon-remove" onclick="hapus_data(<?php echo $value->id_slider;?>)"></button></center></td>
                </tr> 
                <?php $sisa = $no+1;} ?>
                  <tr>
                  <td><center><?php echo $sisa; ?><input type="hidden" id="id_slider" value="0" /></center></td>
                  <td>
                    <div class="form-group has-feedback" id="form_judul">
                    <input type="text"  class="form-control" id="Judul" placeholder="Masukan Judul" />
                    </div>
                    </td>
                  <td>
                    <div class="form-group has-feedback" id="form_slider">
                    <input type="file" id="Foto"/>
                    </div>
                  </td>
                  <td>
                    <div class="form-group has-feedback" id="form_deskripsi">
                    <textarea class="form-control" id="Deskripsi"></textarea>
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
        url : "<?php echo site_url('admin/C_slider/select_foto')?>/"+ id,
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
        url : "<?php echo site_url('admin/C_slider/select_data')?>/"+ id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        { 
          poto = data.foto;
          $("#id_slider").val(data.id_slider);
          $("#Judul").val(data.judul);
          $("#Deskripsi").val(data.deskripsi);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(textStatus);
        }
      });        
    }

    function hapus_data(id) {
      $.ajax({
        url : "<?php echo site_url('admin/C_slider/delete_data')?>/"+ id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        { 
          if (data=="success") {
            document.location.href = "<?php echo site_url('admin/C_slider')?>";
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
      var ide = $("#id_slider").val();
      var Judul = $("#Judul").val();
      var Deskripsi = $("#Deskripsi").val();
      var foto = $("#Foto").val();
      var file_asli = poto;
      var file_data = $('#Foto').prop('files')[0];
      var form_data = new FormData();

      form_data.append('ide', ide);
      form_data.append('Judul', Judul);
      form_data.append('Deskripsi', Deskripsi);
      form_data.append('foto', foto);
      form_data.append('file_asli', file_asli);
      form_data.append('file', file_data);
      //alert(foto);
      var url;
      if($("#id_slider").val() == "0")
      {
          url = "<?php echo site_url('admin/C_slider/insert')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/C_slider/update')?>";
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
            document.location.href = "<?php echo site_url('admin/C_slider')?>";
          } else{
            $("#form_judul").addClass("has-error");
            $("#form_deskripsi").addClass("has-error");
            $("#form_slider").addClass("has-error");
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