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
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../komponen/sidebaruser.php');
            ?>

            <div class="isi">
                <form method="GET" action="">
                    <input type="text" name="search" class="search-box" placeholder="Cari buku..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit" class="search-button">Search</button>
                </form>

                <?php
                $books = array(
                    "BelajarC++",
                    "BelajarJava",
                    "BelajarPython",
                    "PemrogramanWeb",
                    "DataScience",
                    "Algoritma",
                    "JaringanKomputer",
                    "MobileDevelopment",
                    "ArtificialIntelligence",
                    "CyberSecurity",
                    "DatabaseManagement",
                    "MachineLearning",
                );

                // Filter books based on search query
                $searchQuery = isset($_GET['search']) ? strtolower($_GET['search']) : '';
                $filteredBooks = array_filter($books, function ($book) use ($searchQuery) {
                    return strpos(strtolower($book), $searchQuery) !== false;
                });

                $booksPerPage = 8;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $startIndex = ($page - 1) * $booksPerPage;
                $currentBooks = array_slice($filteredBooks, $startIndex, $booksPerPage);

                echo '<div class="gambar-container">';
                foreach ($currentBooks as $key => $book) {
                    echo '<div class="book-item">';
                    echo '<img src="../img/' . $book . '.jpeg" alt="' . $book . '">';
                    echo '<p class="book-title">' . $book . '</p>';
                    echo '</div>';

                    if (($key + 1) % 3 === 0) {
                        echo '<p>';
                    }
                    echo '</p>';
                }
                echo '</div>';

                $totalPages = ceil(count($filteredBooks) / $booksPerPage);

                echo '<div class="pagination">';
                echo '<div class="pagination-container">';
                if ($page > 1) {
                    echo '<a href="?search=' . $searchQuery . '&page=' . ($page - 1) . '" class="pagination-button">Prev</a>';
                }

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?search=' . $searchQuery . '&page=' . $i . '" ' . ($i == $page ? 'class="active"' : '') . '>' . $i . '</a>';
                }

                if ($page < $totalPages) {
                    echo '<a href="?search=' . $searchQuery . '&page=' . ($page + 1) . '" class="pagination-button">Next</a>';
                }
                echo '</div>';
                echo '</div>';
                ?>

            </div>
        </div>
    </div>
</body>

</html>