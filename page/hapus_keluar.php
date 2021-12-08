<?php
//panggil file koneksi.php yang sudah anda buat
include "../koneksi.php";

$id=$_GET['id'];   //ambil parameter GET id  dan buat variabel
//gunakan parameter get untuk menghapus data berdasarkan id produk
$hapus = mysqli_query($koneksi, "DELETE FROM kas where id='$id'");
header('location: keluar.php')

?>