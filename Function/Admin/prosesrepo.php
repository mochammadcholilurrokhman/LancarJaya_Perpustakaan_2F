<?php
require_once ('../../Config/Connection.php');

class Repository {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function tambahRepository($judul, $pengarang, $tahun_terbit, $kata_kunci, $status) {
        $query = "INSERT INTO repository (Judul_repo, pengarang, tahun_terbit, Kata_Kunci, status_repo) 
                  VALUES ('$judul', '$pengarang', '$tahun_terbit', '$kata_kunci', '$status')";

        return mysqli_query($this->conn, $query);
    }

    public function ubahRepository($id, $judul, $pengarang, $tahun_terbit, $kata_kunci, $status_repo) {
        $query = "UPDATE repository SET Judul_repo='$judul', pengarang='$pengarang', tahun_terbit='$tahun_terbit', 
                  Kata_Kunci='$kata_kunci', status_repo='$status_repo' WHERE id_repo = $id";

        return mysqli_query($this->conn, $query);
    }

    public function hapusRepository($id) {
        $query = "DELETE FROM repository WHERE id_repo = $id";

        return mysqli_query($this->conn, $query);
    }
}

// Membuat objek repository
$repository = new Repository($conn);

// Mendapatkan aksi dari parameter GET
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

// Mendapatkan data dari formulir POST
$judul_repo = isset($_POST['Judul_repo']) ? $_POST['Judul_repo'] : '';
$pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
$tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
$kata_kunci = isset($_POST['Kata_Kunci']) ? $_POST['Kata_Kunci'] : '';
$status_repo = isset($_POST['status_repo']) ? $_POST['status_repo'] : '';

// Melakukan operasi sesuai dengan aksi yang diberikan
if ($aksi == 'tambah') {
    if ($repository->tambahRepository($judul_repo, $pengarang, $tahun_terbit, $kata_kunci, $status_repo)) {
        header("Location: ../../App/Admin/repository.php");
        exit();
    } else {
        echo "Failed to add data.";
    }
} elseif ($aksi == 'ubah') {
    if (isset($_POST['id_repo'])) {
        $id = $_POST['id_repo'];
        if ($repository->ubahRepository($id, $judul_repo, $pengarang, $tahun_terbit, $kata_kunci, $status_repo)) {
            header("Location: ../../App/Admin/repository.php");
            exit();
        } else {
            echo "Failed to change data..";
        }
    } else {
        echo "ID tidak valid.";
    }
} elseif ($aksi == 'hapus') {
    if (isset($_GET['id_repo'])) {
        $id = $_GET['id_repo'];
        if ($repository->hapusRepository($id)) {
            header("Location: ../../App/Admin/repository.php");
            exit();
        } else {
            echo "Failed to delete data.";
        }
    } else {
        echo "ID tidak valid.";
    }
} else {
    header("Location: ../../App/Admin/repository.php");
}

// Menutup koneksi
mysqli_close($conn);
?>
