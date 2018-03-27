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
        <center><h3 class="box-title"><b>List Struktur Organisasi</b></h3></center>
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
        <div class="row">
          <div class="col-sm-12">
            <div class="table-responsive" id="tabel">
              <table id="example2" class="table table-hover" role="grid" aria-describedby="example2_info">
                <thead class="bg-shadow bg-primary">
                  <tr>
                    <th width="3%">No</th>
                    <th width="20%">Jabatan</th>
                    <th width="20%">Nama Pejabat</th>
                    <th width="2%">Foto</th>
                    <th><center>Parent Id</center></th>
                    <th><center>Aksi</center></th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($struktur as $key => $value) {?>
                <tr>
                  <td><?= $value->id; ?></td>
                  <td><?= $value->Jabatan; ?></td>
                  <td><?= $value->nama; ?></td>
                  <td><span class="btn glyphicon glyphicon-eye-open" onclick="view_foto(<?php echo $value->id;?>)"></span></td>
                  <td><center><?= $value->id_role; ?></center></td>
                  <td><center><button class="btn btn-sm btn-primary" onclick="edit_data(<?php echo $value->id;?>)">Update</button>
                    <button class="btn btn-sm btn-danger" onclick="hapus_data(<?php echo $value->id;?>)">Delete</button></center></td>
                </tr> 
                <?php } ?>
                  <tr>
                  <td><center><?php echo $sisa; ?><input type="hidden" id="id_jabat" value="0" /></center></td>
                  <td><input type="text"  class="form-control" id="Jabatan" placeholder="Masukan Jabatan" /></td>
                  <td><input type="text"  class="form-control" id="Nama" placeholder="Masukan Nama" /></td>
                  <td><input type="file" id="Foto"/></td>
                   <td><input type="number"  class="form-control" id="child" placeholder="Masukan Parent Id" /></td>
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
      get_kabupaten();
    });

    function view_foto(id) {
     alert(id); 
    }

    function edit_data(id) {
       alert(id);     }

    function hapus_data(id) {
      alert(id); 
    }

    $("#Simpan").on('click', function() {
      var formData = {'Jabatan': $("#Jabatan").val(),'Nama': $("#Nama").val(),'Foto': $("#Foto").val(), 
      'child' : $("#child").val()};
      formData : 'files': $('#Foto').prop('files')[0];

      $.ajax({
        url : "<?php echo site_url('admin/C_list_struktur/insert')?>",
        type: "POST",
        data: formData,
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
    });
</script>