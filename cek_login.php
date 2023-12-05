<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'Connection.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$psw = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($connection, "SELECT * FROM user WHERE username='$username' AND password='$psw'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
    $row = mysqli_fetch_assoc($data);
    if ($row['posisi'] == "admin") {
        // Admin login
        $_SESSION['username'] = $username;
        $_SESSION['posisi'] = "admin";
        $_SESSION['status'] = "login";
        header("location:admin/dashboardadmin.php");
    } else {
        // Regular user login
        $_SESSION['username'] = $username;
        $_SESSION['posisi'] = "user";
        $_SESSION['status'] = "login";
        header("location:user/dashboard.php");
    }
} else {
    header("location:login.php?pesan=gagal");
}
?>