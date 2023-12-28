
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perpustakaan</title>
    <link rel="stylesheet" href="../../style/fitur.css">

</head>

<body>
    <?php
    include('../headeruser.php');
    require_once '../../Config/Connection.php';
    ?>
    <div class="content">
        <div id="sidebar">
            <?php
            include('../sidebarAdmin.php');
            //Jumlah Buku
            $query_total_books = mysqli_query($conn, "SELECT COUNT(*) AS total_books FROM buku");
            $total_books_data = mysqli_fetch_assoc($query_total_books);
            $total_books = $total_books_data['total_books'];

             // Jumlah Anggota

            $query_total_anggota = mysqli_query($conn, "SELECT COUNT(*) AS total_anggota FROM user");
            $total_anggota_data = mysqli_fetch_assoc($query_total_anggota);
            $total_anggota = $total_anggota_data['total_anggota'];

              //Repository
            $query_total_repo = mysqli_query($conn, "SELECT COUNT(*) AS total_repo FROM repository");
            $total_repo_data = mysqli_fetch_assoc($query_total_repo);
            $total_repo = $total_repo_data['total_repo'];

            //Total Koleksi
            $total_collection = $total_books + $total_repo;
            ?>

            <div class="isi">
                <div class="flex">
                    <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%] mx-auto">
                        <div class="flex justify-center items-center space-x-5 h-full">
                            <div>
                                <p class="text-sm font-bold mb-2">Total Koleksi</p>
                                <h2 class="text-4xl font-bold text-gray-600"><?php echo $total_collection;?></h2>
                            </div>
                              <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="h-50 md:h-20 w-38">
                                <path fill="currentColor" d="M17 20H5c-.55 0-1-.45-1-1V7c0-.55-.45-1-1-1s-1 .45-1 1v13c0 1.1.9 2 2 2h13c.55 0 1-.45 1-1s-.45-1-1-1m3-18H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2m0 10l-2.5-1.5L15 12V4h5z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%] mx-auto">
                        <div class="flex justify-center items-center space-x-5 h-full">
                            <div>
                                <p class="text-sm font-bold mb-2">Total Buku</p>
                                <h2 class="text-4xl font-bold text-gray-600"><?php echo $total_books;?></h2>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" class="h-50 md:h-20 w-38">
                                <path fill="currentColor" d="M6.012 18H21V4a2 2 0 0 0-2-2H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.988 5 19.805 5 19s.55-.988 1.012-1M8 6h9v2H8z"/>
                        </svg>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="flex">
                    <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%] mx-auto">
                        <div class="flex justify-center items-center space-x-5 h-full">
                            <div>
                                <p class="text-sm font-bold mb-2">Total Jurnal</p>
                                <h2 class="text-4xl font-bold text-gray-600"><?php echo $total_repo;?></h2>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 20 20" class="h-50 md:h-20 w-38">
                                <path fill="currentColor" d="M15 0v20h1.5c.8 0 1.5-.7 1.5-1.5v-17c0-.8-.7-1.5-1.5-1.5zM2 18c0 1.1.9 2 2 2h10V0H4C2.9 0 2 .9 2 2zM4 5h8v1H4zm3 2h5v1H7z"/>
                        </svg>
                        </div>
                    </div>
                   <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%] mx-auto">    
                        <div class="flex justify-center items-center space-x-5 h-full">
                    <div>
                                <p class="text-sm font-bold mb-2">Total Anggota</p>
                                <h2 class="text-4xl font-bold text-gray-600"><?php echo $total_anggota;?></h2>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" class="h-50 md:h-20 w-38">
                                <path fill="currentColor" d="M17 1H7c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-2-2-2m0 14.21c-1.5-.77-3.2-1.21-5-1.21s-3.5.44-5 1.21V6h10z"/>
                                <circle cx="12" cy="10" r="3" fill="currentColor"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <br><br>

            </div>
        </div>
    </div>
</body>

</html>