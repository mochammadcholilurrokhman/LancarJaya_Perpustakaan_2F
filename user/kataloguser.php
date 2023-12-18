<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Perpustakaan</title>
    <link rel="stylesheet" href="../style/fitur.css">
    <style>
        .modal {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .modal-content button:hover {
            background-color: #2980b9;
        }

        .modal-content {
            margin: auto;
            padding: 20px;
            background-color: #fefefe;
            border: 1px solid #888;
            width: 60vw;
            max-width: 400px;
        }

        .book-details {
            flex: 1;
            text-align: left;
        }

        .modal img {
            max-width: 100%;
            height: auto;
            margin: 0 auto;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    include('../komponen/headeruser.php');
    ?>
    <div id="myModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <img class="modal-image" id="bookImage" alt="Book Image">
            <div class="book-details">
                <h2 id="bookTitle"></h2>
                <p id="bookInfo"></p>
                <br>
                <button onclick="addToCart()" >Add to Cart</button>
                <button onclick="borrowBook()">Borrow</button>
            </div>
        </div>
    </div>

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
                    echo '<img class="book-image" src="../img/' . $book . '.jpeg" alt="' . $book . '">';
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var bookImages = document.querySelectorAll('.book-image');

            bookImages.forEach(function(image) {
                image.addEventListener('click', function(event) {
                    var bookTitle = image.alt;
                    var bookImageUrl = image.src;
                    var bookAuthor = "John Doe";
                    var bookYear = 2022;

                    openModal(bookTitle, bookImageUrl, bookAuthor, bookYear);
                });
            });
        });

        function openModal(bookTitle, bookImageUrl, bookAuthor, bookYear) {
            var modal = document.getElementById("myModal");
            var modalImage = document.getElementById("bookImage");
            var modalTitle = document.getElementById("bookTitle");
            var modalInfo = document.getElementById("bookInfo");

            if (modal.style.display !== "flex") {
                modalImage.src = bookImageUrl;
                modalTitle.innerHTML = "<br>Title : " + bookTitle;
                modalInfo.innerHTML = "Author : " + bookAuthor + "<br>Year : " + bookYear;

                modal.style.display = "flex";
            }
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.style.display = "none";
        }

        function borrowBook() {
            alert("Book borrowed!");
            closeModal();
        }

        function addToWishlist() {
            alert("Book added to wishlist!");
            closeModal();
        }

        window.onclick = function(event) {
            var modal = document.getElementById("myModal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
         document.addEventListener('DOMContentLoaded', function() {
            // Memulihkan keranjang belanja dari localStorage saat halaman dimuat
            restoreCart();
        });
    function addToCart() {
    // Mendapatkan informasi buku yang akan ditambahkan ke keranjang
    var bookTitle = document.getElementById("bookTitle").innerText;
    var bookImageUrl = document.getElementById("bookImage").src;
    var bookAuthor = "John Doe"; // Ganti dengan informasi penulis buku
    var bookYear = 2022; // Ganti dengan tahun penerbitan buku

    // Membuat elemen baru untuk produk di keranjang
    var cartItem = document.createElement("div");
    cartItem.className = "cart-item";

    // Menambahkan konten ke dalam elemen keranjang
    cartItem.innerHTML = `
        <img src="${bookImageUrl}" alt="${bookTitle}">
        <div class="item-detail">
            <h3>${bookTitle}</h3>
            <div class="item-price">IDR 30K</div> <!-- Ganti dengan harga buku -->
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
    `;

    // Menemukan elemen keranjang pada headeruser.php
    var cartContainer = parent.document.getElementById("shoppingCart");

    // Menambahkan elemen produk ke dalam keranjang
    cartContainer.appendChild(cartItem);

    // Memperbarui tampilan keranjang pada headeruser.php
    parent.updateCartView();
        alert ("buku")
    // Menutup modal setelah menambahkan ke keranjang
        saveCartToLocalStorage();

    closeModal();
};
function saveCartToLocalStorage() {
            var cartItems = document.getElementById("shoppingCart").innerHTML;
            localStorage.setItem("cart", cartItems);
        }

        function restoreCart() {
            var savedCartItems = localStorage.getItem("cart");
            if (savedCartItems) {
                document.getElementById("shoppingCart").innerHTML = savedCartItems;
            }
        }

    </script>

</body>

</html>