<?php
// Koneksi ke database
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

// Add a new function to handle the search by id user
function searchPeminjamanByIdUser($id_user) {
    global $koneksi;

    $query = "SELECT peminjaman.*, user.id_user, user.username, buku.id_buku, buku.judul_buku
              FROM peminjaman
              INNER JOIN user ON peminjaman.id_user = user.id_user
              INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
              WHERE user.id_user = ?
              ORDER BY peminjaman.id_peminjaman DESC";

    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $id_user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $peminjaman = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $peminjaman[] = $row;
    }

    mysqli_stmt_close($stmt);

    return $peminjaman;
}

// Modify the existing code to call the new function when id_user is provided
if (isset($_GET['id_user'])) {
    $id_userSearch = $_GET['id_user'];
    $peminjaman = searchPeminjamanByIdUser($id_userSearch);
} else {
    $peminjaman = getPeminjaman();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <h1>Data Sirkulasi</h1>
</head>
<body>
    
</body>
</html>

<form action="" method="GET">
    <label for="id_user">Cari berdasarkan NIM/NIP:</label>
    <input type="text" name="id_user" id="id_user">
    <button type="submit">Cari</button>
</form>

<?php if (!empty($peminjaman)): ?>

<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM/NIP</th>
            <th>Nama</th>
            <th>Id Buku</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($peminjaman as $index => $data): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $data['id_user'] ?></td>
                <td><?= $data['username'] ?></td>
                <td><?= $data['id_buku'] ?></td>
                <td><?= $data['judul_buku'] ?></td>
                <td><?= $data['tgl_peminjaman'] ?></td>
                <td><?= $data['tgl_pengembalian'] ?></td>
                <td><?= $data['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <p>Data tidak ditemukan</p>
<?php endif; ?>
