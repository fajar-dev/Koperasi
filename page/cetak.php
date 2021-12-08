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
  <title>Mutasi </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <div class="card-header">
                <h1 class="text-center">Mutasi Saldo</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                         <th>No.</th>
                         <th>Keterangan</th>
                         <th>Tanggal</th>
                         <th>jenis</th>
                         <th>masuk</th>
                         <th>keluar</th>
                        </tr>
                        </thead>
                        <tbody>
                                  <?php 

                                    $no = 1;
                                    $id_user = $_SESSION['id'];
                                    $sql = mysqli_query($koneksi, "SELECT * FROM kas WHERE id_user = '$id_user'");
                                    while ($data = mysqli_fetch_assoc($sql)) {
                                  ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['keterangan']; ?></td>
                          <td><?php echo date('d F Y', strtotime($data['tgl'])); ?></td>
                          <td><?php echo $data['jenis']; ?></td>
                          <td style="text-align: right;"><?php echo number_format($data['masuk']).",-"; ?></td>
                          <td style="text-align: right;"><?php echo number_format($data['keluar']).",-"; ?></td>
                        </tr>
                                  <?php 
                                     ini_set("display_errors","Off");
                                    $total = $total+$data['masuk'];
                                    $total_keluar = $total_keluar+$data['keluar'];

                                    $saldo_akhir = $total - $total_keluar;                      
                                    } 
                                  ?>
                        </tbody>
                        <tr>
                          <td colspan="6" class="font-weight-bold Text-left text-red">Total Setor : <p class="font-weight-bold pull-right text-red"><?php echo " Rp." . number_format($total).",-"; ?></p></td>
                        </tr>
                        <tr>
                          <td colspan="7" class="font-weight-bold Text-left text-red">Total Tarik : <p class="font-weight-bold pull-right text-red"><?php echo " Rp." . number_format($total_keluar).",-"; ?></p></td>
                        </tr>
                        <tr>
                          <td colspan="5" class="font-weight-bold Text-left text-red">Saldo Akhir : <p class="font-weight-bold pull-right text-red"><?php echo " Rp." . number_format($saldo_akhir).",-"; ?></p></td>
                        </tr>
                </table>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>window.print()</script>
</body>
</html>
