<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Katalog</title>
</head>

<body>
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
    <h3>Form Tambah Data Buku</h3>

    <form action="proses_tambah.php" method="post">
        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul_buku" required><br>

        <label for="pengarang">Pengarang:</label>
        <input type="text" name="pengarang" required><br>

        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="text" name="tahun_terbit" required><br>

        <label for="sinopsis">Sinopsis:</label>
        <textarea name="sinopsis" required></textarea><br>

        <label for="status_buku">Status Buku:</label>
        <input type="text" name="status_buku" required><br>

        <button type="submit">Tambah Data</button>
    </form>

    <?php
    include "../Connection.php";
    $query_mysql = mysqli_query($connection, "SELECT * FROM buku") or die(mysqli_error($connection));
    $idbuku = 1;
    while ($databuku = mysqli_fetch_array($query_mysql)) {
    ?>
        <tr>
            <td><?php echo $idbuku++; ?></td>
            <td><?php echo $databuku['judul_buku']; ?></td>
            <td><?php echo $databuku['pengarang']; ?></td>
            <td><?php echo $databuku['tahun_terbit']; ?></td>
            <td><?php echo $databuku['sinopsis']; ?></td>
            <td><?php echo $databuku['status_buku']; ?></td>
            <td>
                <a class="edit" href="editdata.php?id=<?php echo $databuku['id']; ?>">Edit</a>
                <a class="hapus" href="hapusdata.php?id=<?php echo $databuku['id']; ?>">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</body>

</html>