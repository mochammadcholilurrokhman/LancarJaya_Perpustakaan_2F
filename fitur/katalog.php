    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Katalog Perpustakaan</title>
        <link rel="stylesheet" href="../style/fitur.css">


    </head>

    <body>
<<<<<<< HEAD
        <?php
=======
        <?php 
>>>>>>> 7e804616f428cce431339e1a28b361e1f5b65ed6
        include('../komponen/header.php');
        ?>

        <div class="content">
            <div id="sidebar">
                <?php
                include('../komponen/sidebar.php');
                ?>

                <div class="isi">
                    <input type="text" class="search-box" placeholder="Cari buku...">
                    <button class="search-button">Search</button>
                    <?php
                    $books = array(
                        "BelajarC++",
                        "BelajarC++",
                        "BelajarC++",
                        "BelajarC++",
                        "BelajarC++",
                        "BelajarC++",
                        "BelajarC++",
                        "BelajarC++",
                        "BelajarC++",
                        "BelajarC++",
                        "BelajarC++",
                        "BelajarC++",
                    );

                    $booksPerPage = 8;
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $startIndex = ($page - 1) * $booksPerPage;
                    $currentBooks = array_slice($books, $startIndex, $booksPerPage);

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

                    $totalPages = ceil(count($books) / $booksPerPage);

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