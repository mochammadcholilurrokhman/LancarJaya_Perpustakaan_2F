<?php

$koneksi = mysqli_connect("localhost", "root", "", "perpustakaan");

function getPengaturanDenda()
{
    global $koneksi;

    $query = "SELECT * FROM pengaturan order by id_pengaturan desc LIMIT 1";

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