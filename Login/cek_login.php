<?php
require_once('../Config/Connection.php');

class Login {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function loginUser($username, $password) {
        // Query untuk memeriksa keberadaan data pengguna di database
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = $this->conn->query($query);

        // Memeriksa hasil query
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Cek posisi pengguna (admin atau user)
            if ($row['posisi'] == "Admin") {
                $this->handleAdminLogin($username);
            } else {
                $this->handleUserLogin($username);
            }
        } else {
            echo "Login failed. Double check your username and password.";
        }
    }

    private function handleAdminLogin($username) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['posisi'] = "Admin";
        $_SESSION['status'] = "login";
        header("location: ../App/Admin/dashboardadmin.php");
    }

    private function handleUserLogin($username) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['posisi'] = "user";
        $_SESSION['status'] = "login";
        header("location: ../App/User/dashboard.php");
    }
}

// Membuat objek login
$login = new Login($conn);

// Memeriksa apakah form login telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form login (contoh, Anda dapat menyesuaikan dengan form Anda)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memanggil metode loginUser
    $login->loginUser($username, $password);
}
?>
