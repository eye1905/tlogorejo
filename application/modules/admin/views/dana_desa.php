<style>
.w3-half {height:20px; }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <center><h3 class="box-title"><b>Dana Masuk</b></h3></center>
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
                    <th><center>Jumlah (Nominal)</center></th>
                    <th><center>Penerima</center></th>
                    <th><center>Keterangan</center></th>
                    <th><center>Aksi</center></th>
                  </tr>
                </thead>
                <tbody> 
                  <?php 
                  $no = 0;
                  foreach ($dana as $key => $value) {$no++; ?>
                    <tr>
                      <td><center><?php echo $no; ?></center></td>
                      <td><center><?php 
                        foreach ($sumber as $key => $value2) {
                                if ($value->id_sumberdana==$value2->id_sumber) {
                                    echo $value2->nama_sumber;
                                }
                          } ?></center>
                      </td>
                      <td><center><?php echo $this->rupiah->rupiah_kurs($value->jumlah); ?></center></td>
                      <td>
                        <center><?php 
                        foreach ($stuktur as $key => $value2) {
                                if ($value->id_user==$value2->id) {
                                    echo $value2->nama;
                                }
                          } ?></center>
                      </td>
                      <td><?php echo $value->keterangan; ?></td>
                      <td>
                        <center><button class="btn btn-info" onclick="edit_role(<?= $value->id; ?>)">Update</button> 
                        <button class="btn btn-danger" onclick="delete_role(<?= $value->id; ?>)"">Delete</button></center>
                      </td>
                    </tr>
                  <?php $sisa = $no+1;}?>
                    <tr>
                    <td><center><?php echo $sisa; ?><input type="hidden" id="id_dana" value="0" /></center></td>
                    <td>
                      <div class="form-group has-feedback" id="form_nama">
                      <select class="form-control" id="sumberdana">
                        <?php
                      foreach ($sumber as $key => $value) {;
                      ?>
                        <option value="<?php echo $value->id_sumber; ?>"><?php echo $value->nama_sumber; ?></option>
                      <?php } ?>
                      </select>
                      </div>
                      </td>
                      <td>
                        <div class="form-group has-feedback" id="form_nama">
                          <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Masukan Jumlah Dana">
                        </div>
                      </td>
                    <td>
                       <div class="form-group has-feedback" id="form_nama">
                      <select class="form-control" id="nama_struktur">
                        <?php
                      foreach ($stuktur as $key => $value) {;
                      ?>
                        <option value="<?php echo $value->id; ?>"><?php echo $value->nama; ?></option>
                      <?php } ?>
                      </select>
                      </div>
                    </td>
                    <td>
                      <div class="form-group has-feedback" id="form_nama">
                        <textarea class="form-control" id="keterangandana"></textarea>
                      </div>
                    </td>
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
      var formData = {'sumberdana': $("#sumberdana").val(), 'nominal': $("#nominal").val(), 'nama_struktur': $("#nama_struktur").val(), 'keterangandana': $("#keterangandana").val(), 'id_dana': $("#id_dana").val()};

      var url;
      if($("#id_dana").val() == "0")
      {
          url = "<?php echo site_url('admin/C_dana/save')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/C_dana/update')?>";
      }

      $.ajax({
        url : url,
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
          if (data=="success") {
            document.location.href = "<?php echo site_url('admin/C_dana')?>";
          } else{
            $("#form_nama").addClass("has-error");
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
        url : "<?php echo site_url('admin/C_dana/select_dana')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          $("#id_dana").val(data.id);
          $("#sumberdana").val(data.id_sumberdana);
          $("#nama_struktur").val(data.id_user);
          $("#nominal").val(data.jumlah);
          $("#keterangandana").val(data.keterangan);
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
        url : "<?php echo site_url('admin/C_dana/delete_dana')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          document.location.href = "<?php echo site_url('admin/C_dana')?>";
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(jqXHR);
        }
    });
    }
</script>