<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body>
    <div class="bg-gray-100 flex justify-center items-center h-screen">

        <!--Login Form -->
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
            <h1 class="text-2xl font-semibold mb-4">Login</h1>
            <form action="#" method="POST">
                <!-- Username Input -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-600">Username</label>
                    <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
                </div>
                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" autocomplete="off">
                </div>
                <!-- Remember Me Checkbox -->
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="text-blue-500">
                    <label for="remember" class="text-gray-600 ml-2">Remember Me</label>
                </div>

                <!-- Login Button -->
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md py-2 px-4 w-full">Login</button>
            </form>

<<<<<<< HEAD
        </div>
=======
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
                header("Location: user/dashboard.php");
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
>>>>>>> 7e804616f428cce431339e1a28b361e1f5b65ed6
    </div>

</body>

</html>
