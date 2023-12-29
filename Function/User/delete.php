<?php
require_once '../../Config/Connection.php';

class Keranjang {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function hapusKeranjang($id) {
        $query = "DELETE FROM keranjang WHERE id_keranjang = $id";
        
        return mysqli_query($this->conn, $query);
    }
}

$keranjang = new Keranjang($conn);

// Mendapatkan aksi dari parameter GET
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

if ($aksi == 'hapus') {
    if (isset($_GET['id_keranjang'])) {
        $id = $_GET['id_keranjang'];

        if (is_numeric($id)) {
            if ($keranjang->hapusKeranjang($id)) {
                header("Location: ../../App/User/cart.php");
                exit();
            } else {
                echo "Failed to delete data.";
            }
        } else {
            echo "ID tidak valid.";
        }
    } else {
        echo "ID tidak valid.";
    }
}
?>
