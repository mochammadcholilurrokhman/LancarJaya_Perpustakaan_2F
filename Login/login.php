<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 450px;
            padding: 50px;
            background-color: #0B2447;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: #fff;
        }

        input {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        label {
            text-align: left;
            display: block;
            color: #fff;
            margin-bottom: 10px;
            font-size: 18px;
        }

        button {
            background-color: #A5D7E8;
            color: #0B2447;
            padding: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            width: 49%;
            display: inline-block;
        }

        button:hover {
            background-color: #7FA9C4;
        }

        .error {
            color: #e74c3c;
            margin-bottom: 15px;
            font-size: 16px;
        }

        h2 {
            color: #fff;
            font-size: 24px;
        }

        a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            display: inline-block;
            margin-top: 15px;
            width: 49%;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>

        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<p class='error'>Login gagal! Username dan password salah.</p>";
            } else if ($_GET['pesan'] == "logout") {
                echo "<p>Anda telah berhasil logout.</p>";
            } else if ($_GET['pesan'] == "belum_login") {
                echo "<p class='error'>Anda harus login untuk mengakses halaman admin.</p>";
            }
        }
        ?>

        <form method="post" action="cek_login.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <a href="forgotPassword.php">Forgot Password?</a>
            <button type="submit" value="login">Login</button>
        </form>
    </div>

</body>

</html>