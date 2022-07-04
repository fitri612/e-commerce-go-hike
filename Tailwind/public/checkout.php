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
    // Jika tidak ada session user (belum login)
    if (!isset($_SESSION["users"])) {
        // Diarahkan ke ke login.php
        // echo "<script>alert('Silahkan login!')</script>";
        echo "<script>location='login.php';</script>";
    }

    if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
        // echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
        echo "<script>location='produk.php';</script>";
    }
    include("fungsi.php");
    ?>
    <!-- header checkout -->
    <section class="py-20 bg-emerald-500">
        <div class="container">
            <div class="absolute top-5 left-5">
                <div class="rounded-md shadow-sm">
                    <a href="cart.php" aria-current="page" class="flex py-1 px-2 text-sm font-medium text-white hover:text-white bg-emerald-600 hover:bg-emerald-700 rounded-l-lg focus:z-10">
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
                        <h1 class="text-2xl font-semibold ml-4 md:text-4xl tracking-wider">ExMount |</h1>
                        <p class="text-white text-2xl md:text-4xl pl-3">Checkout</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- main -->
    <section class="py-12 bg-slate-100">
        <form method="post">
            <div class="container">
                <!-- informasi -->
                <div class="w-full py-3">
                    <div class="mx-auto">
                        <div class="bg-white p-4">
                            <p class="font-bold text-lg mb-3">Informasi Umum</p>
                            <div class="grid xl:grid-cols-4 sm:grid-cols-1 gap-4 flex flex-wrap">
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
                                        <?php $number = 1;
                                        $totalbeli = 0;
                                        
                                        foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) : 
                                            $ambil = mysqli_query($koneksi,"SELECT * FROM mount WHERE id_mount = '$id_mount'");
                                            $detail = mysqli_fetch_assoc($ambil);
                                            $subharga = $detail["harga_tiket"] * $jumlah; ?>
                                            <tr class="bg-white ">
                                                <td class="px-6 py-4"><?= $number; ?></td>
                                                <td class="px-6 py-4"><?= $detail["nama_mount"]; ?></td>
                                                <td class="px-6 py-4"><img src="img/foto_mount/<?= $detail['foto_mount1']; ?>" class="rounded-md" width="150" height="150" alt=""></td>
                                                <td class="px-6 py-4">
                                                <input class="tanggalan<?php echo $number; ?> bg-slate-200 p-1 rounded-lg outline-slate-100" type="date" class="form-control" name="tanggalPendakian<?php echo $number; ?>" id="tanggalPendakian<?php echo $number; ?>" required onchange="ubahTanggal<?php echo $number; ?>()">
                                                </td>
                                                <td class="px-6 py-4">Rp <?= number_format($detail["harga_tiket"]); ?></td>
                                                <td class="px-6 py-4"><?= $jumlah; ?></td>
                                                <td class="px-6 py-4">Rp <?= number_format($subharga); ?></td>
                                            </tr>
                                        <?php
                                        $totalbeli += $subharga;
                                        $number++;
                                        endforeach
                                        ?>
                                        
                                        <tr class="bg-gray-500">
                                            <td></td>
                                            <td colspan="5" class="px-6 py-4 font-bold font-medium text-white whitespace-nowrap">Subtotal</td>
                                            <td class="px-6 py-4 font-bold text-white">Rp <?= number_format($totalbeli); ?></td>
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
                        $totalbeli = 0;
                        foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) : 
                            $ambil = mysqli_query($koneksi,"SELECT * FROM mount WHERE id_mount = '$id_mount'");
                            $detail = mysqli_fetch_assoc($ambil);
                            $subharga = $detail["harga_tiket"] * $jumlah; ?>
                        <div class="p-2">
                            <div class="flex">
                                <div class="w-1/2 py-2 overflow-hidden">
                                    <img src="img/foto_mount/<?= $detail['foto_mount1']; ?>" class="rounded-md w-36 h-28 shadow-md" alt="">
                                </div>
                                <div class="flex-col">
                                    <div class="flex mx-4 my-2 space-x-4 text-md">
                                        <div class="font-bold"><?= $detail["nama_mount"]; ?></div> 
                                    </div><hr>
                                    <div class="flex mx-4 my-2 space-x-4 text-md">
                                        <div class="text-gray-500">
                                            <input class="tanggalanhp<?php echo $number; ?> bg-slate-200 p-1 rounded-lg outline-slate-100" type="date" class="form-control" id="tanggalPendakianhp<?php echo $number; ?>" required onchange="ubahTanggalhp<?php echo $number; ?>()">
                                        </div> 
                                        <div class="flex">
                                            <p class="border border-gray-300 rounded-md mx-1 w-6 text-center"><?= $jumlah; ?></p>
                                        </div>
                                    </div><hr>
                                    <div class="flex-col float-right">
                                        <div class="mx-4 my-1 space-x-4 text-md">
                                            <div class="text-gray-500 text-sm float-right">Rp <?= number_format($detail["harga_tiket"]); ?></div>
                                        </div>
                                        <div class="mx-4 my-1 space-x-4 text-md">
                                            <div class="text-orange-500 font-bold text-md float-right">Rp <?= number_format($subharga); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $totalbeli += $subharga;
                        $number++;
                        endforeach
                        ?>
                        <table class="w-full text-sm text-left text-gray-500 sm:rounded-lg">
                            <tr class="bg-gray-500">
                                <td colspan="5" class="px-6 py-4 font-bold font-medium text-white whitespace-nowrap">Subtotal</td>
                                <td class="px-6 py-4 font-bold text-white">Rp <?= number_format($totalbeli); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
    
                <!-- metode pembayaran -->
                <div class="w-full py-3">
                    <div class="mx-auto">
                        <div class="p-4 bg-white items-center">
                            <p class="font-bold text-lg mb-3">Metode Pembayaran</p>
                            <div class="grid lg:gap-2 grid-cols-1">
                                <div class="">
                                    <div class="flex items-center mb-4">
                                        <input id="default-checkbox" type="checkbox" class="w-3 h-3 lg:w-4 lg:h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" checked disabled>
                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-500">Transfer Bank</label>
                                    </div>
                                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an option</label>
                                    <select name="id_bank" id="countries" class="w-1/2 md:w-44 bg-gray-50 border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" required>
                                        <option value="" selected>--Pilih Bank--</option>
                                        <?php
                                        $databank = $koneksi->query("SELECT * FROM biaya_admin");
                                        while ($data = $databank->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $data["id_bank"] ?>">
                                        <?php echo $data["nama_bank"]  ?> - adm. Rp <?php echo number_format($data["tarif_admin"]) ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <div class="flex flex-wrap gap-3.5">
                                        <img src="./img/bca.svg" class="w-14 lg:w-20" alt="">
                                        <img src="./img/mandiri.svg" class="w-14 lg:w-20" alt="">
                                        <img src="./img/bni.svg" class="w-14 lg:w-20" alt="">
                                        <img src="./img/bri.svg" class="w-14 lg:w-20" alt="">
                                    </div>
                                    <hr class="my-2">
                                    <input type="submit" value="Bayar" name="checkout" class="bg-emerald-500 py-2 w-1/4 md:w-1/6 mt-3 rounded-md float-right text-white hover:bg-emerald-600 text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <?php
    include("footer.php");

    if (isset($_POST["checkout"])) {

        $id_user = $_SESSION["users"]["id_user"];
        $tanggal = date("Y-m-d");

        $id_bank = $_POST["id_bank"];
        $databank = $koneksi->query("SELECT * FROM biaya_admin WHERE id_bank = '$id_bank'");
        $data = $databank->fetch_assoc();
        $total = $totalbeli + $data["tarif_admin"];
        $status = "Belum Lunas";

        // menyimpan data ke tabel pembelian
        $koneksi->query("INSERT INTO pembelian(id_user, tanggal_pembelian, total_pembelian, status_pembelian, id_bank) VALUES ('$id_user', '$tanggal', '$total', '$status', '$id_bank')");

        // mendapatkan id pembelian baru terjadi
        $id_pembelian_terbaru = $koneksi->insert_id;

        $urutan = 1;
        foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) {
            $data = $koneksi->query("SELECT * FROM mount WHERE id_mount = '$id_mount'");
            $isidata = $data->fetch_assoc();

            $jmlh_tiket = $jumlah;
            $gunung = $isidata["nama_mount"];
            $tiket = $isidata["harga_tiket"];
            $total = $tiket * $jumlah;
            $tanggal_pendakian = $_POST["tanggalPendakian" . $urutan];
            $urutan++;
            
            $koneksi->query("INSERT INTO pemesanan_tiket(id_pembelian, id_produk, jumlah_tiket, gunung, tiket, total, tanggal_pendakian) Values('$id_pembelian_terbaru','$id_mount','$jmlh_tiket','$gunung','$tiket','$total','$tanggal_pendakian')");
        }

        // Mengosongkan keranjang belanja
        unset($_SESSION["keranjang"]);

        // Tampilan dialihkan ke halaman nota dari pembelian barusan
        // echo "<script>alert('Pembelian sukses');</script>";
        echo "<script>location='nota.php?id=$id_pembelian_terbaru';</script>";
    }
    ?>

    <script src="./js/script.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
    <script>
        // untuk mendisable pemilihan tanggal yang telah lampau
        <?php for ($i=1; $i <= count($_SESSION["keranjang"]); $i++) { ?>
            var today = new Date().toISOString().substr(0, 10);
            document.getElementsByClassName("tanggalan<?php echo $i; ?>")[0].min = today;
            document.getElementsByClassName("tanggalanhp<?php echo $i; ?>")[0].min = today;
        <?php } ?>

        // set tanggal
        <?php for ($i=1; $i <= count($_SESSION["keranjang"]); $i++) { ?>
        function ubahTanggalhp<?php echo $i; ?>() {
            var tes = document.getElementById("tanggalPendakianhp<?php echo $i; ?>").value;
            document.getElementById("tanggalPendakian<?php echo $i; ?>").value = tes;
        }
        function ubahTanggal<?php echo $i; ?>() {
            var tes = document.getElementById("tanggalPendakian<?php echo $i; ?>").value;
            document.getElementById("tanggalPendakianhp<?php echo $i; ?>").value = tes;
        }
        <?php } ?>
    </script>
</body>
</html>