<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Perpustakaan</title>
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
    include "../Connection.php";
    include('../komponen/headeruser.php');
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../komponen/sidebaradmin.php');
            ?>

            <div class="isi">
                <h2 class="form-title">Update Form</h2>
                <form action="process_update.php" method="post" enctype="multipart/form-data">
                    <label for="bookId">ID Buku:</label>
                    <input type="text" id="bookId" name="bookId" required>

                    <label for="bookTitle">Judul Buku:</label>
                    <input type="text" id="bookTitle" name="bookTitle" required>

                    <label for="bookAuthor">Author Buku:</label>
                    <input type="text" id="bookAuthor" name="bookAuthor" required>

                    <label for="publicationYear">Tahun Terbit:</label>
                    <input type="text" id="publicationYear" name="publicationYear">

                    <label for="bookStatus">Status:</label>
                    <select id="bookStatus" name="bookStatus">
                        <option value="available">Available</option>
                        <option value="unavailable">Unavailable</option>
                    </select>

                    <label for="synopsis">Sinopsis:</label>
                    <textarea id="synopsis" name="synopsis"></textarea>

                    <label for="coverImage">Upload Cover (Gambar):</label>
                    <input type="file" id="coverImage" name="coverImage">
                    <br><br>
                    <button type="submit" class="update-button">Update Data</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>