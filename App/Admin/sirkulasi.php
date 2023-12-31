<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sirkulasi Perpustakaan</title>
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
        .return-button {
    background-color: #4CAF50;
    color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.return-button:hover {
    background-color: #45a049;
}
    </style>
</head>

<body>
    <?php
    include '../../Function/Admin/update.php';
    include('../headeruser.php');
    $koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../sidebaradmin.php');
            ?>

            <div class="isi">
                <form method="POST" action="">
                    <label for="username"></label>
                    <input type="text" name="search" class="search-box" placeholder="NIM/NIP" id="username">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <br>
    <?php
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

    function searchPeminjamanByIdUser($username)
    {
        global $koneksi;

        $query = "SELECT peminjaman.*, user.username, user.nama_user, buku.id_buku, buku.judul_buku
                FROM peminjaman
                INNER JOIN user ON peminjaman.id_user = user.id_user
                INNER JOIN buku ON peminjaman.id_buku = buku.id_buku
                WHERE user.username like ?
                ORDER BY peminjaman.id_peminjaman DESC";
            
        $searchId = '%' . $username . '%';

        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "s", $searchId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $peminjaman = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $peminjaman[] = $row;
        }

        mysqli_stmt_close($stmt);

        return $peminjaman;
    }
    if (isset($_POST['search'])) {
        $id_userSearch = $_POST['search'];
        $peminjaman = searchPeminjamanByIdUser($id_userSearch);
    } else {
        $peminjaman = getPeminjaman();
    }
    ?>
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
                <th>Action</th>
            </tr>
    </thead>    
    <tbody>   
            <?php foreach ($peminjaman as $index => $data): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['nama_user'] ?></td>
                            <td><?= $data['id_buku'] ?></td>
                            <td><?= $data['judul_buku'] ?></td>
                            <td><?= $data['tgl_peminjaman'] ?></td>
                            <td><?= $data['tgl_pengembalian'] ?></td>
                            <td><?= $data['status_peminjaman'] ?></td>
                            <td>
                                <?php if ($data['status_peminjaman'] !== 'Dikembalikan'): ?>
                                 <button onclick="return confirm('Are you sure you want to return the book?')"
                                    form="form-return-<?= $data['id_peminjaman'] ?>"
                                    class="return-button">Return</button>

                                    <form id="form-return-<?= $data['id_peminjaman'] ?>" method="POST" action="">
                                    <input type="hidden" name="return_id" value="<?= $data['id_peminjaman'] ?>">
                </form>
            <?php endif; ?>
                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
            <p>Data tidak ditemukan</p>
        <?php endif; ?>           
            </div>
        </div>
    </div>
</body>
</html>


