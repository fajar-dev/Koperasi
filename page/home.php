<?php 
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    die();
}
require '../koneksi.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Home</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-auto">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
      <h3 class="brand-text font-weight-bold">Koperasi BMT</h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ucwords($_SESSION['nama']); ?></a>
        </div>
      </div>
      <!--side-->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
            if ($_SESSION['level']==2) {
              echo '
              <li class="nav-item has-treeview menu-open">
              <a href="home.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  DASHBOARD
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="nasabah.php" class="nav-link">
                <i class="fa fa-users"></i>
                <p>
                  NASABAH
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="laporan.php" class="nav-link">
                <i class="fa fa-file"></i>
                <p>
                  PELAPORAN
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../logout.php" class="nav-link">
                <i class="fa fa-sign-out"></i>
                <p>
                  LOGOUT
                </p>
              </a>
            </li>  
              ';
            } else {
              echo '
              <li class="nav-item has-treeview menu-open">
                  <a href="home.php" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      DASHBOARD
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="masuk.php" class="nav-link">
                    <i class="fa fa-institution"></i>
                    <p>
                      SETOR
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="keluar.php" class="nav-link">
                    <i class="fa fa-cart-arrow-down"></i>
                    <p>
                      TARIK
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="rekap.php" class="nav-link">
                    <i class="fa fa-pie-chart"></i>
                    <p>
                      MUTASI SALDO
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../logout.php" class="nav-link">
                    <i class="fa fa-sign-out"></i>
                    <p>
                      LOGOUT
                    </p>
                  </a>
                </li>  
              ';
            }
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php 
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    die();
}
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$id_user = $_SESSION['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM kas WHERE id_user = '$id_user'");
while($data=mysqli_fetch_assoc($sql)) {

    $jml = $data['masuk'];
    $total_masuk = $total_masuk+$jml;

    $jml_keluar = $data['keluar'];
    $total_keluar = $total_keluar+$jml_keluar;

    $total = $total_masuk-$total_keluar;
}
?>
    <!-- Main content -->

          <?php
            if ($_SESSION['level']==2) {
              echo '';
            }else{
              echo '';
            }
          ?>

    <div class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <?php
            if ($_SESSION['level']==2) {
              echo '
              
              ';
            }else{
              echo '
                  <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-shopping-bag"></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Setor</span>
                      <span class="info-box-number">'.number_format($total_masuk).',-</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></i></span>
      
                    <div class="info-box-content">
                      <span class="info-box-text">Total Tarik</span>
                      <span class="info-box-number">'.number_format($total_keluar).',-</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                      <span class="info-box-icon bg-success elevation-1"><i class="fa fa-pie-chart"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">Saldo</span>
                        <span class="info-box-number">'.number_format($total).'-</span>
                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
              ';
            }
          ?>
          

          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->  
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
