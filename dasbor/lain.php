<?php
session_start();
error_reporting(0);
include_once '../setting/database.php';
include_once '../setting/status_session.php';
$id_member = $_SESSION['id_member'];

$nama_member = mysqli_query($koneksi, "SELECT nama_lengkap FROM member WHERE id_member='$id_member'");
$data=mysqli_fetch_array($nama_member);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog : [<?php echo $data['nama_lengkap'];?>]</title>
</head>
<body>
<h1>Blog : [<?php echo $data['nama_lengkap'];?>]</h1>

<?php 
	$pesan_baru=mysqli_query($koneksi, "SELECT * FROM pesan WHERE id_penerima='$id_member' and sudah_dibaca='belum'");
	$jumlah_pesan_baru=mysqli_num_rows($pesan_baru);

	if($jumlah_pesan_baru == 0){
		echo "<h3><a href='pesan.php?id_member=".$id_member."'>Tidak Ada Pesan Baru (0)</a></h3>";
	}
	else if($jumlah_pesan_baru > 0){
		echo "<h3><a href='pesan.php?id_member=".$id_member."' style='color:red;'>Pesan Baru (".$jumlah_pesan_baru.")</a></h3>";
	}
?>

<p>Ini adalah contoh halaman member</p>
<p><a href="index.php">Halaman Depan</a></p>
<p>Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.Lorem Ipsum Dolor Sit Amet.</p>
<p><a href="logout.php"><strong>LOGOUT</strong></p>
</body>
</html>