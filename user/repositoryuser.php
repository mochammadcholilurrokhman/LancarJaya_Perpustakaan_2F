<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Perpustakaan</title>
    <link rel="stylesheet" href="../style/fitur.css">
</head>

<body>
    <?php
    include('../komponen/headeruser.php');
    $journals = array(
        array("Pembuatan Mesin Pengupas Kulit Jagung Kapasitas 150 kg/jam
        ", "Theo Sakti Yudistira"),
        array("Judul Jurnal 2", "Penulis Jurnal 2"),
        array("Judul Jurnal 3", "Penulis Jurnal 3"),
        array("Judul Jurnal 4", "Penulis Jurnal 4"),
        array("Judul Jurnal 5", "Penulis Jurnal 5"),
        array("Judul Jurnal 5", "Penulis Jurnal 5"),
        array("Judul Jurnal 5", "Penulis Jurnal 5"),
    );

    $itemsPerPage = 5;
    $totalItems = count($journals);
    $totalPages = ceil($totalItems / $itemsPerPage);

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $startIndex = ($page - 1) * $itemsPerPage;

    $currentPageJournals = array_slice($journals, $startIndex, $itemsPerPage);
    ?>

    <div class="content">
        <div id="sidebar">
            <?php
            include('../komponen/sidebaruser.php');
            ?>

            <div class="isi">
                <input type="text" class="search-box" placeholder="Cari jurnal...">
                <button class="search-button">Search</button>
                <?php
                foreach ($currentPageJournals as $index => $journal) {
                    $boxClass = "journal-box" . ($index + 1);
                ?>
                    <div class="<?php echo $boxClass; ?>">
                        <h2><?php echo $journal[0]; ?></h2>
                        <p>Penulis: <?php echo $journal[1]; ?></p>
                    </div>
                <?php
                }
                ?>

                <?php
                echo '<div class="pagination">';
                echo '<div class="pagination-container">';
                if ($page > 1) {
                    echo '<a href="?page=' . ($page - 1) . '" class="pagination-button">Prev</a>';
                }

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?page=' . $i . '" ' . ($i == $page ? 'class="active"' : '') . '>' . $i . '</a>';
                }

                if ($page < $totalPages) {
                    echo '<a href="?page=' . ($page + 1) . '" class="pagination-button">Next</a>';
                }
                echo '</div>';
                echo '</div>';
                ?>
            </div>
        </div>
    </div>
</body>

</html>