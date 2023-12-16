<?php

require_once ('../Connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/header.css">

    <style>
        .login-link {
            font-weight: normal;
            padding: 10px 10px;
            background-color: transparent;
            color: white;
            border-radius: 10px;
            border: 2px solid #0aa5ff;
            transition: 0.2s;
            margin-right: 10px;
        }

        .login-link:hover {
            background-color: #0aa5ff;
            color: white;
        }

        .user {
            margin-right: 5px;
            margin-left: 10px;
        }
        header span{
        color: #FB923C;
        }
        .user1 {
            margin-right: 5px;
            margin-left: 10px;
            width: 30px;
            height: auto;
        }
          .shopping-cart {
            display: none;
            position: absolute;
            top: 50px; /* Adjust as needed */
            right: 10px; /* Adjust as needed */
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            height: 500px; /* Adjust the height as needed */
            overflow-y: auto; /* Add scroll if content exceeds height */
        }
        .shopping-cart .cart-item {
    margin: 2rem o;
    display: flex;
    align-items: center;
    gap: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px dashed #666;
    position: relative;
}

    </style>
</head>

<body>
    <header>
        <h1>Ruang <span> Baca </span></h1>
        <div class="profile-login">
            <?php
            $currentPage = basename($_SERVER['PHP_SELF']);

            if ($currentPage === 'landingpage.php') {
                echo '<a href="login.php" class="login-link">Login</a>';
            } else {
                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                    $imageUrl = '../img/user1.png';
                    echo '<a href="#"><img class="user" src="' . $imageUrl . '" alt="User"></a>';
                    if ($_SESSION['posisi'] === 'admin') {
                        echo '<a href="#"><img class="user" src="../img/bell.png" alt="Bell"></a>';
                    } else {
                        echo '<a href="#" id="cartIcon"><img class="user1" src="../img/cart.png" alt="Cart"></a>';
                    }
                } else {
                    header("Location:../admin/dashboardadmin.php");
                    exit();
                }
            }
            ?>

        </div>
    </header>
    </div>
   <div class="shopping-cart" id="shoppingCart">
     <div class="cart-item">
          <img src="img/produk1.jpg" alt="Pdoduk 1">
          <div class="item-detail">
            <h3>Product 1</h3>
            <div class="item-price">IDR 30K</div>
          </div>
          <i data-feather="trash-2" class="remove-item"></i>
        </div>
    </div>

    <script>
        var cartIcon = document.getElementById('cartIcon');
        var shoppingCart = document.getElementById('shoppingCart');

        cartIcon.addEventListener('click', function (event) {
            // Show the shopping cart when the cart icon is clicked
            shoppingCart.style.display = 'block';

            // Prevent the click event from propagating to document
            event.stopPropagation();
        });

        document.addEventListener('click', function () {
            // Hide the shopping cart when clicking outside
            shoppingCart.style.display = 'none';
        });
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>