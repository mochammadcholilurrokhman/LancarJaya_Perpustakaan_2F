<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Perpustakaan</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: rgba(0, 173, 181, 1);
            padding: 2px;
            color: white;
            text-align: start;
            position: relative;
        }

        .profile-login {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 14px;
        }

        .logo-container {
            text-align: center;
            margin-top: 20px;
            font-family: roboto;
        }

        .logo {
            width: 80px;
            /* Sesuaikan ukuran logo sesuai kebutuhan Anda */
            height: auto;
        }

        .website-name {
            margin-top: 10px;
            font-size: 20px;
            font-family: roboto;
            color: rgba(0, 173, 181, 1);
        }

        .website-name1 {
            color: rgba(251, 146, 60, 1);
        }

        .features-container {
            display: flex;
            flex: 1;
            padding: 20px;
        }

        .features {
            flex-basis: 25%;
            background-color: #f2f2f2;
            padding: 10px;
            margin-right: 20px;
            background-color: green;
            border-radius: 10px;
            transition: background-color 0.3s;
        }

        .feature {
            margin-bottom: 10px;
        }

        .feature a {
            color: black;
            text-decoration: none;
            transition: color 0.3s;
        }

        .feature a:hover {
            color: white;
        }

        .features:hover {
            background-color: #4CAF50;
        }

        .content {
            flex: 1;
        }

        .user {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Ruang Baca</h1>
        <div class="profile-login">
            <a href="login.php">Login</a>
            <a><img class="user" src="../asessts/user.png" alt="Profil Pengguna"></a>
        </div>
    </header>
    <div class="features-container">
        <div class="features">
            <div class="feature"><a href="katalog.php">Katalog</a></div>
            <div class="feature"><a href="#">Repository</a></div>
            <div class="feature"><a href="#">About Us</a></div>
            <div class="feature"><a href="#">Rules</a></div>
        </div>

        <div class="content">
            <!-- Isi konten katalog Anda akan ditempatkan di sini -->
            <h2>Selamat Datang di Katalog Perpustakaan</h2>
            <p>Temukan berbagai buku menarik dan bacaan berkualitas di perpustakaan kami.</p>
        </div>
    </div>

</body>

</html>