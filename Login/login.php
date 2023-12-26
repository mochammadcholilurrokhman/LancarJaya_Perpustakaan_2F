<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>

        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "Login gagal! username dan password salah!";
            } else if ($_GET['pesan'] == "logout") {
                echo "Anda telah berhasil logout";
            } else if ($_GET['pesan'] == "belum_login") {
                echo "Anda harus login untuk mengakses halaman admin";
            }
        }
        ?>

        <form method="post" action="cek_login.php">
            <label for="username">Username:</label>
            <input type="text" name="username">

            <label for="password">Password:</label>
            <input type="password" name="password">
            <td><a href="forgotPassword.php">Forgot Password?</a></td>
            <button type="submit" value="login">Login</button>
        </form>
    </div>

</body>

</html>