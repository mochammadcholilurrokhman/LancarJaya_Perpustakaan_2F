<?php
include ('../Connection.php');

$aksi = $_GET['aksi'];
$judul_repo = $_POST['Judul_Repo'];
$pengarang = $_POST['pengarang'];
$tahun_terbit = $_POST['tahun_terbit'];
$kata_kunci = $_POST['Kata_Kunci'];
$status_repo = $_POST['status_repo'];

    if ($aksi == 'tambah'){
        $query = "INSERT INTO repository1 (Judul_Repo, pengarang, tahun_terbit, Kata_Kunci ,status_repo) VALUES ('$judul_repo', '$pengarang', '$tahun_terbit', '$kata_kunci','$status')";

        if (mysqli_query($connection, $query)) {
        header("Location: repository.php");
        exit();
         } else {
            echo "Gagal menambahkan data: " . mysqli_error($connection);
                }
            }
    else if($aksi == 'ubah'){
        if (isset($_POST['id_repo'])){
            $id = $_POST['id_repo'];

            $query = "UPDATE repository1 SET Judul_Repo='$judul_repo', pengarang='$pengarang', tahun_terbit= '$tahun_terbit', Kata_Kunci='$kata_kunci' , status_repo = '$status_repo' WHERE id_repo= $id";
            if (mysqli_query($connection, $query)) {
                header("Location: repository.php");
                exit();
                 } else {
                    echo "Gagal menambahkan data: " . mysqli_error($connection);
                        }
        } else {
            echo "ID tidak valid.";
        }
    } else if ($aksi = 'hapus') {
        if (isset($_GET['id_repo'])) {
            $id = $_GET['id_repo'];
            $query = "DELETE FROM repository1 WHERE id_repo = $id";
            if (mysqli_query($connection, $query)) {
                header("Location: repository.php");
                exit();
            } else {
                echo "Gagal menghapus data : " . mysqli_error($connection);
            }
        } else {
            echo "ID tidak valid";
        }
    } else {
        header("Location: repository.php");
    }
    mysqli_close($connection);