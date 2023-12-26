<?php
session_start();
class Connection {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    // Constructor untuk inisialisasi koneksi
    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->connect(); // Panggil metode koneksi saat objek dibuat
    }

    // Metode untuk membuat koneksi
    private function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Memeriksa koneksi
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    // Metode untuk mendapatkan koneksi
    public function getConnection() {
        return $this->conn;
    }
}

// Membuat objek koneksi
$connection = new Connection("localhost", "root", "", "perpustakaan");
$conn = $connection->getConnection();
?>
