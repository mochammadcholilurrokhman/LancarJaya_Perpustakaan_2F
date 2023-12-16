<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link rel="stylesheet" href="../style/fitur.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        .isi h1 {
            font-size: 30px;
        }

        .content {
            display: flex;
        }

        .isi {
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        .back-btn {
            display: inline-block;
            background-color: black;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
        }

        .back-btn:hover {
            background-color: antiquewhite;
        }
    </style>
</head>

<body>
    <?php
    require_once "../Connection.php";
    include('../komponen/headeruser.php');

    class Buku
    {
        private $conn;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        public function getDetailBuku($id)
        {
            $id = mysqli_real_escape_string($this->conn, $id);
            $query = "SELECT * FROM buku1 WHERE id = $id";
            $result = mysqli_query($this->conn, $query);

            if ($result) {
                return mysqli_fetch_assoc($result);
            } else {
                return false;
            }
        }
    }


    // Membuat objek buku
    $buku = new Buku($conn);

    // Periksa apakah parameter 'id' terkirim
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $databuku = $buku->getDetailBuku($id);

        if ($databuku) {
    ?>
            <div class="content">
                <div id="sidebar">
                    <?php include('../komponen/sidebaradmin.php'); ?>
                    <div class="isi">
                        <h1>Book Details</h1>
                        <?php echo $databuku['sinopsis']; ?>
                        <table>
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td><?php echo $databuku['id'] ?? ''; ?></td>
                                </tr>
                                <tr>
                                    <td>The Title</td>
                                    <td><?php echo $databuku['judul_buku'] ?? ''; ?></td>
                                </tr>
                                <tr>
                                    <td>The Author</td>
                                    <td><?php echo $databuku['pengarang'] ?? ''; ?></td>
                                </tr>
                                <tr>
                                    <td>Year Publication</td>
                                    <td><?php echo $databuku['tahun_terbit'] ?? ''; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><?php echo $databuku['status_buku'] ?? ''; ?></td>
                                </tr>

                            </tbody>
                        </table>
                        <br>
                        <a href="katalog.php" class="back-btn">Back</a>
                    </div>
                </div>
            </div>
</body>

</html>
<?php
        } else {
            echo "Error fetching book details: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid book ID.";
    }

    // Menutup koneksi
    mysqli_close($conn);
?>