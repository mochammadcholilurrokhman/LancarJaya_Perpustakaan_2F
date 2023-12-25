<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
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

        .acc-button {
            background-color: green;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .tolak-button {
            background-color: red;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
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
            include('../komponen/sidebaradmin.php');
            function getKeranjang(){
                global $koneksi;

                $query = "SELECT keranjang.*, user.username, user.nama_user,buku.id_buku, buku.judul_buku
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

            function insertDataToCirculation($idKeranjang, $idUser, $idBuku) {
                global $koneksi;
        
                // Sanitize and validate input data (you should customize this based on your specific requirements)
                $idKeranjang = mysqli_real_escape_string($koneksi, $idKeranjang);
                $idUser = mysqli_real_escape_string($koneksi, $idUser);
                $idBuku = mysqli_real_escape_string($koneksi, $idBuku);
        
                // Get the current date for tgl_peminjaman
                $tglPeminjaman = date("Y-m-d");
        
                // Calculate the tgl_batas_pengembalian (14 days from now)
                $tglBatasPengembalian = date("Y-m-d", strtotime($tglPeminjaman . ' + 14 days'));
        
                // Perform the insertion into the peminjaman table
                
                $query = "INSERT INTO peminjaman (tgl_peminjaman, tgl_batas_pengembalian, status, id_user, id_buku)
                        VALUES ('$tglPeminjaman', '$tglBatasPengembalian', 'Belum Dikembalikan', '$idUser', '$idBuku')";
                
        
                $result = mysqli_query($koneksi, $query);
        
                if ($result) {
                    // Optionally, you can perform additional actions after successful insertion
                    // For example, you may want to update the status in the keranjang table
        
                    // For demonstration purposes, alert a success message
                    echo '<script>alert("Data inserted into peminjaman table successfully!");</script>';
                } else {
                    // Handle the case where the insertion failed
                    echo '<script>alert("Error: ' . mysqli_error($koneksi) . '");</script>';
                }
            }
            ?>
            <table border="1"> 
    <thead>
            <tr>
                <th>ID</th>
                <th>NIM/NIP</th>
                <th>Name</th>
                <th>Id Book</th>
                <th>The Book Title</th>
                <th>Action</th>
            </tr>
    </thead>    
    <tbody>   
            <?php foreach ($keranjang as $index => $data): ?>
                        <tr>
                            <td><?= $data['id_keranjang'] ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['nama_user'] ?></td>
                            <td><?= $data['id_buku'] ?></td>
                            <td><?= $data['judul_buku'] ?></td>
                            <td>
                                <button class="acc-button" onclick="accButtonClicked()">Acc</button>
                                <button class="tolak-button" onclick="tolakButtonClicked()">Tolak</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
        </tbody>
    </table>
        </div>
    </div>
    <script>
    function accButtonClicked() {
        // Get data from the row
        var idKeranjang = this.closest('tr').querySelector('td:nth-child(1)').innerText;
        var idUser = this.closest('tr').querySelector('td:nth-child(2)').innerText;
        var idBuku = this.closest('tr').querySelector('td:nth-child(4)').innerText;

        // Call the function to insert data into the circulation table
        insertDataToCirculation(idKeranjang, idUser, idBuku);

        // Optional: You can remove the alert or customize it based on your needs
        alert('Peminjaman telah disetujui!');
    }

    function tolakButtonClicked() {
        // Add logic for "Tolak" button click
        alert('Peminjaman telah ditolak!');
    }
    
</script>
</body>
</html>