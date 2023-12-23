<?php
require_once '../Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookTitle = isset($_POST['bookTitle']) ? mysqli_real_escape_string($conn, $_POST['bookTitle']) : '';
    $bookImage = isset($_POST['bookImage']) ? mysqli_real_escape_string($conn, $_POST['bookImage']) : '';
    $bookAuthor = isset($_POST['bookAuthor']) ? mysqli_real_escape_string($conn, $_POST['bookAuthor']) : '';
    $bookYear = isset($_POST['bookYear']) ? mysqli_real_escape_string($conn, $_POST['bookYear']) : '';


    $insertQuery = "INSERT INTO keranjang (judul_buku, image, pengarang, tahun_terbit ) VALUES ('$bookTitle', '$bookImage', '$bookAuthor', '$bookYear')";
    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        echo "Buku berhasil ditambahkan ke keranjang!";
    } else {
        echo "Error menambahkan buku ke keranjang: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}
?>
