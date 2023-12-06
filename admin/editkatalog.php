<!DOCTYPE html>
<html lang="en">
<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .book-cover {
            max-width: 50px;
            max-height: 70px;
        }

        .add-btn {
            background-color: #008CBA; /* Blue */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-bottom: 10px;
            cursor: pointer;
            margin-right: auto;
        }

        .details-btn {
          background-color: #1336CA;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #FB923C;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
        }
        .delete-btn {
            background-color: #CA1313;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Perpustakaan</title>
    <link rel="stylesheet" href="../style/fitur.css">
</head>

<body>
    <?php
    include('../komponen/headeradmin.php');
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../komponen/sidebaradmin.php');
            ?>

            <div class="isi">
                <form method="GET" action="">
                    <input type="text" name="search" class="search-box" placeholder="Cari buku..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit" class="search-button">Search</button>
                </form>

                <button class="add-btn"> + Add the Book</button>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>The Title</th>
                <th>The Author</th>
                <th>Year Publication</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Isi tabel akan diisi dengan data buku -->
            <tr>
            <td>1</td>
                <td><img src="../img/belajarC++.jpeg" alt="Book Cover" class="book-cover">Belajar C++</td>
                <td>John Doe</td>
                <td>2023</td>
                <td>Available</td>
                <td>
                    <a href="detailsbuku.php?id=1" class="details-btn">Details</a>
                    <a href="editbuku.php?id=1" class="edit-btn">Edit</a>
                    <button class="delete-btn">Delete</button>
                </td>
            </tr>
            <!-- Tambahkan baris-baris data buku sesuai kebutuhan -->
        </tbody>
    </table>
            </div>
        </div>
    </div>
</body>

</html>