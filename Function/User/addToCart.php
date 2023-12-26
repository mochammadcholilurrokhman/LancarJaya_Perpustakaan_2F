<?php
require_once '../../Config/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookTitle = $_POST['bookTitle'];
    $bookImage = $_POST['bookImage'];
    $bookAuthor = $_POST['bookAuthor'];
    $bookYear = $_POST['bookYear'];

    $username = $_SESSION['username'];
    $queryuser = "SELECT id_user FROM user WHERE username = '$username'";
    $querybook = "SELECT id_buku FROM buku WHERE judul_buku = '$bookTitle'";
    $resultbook = mysqli_query($conn, $querybook);
    $resultuser = mysqli_query($conn, $queryuser);

    if ($resultbook && mysqli_num_rows($resultbook) > 0) {
        $rowuser = mysqli_fetch_assoc($resultuser);
        $id_user = $rowuser['id_user'];
        $rowbook = mysqli_fetch_assoc($resultbook);
        $id_book = $rowbook['id_buku'];
        $insertQuery = "INSERT INTO keranjang (id_buku, id_user ) VALUES ('$id_book', '$id_user')";
        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            echo "Buku berhasil ditambahkan ke keranjang!";
        } else {
            echo "Error menambahkan buku ke keranjang: " . mysqli_error($conn);
        }
    } else {
        echo 'wpe';
    }
} else {
    echo "Invalid request method.";
}
?>
