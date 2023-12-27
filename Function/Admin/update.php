<?php
require_once '../../Config/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['return_id'])) {
    $return_id = $_POST['return_id'];

    // Tambahkan logika untuk mengubah status_peminjaman dan mengisi tgl_pengembalian
    $updateQuery = "UPDATE peminjaman SET status_peminjaman = 'Dikembalikan', tgl_pengembalian = CURRENT_DATE WHERE id_peminjaman = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, "i", $return_id);
    mysqli_stmt_execute($updateStmt);
    mysqli_stmt_close($updateStmt);

    // Tambahkan logika untuk menambah jumlah_tersedia pada buku yang dikembalikan
    $getBookIdQuery = "SELECT id_buku FROM peminjaman WHERE id_peminjaman = ?";
    $getBookIdStmt = mysqli_prepare($conn, $getBookIdQuery);
    mysqli_stmt_bind_param($getBookIdStmt, "i", $return_id);
    mysqli_stmt_execute($getBookIdStmt);
    mysqli_stmt_bind_result($getBookIdStmt, $bookId);
    mysqli_stmt_fetch($getBookIdStmt);
    mysqli_stmt_close($getBookIdStmt);

    $updateJumlahTersediaQuery = "UPDATE buku SET jumlah_tersedia = jumlah_tersedia + 1 WHERE id_buku = ?";
    $updateJumlahTersediaStmt = mysqli_prepare($conn, $updateJumlahTersediaQuery);
    mysqli_stmt_bind_param($updateJumlahTersediaStmt, "i", $bookId);
    mysqli_stmt_execute($updateJumlahTersediaStmt);
    mysqli_stmt_close($updateJumlahTersediaStmt);
}
?>
