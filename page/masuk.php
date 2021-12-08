<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    die();
}
require '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Setor</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
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
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="home.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="masuk.php" class="nav-link active">
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
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penyetoran</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Setor</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Penyetoran</h3>
                <button type="button" class="btn bg-gradient-primary pull-right" data-toggle="modal" data-target="#tambah"><li class="fa fa-plus"></li> Tambah Data</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>NO</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                        <?php 
                          $no = 1;
                          $id_user = $_SESSION['id'];
                           $sql = mysqli_query($koneksi, "SELECT * FROM kas WHERE jenis = 'setor' AND id_user = '$id_user' ");
                           while ($data = mysqli_fetch_assoc($sql)) {
                        ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['keterangan']; ?></td>
                    <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                    <td class="text-right"><?php echo number_format($data['masuk']).",-"; ?></td>
                    <td><a href="hapus_masuk.php?id=<?php echo $data['id'];?>"  class="btn btn-danger btn-md btn-del" title="Hapus Data"><i class="fa fa-trash"></i> hapus</a>
                  </tr>
                         <?php 
                         ini_set("display_errors","Off");
                         $total = $total+$data['masuk'];
                         } 
                        ?>
                  </tbody>
                  <tr class="text-center">
                    <td colspan="5" class="font-weight-bold text-red"><p class="pull-left">Total Setor : </p><p class="font-weight-bold pull-right text-red"><?php echo " Rp." . number_format($total).",-"; ?></p></td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <?php 
      include 'modal.php';
       if(isset($_POST['simpan'])) {
         $id = $_POST['id'];
         $tgl = $_POST['tgl'];
         $ket = $_POST['ket'];
         $masuk = $_POST['jml'];
         $sql = mysqli_query($koneksi, "INSERT INTO kas (id_user, keterangan, tgl, masuk, jenis, keluar) VALUES ('$id', '$ket', '$tgl', '$masuk', 'setor', 0)");
       if($sql) {
         echo "
          <script>
          document.location.href = 'masuk.php';       
          </script>";   
                 }
             }
     ?>
     
     
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
   <!-- Main Footer -->
   <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021</strong>
  </footer>
</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
   $('.btn-del').on('click',function(e) {
      e.preventDefault();
      const href = $(this).attr('href')
      Swal.fire({
        title: 'Hapus data pemasukan?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'delete'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
    })

</script>
</body>
</html>
