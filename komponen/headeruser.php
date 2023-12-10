<?php
session_start();

include('../Connection.php');
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
                        echo '<a href="#"><img class="user" src="../img/cart.png" alt="Bell"></a>';
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
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>