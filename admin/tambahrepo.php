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
    require_once "../Connection.php";
    include('../komponen/headeruser.php');
    ?>
    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        if ($pesan == "input") {
            echo "Data berhasil di input.";
        } else if ($pesan == "update") {
            echo "Data berhasil di update.";
        } else if ($pesan == "hapus") {
            echo "Data berhasil di hapus.";
        }
    }
    ?>
    <div class="content">
        <div id="sidebar">
    <?php
        include('../komponen/sidebaradmin.php');
     ?>  
     <div class="isi">
    <h3>Form Tambah Data Buku</h3>

    <form action="prosesrepo.php?aksi=tambah" method="post">
        <label for="Judul_Repo">Judul Repository:</label>
        <input type="text" name="Judul_Repo" required><br>

        <label for="pengarang">Pengarang:</label>
        <input type="text" name="pengarang" required><br>

        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="text" name="tahun_terbit" required><br>

        <label for="Kata_Kunci">Key Words</label>
        <input type="text" name="Kata_Kunci" required><br>

        <label for="status_repo">Status Repo:</label>
        <input type="text" name="status_repo" required><br>

        <button type="submit" class="tambah">Tambah Data</button>
    </form>
</div>
    </div>
</div>

</body>

</html>