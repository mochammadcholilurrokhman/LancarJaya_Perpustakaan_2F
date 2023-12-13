<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Katalog</title>
    <link rel="stylesheet" href="../style/fitur.css">
  <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        .content {
            display: flex;
        }

        .isi {
            border: 1px solid black;
            margin-left: auto;
            margin-right: auto;
        }

        form {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 0.5px solid black;
        }

        .isi .form-title {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .tambah {
            background-color: #4CAF50;
            border: 1.5px solid black;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: antiquewhite;
        }
    </style>
</head>

<body>
    <?php
    include "../Connection.php";
    include('../komponen/headeruser.php');
     if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Query untuk mendapatkan data buku berdasarkan id
        $query = "SELECT * FROM buku1 WHERE id = $id";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $dataBuku = mysqli_fetch_assoc($result);
        } else {
            echo "Error fetching book data: " . mysqli_error($connection);
            exit();
        }
    } else {
        echo "Invalid ID";
        exit();
    }
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../komponen/sidebaradmin.php');
            ?>

            <div class="isi">
                <h2>Edit Buku</h2>

                <form action="proses.php?aksi=ubah" method="post">
                    <input type="hidden" name="id" value="<?php echo $dataBuku['id']; ?>">

                    <label for="judul">The Title:</label>
                    <input type="text" id="judul_buku" name="judul_buku" value="<?php echo $dataBuku['judul_buku']; ?>" required>

                    <label for="pengarang">The Author:</label>
                    <input type="text" id="pengarang" name="pengarang" value="<?php echo $dataBuku['pengarang']; ?>" required>

                    <label for="tahun_terbit">Year Publication:</label>
                    <input type="text" id="tahun_terbit" name="tahun_terbit" value="<?php echo $dataBuku['tahun_terbit']; ?>" required>

                    <label for="sinopsis">Sinopsis:</label>
                    <textarea name="sinopsis" required><?php echo $dataBuku['sinopsis']; ?></textarea><br>


                    <label for="status">Status:</label>
                    <input type="text" id="status_buku" name="status_buku" value="<?php echo $dataBuku['status_buku']; ?>" required>

                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>