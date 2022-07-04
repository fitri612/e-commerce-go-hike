<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/additional.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
</head>
<body class="scrollbar-thin scrollbar-thumb-emerald-700 scrollbar-track-emerald-200 font-popins">
    <?php
    include("fungsi.php");
    include("navbar.php");

    $id_mount = $_GET["id"];

    // query ambil data
    $ambil = $koneksi->query("SELECT * FROM mount WHERE id_mount ='$id_mount'");
    $detail = $ambil->fetch_assoc();

    if (isset($_POST['beli'])) {
        $jumlah = $_POST['jumlah'];
        $_SESSION['keranjang'][$id_mount] = $jumlah;

        // echo "<script>alert('Produk telah masuk ke keranjang')</script>";
        echo "<script>location='cart.php'</script>";
    }
    ?>
    
    <!-- Detail Product -->
    <section class="pt-20">
        <form action="" method="post">
            <div class="container">
                <div class="w-full px-4">
                    <div class="max-w-xl mx-auto text-center">
                        <h4 class="font-semibold text-lg mb-2 text-teal-500">Detail</h4>
                        <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl pb-4"><?php echo $detail['nama_mount']; ?></h2>
                    </div>
                </div>
                <main class="py-6 px-4 sm:p-6 md:py-10 md:px-8">
                    <div class="max-w-4xl mx-auto grid grid-cols-1 lg:max-w-6xl lg:gap-x-20 lg:grid-cols-2">
                        <div class="relative p-3 col-start-1 row-start-1 flex flex-col-reverse rounded-lg bg-gradient-to-t from-black/75 via-black/0 sm:bg-none sm:row-start-2 sm:p-0 lg:row-start-1">
                            <h1 class="mt-1 text-lg font-semibold text-white sm:text-slate-900 md:text-2xl"><?php echo $detail['nama_mount']; ?></h1>
                            <p class="text-sm leading-4 font-medium text-white sm:text-slate-500">Bc. <?php echo $detail['basecamp']; ?></p>
                        </div>
                        <div class="grid gap-4 col-start-1 col-end-3 row-start-1 sm:mb-6 sm:grid-cols-4 lg:gap-6 lg:col-start-2 lg:row-end-6 lg:row-span-6 lg:mb-0">
                            <img src="img/foto_mount/<?php echo $detail['foto_mount1']; ?>" alt="" class="w-full h-60 object-cover rounded-lg sm:h-52 sm:col-span-2 lg:col-span-full md:h-64" loading="lazy">
                            <img src="img/foto_mount/<?php echo $detail['foto_mount2']; ?>" alt="" class="hidden w-full h-52 object-cover rounded-lg sm:block sm:col-span-2 md:col-span-1 lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
                            <img src="img/foto_mount/<?php echo $detail['foto_mount3']; ?>" alt="" class="hidden w-full h-52 object-cover rounded-lg md:block lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
                        </div>
                        <!-- icon 1 -->
                        <dl class="mt-4 text-xs font-medium flex items-center row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2">
                            <!-- Rating -->
                            <dt class="sr-only">Reviews</dt>
                            <dd class="text-amber-400 flex items-center">
                                <svg width="24" height="24" fill="none" aria-hidden="true" class="mr-1 stroke-current">
                                    <path d="m12 5 2 5h5l-4 4 2.103 5L12 16l-5.103 3L9 14l-4-4h5l2-5Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span>4.89</span>
                            </dd>

                            <!-- lokasi -->
                            <dt class="sr-only">Location</dt>
                            <dd class="flex items-center">
                                <svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-3 text-slate-300">
                                    <circle cx="1" cy="1" r="1" />
                                </svg>
                                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 text-red-400" aria-hidden="true">
                                    <path d="M18 11.034C18 14.897 12 19 12 19s-6-4.103-6-7.966C6 7.655 8.819 5 12 5s6 2.655 6 6.034Z" />
                                    <path d="M14 11a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                </svg>
                                <?php echo $detail['lokasi_mount']; ?>
                            </dd>
                        </dl>

                        <!-- icon 2 -->
                        <dl class="mt-4 text-xs font-medium flex items-center row-start-3 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-3">
                            <!-- Ketinggian gunung -->
                            <dt class="sr-only">Tinggi Gunung</dt>
                            <dd class="text-sky-600 flex items-center">
                                <svg width="20" height="20" class="mr-2" viewBox="0 -64 640 640" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M634.92 462.7l-288-448C341.03 5.54 330.89 0 320 0s-21.03 5.54-26.92 14.7l-288 448a32.001 32.001 0 0 0-1.17 32.64A32.004 32.004 0 0 0 32 512h576c11.71 0 22.48-6.39 28.09-16.67a31.983 31.983 0 0 0-1.17-32.63zM320 91.18L405.39 224H320l-64 64-38.06-38.06L320 91.18z" />
                                </svg>
                                <span><?php echo $detail['ketinggain']; ?> MDPL</span>
                            </dd>
                            
                            <!-- tiket -->
                            <dt class="sr-only">Tiket</dt>
                            <dd class="flex items-center text-gray-600">
                                <svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-3 text-slate-300">
                                    <circle cx="1" cy="1" r="1" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                </svg>
                                <input type="number" value="1" name="jumlah" id="jumlah" min="1" class="border border-gray-300 rounded-md outline-none w-20 text-center">
                            </dd>

                            <!-- Harga -->
                            <dt class="sr-only">Harga</dt>
                            <dd class="text-emerald-600 flex items-center">
                                <svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-3 text-slate-300">
                                    <circle cx="1" cy="1" r="1" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                </svg>
                                <span>Rp <?php echo number_format($detail['harga_tiket']); ?> / Pendaki</span>
                            </dd>
                        </dl>

                        <!-- deskripsi -->
                        <p class="mt-4 text-sm text-justify leading-6 col-start-1 sm:col-span-2 lg:mt-6 lg:row-start-4 lg:col-span-1">
                            <?php echo $detail['desk_mount']; ?>
                        </p>

                        <!-- buttons -->
                        <div class="mt-4 col-start-1 row-start-5 self-center sm:mt-0 sm:col-start-2 sm:row-start-2 sm:row-span-2 lg:mt-6 lg:col-start-1 lg:row-start-5 lg:row-end-5">
                            <button class="bg-indigo-600 text-white text-sm leading-6 font-medium py-2 md:px-10 px-[74px] rounded-lg">
                                <a href="index.php?halaman=produk">Back</a>
                            </button>
                        </div>

                        <!-- buttons -->
                        <div class="mt-4 col-start-1 md:mx-32 mx-48 row-start-5 self-center sm:mt-0 sm:col-start-2 sm:row-start-2 sm:row-span-2 lg:mt-6 lg:col-start-1 lg:row-start-5 lg:row-end-5">
                            <button name="beli" class="bg-emerald-600 text-white text-sm leading-6 font-medium py-2 md:px-10 px-[74px] rounded-lg">Pesan</button>
                        </div>
                    </div>
                </main>
            </div>
        </form>
    </section>    
</body>

<script src="./js/script.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>   
<script src="https://unpkg.com/flowbite@1.4.5/dist/datepicker.js"></script> 

</html>