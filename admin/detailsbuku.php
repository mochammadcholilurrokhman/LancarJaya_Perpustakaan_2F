<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Buku</title>
    <link rel="stylesheet" href="../style/fitur.css">
    <style>
        /* Style CSS Anda tetap sama */
    </style>
</head>

<body>
    <?php
    include "../Connection.php";
    include('../komponen/headeruser.php');

    // Periksa apakah parameter 'id' terkirim
    if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    $query = "SELECT * FROM buku1 WHERE id = $id";
    $result = mysqli_query($connection, $query);

        if ($result) {
            $databuku = mysqli_fetch_assoc($result);
    ?>

    <div class="content">
        <div id="sidebar">
            <?php
            include('../komponen/sidebaradmin.php');
            ?>
            <div class="isi">
    <h1>Details Buku</h1>
    <table>
        <tbody>
            <?php if(isset($databuku['sinopsis'])) 
            echo $databuku ['sinopsis']?>
            <?php if (isset($databuku['id'])) : ?>
                <tr>
                    <td>ID</td>
                    <td><?php echo $databuku['id']; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($databuku['judul_buku'])) : ?>
                <tr>
                    <td>The Title</td>
                    <td><?php echo $databuku['judul_buku']; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($databuku['pengarang'])) : ?>
                <tr>
                    <td>The Author</td>
                    <td><?php echo $databuku['pengarang']; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($databuku['tahun_terbit'])) : ?>
                <tr>
                    <td>Year Publication</td>
                    <td><?php echo $databuku['tahun_terbit']; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($databuku['status_buku'])) : ?>
                <tr>
                    <td>Status</td>
                    <td><?php echo $databuku['status_buku']; ?></td>
                </tr>
            <?php endif; ?>
            <!-- Tambahkan baris sesuai dengan kolom yang ada di tabel buku -->
        </tbody>
    </table>
    <br>
    <a href="katalog.php" class="back-btn">Back</a>
</div>

        </div>
    </div>

    <?php
        } else {
            echo "Error fetching book details: " . mysqli_error($connection);
        }
    } else {
        echo "Invalid book ID.";
    }
    ?>
</body>
</html>
