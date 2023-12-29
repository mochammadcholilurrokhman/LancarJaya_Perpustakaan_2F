<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
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
            padding: 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            width: 49%;
            display: inline-block;
        }

        button.back {
            background-color: #A5D7E8;
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
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Lupa Password</h2>

        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<p class='error'>Failed to change password! Incorrect username and password!</p>";
            } else if ($_GET['pesan'] == "success") {
                echo "<p>Password changed successfully! Please log in with the new password.</p>";
            } else if ($_GET['pesan'] == "invalid_request") {
                echo "<p class='error'>Invalid request! Silakan menghubungi administrator.</p>";
            }
        }
        ?>

        <form method="post" action="cek_updatepassword.php">
            <label for="username">Username:</label>
            <input type="number" name="username" required>

            <label for="new_password">Password Baru:</label>
            <input type="password" name="new_password" required>

            <button type="submit" value="submit">Submit</button>
            <a href="login.php"><button class="back" type="button">Back</button></a>
        </form>
    </div>

</body>

</html>
