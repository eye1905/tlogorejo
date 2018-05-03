<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Desa Tlogorejo</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Meta -->
  <meta property="og:url"           content="<?php echo base_url($this->uri->uri_string()) ?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Desa Tlogorejo" />
  <meta property="og:description"   content="Informasi Website Desa Tlogorejo Terupdate" />
  <meta property="og:image"         content="<?php echo base_url('assets/img/logone.png')?>" />
  <link rel="icon" type="image/png" href="<?php echo base_url('assets')?>/img/logone.png"/>
  <!-- Favicons -->
  <!-- <link rel="icon" href="https://cdn4.iconfinder.com/data/icons/new-google-logo-2015/400/new-google-favicon-512.png" type="image/x-icon" /> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url('assets')?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url('assets')?>/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets')?>/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets')?>/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets')?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets')?>/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url('assets')?>/custom/homepage-style.css" rel="stylesheet">
  <link href="<?php echo base_url('assets')?>/custom/homepage-custom-style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<style type="text/css">
  .card .card-title {
    color: #FFF; 
    border-bottom: 2px solid #007bff; 
    text-transform: uppercase;
  }
  .card .card-title span {
    padding: 3px 15px 3px 15px; 
    background-color: #007bff;
  }
  .card .card-body {
    padding: 0px;
  }

  /* Helper */
  .grey {
    color: #b3b3b3;
  }
</style>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <a href="<?php echo site_url('homepage') ?>"><img src="<?php echo base_url('assets')?>/img/logo.png" alt="" title="" />
        </a>
        <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a> -->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
        <?php $url = $this->uri->uri_string(); if(($url == 'homepage') || ($url == '')){ ?>
          <li><a href="#intro">Beranda</a></li>
          <li><a href="#featured-berita">Berita</a></li>
          <li><a href="#clients">Lembaga</a></li>
          <!-- <li><a href="#services">Layanan</a></li> -->
          <li><a href="#portfolio">Monografi</a></li>
          <li><a href="#dana">Transparasi Dana</a></li>
          <li><a href="#team">Struktur</a></li>
          <li><a href="#hukum">Dasa Hukum</a></li>
        <?php } else if(($url == 'berita')){ ?>
          <!-- <li><a href="<?php echo base_url('homepage') ?>">Beranda</a></li> -->
          <?php if(!empty($kategori)){ ?>
            <?php foreach($kategori as $row){ ?>
            <li><a href="<?php echo site_url('berita/category/'.$row->kategori_slug) ?>"><?php echo $row->kategori_nama ?></a></li>
            <?php } ?>
          <?php } else { ?>
            <li><a href="#"></a></li>
          <?php } ?>
        <?php } else if($this->uri->segment(1) == 'lembaga'){ ?>
          <?php foreach($navigasi as $row): ?>
          <li><a href="<?php echo site_url('lembaga/r/'.$row->lembaga_slug) ?>"><?php echo $row->lembaga_nama ?></a></li>
          <?php endforeach; ?>
        <?php } else { ?>
          <!-- <li><a href="<?php echo base_url('homepage') ?>">Beranda</a></li> -->
          <?php if(!empty($kategori)){ ?>
            <?php foreach($kategori as $row){ ?>
            <li><a href="<?php echo site_url('berita/category/'.$row->kategori_slug) ?>"><?php echo $row->kategori_nama ?></a></li>
            <?php } ?>
          <?php } else { ?>
            <li><a href="#"></a></li>
          <?php } ?>
        <?php } ?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <?= $contents ?>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6 footer-info">
            <h3>Tlogorejo</h3>
             <p><strong>Tlogorejo</strong> - Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Kontak Kami</h4>
            <p>
              A108 Adam Street <br>
              Bojonegoro, 62xxx<br>
              Indonesia <br>
              <strong>Telepon:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>

            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-contact">
            <h4>Peta</h4>
            <iframe style="width: 100%; height: 100%;" 
              frameborder="0" style="border:0"
              src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC914FmbenKdXJx9HXOkDdC_yEBLIhUypI
                &q=Tlogorejo,+Kepoh+Baru,+Kabupaten+Bojonegoro,+Jawa+Timur" allowfullscreen>
            </iframe>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <div class="copyright">
              2018 &copy; Copyright <strong>Tlogorejo</strong>. All Rights Reserved
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
              -->
              <div style="color: #333333;">
                Best <a href="https://bootstrapmade.com/" style="color: #333333">Bootstrap Templates</a> by BootstrapMade
              </div>
            </div>
          </div>
        </div>
      </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url('assets')?>/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/easing/easing.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/superfish/superfish.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/wow/wow.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/waypoints/waypoints.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/counterup/counterup.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?php echo base_url('assets')?>/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url('assets')?>/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url('assets')?>/js/main.js"></script>

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

</body>
</html>
