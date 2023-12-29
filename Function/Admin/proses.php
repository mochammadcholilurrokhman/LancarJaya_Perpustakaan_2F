<?php
require_once ('../../Config/Connection.php');

class Buku {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function tambahBuku($judul, $pengarang, $tahun_terbit, $deskripsi, $status, $image) {
        $query = "INSERT INTO buku (judul_buku, pengarang,  tahun_terbit, deskripsi, status_buku, image) 
                  VALUES ('$judul', '$pengarang',  '$tahun_terbit', '$deskripsi', '$status' , '$image')";

        return mysqli_query($this->conn, $query);
    }

    public function ubahBuku($id, $judul, $pengarang,  $tahun_terbit, $deskripsi, $status) {
        $query = "UPDATE buku SET judul_buku='$judul', pengarang='$pengarang', tahun_terbit='$tahun_terbit', 
                  deskripsi='$deskripsi', status_buku='$status' WHERE id_buku = $id";

        return mysqli_query($this->conn, $query);
    }

    public function hapusBuku($id) {
        $query = "DELETE FROM buku WHERE id_buku = $id";

        return mysqli_query($this->conn, $query);
    }
      public function hapusnotif($id) {
        $query = "DELETE FROM peminjaman WHERE id_peminjaman = $id";

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
$tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
$deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : '';
$status = isset($_POST['status_buku']) ? $_POST['status_buku'] : '';
$image = isset($_POST['image']) ? $_POST['image'] : '';


// Melakukan operasi sesuai dengan aksi yang diberikan
if ($aksi == 'tambah') {
    if ($buku->tambahBuku($judul_buku, $pengarang, $tahun_terbit, $deskripsi, $status, $image)) {
        header("Location: ../../App/Admin/katalog.php");
        exit();
    } else {
        echo "Failed to add data.";
    }
} elseif ($aksi == 'ubah') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        if ($buku->ubahBuku($id, $judul_buku, $pengarang, $tahun_terbit,  $deskripsi, $status)) {
            header("Location: ../../App/Admin/katalog.php");
            exit();
        } else {
            echo "Failed to change data..";
        }
    } else {
        echo "ID tidak valid.";
    }
} elseif ($aksi == 'hapus') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($buku->hapusBuku($id)) {
            header("Location: ../../App/Admin/katalog.php");
            exit();
        } else {
            echo "Failed to delete data.";
        }
    } else {
        echo "ID tidak valid.";
    }
}   
elseif ($aksi == 'hapusnotif') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if ($buku->hapusnotif($id)) {
            header("Location: ../../App/Admin/notif.php");
            exit();
        } else {
            echo "Failed to delete data.";
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
