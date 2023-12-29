<?php
require_once '../../Config/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_peminjaman']) && is_numeric($_POST['id_peminjaman'])) {
        $id_peminjaman = intval($_POST['id_peminjaman']);

        // Use prepared statement to prevent SQL injection
        $update_query = "UPDATE peminjaman SET status_peminjaman = 'Belum dikembalikan' WHERE id_peminjaman = ?";
        $stmt = mysqli_prepare($conn, $update_query);

        // Bind the parameter
        mysqli_stmt_bind_param($stmt, 'i', $id_peminjaman);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Set a session variable with the success message
            $_SESSION['success_message'] = "The loan has been successfully approved.";
            header('Location: ../../App/Admin/notif.php');  
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Invalid id_peminjaman.";
    }
} else {
    echo "Invalid request.";
}
?>
