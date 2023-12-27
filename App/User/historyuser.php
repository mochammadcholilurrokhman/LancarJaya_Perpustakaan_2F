<!DOCTYPE html>
<html lang="en">
<?php require_once '../../Function/admin/pengaturan.php'; ?>  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman</title>
    <link rel="stylesheet" href="../../style/fitur.css">
    <style>
        .history-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-info {
            flex-grow: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    require_once '../../Config/Connection.php';

    $username = $_SESSION['username'];
    $userQuery = "SELECT * FROM user WHERE username = $username";
    $userResult = mysqli_query($conn, $userQuery);

    if ($userResult) {
        $userData = mysqli_fetch_assoc($userResult);
    }

    $historyQuery = "SELECT p.id_peminjaman, p.tgl_peminjaman, p.tgl_pengembalian, p.tgl_batas_pengembalian, 
    p.status_peminjaman, d.jml_denda, b.judul_buku, b.pengarang 
    FROM peminjaman p
    JOIN buku b ON p.id_buku = b.id_buku 
    JOIN user u on p.id_user = u.id_user 
    LEFT OUTER JOIN denda d ON p.id_peminjaman = d.id_peminjaman 
    WHERE username = $username";

    $historyResult = mysqli_query($conn, $historyQuery);
    $historyData = [];

    $pengaturan = getPengaturanDenda();

    if ($historyResult) {
        while ($row = mysqli_fetch_assoc($historyResult)) {
            // Calculate fine based on settings
            $fineAmount = $row['jml_denda']; // Get fine from database
            $fineStatus = 'Belum Dibayar';
    
            // If fine is not paid and overdue, calculate based on settings
            if ($fineStatus === 'Belum Dibayar' && strtotime($row['tgl_batas_pengembalian']) < strtotime(date('Y-m-d H:i:s'))) {
                $dateDifference = ceil((strtotime(date('Y-m-d H:i:s')) - strtotime($row['tgl_batas_pengembalian'])) / (60 * 60 * 24));
                $fineAmount = $dateDifference * $pengaturan['denda_perhari'];
    
                // Update fine information in the database
                $updateDendaQuery = "UPDATE denda SET jml_denda = '$fineAmount' WHERE id_peminjaman = '{$row['id_peminjaman']}'";
                $resultUpdateDenda = mysqli_query($conn, $updateDendaQuery);
    
                if (!$resultUpdateDenda) {
                    echo "<script>alert('Error updating fine information: " . mysqli_error($conn) . "');</script>";
                }
            }
    
            $row['jml_denda'] = $fineAmount;
            $historyData[] = $row;
        }
    }
    ?>
    <?php
    include('../headeruser.php');
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../sidebaruser.php');
            ?>

            <div class="isi">
                <?php if (!empty($userData)) : ?>
                    <div class="history-container">
                        <div class="user-info">
                            <p><strong>Nama Peminjam:</strong> <?= $userData['nama_user']; ?></p>
                            <p><strong>ID Anggota:</strong> <?= $userData['id_user']; ?></p>
                            <p><strong>Posisi:</strong> <?= $userData['posisi']; ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($historyData)) : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID Peminjaman</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Tanggal Batas Pengembalian</th>
                                <th>Status</th>
                                <th>Denda</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($historyData as $data) : ?>
                                <tr>
                                    <td><?= $data['id_peminjaman']; ?></td>
                                    <td><?= $data['tgl_peminjaman']; ?></td>
                                    <td><?= $data['tgl_pengembalian']; ?></td>
                                    <td><?= $data['tgl_batas_pengembalian']; ?></td>
                                    <td><?= $data['status_peminjaman']; ?></td>
                                    <td><?= $data['jml_denda']; ?></td>
                                    <td><?= $data['judul_buku']; ?></td>
                                    <td><?= $data['pengarang']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>Tidak ada data riwayat peminjaman.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>

</html>