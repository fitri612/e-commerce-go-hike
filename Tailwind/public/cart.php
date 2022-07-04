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
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/additional.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;800&display=swap" rel="stylesheet">
    </head>
    <body class="bg-slate-100 scrollbar-thin scrollbar-thumb-emerald-700 scrollbar-track-emerald-200 font-popins">
    <?php
    include("fungsi.php");
    include("navbar.php");

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

    if (isset($_POST['checkout'])) {
        $urutan = 1;
        foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) {
            $jumlah = $_POST['jumlah' . $urutan];
            $_SESSION['keranjang'][$id_mount] = $jumlah;
            $urutan++;
        }

        echo "<script>location='checkout.php'</script>";
    }

    ?>
    
    <section id="blog" class="pt-14 pb-14 bg-gray-50">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center my-8">
                    <h4 class="font-semibold text-lg mb-2 text-teal-500">Cart Product</h4>
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl pb-4">Shopping Cart</h2>
                </div>
            </div>

            <!-- table order -->
            <div class="w-full px-4 mx-auto hidden md:block">
                <form method="post">
                    <div class="w-full overflow-x-auto shadow-md sm:rounded-lg">    
                        <table class="w-full md:table-fixed text-sm text-left text-gray-500 shadow-md">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 w-20">No</th>
                                    <th class="px-6 py-3">Name</th>
                                    <th class="px-6 py-3">Pict</th>
                                    <th class="px-6 py-3 w-40">Price</th>
                                    <th class="px-6 py-3 w-32">Qty</th>
                                    <th class="px-6 py-3 ">Total</th>
                                    <th class="px-6 py-3 w-32">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php $number = 1; ?>
                            <?php foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) : ?>
                            <!-- menamilkan produk yg sedang diperulangkan berdasarkan id_produk -->
                            <?php
                            $ambil = $koneksi->query("SELECT * FROM mount WHERE id_mount = '$id_mount'");
                            $pecah = $ambil->fetch_assoc();
                            $totalharga = $pecah["harga_tiket"] * $jumlah;
                            ?>
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4"><?php echo $number; ?></td>
                                    <td class="px-6 py-4"><?php echo $pecah["nama_mount"]; ?></td>
                                    <td class="px-6 py-4">
                                        <img src="img/foto_mount/<?php echo $pecah['foto_mount1']; ?>" class="rounded-xl" width="150" height="150">
                                    </td>
                                    <td class="px-6 py-4">Rp <?php echo number_format($pecah["harga_tiket"]); ?></td>
                                    <td class="px-6 py-4">
                                        <div class="flex">
                                            <button type="button" onclick="decrement<?php echo $number; ?>(); hapus<?php echo $number; ?>()">-</button>
                                            <input class="border border-gray-300 rounded-md mx-2 w-6 text-center" id="jumlah<?php echo $number; ?>" name="jumlah<?php echo $number; ?>" value="<?php echo $jumlah; ?>" min="0" readonly>
                                            <button type="button" onclick="increment<?php echo $number; ?>()">+</button>
                                        </div>                
                                    </td>
                                    <td class="px-6 py-4 text-orange-500 font-bold" id="total<?php echo $number; ?>">Rp <?php echo number_format($totalharga); ?></td>
                                    <td class="px-6 py-4">
                                        <a class="hover:text-red-500 cursor-pointer" href="cartdelete.php?id=<?= $id_mount; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>     
                                    </td>
                                </tr>
                            <?php $number++; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
    
                    <div class="flex my-10 w-full xl:w-1/4">
                        <a class="w-1/2 bg-sky-600 py-2 text-base text-center mr-4 text-white rounded-lg hover:opacity-80" href="produk.php">Lanjut Belanja</a>
                        <button class="w-1/2 bg-green-600 py-2 text-base text-center text-white rounded-lg hover:opacity-80" name="checkout">Checkout</button>
                    </div>
                </form>
            </div>

            <!-- Table hp -->
            <div>
                <form method="post">
                    <div class="grid grid-cols-1 divide-y-2 divide-slate-200 md:hidden">
                        <?php $number = 1; ?>
                        <?php foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) : ?>
                        <!-- menampilkan produk yg sedang diperulangkan berdasarkan id_produk -->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM mount WHERE id_mount = '$id_mount'");
                        $pecah = $ambil->fetch_assoc();
                        $totalharga = $pecah["harga_tiket"] * $jumlah;
                        ?>
                        <div class="p-2">
                            <div class="flex">
                                <div class="w-1/3 py-2 overflow-hidden">
                                    <img src="img/foto_mount/<?php echo $pecah['foto_mount1']; ?>" class="rounded-md w-28 h-28 shadow-md" alt="">
                                </div>
                                <div class="flex-col">
                                    <div class="flex mx-4 my-2 space-x-4 text-md">
                                        <div class="font-bold"><?php echo $pecah["nama_mount"]; ?></div> 
                                    </div><hr>
                                    <div class="mx-4 my-2 space-x-4 text-md">
                                        <div class="flex">
                                            <button type="button" onclick="decrement<?php echo $number; ?>(); hapus<?php echo $number; ?>()">-</button>
                                            <input class="border border-gray-300 rounded-md mx-2 w-6 text-center" id="jumlahhp<?php echo $number; ?>" name="jumlah<?php echo $number; ?>" value="<?php echo $jumlah; ?>" min="0" readonly>
                                            <button type="button" onclick="increment<?php echo $number; ?>()">+</button>
                                        </div>
                                    </div><hr>
                                    <div class="flex-col float-right">
                                        <div class="mx-4 my-1 space-x-4 text-md">
                                            <div class="text-gray-500 text-sm float-right">Rp <?php echo number_format($pecah["harga_tiket"]); ?></div>
                                        </div>
                                        <div class="mx-4 my-1 space-x-4 text-md">
                                            <div class="text-orange-500 font-bold text-md float-right" id="totalhp<?php echo $number; ?>">Rp <?php echo number_format($totalharga); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center pl-10">
                                    <a class="hover:text-red-500 cursor-pointer" href="cartdelete.php?id=<?= $id_mount; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php $number++; ?>
                        <?php endforeach; ?>
                        <div class="flex my-5 w-full xl:hidden">
                            <a class="w-1/2 bg-sky-600 py-2 text-base text-center mr-4 text-white rounded-lg hover:opacity-80" href="produk.php">Lanjut Belanja</a>
                            <button class="w-1/2 bg-green-600 py-2 text-base text-center text-white rounded-lg hover:opacity-80" name="checkout">Checkout</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
    
    <script>
        function number_format (number, decimals, dec_point, thousands_sep) {
            // Strip all characters but numerical ones.
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function (n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
        <?php
        $urutan = 1;
        foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) {
            $ambil = $koneksi->query("SELECT * FROM mount WHERE id_mount = '$id_mount'");
            $pecah = $ambil->fetch_assoc();
        ?>
            function updateTotal<?php echo $urutan; ?>() {
                var harga = <?php echo $pecah["harga_tiket"] ?>;
                var jumlah = document.getElementById('jumlah<?php echo $urutan; ?>').value;
                var total = harga * jumlah;
                document.getElementById('total<?php echo $urutan; ?>').innerHTML = "Rp. "+number_format(total);
                document.getElementById('totalhp<?php echo $urutan; ?>').innerHTML = "Rp. "+number_format(total);
            }
            updateTotal<?php echo $urutan; ?>();

            function increment<?php echo $urutan; ?>() {
                var value = parseInt(document.getElementById('jumlah<?php echo $urutan; ?>').value, 10);
                value = isNaN(value) ? 0 : value;
                value++;
                document.getElementById('jumlah<?php echo $urutan; ?>').value = value;
                document.getElementById('jumlahhp<?php echo $urutan; ?>').value = value;
                updateTotal<?php echo $urutan; ?>();
            }

            function decrement<?php echo $urutan; ?>() {
                var value = parseInt(document.getElementById('jumlah<?php echo $urutan; ?>').value, 10);
                value = isNaN(value) ? 0 : value;
                value--;
                document.getElementById('jumlah<?php echo $urutan; ?>').value = value;
                document.getElementById('jumlahhp<?php echo $urutan; ?>').value = value;
                updateTotal<?php echo $urutan; ?>();
            }

            function hapus<?php echo $urutan; ?>() {
                var jumlah = document.getElementById('jumlah<?php echo $urutan; ?>').value;
                var jumlahhp = document.getElementById('jumlahhp<?php echo $urutan; ?>').value;
                if (jumlah == 0) {
                    location = "cartdelete.php?id=<?= $id_mount; ?>";
                }
                if (jumlahhp == 0) {
                    location = "cartdelete.php?id=<?= $id_mount; ?>";
                }
            }

        <?php
            $urutan++;
        }
        ?>
    </script>
    <script src="./js/script.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>   
</body>
</html>