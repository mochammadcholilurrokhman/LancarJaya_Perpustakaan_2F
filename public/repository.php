<?php
require_once '../Config/Connection.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repository Perpustakaan</title>
    <link rel="stylesheet" href="../style/fitur.css">
</head>

<body>
    <?php
    include('../App/header.php');
    $query = "SELECT Judul_repo, pengarang FROM repository"; // Adjust your_table_name
    $result = mysqli_query($conn, $query); // Replace $your_db_connection with your actual connection variable

    $journals = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $journals[] = array($row['Judul_repo'], $row['pengarang']);
    }
    

    $itemsPerPage = 5;
    $totalItems = count($journals);
    $totalPages = ceil($totalItems / $itemsPerPage);

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $startIndex = ($page - 1) * $itemsPerPage;

    // Filter journals based on search query
    $searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
    $filteredJournals = array_filter($journals, function ($journal) use ($searchQuery) {
        return empty($searchQuery) || stripos($journal[0], $searchQuery) !== false || stripos($journal[1], $searchQuery) !== false;
    });

    $currentPageJournals = array_slice($filteredJournals, $startIndex, $itemsPerPage);
    ?>

    <div class="content">
        <div id="sidebar">
            <?php
            include('../App/sidebar.php');
            ?>

            <div class="isi">
                <form action="" method="get">
                    <input type="text" name="search" class="search-box" placeholder="Enter the Journal Title..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                    <button type="submit" class="search-button">Search</button>
                </form>
                
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
                    echo '<a href="?page=' . ($page - 1) . '&search=' . urlencode($searchQuery) . '" class="pagination-button">Prev</a>';
                }

                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<a href="?page=' . $i . '&search=' . urlencode($searchQuery) . '" ' . ($i == $page ? 'class="active"' : '') . '>' . $i . '</a>';
                }

                if ($page < $totalPages) {
                    echo '<a href="?page=' . ($page + 1) . '&search=' . urlencode($searchQuery) . '" class="pagination-button">Next</a>';
                }
                echo '</div>';
                echo '</div>';
                ?>
            </div>
        </div>
    </div>
</body>

</html>
