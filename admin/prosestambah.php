<?php
include "../Connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $judul = mysqli_real_escape_string($connection, $_POST['judul_buku']);
    $pengarang = mysqli_real_escape_string($connection, $_POST['pengarang']);
    $tahun_terbit = mysqli_real_escape_string($connection, $_POST['tahun_terbit']);
    $sinopsis = mysqli_real_escape_string($connection, $_POST['sinopsis']);
    $status_buku = mysqli_real_escape_string($connection, $_POST['status_buku']);

    // Insert data into the 'buku' table
    $insert_query = "INSERT INTO buku VALUES ('','$judul', '$pengarang', '$tahun_terbit', '$sinopsis', '$status_buku')";
    
    $result = mysqli_query($connection, $insert_query);

    if ($result) {
        // Redirect with success message
        header("Location: tambah.php?pesan=input");
    } else {
        // Redirect with error message
        header("Location: tambah.php?pesan=gagal");
    }

} else {
    // Redirect if accessed directly without POST request
    header("Location: tambah.php");
}

mysqli_close($connection);
?>