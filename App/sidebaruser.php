<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    // Mendapatkan nama halaman dari URL
    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
    ?>

    <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 h-[calc(100vh-2rem)] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">
        <div class="mb-2 p-4">
            <h5 class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-gray-900">
                <img src="../../assets/img/logo.png" alt="">
            </h5>
        </div>
        <nav class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700">

            <!-- Dashboard Sidebar -->
            <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all <?php echo ($currentPage === 'dashboard') ? 'bg-gray-300' : 'hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80'; ?> hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                <div class="grid place-items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <a href="../User/dashboard.php">Dashboard</a>
            </div>

            <!-- Katalog Sidebar -->
            <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all <?php echo ($currentPage === 'katalog') ? 'bg-gray-300' : 'hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80'; ?> hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                <div class="grid place-items-center mr-4">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"  class="h-5 w-5">
                        <path fill="none" stroke="currentColor" stroke-width="2" d="M5 6L1 4.5v13.943L12 23l11-4.557V4l-4 2M5 16V2l7 3l7-3v14l-7 3zm6.95-11v14 " class="h-5 w-5"/>
                    </svg>
                </div>
                <a href="../user/kataloguser.php">Catalog</a>
            </div>

            <!-- Repository Sidebar -->
            <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all <?php echo ($currentPage === 'repository') ? 'bg-gray-300' : 'hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80'; ?> hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                <div class="grid place-items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="h-5 w-5">
                        <path fill="currentColor" d="M13 21v2.5l-3-2l-3 2V21h-.5A3.5 3.5 0 0 1 3 17.5V5a3 3 0 0 1 3-3h14a1 1 0 0 1 1 1v17a1 1 0 0 1-1 1zm0-2h6v-3H6.5a1.5 1.5 0 0 0 0 3H7v-2h6zm6-5V4H6v10.035c.163-.023.33-.035.5-.035zM7 5h2v2H7zm0 3h2v2H7zm0 3h2v2H7z" />
                    </svg>                            
                </div>
                <a href="../user/repositoryuser.php">Repository </a>
            </div>

            <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all <?php echo ($currentPage === 'rulesuser') ? 'bg-gray-300' : 'hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80'; ?> hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                <div class="grid place-items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="h-5 w-5">
                        <path d="M3 12a9 9 0 1 0 9-9a9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5m4-1v5l4 2"/></g>
                    </svg>
                </div>
                <a href="../User/historyuser.php">History</a>
            </div>

            <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all <?php echo ($currentPage === 'settings') ? 'bg-gray-300' : 'hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80'; ?> hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
                <div class="grid place-items-center mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="h-5 w-5">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12h-9.5m7.5 3l3-3l-3-3m-5-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-1"/>
                </svg>
                </div>
                <a href="../../Login/logout.php">Logout</a>
            </div>

            <div class="grid place-items-center ml-auto justify-self-end">
                <div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-blue-500/20 text-blue-900 py-1 px-2 text-xs rounded-full" style="opacity: 1;"> </div>
            </div>
    </div>
    </nav>
    </div>
</body>

</html>