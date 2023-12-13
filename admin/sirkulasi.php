<!DOCTYPE html>
<html lang="en">
    <style>
        /* Add your CSS styles here */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
            margin-bottom: 10px;
        }

        .search-button {
            margin-left: 5px;
        }

        /* Add other styles as needed */
    </style>
<head>
<title>Data Sirkulasi</title>
<link rel="stylesheet" href="../style/fitur.css">
</head>

<body>
    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
    include('../komponen/headeruser.php');
    ?>
    <div class="content">
        <div id="sidebar">
        <?php
        include('../komponen/sidebaradmin.php');
        ?>
            <div class="isi">
            <form method="GET" action="">
            <input type="text" name="id_user" class="search-box" placeholder="NIM/NIP" id="id_user">
            <button type="submit" class="search-button">Cari</button>
            </form>
            <br>
            </div>
        </div>
    </div>
    <?php
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

    function searchPeminjamanByIdUser($id_user)
    {
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

    if (isset($_GET['id_user'])) {
        $id_userSearch = $_GET['id_user'];
        $peminjaman = searchPeminjamanByIdUser($id_userSearch);
    } else {
        $peminjaman = getPeminjaman();
    }
    ?>
    </div>
        <?php if (!empty($peminjaman)): ?>
            <table border="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM/NIP</th>
                        <th>Name</th>
                        <th>Id Book</th>
                        <th>The Book Title</th>
                        <th>Loan Date</th>
                        <th>Return Date</th>
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
    </div>
</body>

</html>
