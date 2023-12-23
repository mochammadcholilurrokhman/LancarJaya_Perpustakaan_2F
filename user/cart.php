<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../style/fitur.css">

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
    include('../komponen/headeruser.php');
    $koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../komponen/sidebaruser.php');
            function getKeranjang(){
                global $koneksi;

                $query = "SELECT keranjang.*, user.username, user.nama_user, buku.judul_buku
                        FROM keranjang
                        INNER JOIN user ON keranjang.id_user = user.id_user
                        INNER JOIN buku ON keranjang.id_buku = buku.id_buku
                        ORDER BY keranjang.id_keranjang asc";
                $stmt = mysqli_prepare($koneksi, $query);

                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
        
                $keranjang = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    $keranjang[] = $row;
                }
        
                mysqli_stmt_close($stmt);
        
                return $keranjang;
            }

            $keranjang = getKeranjang();
            ?>
            <table border="1"> 
    <thead>
            <tr>
                <th>ID</th>
                <th>NIM/NIP</th>
                <th>Name</th>
                <th>The Book Title</th>
                <th>Qty</th>
            </tr>
    </thead>    
    <tbody>   
            <?php foreach ($keranjang as $index => $data): ?>
                        <tr>
                            <td><?= $data['id_keranjang'] ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['nama_user'] ?></td>
                            <td><?= $data['judul_buku'] ?></td>
                            <td><?= $data['qty'] ?></td>
                        </tr>
                    <?php endforeach; ?>
        </tbody>
    </table>
        </div>
    </div>
</body>
</html>