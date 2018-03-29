<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Berita Tlogorejo</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets')?>/img/favicon.png" rel="icon">
  <link href="<?php echo base_url('assets')?>/img/apple-touch-icon.png" rel="apple-touch-icon">

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

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <a href="#intro"><img src="<?php echo base_url('assets')?>/img/tlogorejo-dua.png" alt="" title="" />
        </a>
        <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a> -->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
        <?php $url = $this->uri->uri_string(); if(($url == 'homepage') || ($url == '')){ ?>
          <li><a href="#intro">Beranda</a></li>
          <li><a href="#featured-berita">Berita</a></li>
          <li><a href="#lembaga">Lembaga</a></li>
          <li><a href="#services">Layanan</a></li>
          <li><a href="#portfolio">Monografi</a></li>
          <li><a href="#team">Struktur</a></li>
          <li><a href="#dana">Transparasi Dana</a></li>
          <li><a href="#hukum">Dasa Hukum</a></li>
        <?php } else if(($url == 'berita')){ ?>
          <li><a href="<?php echo base_url('homepage') ?>">Beranda</a></li>
          <?php if(!empty($kategori)){ ?>
            <?php foreach($kategori as $row){ ?>
            <li><a href="<?php echo site_url('berita/category/'.$row->kategori_slug) ?>"><?php echo $row->kategori_nama ?></a></li>
            <?php } ?>
          <?php } else { ?>
            <li><a href="#">Tidak Ada Menu</a></li>
          <?php } ?>
        <?php } else { ?>
          <li><a href="<?php echo base_url('homepage') ?>">Beranda</a></li>
          <?php if(!empty($kategori)){ ?>
            <?php foreach($kategori as $row){ ?>
            <li><a href="<?php echo site_url('berita/category/'.$row->kategori_slug) ?>"><?php echo $row->kategori_nama ?></a></li>
            <?php } ?>
          <?php } else { ?>
            <li><a href="#">Tidak Ada Menu</a></li>
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

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
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
              Re-design by Abdul Rozak Romadhoni<br><br>
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

</body>
</html>
