
<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username =  mysqli_real_escape_string($koneksi,$_POST['username']); 
$password = md5($_POST['password']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
		$sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");
    while ($data = mysqli_fetch_assoc($sql)) {
			$_SESSION['id'] = $data['id'];
			$_SESSION['nama'] = $data['nama'];
			$_SESSION['level'] = $data['level'];
		};
	$_SESSION['status'] = "login";
	header("location:./page/home.php");
}else{
	?>
		<script>
		alert('Username atau Password Salah !!');
		document.location.href = 'login.php';
		</script>
	<?php 
}

?>

