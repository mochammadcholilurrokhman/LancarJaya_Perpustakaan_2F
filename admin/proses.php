<?php
require_once ('../Connection.php');

class Buku {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function tambahBuku($judul, $pengarang, $sinopsis, $tahun_terbit, $status) {
        $query = "INSERT INTO buku (judul_buku, pengarang, sinopsis, tahun_terbit, status_buku) 
                  VALUES ('$judul', '$pengarang', '$sinopsis', '$tahun_terbit', '$status')";

        return mysqli_query($this->conn, $query);
    }

    public function ubahBuku($id, $judul, $pengarang, $sinopsis, $tahun_terbit, $status) {
        $query = "UPDATE buku SET judul_buku='$judul', pengarang='$pengarang', tahun_terbit='$tahun_terbit', 
                  sinopsis='$sinopsis', status_buku='$status' WHERE id = $id";

        return mysqli_query($this->conn, $query);
    }

    public function hapusBuku($id) {
        $query = "DELETE FROM buku WHERE id = $id";

        return mysqli_query($this->conn, $query);
    }
}

// Membuat objek buku
$buku = new Buku($conn);

// Mendapatkan aksi dari parameter GET
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

// Mendapatkan data dari formulir POST
$judul_buku = isset($_POST['judul_buku']) ? $_POST['judul_buku'] : '';
$pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
$sinopsis = isset($_POST['sinopsis']) ? $_POST['sinopsis'] : '';
$tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
$status = isset($_POST['status_buku']) ? $_POST['status_buku'] : '';

// Melakukan operasi sesuai dengan aksi yang diberikan
if ($aksi == 'tambah') {
    if ($buku->tambahBuku($judul_buku, $pengarang, $sinopsis, $tahun_terbit, $status)) {
        header("Location: katalog.php");
        exit();
    } else {
        echo "Gagal menambahkan data.";
    }
} elseif ($aksi == 'ubah') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        if ($buku->ubahBuku($id, $judul_buku, $pengarang, $sinopsis, $tahun_terbit, $status)) {
            header("Location: katalog.php");
            exit();
        } else {
            echo "Gagal mengubah data.";
        }
    } else {
        echo "ID tidak valid.";
    }
} elseif ($aksi == 'hapus') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($buku->hapusBuku($id)) {
            header("Location: katalog.php");
            exit();
        } else {
            echo "Gagal menghapus data.";
        }
    } else {
        echo "ID tidak valid.";
    }
} 
    else {
    header("Location: katalog.php");
}

// Menutup koneksi
mysqli_close($conn);
?>
