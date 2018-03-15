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
                $("#pilih_provinsi").append('<option value='+value['id_provinsi']+'>'+value['nama_provinsi']+'</option>');
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(textStatus);
        }
      });
    }