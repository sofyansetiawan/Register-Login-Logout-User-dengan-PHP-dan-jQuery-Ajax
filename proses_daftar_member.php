<?php
error_reporting(0);
include_once 'setting/database.php';

$nama_lengkap_daftar    = $_POST['nama_lengkap_daftar'];
$gender_daftar          = $_POST['gender_daftar'];
$alamat_daftar          = $_POST['alamat_daftar']; 
$username_daftar        = $_POST['username_daftar']; 
$password_daftar        = md5($_POST['password_daftar']);

if(empty($nama_lengkap_daftar) || empty($alamat_daftar) || empty($username_daftar) || empty($password_daftar)){
	die(pesan(0,"Semua Field Harus Di isi"));
}

if(!(int)$gender_daftar){
	die(pesan(0,"Pilih Gender"));
}

if($gender_daftar=="1"){ $gender = "L"; }
else{ $gender = "P"; } 

$seleksi = mysqli_query($koneksi, "SELECT id_member FROM member WHERE username='$username_daftar'");
$jumlah_baris = mysqli_num_rows($seleksi);

if ($jumlah_baris == 0) {
  $isi = mysqli_query($koneksi, "INSERT INTO member(nama_lengkap, gender, alamat, username, password) VALUES('$nama_lengkap_daftar','$gender','$alamat_daftar','$username_daftar','$password_daftar')");
  die(pesan(1,"Pendaftaran Berhasil, Silahkan Login"));
}
else {
  die(pesan(0,"Pendaftaran Gagal, Username Member sudah terdaftar"));
}

function pesan($status,$teks) {
	return '{"status":'.$status.',"teks":"'.$teks.'"}';
}