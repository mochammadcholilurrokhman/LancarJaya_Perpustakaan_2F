<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");

function getPeminjaman()
{
    global $koneksi;

    $query = "SELECT peminjaman.*, user.username, user.nama_user, buku.id_buku, buku.judul_buku
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

    $query = "SELECT peminjaman.*, user.username, user.nama_user, buku.id_buku, buku.judul_buku
              FROM peminjaman
              INNER JOIN user ON peminjaman.id_user = user.id_user
              INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
              WHERE buku.judul_buku like ?
              ORDER BY peminjaman.id_peminjaman DESC";

    $searchTerm = '%' . $book_title . '%';

    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $searchTerm);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $peminjaman = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $peminjaman[] = $row;
    }

    mysqli_stmt_close($stmt);

    return $peminjaman;
}


if (isset($_POST['book_title'])) {
    $bookTitleSearch = $_POST['book_title'];
    $peminjaman = searchPeminjamanByBookTitle($bookTitleSearch);
} else {
    $peminjaman = getPeminjaman();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Tracking Buku</title>
<link rel="stylesheet" href="../../style/fitur.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        .search-box {
            background-color: #A5D7E8; 
            color: white; 
            padding: 10px 15px; 
            border: none;
            border-radius: 30px; 
            cursor: pointer;
        }
        .search-button {
            background-color: #A5D7E8; 
            color: black; 
            padding: 10px 15px; 
            border: none;
            border-radius: 30px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
    include('../headeruser.php');
    ?>

    <div class="content">
            <div id="sidebar">
                <?php
                include('../sidebaradmin.php');
                ?>

                <div class="isi">
                    <form action="" method="POST">
                        <label for="book_title"></label>
                        <input type="text" name="book_title" class="search-box" id="book_title" placeholder="Judul Buku">
                        <button type="submit" class="search-button">Search</button>
                    </form>
                    <br>

                    <?php if (!empty($peminjaman)): ?>

                    <table border="1">
                        <thead>
                            <tr>
                                <th>Book Id</th>
                                <th>The Book Title</th>
                                <th>Status</th>
                                <th>NIM/NIP</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($peminjaman as $index => $data): ?>
                                <tr>
                                    <td><?= $data['id_buku'] ?></td>
                                    <td><?= $data['judul_buku'] ?></td>
                                    <td><?= $data['status_peminjaman'] ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td><?= $data['nama_user'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <p>Data not found</p>
                    <?php endif; ?>
                </div>
        </div>
    </div>
</body>
</html>


