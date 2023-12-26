<?php
require_once '../../Config/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_buku'])) {
    $bookId = $_GET['id_buku'];

    $username = $_SESSION['username'];

    $queryUser = "SELECT id_user FROM user WHERE username = '$username'";
    $resultUser = mysqli_query($conn, $queryUser);

    if ($resultUser && mysqli_num_rows($resultUser) > 0) {
        $rowUser = mysqli_fetch_assoc($resultUser);
        $userId = $rowUser['id_user'];
        $tglPeminjaman = date('Y-m-d H:i:s');
        $tglBatasPengembalian = date('Y-m-d H:i:s', strtotime($tglPeminjaman . '+14 days'));
        $statusPeminjaman = 'Pending';

        // Cek apakah buku tersedia
        $checkAvailabilityQuery = "SELECT status_buku FROM buku WHERE id_buku = '$bookId'";
        $resultAvailability = mysqli_query($conn, $checkAvailabilityQuery);

        if ($resultAvailability && mysqli_num_rows($resultAvailability) > 0) {
            $rowAvailability = mysqli_fetch_assoc($resultAvailability);

            if ($rowAvailability['status_buku'] === 'Available') {
                $status = 'Borrowed';
                // Update status buku menjadi 'Borrowed'
                $updateBookQuery = "UPDATE buku SET status_buku = '$status' WHERE id_buku = '$bookId'";
                $resultUpdateBook = mysqli_query($conn, $updateBookQuery);

                // Insert data peminjaman
                $insertHistoryQuery = "INSERT INTO peminjaman (id_user, id_buku, tgl_peminjaman, tgl_batas_pengembalian, status_peminjaman) 
                      VALUES ('$userId', '$bookId', '$tglPeminjaman','$tglBatasPengembalian', '$statusPeminjaman')";

                $resultInsertHistory = mysqli_query($conn, $insertHistoryQuery);
                if ($resultUpdateBook && $resultInsertHistory) {
                    // Simpan informasi peminjaman dalam variabel sesi
                    $_SESSION['new_borrow'] = "Peminjaman berhasil dilakukan.";

                    header("Location: ../../App/User/cart.php");
                    exit();
                } else {
                    echo "Error updating book status or recording transaction: " . mysqli_error($conn);
                }
            } else {
                echo "Error: The book is not available for borrowing.";
            }
        } else {
            echo "Error checking book availability: " . mysqli_error($conn);
        }
    } else {
        echo "Error fetching user information: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method or book ID not provided.";
}
