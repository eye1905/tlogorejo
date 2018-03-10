<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    
    });

  $("#plus_provinsi").click(function(){
        var formData = {'provinsi': $("#nama_provinsi").val(),'id_provinsi': $("#id_provinsi").val()};
        var url;
        var id = $("#id_provinsi").val();

        if(id == "")
        {
              url = "<?php echo site_url('admin/c_kota/simpan_provinsi')?>";
        }else
        {
            url = "<?php echo site_url('admin/c_kota/update_provinsi')?>";
        }

        $.ajax({
        url : url,
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        {
            if (data=='success') {
                document.location.href = "<?php echo base_url(); ?>admin/c_kota";
            }else{
              $("#for_prov").addClass("has-error");
              $("#nama_provinsi").attr("placeholder", data).placeholder();
              $("#nama_provinsi").val(data);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {    
            $("#for_prov").addClass("has-error");
            $("#nama_provinsi").attr("placeholder", textStatus).placeholder();
            $("#nama_provinsi").val(data);
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

</script>