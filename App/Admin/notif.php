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

    $query = "SELECT peminjaman.*, user.nama_user, buku.judul_buku
          FROM peminjaman 
          JOIN user ON peminjaman.id_user = user.id_user 
          JOIN buku ON peminjaman.id_buku = buku.id_buku
          WHERE status_peminjaman = 'Pending'";

    $result = mysqli_query($koneksi, $query);

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <body>
        <div class="content">
            <div id="sidebar">
                <?php include('../sidebaradmin.php'); ?>
                <div class=isi>
                <?php
                // Check if the session variable is set and display the success message
                if (isset($_SESSION['success_message'])) {
                    echo '<p style="color: green;">' . $_SESSION['success_message'] . '</p>';
                    // Unset the session variable to clear the message after displaying it
                    unset($_SESSION['success_message']);
                }
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
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id_peminjaman'] . "</td>";
                                echo "<td>" . $row['id_user'] . "</td>";
                                echo "<td>" . $row['nama_user'] . "</td>";
                                echo "<td>" . $row['judul_buku'] . "</td>";
                                echo "<td>
                                <form method='post' action='../../Function/Admin/approve.php'>
                                <input type='hidden' name='id_peminjaman' value='" . $row['id_peminjaman'] . "'>
                            <button class='edit-btn'>Approve</button>
                            <button onclick=\"confirmDelete(" . $row['id_peminjaman'] . ");\" class='delete-btn'>Delete</button>                          </form>
                          </td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
         <script>
    function confirmDelete($id) {
        var r = confirm("Are you sure you want to delete this book?");
        if (r == true) {
            // User clicked "OK", perform the delete action
            window.location.href = "../../Function/Admin/proses.php?aksi=hapus&id=" + $id;
        } else {
            // User clicked "Cancel", do nothing
        }
    }
</script>
    </body>

    </html>


