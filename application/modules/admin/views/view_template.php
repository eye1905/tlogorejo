<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/MyStyle.min.css') ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/skin-black.min.css') ?>">

  <!-- Customize CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/custom/admin-styles.css') ?>">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato" />

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>'</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Jack's</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs" style="color: #0093E1; font-weight: bold;">Abdul Rozak</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">

                <p>
                  Abdul Rozak
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-primary btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-primary btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">
          <div class="sidebar-user">
            <div class="pull-left info">
              <p>Abdul Rozak R</p>
              <a href="#">Google inc.</a>
            </div>
          </div>
        </li>
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="#"><i class="fa fa-calendar"></i> <span>Menu 1</span></a></li>
        <li><a href="#"><i class="fa fa-video-camera"></i> <span>Menu 2</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
          	<span class="pull-right-container">
            	<i class="fa fa-angle-left pull-right"></i>
          	</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section> -->
    <section class="content-header">
      <div class="title-header">
        <h4>
          <span class="color-primary bold">1/3</span>&nbsp
          Choose the model you want
        </h4>
      </div>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box-layout">
        <div class="row">

          <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="small-box bg-aqua">
              <div class="inner">
                <span class="fa fa-calendar"></span>
                <h4 style="font-weight: bold;">Konten 1</h4>
                <p>Deskripsi konten</p>
                <a href="" class="btn btn-primary btn-md btn-rounded">Detail</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="small-box bg-aqua">
              <div class="inner">
                <span class="fa fa-video-camera"></span>
                <h4 style="font-weight: bold;">Konten 2</h4>
                <p>Deskripsi Konten</p>
                <a href="" class="btn btn-primary btn-md btn-rounded">Detail</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="small-box bg-aqua">
              <div class="inner">
                <span class="fa fa-calendar"></span>
                <h4 style="font-weight: bold;">Konten 3</h4>
                <p>Deskripsi Konten</p>
                <a href="" class="btn btn-primary btn-md btn-rounded">Detail</a>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/adminlte/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/adminlte/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>