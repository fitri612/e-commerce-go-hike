<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/additional.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" /> -->
</head>
<body class="scrollbar-thin scrollbar-thumb-emerald-700 scrollbar-track-emerald-200 font-popins">
    <?php
    include("fungsi.php");

    $id = $_GET["id"];
    $data = $koneksi->query("SELECT * FROM pembelian JOIN users ON pembelian.id_user = users.id_user WHERE pembelian.id_pembelian = '$id'");
    $detail = $data->fetch_assoc();

    // Mendapatkan id_user yang beli
    $idusertransaksi = $detail['id_user'];

    // Mendapatkan id_user yang login
    $idpelangganyanglogin = $_SESSION['users']['id_user'];

    if ($idusertransaksi != $idpelangganyanglogin) {
        // echo "<script>alert('Anda tidak diizinkan untuk melihat transaksi ini');</script>";
        echo "<script>location='data.php?halaman=riwayat';</script>";
    }

    $id_bank = $detail["id_bank"];
    // query ambil data
    $ambil = $koneksi->query("SELECT * FROM biaya_admin WHERE id_bank ='$id_bank'");
    $cek = $ambil->fetch_assoc();
    ?>

    <!-- header checkout -->
    <section class="py-20 bg-emerald-500">
        <form method="post">
            <div class="container">
                <div class="absolute top-5 left-5">
                    <div class="rounded-md shadow-sm">
                        <a href="data.php?halaman=riwayat" aria-current="page" class="flex py-1 px-2 text-sm font-medium text-white hover:text-white bg-emerald-600 hover:bg-emerald-700 rounded-l-lg focus:z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                            </svg>
                            <p class="items-center p-0.5">back</p>
                        </a>
                    </div>
                    
                </div>
                <div class="w-full px-4">
                    <div class="mx-auto">
                        <div class="w-full flex items-center">
                            <img class="w-8 md:w-12" src="./img/logonew.svg" alt="gunung">
                            <h1 class="text-2xl font-semibold ml-4 md:text-4xl tracking-wider">GoHike |</h1>
                            <p class="text-white text-2xl md:text-4xl pl-3">Nota</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <!-- main -->
    <section class="py-12 bg-slate-100">
        <div class="container">
            <!-- informasi -->
            <div class="w-full py-3">
                <div class="mx-auto">
                    <div class="bg-white p-4">
                        <p class="font-bold text-lg mb-3">Informasi Umum</p>
                        <div class="grid xl:grid-cols-4 sm:grid-cols-1 gap-4">
                            <div>
                                <p class="font-bold">Email</p> 
                                <p class="text-gray-500"><?php echo $_SESSION['users']['email']; ?></p>
                            </div>
                            <div>
                                <p class="font-bold">Username</p>
                                <p class="text-gray-500"><?php echo $_SESSION['users']['username']; ?></p> 
                            </div>
                            <div>
                                <p class="font-bold">No. Telp</p> 
                                <p class="text-gray-500"><?php echo $_SESSION['users']['telepon']; ?></p>
                            </div>
                            <div>
                                <p class="font-bold">Tanggal Transaksi</p>
                                <p class="text-gray-500"><?php echo date('d/m/Y') ?></p> 
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- produk yg dipesan -->
            <div class="w-full py-3 hidden md:block">
                <div class="mx-auto">
                    <div class="p-4 bg-white items-center">
                        <p class="font-bold text-lg mb-3">Produk Dipesan</p>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">No</th>
                                        <th scope="col" class="px-6 py-3">Nama</th>
                                        <th scope="col" class="px-6 py-3">Gambar</th>
                                        <th scope="col" class="px-6 py-3">Tanggal Pendakian</th>
                                        <th scope="col" class="px-6 py-3">Harga</th>
                                        <th scope="col" class="px-6 py-3">Qty</th>
                                        <th scope="col" class="px-6 py-3">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $number = 1;
                                    $ambil = $koneksi->query("SELECT * FROM pemesanan_tiket Join mount on pemesanan_tiket.id_produk = mount.id_mount WHERE pemesanan_tiket.id_pembelian = '$_GET[id]'");
                                    while ($data = $ambil->fetch_assoc()) : ?>
                                    <tr class="bg-white ">
                                        <td class="px-6 py-4"><?= $number; ?></td>
                                        <td class="px-6 py-4"><?= $data["gunung"]; ?></td>
                                        <td class="px-6 py-4"><img src="img/foto_mount/<?= $data['foto_mount1']; ?>" class="rounded-md" width="150" height="150" alt=""></td>
                                        <td class="px-6 py-4"><?= date("d/m/Y", strtotime($data["tanggal_pendakian"])); ?></td>
                                        <td class="px-6 py-4">Rp <?= number_format($data["tiket"]); ?></td>
                                        <td class="px-6 py-4"><?= $data["jumlah_tiket"]; ?></td>
                                        <td class="px-6 py-4">Rp <?= number_format($data["total"]); ?></td>
                                    </tr>
                                    <?php $number++;
                                    endwhile; ?>
                                    
                                    <tr class="bg-gray-500">
                                        <td></td>
                                        <td colspan="5" class="px-6 py-4 font-bold text-white whitespace-nowrap">Subtotal</td>
                                        <td class="px-6 py-4 font-bold text-white">Rp <?= number_format($detail['total_pembelian']-$cek['tarif_admin']); ?></td>
                                    </tr>
                                </tbody>
                            </table> 
                        </div>    
                    </div>
                </div>
            </div>

            <!-- tabel hp -->
            <div class="bg-white md:hidden">
                <p class="font-bold text-lg pl-4 pt-2">Produk Dipesan</p>   
                <div class="grid grid-cols-1 px-4 divide-y-2 divide-slate-200">
                    <?php $number = 1;
                    $ambil = $koneksi->query("SELECT * FROM pemesanan_tiket Join mount on pemesanan_tiket.id_produk = mount.id_mount WHERE pemesanan_tiket.id_pembelian = '$_GET[id]'");
                    while ($data = $ambil->fetch_assoc()) : ?>
                    <div class="p-2">
                        <div class="flex">
                            <div class="w-1/2 py-2 overflow-hidden">
                                <img src="./img/foto_mount/<?= $data['foto_mount1']; ?>" class="rounded-md w-36 h-28 shadow-md" alt="">
                            </div>
                            <div class="flex-col">
                                <div class="flex mx-4 my-2 space-x-4 text-md">
                                    <div class="font-bold"><?= $data["gunung"]; ?></div> 
                                </div><hr>
                                <div class="flex mx-4 my-2 space-x-4 text-md">
                                    <div class="text-gray-500"><?= date("d/m/Y", strtotime($data["tanggal_pendakian"])); ?></div> 
                                    <form class="flex">
                                        <p id="num" value="0" class="border border-gray-300 rounded-md mx-1 w-6 text-center"><?= $data["jumlah_tiket"]; ?></p>
                                    </form>
                                </div><hr>
                                <div class="flex-col float-right">
                                    <div class="mx-4 my-1 space-x-4 text-md">
                                        <div class="text-gray-500 text-sm float-right">Rp <?= number_format($data["tiket"]); ?></div>
                                    </div>
                                    <div class="mx-4 my-1 space-x-4 text-md">
                                        <div class="text-orange-500 font-bold text-md float-right">Rp <?= number_format($data["total"]); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $number++;
                    endwhile; ?>
                </div>
            </div>

            <!-- metode pembayaran -->
            <div class="w-full py-3">
                <div class="mx-auto">
                    <div class="p-4 bg-white items-center">
                        <p class="font-bold text-lg mb-3">Metode Pembayaran</p>
                        <div class="grid lg:grid-cols-3 lg:gap-2 grid-cols-1">
                            
                            <!-- Desktop -->
                            <div class="hidden md:block">
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-3 h-3 lg:w-4 lg:h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked disabled>
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-500">Transfer: <?php echo $cek["nama_bank"];?></label>
                                </div>
                                <div class="flex flex-wrap gap-3.5">
                                <?php if ($cek["nama_bank"] == "BANK BCA") {?>
                                    <img src="./img/bca.svg" class="w-14 lg:w-20" alt="">
                                <?php } else if ($cek["nama_bank"] == "BANK MANDIRI") { ?>
                                    <img src="./img/mandiri.svg" class="w-14 lg:w-20" alt="">
                                <?php } else if ($cek["nama_bank"] == "BANK BNI") { ?>
                                    <img src="./img/bni.svg" class="w-14 lg:w-20" alt="">
                                <?php } else if ($cek["nama_bank"] == "BANK BRI") { ?>
                                    <img src="./img/bri.svg" class="w-14 lg:w-20" alt="">
                                <?php }; ?>
                                </div>
                                <hr class="my-2">
                                <div class="my-6">
                                    <table>
                                        <tr>
                                            <td class="pr-14 pb-1 lg:text-base text-sm">Subtotal Produk</td>
                                            <td class="pb-1 text-gray-500 lg:text-base text-sm">Rp <?= number_format($detail['total_pembelian']-$cek['tarif_admin']); ?></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="pb-1 lg:text-base text-sm">Administrasi</td>
                                            <td class="pb-1 text-gray-500 lg:text-base text-sm">Rp <?= number_format($cek["tarif_admin"]); ?></td>
                                        </tr>
                                        <?php $total = $detail['total_pembelian']?>
                                        <tr>
                                            <td class="lg:text-base text-sm">Total Pembayaran</td>
                                            <td class="text-2xl text-orange-500 font-semibold lg:text-3xl">Rp <?= number_format($total); ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                                
                            <div class="hidden md:block">
                                <div class="w-full" aria-label="Sidebar">
                                    <div class="overflow-y-auto px-3 rounded">
                                        <div id="dropdown-cta" class="p-4 mt-2 bg-blue-100 rounded-lg" role="alert">
                                            <div class="flex items-center mb-3">
                                                <span class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">Informasi Rekening Penerima</span>
                                                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-200 text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-blue-300 inline-flex h-6 w-6" data-collapse-toggle="dropdown-cta" aria-label="Close">
                                                    <span class="sr-only">Close</span>
                                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <ul class="space-y-2">
                                                <div>
                                                    <p class="mt-2 px-2 py-1 text-gray-800 font-bold">No Rekening</p>
                                                    <p class="bg-gray-100 rounded-md p-2 ml-1 text-gray-400"><?= $cek["no_rekening"]; ?></p>
                                                </div>
                                                <div>
                                                    <p class="mt-2 px-2 py-1 text-gray-800 font-bold">Bank</p>
                                                    <p class="bg-gray-100 rounded-md p-2 ml-1 text-gray-400"><?= $cek["nama_bank"]; ?></p>
                                                </div>
                                                <div>
                                                    <p class="mt-2 px-2 py-1 text-gray-800 font-bold">Atas Nama</p>
                                                    <p class="bg-gray-100 rounded-md p-2 ml-1 text-gray-400"><?= $cek["pemilik_rek"]; ?></p>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden lg:block">
                                <!-- <p>heloo</p> -->
                                <img src="./img/pay.jpg" class="h-full rounded" alt="">
                            </div>

                            <!-- HP -->
                            <div class="divide-y-2">
                                <div class="md:hidden pb-5">
                                    <div class="w-full" aria-label="Sidebar">
                                        <div class="overflow-y-auto px-1 rounded">
                                            <div id="dropdown-cta" class="p-4 mt-2 bg-blue-100 rounded-lg" role="alert">
                                                <div class="flex items-center mb-3">
                                                    <span class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">Informasi Rekening Penerima</span>
                                                </div>
                                                <ul class="space-y-2">
                                                    <div>
                                                        <p class="mt-2 px-2 py-1 text-gray-800 font-bold">No Rekening</p>
                                                        <p class="bg-gray-100 rounded-md p-2 ml-1 text-gray-400"><?= $cek["no_rekening"]; ?></p>
                                                    </div>
                                                    <div>
                                                        <p class="mt-2 px-2 py-1 text-gray-800 font-bold">Bank</p>
                                                        <p class="bg-gray-100 rounded-md p-2 ml-1 text-gray-400"><?= $cek["nama_bank"]; ?></p>
                                                    </div>
                                                    <div>
                                                        <p class="mt-2 px-2 py-1 text-gray-800 font-bold">Atas Nama</p>
                                                        <p class="bg-gray-100 rounded-md p-2 ml-1 text-gray-400"><?= $cek["pemilik_rek"]; ?></p>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="md:hidden pt-5 px-4">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" type="checkbox" value="" class="w-3 h-3 lg:w-4 lg:h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked disabled>
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-500">Transfer: <?php echo $cek["nama_bank"];?></label>
                                    </div>
                                    <div class="flex flex-wrap gap-3.5">
                                    <?php if ($cek["nama_bank"] == "BANK BCA") {?>
                                        <img src="./img/bca.svg" class="w-14 lg:w-20" alt="">
                                    <?php } else if ($cek["nama_bank"] == "BANK MANDIRI") { ?>
                                        <img src="./img/mandiri.svg" class="w-14 lg:w-20" alt="">
                                    <?php } else if ($cek["nama_bank"] == "BANK BNI") { ?>
                                        <img src="./img/bni.svg" class="w-14 lg:w-20" alt="">
                                    <?php } else if ($cek["nama_bank"] == "BANK BRI") { ?>
                                        <img src="./img/bri.svg" class="w-14 lg:w-20" alt="">
                                    <?php }; ?>
                                    </div>
                                    <hr class="my-2">
                                    <div class="my-6">
                                        <table>
                                            <tr>
                                                <td class="pr-14 pb-1 lg:text-base text-sm">Subtotal Produk</td>
                                                <td class="pb-1 text-gray-500 lg:text-base text-sm">Rp <?= number_format($detail['total_pembelian']-$cek['tarif_admin']); ?></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="pb-1 lg:text-base text-sm">Administrasi</td>
                                                <td class="pb-1 text-gray-500 lg:text-base text-sm">Rp <?= number_format($cek["tarif_admin"]); ?></td>
                                            </tr>
                                            <?php $total = $detail['total_pembelian']?>
                                            <tr>
                                                <td class="lg:text-base text-sm">Total Pembayaran</td>
                                                <td class="text-2xl text-orange-500 font-semibold lg:text-3xl">Rp <?= number_format($total); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                                  
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include("footer.php");
    ?>

    <script src="./js/script.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
</body>
</html>