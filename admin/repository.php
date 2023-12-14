<!DOCTYPE html>
<html lang="en">
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
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
        background-color: #008CBA;
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
    <title>Repository Perpustakaan</title>
    <link rel="stylesheet" href="../style/fitur.css">
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
                <form method="GET" action="">
                    <input type="text" name="search" class="search-box" placeholder="Cari jurnal    ..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit" class="search-button">Search</button>
                </form>
                <br>
                <a  href="tambahrepo.php" class="add-btn"> + Add Journal</a>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>The Title</th>
                            <th>The Author</th>
                            <th>Year Publication</th>
                            <th>Key Words</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        // Check if the search parameter is set
                        if (isset($_GET['search'])) {
                            $search = mysqli_real_escape_string($connection, $_GET['search']);
                            $query = "SELECT * FROM repository1 WHERE Judul_Repo LIKE '%$search%'";
                        } else {
                            $query = "SELECT * FROM repository1";
                        }

                        $query_mysql = mysqli_query($connection, $query) or die(mysqli_error($connection));
                        $idrepo = 1;
                        while ($dataRepo = mysqli_fetch_array($query_mysql)) {
                        ?>
                            <tr>
                                <td><?php echo $idrepo++; ?></td>
                                <td><?php echo $dataRepo['Judul_Repo']; ?></td>
                                <td><?php echo $dataRepo['pengarang']; ?></td>
                                <td><?php echo $dataRepo['tahun_terbit']; ?></td>
                                <td><?php echo $dataRepo['Kata_Kunci']; ?></td>
                                <td>
                                   <a href="detailsrepo.php?id=<?php echo $dataRepo['id_repo']; ?>" class="details-btn">Details</a>
                                    <a href="editrepo.php?id=<?php echo $dataRepo['id_repo']; ?>" class="edit-btn">Edit</a>
                                    <a href="#" onclick="confirmDelete(<?php echo $dataRepo['id_repo']; ?>)" class="delete-btn">Delete</a></td>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
     <script>
    function confirmDelete($id) {
        var r = confirm("Are you sure you want to delete this book?");
        if (r == true) {
            // User clicked "OK", perform the delete action
            window.location.href = "prosesrepo.php?aksi=hapus&id_repo=" + $id;
        } else {
            // User clicked "Cancel", do nothing
        }
    }
</script>
</body>

</html>