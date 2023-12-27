<?php
require_once '../../Config/Connection.php';

$querySettings = "SELECT * FROM pengaturan order by id_pengaturan desc LIMIT 1";
$resultSettings = mysqli_query($conn, $querySettings);

if ($resultSettings && mysqli_num_rows($resultSettings) > 0) {
    $rowSettings = mysqli_fetch_assoc($resultSettings);

    $dendaPerHari = $rowSettings['denda_perhari'];
    $batasBuku = $rowSettings['batas_buku'];
    $batasHari = $rowSettings['batas_hari'];
} else {
    // Handle error if settings are not available
    die("Error fetching settings: " . mysqli_error($conn));
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_buku'])) {
    $bookId = $_GET['id_buku'];

    $username = $_SESSION['username'];

    $queryUser = "SELECT id_user FROM user WHERE username = '$username'";
    $resultUser = mysqli_query($conn, $queryUser);

    if ($resultUser && mysqli_num_rows($resultUser) > 0) {
        $rowUser = mysqli_fetch_assoc($resultUser);
        $userId = $rowUser['id_user'];

        $checkBorrowedBooksQuery = "SELECT COUNT(*) AS num_borrowed FROM peminjaman WHERE id_user = '$userId' AND status = 'Belum Dikembalikan'";
        $resultBorrowedBooks = mysqli_query($conn, $checkBorrowedBooksQuery);

        if ($resultBorrowedBooks && mysqli_num_rows($resultBorrowedBooks) > 0) {
            $rowBorrowedBooks = mysqli_fetch_assoc($resultBorrowedBooks);
            $numBorrowedBooks = $rowBorrowedBooks['num_borrowed'];

        if ($numBorrowedBooks < $batasBuku) {
            $tglPeminjaman = date('Y-m-d H:i:s');
            $tglBatasPengembalian = date('Y-m-d H:i:s', strtotime($tglPeminjaman . '+ ' . $batasHari . ' days'));
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
                $insertHistoryQuery = "INSERT INTO peminjaman (id_user, id_buku, tgl_peminjaman, tgl_batas_pengembalian, status) 
                      VALUES ('$userId', '$bookId', '$tglPeminjaman','$tglBatasPengembalian', '$statusPeminjaman')";

                $resultInsertHistory = mysqli_query($conn, $insertHistoryQuery);
                if ($resultUpdateBook && $resultInsertHistory) {
                    // Simpan informasi peminjaman dalam variabel sesi
                    $_SESSION['new_borrow'] = "Peminjaman berhasil dilakukan.";

                    header("Location: ../../App/User/cart.php");
                    exit();
                } else {
                    echo "<script>alert('Error updating book status or recording transaction: " . mysqli_error($conn) . "');</script>";
                }
            } else {
                echo "<script>alert('Error: The book is not available for borrowing. " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "Error checking book availability: " . mysqli_error($conn);
        }
        
        } else {
            // Check for overdue books and calculate fines
            $checkOverdueBooksQuery = "SELECT id_peminjaman, tgl_batas_pengembalian FROM peminjaman WHERE id_user = '$userId' AND status = 'Belum Dikembalikan'";
            $resultOverdueBooks = mysqli_query($conn, $checkOverdueBooksQuery);

            while ($rowOverdueBooks = mysqli_fetch_assoc($resultOverdueBooks)) {
                $idPeminjaman = $rowOverdueBooks['id_peminjaman'];
                $tglBatasPengembalian = $rowOverdueBooks['tgl_batas_pengembalian'];

                // Check if the book is overdue
                if (strtotime($tglBatasPengembalian) < strtotime(date('Y-m-d H:i:s'))) {
                    // Calculate the fine based on the denda_perhari setting
                    $dateDifference = ceil((strtotime(date('Y-m-d H:i:s')) - strtotime($tglBatasPengembalian)) / (60 * 60 * 24));
                    $jmlDenda = $dateDifference * $dendaPerHari;

                    // Insert the fine information into the denda table
                    $insertDendaQuery = "INSERT INTO denda (jml_denda, status_pembayaran, tgl_batas_pembayaran, id_peminjaman, id_pengaturan) 
                        VALUES ('$jmlDenda', 'Belum Dibayar', DATE_ADD(NOW(), INTERVAL 7 DAY), '$idPeminjaman', '{$rowSettings['id_pengaturan']}')";

                    $resultInsertDenda = mysqli_query($conn, $insertDendaQuery);

                    if (!$resultInsertDenda) {
                        echo "<script>alert('Error inserting fine information: " . mysqli_error($conn) . "');</script>";
                    }
                }
            }
            echo "<script>alert('Error: You have reached the limit for the number of books you can borrow.');</script>";
        }
        } else {
            echo "Error fetching user information: " . mysqli_error($conn);
        }
} else {
    echo "Invalid request method or book ID not provided.";
}
}

