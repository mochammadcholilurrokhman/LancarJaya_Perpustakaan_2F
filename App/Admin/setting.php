<?php

$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");

function getPengaturanDenda()
{
    global $koneksi;

    $query = "SELECT * FROM pengaturan LIMIT 1";

    $result = mysqli_query($koneksi, $query);

    $pengaturan = mysqli_fetch_assoc($result);

    return $pengaturan;
}

function tambahPengaturanDenda($dendaPerHari, $batasBuku, $batasHari)
{
    global $koneksi;

    $query = "INSERT INTO pengaturan (denda_perhari, batas_buku, batas_hari) VALUES ('$dendaPerHari', '$batasBuku', '$batasHari')";

    $result = mysqli_query($koneksi, $query);

    return $result;
}

function updatePengaturanDenda($dendaPerHari, $batasBuku, $batasHari)
{
    global $koneksi;

    mysqli_autocommit($koneksi, false);

    try {
        $query = "UPDATE pengaturan SET denda_perhari = ?, batas_buku = ?, batas_hari = ? LIMIT 1";

        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "dii", $dendaPerHari, $batasBuku, $batasHari);
        mysqli_stmt_execute($stmt);

        mysqli_commit($koneksi);

        mysqli_stmt_close($stmt);

        return true;
    } catch (Exception $e) {
        mysqli_rollback($koneksi);

        throw new Exception("Error: " . $e->getMessage());
    } finally {
        mysqli_autocommit($koneksi, true);
    }
}

$pengaturan = getPengaturanDenda();

$notification = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dendaPerHari = $_POST["denda_perhari"];
    $batasBuku = $_POST["batas_buku"];
    $batasHari = $_POST["batas_hari"];

    try {
        if (isset($_POST["simpan_pengaturan"]) && $_POST["simpan_pengaturan"] == "tambah") {
            tambahPengaturanDenda($dendaPerHari, $batasBuku, $batasHari);
            $notification = 'Pengaturan Denda berhasil ditambahkan.';
        } else {
            updatePengaturanDenda($dendaPerHari, $batasBuku, $batasHari);
            $notification = 'Pengaturan Denda berhasil diperbarui.';
        }

        $pengaturan = getPengaturanDenda();
    } catch (Exception $e) {
        $notification = $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan</title>
    <link rel="stylesheet" href="../../style/fitur.css">
    <style>
         form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f1f1f1;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: white;
        }
    </style>
</head>

<body>
    <?php if ($notification) : ?>
        <p style="color: <?= strpos($notification, 'berhasil') !== false ? 'green' : 'red' ?>;"><?= $notification ?></p>
    <?php endif; ?>
    <?php
    include('../headeruser.php');
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../sidebaradmin.php');
            ?>
            <div class="isi">
                <br><br><br><br>
                <form action="" method="POST">
                    <label for="denda_perhari">Charge / Day (Rp):</label>
                    <input type="number" step="" name="denda_perhari" id="denda_perhari" value="" required>
                    <br><br>

                    <label for="batas_buku">Limited Book to Borrow:</label>
                    <input type="number" name="batas_buku" id="batas_buku" value="" required>
                    <br><br>

                    <label for="batas_hari">Limited Day to Borrow:</label>
                    <input type="number" name="batas_hari" id="batas_hari" value="" required>
                    <br><br>

                    <button type="submit" name="simpan_pengaturan" value="tambah">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>