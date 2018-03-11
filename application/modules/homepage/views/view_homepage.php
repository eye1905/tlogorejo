<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tlogorejo Homepage</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/bootstrap4.0/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/custom/half-slider.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/custom/my-styles.css') ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgba(0, 0, 0, 0.5);">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img class="my-logo" style="height: 32px; padding: 0;" src="<?php echo base_url('assets/img/tlogorejo-dua.png') ?>"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Beranda
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Berita</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Layanan
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Link 1</a>
                <a class="dropdown-item" href="#">Link 2</a>
                <a class="dropdown-item" href="#">Link 3</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Monografi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Struktur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Transparasi Dana</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Dasar Hukum</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('http://fauzianooralifa.student.umm.ac.id/wp-content/uploads/sites/20072/2016/06/399681_351110728239526_100000218056361_1541922_720239831_n.jpg')">
            <div class="carousel-caption">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('https://wisatabojonegoro.com/wp-content/uploads/2017/05/1-227.jpg')">
            <div class="carousel-caption">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo base_url('assets/img/mountains1.jpg') ?>')">
            <div class="carousel-caption">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <section class="py-5 bg-light" id="content-news">
      <div class="container">
        <div class="title-section text-center" style="padding-bottom: 20px;">
          <h3>Tlogorejo News</h3>
          <p class="text-muted mb-2">Dapatkan informasi terbaru tentang berita dan artikel seputar Desa Tlogorejo, Kabupaten Bojonegoro</p>
        </div>
        <div class="row">

          <?php for($i=1; $i < 4; $i++){ ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
              <div class="card mb-4">
                <div class="card-wrapper">
                  <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22245%22%20height%3D%22160%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20245%20160%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16203b851fc%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A12pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16203b851fc%22%3E%3Crect%20width%3D%22245%22%20height%3D%22160%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2291.7578125%22%20y%3D%2285.1%22%3E245x160%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">  
                </div>
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  <a href="#" class="btn btn-md btn-info btn-shadow">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
          <?php } ?>

        </div>
        <div class="footer-section text-center">
          <a href="#" class="btn btn-md btn-info btn-shadow">Lihat Selengkapnya</a>
        </div>
      </div>
    </section>

    <!-- Page Content Layanan -->
    <section class="py-5" id="layanan">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h3 class="section-heading">Layanan</h3>
            <p class="text-muted mb-2">Layanan yang ada di Desa Tlogorejo</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">

        <?php for($i = 0; $i < 7; $i++){ ?>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
              <h5 class="mb-3">Nama Lembaga</h5>
              <p class="text-muted mb-0">Our templates are updated regularly so they don't break.</p>
              <a href="">DETAIL</a>
            </div>
          </div>
        <?php } ?>

        </div>
      </div>
    </section>
    <!-- / Page Content Layanan -->

    <!-- Footer -->
    <footer class="py-3 footer bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="#" style="color: #6c757d;">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#" style="color: #6c757d;">Contact</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#" style="color: #6c757d;">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#" style="color: #6c757d;">Privacy Policy</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; TLOGOREJO 2018. All Rights Reserved.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-twitter fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url('assets/bootstrap4.0/js/jquery-3.2.1.slim.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap4.0/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap4.0/js/bootstrap.min.js') ?>"></script>
  </body>

</html>
