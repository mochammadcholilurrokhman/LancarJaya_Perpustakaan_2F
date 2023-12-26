<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../../style/fitur.css">

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            height: 5px;
        }

        th,
        td {
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

        .edit-btn {
            background-color: #FB923C;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
        }

        .delete-btn {
            background-color: #CA1313;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    include('../headeruser.php');
    $koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../sidebaruser.php');
            function getKeranjang()
            {
                global $koneksi;
                $username = $_SESSION['username'];

                $query = "SELECT keranjang.*, user.username, user.nama_user, buku.judul_buku
         FROM keranjang
          INNER JOIN user ON keranjang.id_user = user.id_user
          INNER JOIN buku ON keranjang.id_buku = buku.id_buku
          WHERE user.username = '$username' 
          ORDER BY keranjang.id_keranjang ASC";

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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($keranjang as $index => $data) : ?>
                        <tr>
                            <td><?= $data['id_keranjang'] ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['nama_user'] ?></td>
                            <td><?= $data['judul_buku'] ?></td>
                            <td>
                                <a href="../../Function/User/borrow.php?id_buku=<?= $data['id_buku']; ?>" class="edit-btn">Borrow</a>
                                <a href="#" onclick="confirmDelete(<?php echo $data['id_keranjang']; ?>)" class="delete-btn">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete($id) {
            var r = confirm("Are you sure you want to delete this book?");
            if (r == true) {
                // "OK"
                window.location.href = "../../Function/User/delete.php?aksi=hapus&id_keranjang=" + $id;
            } else {
                // "Cancel"
            }
        }
    </script>
</body>

</html>