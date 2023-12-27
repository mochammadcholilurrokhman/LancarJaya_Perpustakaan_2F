<?php
require_once '../../Config/Connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['return_id'])) {
    $return_id = $_POST['return_id'];

    // Tambahkan logika untuk mengubah status_peminjaman dan mengisi tgl_pengembalian
    $updateQuery = "UPDATE peminjaman SET status_peminjaman = 'sudah_dikembalikan', tgl_pengembalian = CURRENT_DATE WHERE id_peminjaman = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, "i", $return_id);
    mysqli_stmt_execute($updateStmt);
    mysqli_stmt_close($updateStmt);
}
?>
