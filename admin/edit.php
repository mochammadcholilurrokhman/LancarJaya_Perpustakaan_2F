
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Buku</title>
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

        .update-button {
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
  include "../komponen/headeruser.php";
  include ("../Connection.php");
        $id = $_GET['id'];
        $query = "SELECT * FROM buku1 where id = $id";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($connection);
  ?>

  <div class="content">
    <div id="sidebar">
      <?php
      include('../komponen/sidebaradmin.php');
      ?>
    </div>

    <div class="isi">
      <h3>Form Edit Data Buku</h3>

      <form action="proses.php?aksi=ubah" method="post">
        <input type="hidden" name="id_buku" value="<?php echo $row['id']; ?>">

        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul_buku" value="<?php echo $row['judul_buku']; ?>" required>

        <label for="pengarang">Pengarang:</label>
        <input type="text" name="pengarang" value="<?php echo $row['pengarang']; ?>" required>

        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" required>

        <label for="sinopsis">Sinopsis:</label>
        <textarea name="sinopsis" value="<?php echo  $sinopsis; ?>" required></textarea><br>

        <label for="status_buku">Status Buku:</label>
        <input type="text" name="status_buku" value="<?php echo $row ['status_buku']; ?>" required><br>

        <button type="submit" class="tambah">Edit Data</button>
      </form>
    </div>
  </div>

</body>

</html>
