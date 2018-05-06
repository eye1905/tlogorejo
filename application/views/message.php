<?php $pesan = $this->session->flashdata('message'); if(!empty($pesan)){ ?>
<div class="alert alert-info">
  <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
  <?php echo $pesan ?>
</div>
<?php } ?>