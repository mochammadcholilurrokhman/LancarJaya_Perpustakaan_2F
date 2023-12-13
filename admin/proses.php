<?php
include ('../Connection.php');

$aksi = $_GET['aksi'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$sinopsis = $_POST['sinopsis'];
$tahun_terbit = $_POST['tahun_terbit'];
$status = $_POST['status_buku'];

    if ($aksi == 'tambah'){
        $query = "INSERT INTO buku1 (judul_buku, pengarang, sinopsis , tahun_terbit, status_buku) VALUES ('$judul_buku', '$pengarang', '$sinopsis', '$tahun_terbit', '$status')";

        if (mysqli_query($connection, $query)) {
        header("Location: katalog.php");
        exit();
         } else {
            echo "Gagal menambahkan data: " . mysqli_error($connection);
                }
            }
    else if($aksi == 'ubah'){
        if (isset($_POST['id'])){
            $id = $_POST['id'];

            $query = "UPDATE buku1 SET judul_buku='$judul_buku', pengarang='$pengarang', tahun_terbit= '$tahun_terbit', sinopsis='$sinopsis' , status_buku = '$status' WHERE id = $id";
            if (mysqli_query($connection, $query)) {
                header("Location: katalog.php");
                exit();
                 } else {
                    echo "Gagal menambahkan data: " . mysqli_error($connection);
                        }
        } else {
            echo "ID tidak valid.";
        }
    } else if ($aksi = 'hapus') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "DELETE FROM buku1 WHERE id = $id";
            if (mysqli_query($connection, $query)) {
                header("Location: katalog.php");
                exit();
            } else {
                echo "Gagal menghapus data : " . mysqli_error($connection);
            }
        } else {
            echo "ID tidak valid";
        }
    } else {
        header("Location: katalog.php");
    }
    mysqli_close($connection);