<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman</title>
    <link rel="stylesheet" href="../style/fitur.css">
    
</head>

<body>
    <?php
    include('../komponen/headeruser.php');
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../komponen/sidebaruser.php');
            ?>

            <div class="isi">
                <h2>Riwayat Peminjaman Buku</h2>

                <div class="history-container">
                    <div class="history-item">
                        <div class="book-info">
                            <img src="../img/BelajarC++.jpeg" alt="BelajarC++">
                        </div>
                        <div class="user-info">
                            <p><strong>Nama Peminjam:</strong> John Doe</p>
                            <p><strong>ID Anggota:</strong> 123456</p>
                            <p><strong>Email:</strong> john.doe@example.com</p>
                            <p><strong>Tipe Anggota:</strong> Premium</p>
                        </div>
                        <p><strong>Tanggal:</strong> 2023-01-01</p>
                        <p><strong>Status:</strong> Dikembalikan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
