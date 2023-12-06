
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>
    <link rel="stylesheet" href="../style/fitur.css">
</head>

<body>
    <?php
    include('../komponen/headeruser.php');
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../komponen/sidebaradmin.php');
            ?>

            <div class="isi">
                <br>
                <div class="flex">
                    <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%] mx-auto">
                        <div class="flex justify-center items-center space-x-5 h-full">
                            <div>
                                <p>Total Koleksi</p>
                                <h2 class="text-4xl font-bold text-gray-600">1.500</h2>
                            </div>
                            <img src="https://www.emprenderconactitud.com/img/Wallet.png" alt="wallet" class="h-24 md:h-20 w-38">
                        </div>
                    </div>

                    <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%] mx-auto">
                        <div class="flex justify-center items-center space-x-5 h-full">
                            <div>
                                <p>Total Buku</p>
                                <h2 class="text-4xl font-bold text-gray-600">50.365</h2>
                            </div>
                            <img src="https://www.emprenderconactitud.com/img/Wallet.png" alt="wallet" class="h-24 md:h-20 w-38">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="flex">
                    <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%] mx-auto">
                        <div class="flex justify-center items-center space-x-5 h-full">
                            <div>
                                <p>Total Jurnal</p>
                                <h2 class="text-4xl font-bold text-gray-600">50.365</h2>
                            </div>
                            <img src="https://www.emprenderconactitud.com/img/Wallet.png" alt="wallet" class="h-24 md:h-20 w-38">
                        </div>
                    </div>

                    <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%] mx-auto">
                        <div class="flex justify-center items-center space-x-5 h-full">
                            <div>
                                <p>Total TA</p>
                                <h2 class="text-4xl font-bold text-gray-600">50.365</h2>
                            </div>
                            <img src="https://www.emprenderconactitud.com/img/Wallet.png" alt="wallet" class="h-24 md:h-20 w-38">
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="bg-white md:p-2 p-6 rounded-lg border bor der-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%] mx-auto">
                    <div class="flex justify-center items-center space-x-5 h-full">
                        <div>
                            <p>Total Anggota Aktif </p>
                            <h2 class="text-4xl font-bold text-gray-600">50.365</h2>
                        </div>
                        <img src="https://www.emprenderconactitud.com/img/Wallet.png" alt="wallet" class="h-24 md:h-20 w-38">
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>