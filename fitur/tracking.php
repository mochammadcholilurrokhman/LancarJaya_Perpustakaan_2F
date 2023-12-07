<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");

function getPeminjaman()
{
    global $koneksi;

    $query = "SELECT peminjaman.*, user.id_user, user.username, buku.id_buku, buku.judul_buku
              FROM peminjaman
              INNER JOIN user ON peminjaman.id_user = user.id_user
              INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
              ORDER BY peminjaman.id_peminjaman asc";

    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $peminjaman = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $peminjaman[] = $row;
    }

    mysqli_stmt_close($stmt);

    return $peminjaman;
}

$peminjaman = getPeminjaman();

function searchPeminjamanByBookTitle($book_title) {
    global $koneksi;

    $query = "SELECT peminjaman.*, user.id_user, user.username, buku.id_buku, buku.judul_buku
              FROM peminjaman
              INNER JOIN user ON peminjaman.id_user = user.id_user
              INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
              WHERE buku.judul_buku = ?
              ORDER BY peminjaman.id_peminjaman DESC";

    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $book_title);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $peminjaman = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $peminjaman[] = $row;
    }

    mysqli_stmt_close($stmt);

    return $peminjaman;
}


if (isset($_GET['book_title'])) {
    $bookTitleSearch = $_GET['book_title'];
    $peminjaman = searchPeminjamanByBookTitle($bookTitleSearch);
} else {
    $peminjaman = getPeminjaman();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    
</body>
</html>
<form action="" method="GET">
    <label for="book_title">Cari berdasarkan judul buku:</label>
    <input type="text" name="book_title" id="book_title">
    <button type="submit">Cari</button>
</form>
<!DOCTYPE html>
<html lang="en">
<head>
    <h1>Tracking Buku</h1>
</head>
<body>
    
</body>
</html>

<?php if (!empty($peminjaman)): ?>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Buku</th>
            <th>Judul Buku</th>
            <th>Status</th>
            <th>Id Anggota</th>
            <th>Nama Anggota</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($peminjaman as $index => $data): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $data['id_buku'] ?></td>
                <td><?= $data['judul_buku'] ?></td>
                <td><?= $data['status'] ?></td>
                <td><?= $data['id_user'] ?></td>
                <td><?= $data['username'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <p>Data tidak ditemukan</p>
<?php endif; ?>