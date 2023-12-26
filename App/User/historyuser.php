<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman</title>
    <link rel="stylesheet" href="../style/fitur.css">
    <style>

        .history-container {
            display: flex;
            align-items: center;
        }

        .history-item {
            display: flex;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            width: 100%;
        }

        .book-info img {
            max-width: 100px;
            margin-right: 20px;
        }

        .user-info {
            flex-grow: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
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
            include('../komponen/sidebaruser.php');
            ?>

            <div class="isi">

                <div class="history-container">
                    <div class="history-item">
                        <div class="book-info">
                            <img src="../img/BelajarC++.jpeg" alt="BelajarC++">
                        </div>
                        <div class="user-info">
                            <p><strong>Nama Peminjam:</strong> John Doe</p>
                            <p><strong>ID Anggota:</strong> 123456</p>
                            <p><strong>Email:</strong> john.doe@example.com</p>
                            <p><strong>Tipe Anggota:</strong> Mahasiswa</p>
            
                        </div>
                    </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>ID Transaksi</th>
                            <th>Id Buku</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Keterlambatan (Hari)</th>
                            <th>Denda</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>000001</td>
                            <td>Belajar Dasar Pemrograman dengan C++</td>
                            <td>7-12-2023</td>
                            <td>14-12-2023</td>
                            <td></td>
                            <td></td>
                            <td>Belum dikembalikan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
