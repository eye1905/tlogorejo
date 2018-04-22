<style>
.w3-half {height:20px; }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <center><h3 class="box-title"><b>Setting Website</b></h3></center>
      </div>
      <div class="box-body">
        <div class="row">
          <div class="col-sm-12">
           
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-group has-success has-feedback">
                <div class="form-group has-feedback" id="form_nama" style="margin-left: 30px; width: 93%">
                  <input type="hidden"  id="id" value="0" />
                  <input type="text"  class="form-control" id="Nama" placeholder="Masukan Nama Setting" /><br>
                  <textarea class="form-control" id="deskripsi"></textarea><br>
                  <input type="text"  class="form-control" id="alamat" placeholder="Masukan Alamat Setting" /><br>
                  <input type="text"  class="form-control" id="telp" placeholder="Masukan Telp Setting" /><br>
                  <input type="email"  class="form-control" id="email" placeholder="Masukan Email Setting" /><br>
                  <input type="text"  class="form-control" id="wa" placeholder="Masukan Whatsapp Setting" /><br>
                  <input type="text"  class="form-control" id="twitter" placeholder="Masukan Twitter Setting" /><br>
                  <input type="text"  class="form-control" id="fb" placeholder="Masukan Facebook Setting" /><br>
                  <input type="text"  class="form-control" id="ig" placeholder="Masukan Instagram Setting" /><br>
                  <input type="text"  class="form-control" id="google" placeholder="Masukan Google Plus Setting" /><br>
                  <input type="text"  class="form-control" id="linkedin" placeholder="Masukan Linkedin Setting" /><br>
                  <button class="btn btn-lg btn-primary" type="button" id="save">SIMPAN</button>
                </div>
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

$("#save").on('click', function() {
      var formData = {'id': $("#id").val(), 
      'Nama': $("#Nama").val(), 
      'deskripsi': $("#deskripsi").val(), 
      'alamat': $("#alamat").val(),
      'telp': $("#telp").val(), 
      'email': $("#email").val(),
      'wa': $("#wa").val(),
      'twitter': $("#twitter").val(),
      'fb': $("#fb").val(),
      'ig': $("#ig").val(),
      'google': $("#google").val(),
      'linkedin': $("#linkedin").val()};

      var url;
      if($("#id").val() == "0")
      {
          url = "<?php echo site_url('admin/C_setting/save')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/C_setting/update')?>";
      }

      $.ajax({
        url : url,
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        { 
          if (data=="success") {
            document.location.href = "<?php echo site_url('admin/C_setting')?>";
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
        url : "<?php echo site_url('admin/C_setting/select')?>/" + id,
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
    }
</script>