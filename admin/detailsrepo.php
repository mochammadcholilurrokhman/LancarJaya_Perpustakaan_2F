<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Buku</title>
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
    </style>    </style>
</head>

<body>
    <?php
    require_once '../Connection.php';
    include('../komponen/headeruser.php');

    // Periksa apakah parameter 'id' terkirim
    if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM repository1 WHERE id_repo = $id";
    $result = mysqli_query($conn, $query);

        if ($result) {
            $dataRepo = mysqli_fetch_assoc($result);
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
            <?php if (isset($dataRepo['id_repo'])) : ?>
                <tr>
                    <td>ID</td>
                    <td><?php echo $dataRepo['id_repo']; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($dataRepo['Judul_Repo'])) : ?>
                <tr>
                    <td>The Title</td>
                    <td><?php echo $dataRepo['Judul_Repo']; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($dataRepo['pengarang'])) : ?>
                <tr>
                    <td>The Author</td>
                    <td><?php echo $dataRepo['pengarang']; ?></td>
                </tr>
            <?php endif; ?>
            <?php if (isset($dataRepo['tahun_terbit'])) : ?>
                <tr>
                    <td>Year Publication</td>
                    <td><?php echo $dataRepo['tahun_terbit']; ?></td>
                </tr>
            <?php endif; ?>
              <?php if (isset($dataRepo['Kata_Kunci'])) : ?>
                <tr>
                    <td>Key Words</td>
                    <td><?php echo $dataRepo['Kata_Kunci']; ?></td>
                </tr>
            <?php endif; ?>
           <?php if (isset($dataRepo['status_repo'])) : ?>
                <tr>
                    <td>Status</td>
                    <td><?php echo $dataRepo['status_repo']; ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br>
    <a href="repository.php" class="back-btn">Back</a>
</div>

        </div>
    </div>

    <?php
        } else {
            echo "Error fetching book details: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid book ID.";
    }
    ?>
</body>
</html>
