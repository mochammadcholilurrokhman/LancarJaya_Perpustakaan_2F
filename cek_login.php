
<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'Connection.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$psw = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($connection,"SELECT * from user where username='$username' and password='$psw'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
    $_SESSION['level'] = "user";
	$_SESSION['status'] = "login";
	header("location:user/dashboard.php");
}else{
	header("location:login.php?pesan=gagal");
}
?>