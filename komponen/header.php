<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../style/header.css">
</head>

<body>
    <header>
        <h1>Ruang Baca</h1>
        <div class="profile-login">
            <a href="login.php" class="login-link">Login</a>

            <?php

            $imageUrl = ($currentPage === 'landingpage.php') ? 'img/user.png' : '../img/user.png';
            ?>

            <a href="#"><img class="user" src="<?php echo $imageUrl; ?>" alt="User"></a>
        </div>

        <div class="header"></div>
    </header>
</body>

</html>