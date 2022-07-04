<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/additional.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class="scrollbar-thin scrollbar-thumb-emerald-700 scrollbar-track-emerald-200 font-popins">
    <?php
    include("fungsi.php");
    include("navbar.php");
    ?>

    <!-- Section Product -->
    <section class="pt-20 md:pt-32 pb-32 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center">
                    <h4 class="font-semibold text-lg mb-2 text-teal-500">Product</h4>
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl pb-4">All Product</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">We provide several choices of mountains that can be ordered online and provide information about ticket prices, altitudes, and the location of the mountain.</p>
                </div>
                <label class="relative max-w-xl mx-auto my-7 block">
                    <span class="sr-only">Search</span>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                    <form method="post">
                        <input type="text" id="sinput" name="searchInput" placeholder="Search for anything..." class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"/>
                        <input type="submit" name="searchProduct" id="searchButton" hidden>
                    </form>
                </label>
            </div>

            <div class="flex flex-wrap">
                <!-- core -->
                <?php

                // post search
                if (!isset($_POST['searchProduct'])) {
                    $sql = "SELECT * FROM mount ORDER BY nama_mount ASC";
                } else {
                    if (!empty($_POST['searchInput'])) {
                        $sql = "SELECT * FROM mount WHERE nama_mount LIKE '%$_POST[searchInput]%'";
                    } else {
                        $sql = "SELECT * FROM mount ORDER BY nama_mount ASC";
                    }
                }

                $ambil = $koneksi->query($sql); ?>
                <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
                <div class="w-1/2 px-4 lg:w-1/2 xl:w-1/4">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg mb-10">
                        <img src="img/foto_mount/<?php echo $perproduk['foto_mount1']; ?>" alt="" class="w-full xl:h-[220px] lg:h-72 h-28">
                        <div class="py-3 px-4">
                            <h3 class="font-semibold text-base text-dark"><?php echo $perproduk['nama_mount']; ?></h3>
                            <div class="mb-3 lg:mb-5 mt-2">
                                <div class="flex">
                                    <p class="text-[12px]">Harga Tiket</p>
                                    <p class="px-2.5"></p>
                                    <p class="text-[12px]">Rp <?php echo number_format($perproduk['harga_tiket']); ?> / Pendaki</p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="beli.php?id=<?php echo $perproduk['id_mount']; ?>" id="open-btn1" class="font-medium text-sm text-white bg-emerald-600 hover:bg-emerald-700 lg:py-2 lg:px-3 py-1 px-4 rounded-md">&nbsp;&nbsp;&nbsp;Beli&nbsp;&nbsp;&nbsp;</a>
                                <div class="flex xl:px-4 xl:gap-3 gap-2">
                                    <a href="detail.php?id=<?php echo $perproduk['id_mount']; ?>" class="text-blue-400 hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="text-blue-400 hover:text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                    </a>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>  
        </div>
    </section>

    <?php
    include("footer.php");
    ?>
 
    <script src="./js/script.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>   
    <script>
    var input = document.getElementById("searchInput");
    input.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("searchButton").click();
    }
    });
    </script>
</body>
</html>