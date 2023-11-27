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
        session_start();

        // Proses login jika formulir dikirim
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $validUsername = "admin";
            $validPassword = "admin123";

            $username = $_POST["username"];
            $password = $_POST["password"];

            // Verifikasi kredensial
            if ($username === $validUsername && $password === $validPassword) {
                // Login berhasil
                $_SESSION["username"] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                // Login gagal, tampilkan pesan kesalahan
                $error = "Username atau password salah!";
            }
        }
        ?>

        <?php if (isset($error)) : ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>