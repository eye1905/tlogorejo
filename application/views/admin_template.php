<?php $user = $this->ion_auth->user()->row(); ?>
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
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
  <!-- Customize CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/custom/admin-styles.css') ?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- REQUIRED JS SCRIPTS -->
  <!-- jQuery 3 -->
  <script src="<?php echo base_url('assets/adminlte/jquery/dist/jquery.min.js') ?>"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url('assets/adminlte/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
  <!-- CK Editor -->
  <script src="<?php echo base_url('assets/adminlte/ckeditor/ckeditor.js') ?>"></script>
  <!-- DataTables -->
  <script src="<?php echo base_url('assets/adminlte/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/adminlte/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
  <!-- Optionally, you can add Slimscroll and FastClick plugins.
       Both of these plugins are recommended to enhance the
       user experience. -->
  <!-- script -->
</head>

<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.html" class="logo hidden-xs">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dashboard</b></span>
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
              <span class="hidden-xs" style="color: #0093E1; font-weight: bold;"><?php echo $user->first_name; ?> <?php echo $user->last_name ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user->first_name; ?> <?php echo $user->last_name ?>
                  <small>Member since <?php echo date(DATE_RFC1123, $user->created_on) ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-primary btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('admin/logout') ?>" class="btn btn-primary btn-flat">Sign out</a>
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
              <p><?php echo $user->first_name; ?></p>
              <!-- <a href="#">Super Admin</a> -->
            </div>
          </div>
        </li>
        <li class="header">MENU</li>
        <li class="<?php if($this->uri->uri_string() == 'admin') { echo 'active'; } ?>">
          <a href="<?php echo base_url(); ?>admin"><i class="fa fa-home"></i> <span>Beranda</span></a>
        </li>

        <!-- Menu Blog -->
        <li class="treeview
          <?php  
            if($this->uri->uri_string() == 'admin/C_blog'){
              echo 'active';
            } else if($this->uri->uri_string() == 'admin/C_blog/form'){
              echo 'active';
            } else if($this->uri->uri_string() == 'admin/C_blog/edit'){
              echo 'active';
            } else if($this->uri->uri_string() == 'admin/C_blog/recycle_bin'){
              echo 'active';
            }
          ?>">
          <a href="#"><i class="fa fa-newspaper-o"></i> <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->uri_string() == 'admin/C_blog') { echo 'active'; } ?>">
              <a href="<?php echo base_url(); ?>admin/C_blog"><i class="fa fa-circle-o"></i> Artikel</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-comment"></i> Komentar</a>
            </li>
          </ul>
        </li>
        <!-- Menu Blog -->

        <li class="<?php if($this->uri->uri_string() == 'admin/C_slider') { echo 'active'; } ?>">
          <a href="<?php echo base_url(); ?>admin/C_slider"><i class="fa fa-picture-o"></i> <span>Slider</span></a>
        </li>
        <!-- Menu Lembaga -->
        <li class="<?php if($this->uri->uri_string() == 'admin/C_lembaga') { echo 'active'; } ?>">
          <a href="<?php echo base_url(); ?>admin/C_lembaga"><i class="fa fa-circle-o"></i> <span>Lembaga</span></a>
        </li>
        <li class="treeview
          <?php  
            if($this->uri->uri_string() == 'admin/C_struktur'){
              echo 'active';
            }else if($this->uri->uri_string() == 'admin/C_list_struktur'){
               echo 'active';
            }
          ?>">
        <a href="#"><i class="fa fa-sitemap"></i> <span>Struktur</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->uri_string() == 'admin/C_struktur'){ echo 'active'; } ?>">
              <a href="<?php echo base_url(); ?>admin/C_struktur"><i class="fa fa-circle-o"></i>Struktur Organisasi</a>
            </li>
             <li class="<?php if($this->uri->uri_string() == 'admin/C_list_struktur'){ echo 'active'; } ?>">
              <a href="<?php echo base_url(); ?>admin/C_list_struktur"><i class="fa fa-circle-o"></i>List Struktur</a>
            </li>
          </ul>            
        </li>

        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Homepage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-link"></i> Slider</a></li>
            <li><a href="#"><i class="fa fa-link"></i> Lembaga</a></li>
            <li><a href="#"><i class="fa fa-link"></i> Struktur</a></li>
          </ul>
        </li> -->

        <!-- Menu Data Penduduk -->
        <li class="treeview">
          <a href="#"><i class="fa fa-group"></i> <span>Data Penduduk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Data Keluarga</a></li>
            <li><a href="#">Data Penduduk</a></li>
          </ul>
        </li>
        <!-- Menu Data Penduduk -->

        <li class="treeview
          <?php 
            if($this->uri->uri_string() == 'admin/C_dana'){
              echo 'active';
            } else if($this->uri->uri_string() == 'admin/C_sumber'){
              echo 'active';
            }
          ?>">
          <a href="#"><i class="fa fa-bank"></i> <span>Dana Desa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->uri_string() == 'admin/C_dana'){ echo 'active'; } ?>">
              <a href="<?php echo base_url(); ?>admin/C_dana"><i class="fa fa-circle-o"></i>Dana Masuk</a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'admin/C_sumber') { echo 'active'; } ?>">
              <a href="<?php echo base_url(); ?>admin/C_sumber"><i class="fa fa-circle-o"></i>Sumber Dana</a></li>
          </ul>
        </li>
        
        <li class="treeview
          <?php 
            if($this->uri->uri_string() == 'admin/C_kota'){
              echo 'active';
            }
             else if($this->uri->uri_string() == 'admin/C_kategori'){
              echo 'active';
            }

          ?>">
          <a href="#"><i class="fa fa-search"></i> <span>Referensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($this->uri->uri_string() == 'admin/C_kategori'){ echo 'active'; } ?>">
              <a href="<?php echo base_url(); ?>admin/C_kategori"><i class="fa fa-circle-o"></i>Kategori Artikel</a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'admin/c_kota') { echo 'active'; } ?>">
              <a href="<?php echo base_url(); ?>admin/c_kota"><i class="fa fa-circle-o"></i>Data Wilayah</a></li>
          </ul>
        </li>

        <li class="<?php if($this->uri->uri_string() == 'admin/C_user') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/C_user"><i class="fa fa-user"></i> <span>Manajemen User</span></a></li>
        <li class="<?php if($this->uri->uri_string() == 'admin/C_setting') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin/C_setting"><i class="fa fa-gears"></i> <span>Setting</span></a></li>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <?= $contents ?>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <span class="text-muted"></strong>Page rendered in <strong>{elapsed_time}</strong> seconds. </span>
      <!-- <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?> -->
    </div>
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Tlogorejo</a>
  </footer>

</div>
<!-- ./wrapper -->

</body>
</html>