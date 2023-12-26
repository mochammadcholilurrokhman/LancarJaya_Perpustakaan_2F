<?php
require_once('../../Config/Connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../style/header.css">

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
        .shopping-cart .cart-item img{
            border-radius: 50%;
        }

    </style>
</head>

<body>
    <header>
        <h1>Ruang <span> Baca </span></h1>
        <div class="profile-login">
            <?php
            $currentPage = basename($_SERVER['PHP_SELF']);

            if ($currentPage === '../../Login/landingpage.php') {
                echo '<a href="../../Login/login.php" class="login-link">Login</a>';
            } else {
                if (isset($_SESSION['username'])) {
                    echo $_SESSION['username'];
                    $imageUrl = '../../assets/img/user1.png';
                    echo '<a href="../../Login/logout.php" onclick="return confirm(\'Apakah anda yakin ingin keluar ?\')"><img class="user" src="' . $imageUrl . '" alt="User"></a>';
                    if ($_SESSION['posisi'] === 'Admin') {
                        echo '<a href="#" id=""bellIcon><img class="user" src="../../assets/img/bell.png" alt="Bell"></a>';
                    } else {
                        echo '<a href="../User/cart.php" id="cartIcon"><img class="user1" src="../../assets/img/cart.png" alt="Cart"></a>';
                    }
                } else {
                    header("Location: Admin/dashboardadmin.php");
                    exit();
                }
            }
            ?>
        </div>
    </header>
    </div>
   <div class="shopping-cart" id="shoppingCart">
     <div class="cart-item">
          <!-- <img src="../img/BelajarC++.jpeg" alt="Pdoduk 1"> -->
          <div class="item-detail">
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
    
    <script>
        // Tambahkan skrip JavaScript yang telah dijelaskan sebelumnya
        function updateCartView() {
            var cartContainer = document.getElementById("shoppingCart");
            // Implementasikan logika pembaruan tampilan keranjang belanja sesuai kebutuhan
            // ...
        }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>