<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lancar Jaya</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
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

        .features {
            text-align: center;
            margin-top: 20px;
        }

        .feature {
            display: inline-block;
            margin: 0 20px;
            font-size: 10px;
            background-color: rgba(0, 173, 181, 1);
            color: white;
            padding: 10px;
            /* tambahkan padding untuk memberi ruang di sekitar teks */
        }

        .user {
            width: 20px;
            height: 20px;
            /* Atur sesuai kebutuhan Anda */
            border-radius: 50%;
            /* Agar gambarnya menjadi lingkaran */
            margin-right: 5px;
            /* Atur sesuai kebutuhan Anda */
        }
    </style>
</head>

<body>

    <header>
        <h1>Ruang Baca</h1>
        <div class="profile-login">
            <a href="login.php">Login</a>
            <a><img class="user" src="asessts/user.png"></a>
        </div>
    </header>

    <div class="logo-container">
        <img class="logo" src="asessts/logo.png" alt="Logo Website">
        <div class="website-name">Dashboard</div>
        <div class="website-name1">Ruang Baca</div>
    </div>

    <div class="features">
        <div class="feature"><a href="fitur/katalog.php">Katalog</a></div>
        <div class="feature"> <a href="fitur/repository.php">Repository</a></div>
        <div class="feature"><a href="fitur/peraturan.php">Peraturan</a></div>
    </div>

    <!-- Isi konten website Anda akan ditempatkan di sini -->

</body>

</html>