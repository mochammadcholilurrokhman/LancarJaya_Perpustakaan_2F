<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
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
        <h2>Lupa Password</h2>

        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "Gagal mengubah password! Username dan password salah!";
            } else if ($_GET['pesan'] == "success") {
                echo "Password berhasil diubah! Silakan login dengan password baru.";
            } else if ($_GET['pesan'] == "invalid_request") {
                echo "Invalid request! Silakan menghubungi administrator.";
            }
        }
        ?>

        <form method="post" action="cek_updatepassword.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password Lama:</label>
            <input type="password" name="password" required>

            <label for="new_password">Password Baru:</label>
            <input type="password" name="new_password" required>

            <button type="submit" value="submit">Submit</button>
        </form>
    </div>

</body>

</html>
