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
            margin-right: 10px;
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

            if ($currentPage === '../public/landingpage.php') {
                echo '<a href="../Login/login.php" class="login-link">Login</a>';
            } else {
                echo '<a href="../Login/login.php" class="login-link">Login</a>';
            }
            ?>
            <?php

            $imageUrl = ($currentPage === '../public/landingpage.php') ? '../assets/img/user1.png' : '../assets/img/user1.png';
            ?>

            <a href="#"><img class="user" src="<?php echo $imageUrl; ?>" alt="User"></a>

        </div>

        <div class="header"></div>
    </header>
</body>

</html>