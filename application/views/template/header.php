<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $judul ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="logoadhesidev.png" rel="icon">
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <script src="<?= base_url('template/admin') ?>/bower_components/jquery/jquery-1.11.2.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php
    //error_reporting(0);
    if ($this->session->userdata('level') == "admin") {
      $id  = $this->session->userdata('id_admin');
      $data = $this->db->get_where('admin', array('id_admin' => $id))->row_array();
    } elseif ($this->session->userdata('level') == "user") {
      $id  = $this->session->userdata('id_pegawai');
      $data = $this->db->get_where('pegawai', array('id_pegawai' => $id))->row_array();
    }
    ?>

    <header class="main-header">
      <!-- Logo -->
      <a href="admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>D</b>V</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>AdhesiDev</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <span class="hidden-xs"><?= $data['nama'] ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">

                  <p>
                    <?= $data['nama'] ?>
                    <small><?= isset($data['log']) ? $data['log'] : ""; ?></small>
                  </p>
                </li>

                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url('admin/profil') ?>" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('admin/keluar') ?>" onclick="return(confirm('Anda Akan Keluar Dari Halaman Administrator'))" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <br /><br />
          </div>
          <div class="pull-left info">
            <p><?= ucfirst($data['nama']) ?></p>
            <a href=""><i class="fa fa-circle text-success"></i>Online</a>
          </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>


          <?php if ($this->session->userdata('level') == "admin") { ?>

            <li class="treeview">
              <a href="">
                <i class="fa fa-address-book-o"></i> <span>Data Tentor</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  <script></script>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('tentor') ?>"><i class="fa fa-circle-o"></i>Data Tentor</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="">
                <i class="fa fa-id-card-o"></i> <span>Data Siswa</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('siswa') ?>" class="active"><i class="fa fa-circle-o"></i>Data Siswa</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="">
                <i class="fa fa-clipboard"></i> <span>Kursus</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('kursus') ?>" class="active"><i class="fa fa-circle-o"></i>Data Kursus</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="">
                <i class="fa fa-calendar"></i> <span>Jadwal Bimbingan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('jadwal') ?>" class="active"><i class="fa fa-circle-o"></i>Pilih Jadwal</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="">
                <i class="fa fa-archive"></i> <span>Laporan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('laporan') ?>" class="active"><i class="fa fa-circle-o"></i>Rekap Laporan</a></li>
              </ul>
            </li>
          <?php } ?>
          <li class="header">END MAIN NAVIGATION</li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="box">
            <div class="box-header">
              <center>
                <h3 class="box-title"><i class=""></i></h3>
              </center>
            </div>
            <div class="col-xs-12">