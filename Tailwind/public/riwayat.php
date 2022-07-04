<?php
// Jika tidak ada session pelanggan (belum login)
if (!isset($_SESSION['users']) or empty($_SESSION['users'])) {
    // echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// if(!isset($_SESSION["keranjang"])){
//   // Diarahkan ke ke index.php
//   echo "<script>alert('Belum ada riwayat pembayaran!')</script>";
//   echo "<script>location='index.php';</script>";
// }

// echo "<pre>";
// print_r($_SESSION['pelanggan']);
// echo "</pre>";

?>
<!-- Order History -->
<div class="ml-20 hidden md:block" id="history">
    <div class="w-full px-4 py-3">
        <div class="mx-auto">
            <div class="p-4 bg-white items-center">
                <p class="font-bold text-3xl mb-3">Riwayat Pembelian</p>
                <div class="relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3">Tanggal</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Total</th>
                                <th scope="col" class="px-6 py-3">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            // Mendapatkan id_user yang login dari session
                            $id_user = $_SESSION['users']['id_user'];
                            $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_user='$id_user'");
                            if ($ambil->num_rows == 0) :
                            ?>
                                <tr class="bg-white border-b">
                                    <td colspan="5">Tidak ada data riwayat... </td>
                                </tr>

                            <?php endif; ?>
                            <?php
                            while ($pecah = $ambil->fetch_assoc()) :
                            ?>
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4"><?= $no; ?></td>
                                    <td class="px-6 py-4"><?= date("d F Y", strtotime($pecah['tanggal_pembelian'])); ?></td>
                                    <td class="px-6 py-4">
                                        <?php if ($pecah['status_pembelian'] == 'Belum Lunas') : ?>
                                            <span class="bg-red-200 text-red-500 py-1 px-2 rounded">
                                                <?= $pecah['status_pembelian']; ?>
                                            </span>
                                        <?php elseif ($pecah['status_pembelian'] == 'Lunas') : ?>
                                            <span class="bg-emerald-200 text-emerald-500 py-1 px-2 rounded">
                                                <?= $pecah['status_pembelian']; ?>
                                            </span>
                                        <?php else : ?>
                                            <span class="bg-blue-200 text-blue-500 py-1 px-2 rounded">
                                                <?= $pecah['status_pembelian']; ?>
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-orange-500 px-6 py-4">Rp <?= number_format($pecah['total_pembelian']); ?></td>
                                    <td class="flex px-6 py-4">
                                        <!-- icon nota -->
                                        <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="hover:text-sky-500" title="Nota">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </a>
                                        <p class="px-2 text-gray-300">|</p>
                                        <!-- icon bayar sekarang -->
                                        <?php if ($pecah['status_pembelian'] == 'Lunas') : ?>
                                            <a href="data.php?halaman=viewbayar&id=<?= $pecah['id_pembelian']; ?>" id="btnviewbayar" title="Lihat Pembayaran" class="hover:text-emerald-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        <?php elseif ($pecah['status_pembelian'] == 'Waiting') : ?>
                                            <a href="data.php?halaman=viewbayar&id=<?= $pecah['id_pembelian']; ?>" id="btnviewbayar" title="Lihat Pembayaran" class="hover:text-emerald-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                        <?php else : ?>
                                            <a href="data.php?halaman=bayar&id=<?= $pecah['id_pembelian']; ?>" id="btnbayar" class="hover:text-emerald-500" title="Pembayaran">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                </svg>
                                            </a>


                                        <?php endif; ?>

                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order History -->
<div class="md:hidden" id="mobile_history">
    <div class="w-full px-2 py-1">
        <div class="mx-auto">
            <div class="p-1 bg-white items-center">
                <p class="font-bold text-3xl mb-3">Riwayat Pembelian</p>

                <div class="grid grid-cols-1 divide-y-2 divide-slate-200 md:hidden">
                    <?php
                    $no = 1;
                    // Mendapatkan id_user yang login dari session
                    $id_user = $_SESSION['users']['id_user'];
                    $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_user='$id_user'");
                    if ($ambil->num_rows == 0) :
                    ?>
                        <tr class="bg-white border-b">
                            <td>Tidak ada data riwayat... </td>
                        </tr>

                    <?php endif; ?>
                    <?php
                    while ($pecah = $ambil->fetch_assoc()) :
                    ?>
                        <div class="p-2">
                            <div class="flex">
                                <div class="w-1/2">
                                    <?php if ($pecah['status_pembelian'] == 'Lunas') : ?>
                                        <span class="bg-emerald-200 text-sm text-emerald-500 py-1 px-8 rounded">
                                            Lunas
                                        </span>
                                    <?php elseif ($pecah['status_pembelian'] == 'Belum Lunas') : ?>
                                        <span class="bg-red-200 text-sm text-red-500 py-1 px-2 rounded">
                                            Belum Lunas
                                        </span>
                                    <?php else : ?>
                                        <span class="bg-blue-200 text-sm text-blue-500 py-1 px-5 rounded">
                                            Waiting
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="flex">
                                    <div class="flex-col">
                                        <span class="mx-4 text-gray-500"><?= date("d/m/Y", strtotime($pecah['tanggal_pembelian'])); ?></span>
                                        <span class="text-orange-500 mx-4">Rp <?= number_format($pecah['total_pembelian']); ?></span>
                                    </div>
                                    <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="text-gray-500 hover:text-sky-500 pr-2" title="Nota">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </a>
                                    <?php if ($pecah['status_pembelian'] == 'Lunas') : ?>
                                        <a href="data.php?halaman=viewbayar&id=<?= $pecah['id_pembelian']; ?>" class="text-gray-500 hover:text-emerald-500" title="Lihat Pembayaran" id="mobile_btnviewbayar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    <?php elseif ($pecah['status_pembelian'] == 'Waiting') : ?>
                                        <a href="data.php?halaman=viewbayar&id=<?= $pecah['id_pembelian']; ?>" class="text-gray-500 hover:text-emerald-500" title="Lihat Pembayaran" id="mobile_btnkonfbayar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                    <?php else : ?>
                                        <a href="data.php?halaman=bayar&id=<?= $pecah['id_pembelian']; ?>" class="text-gray-500 hover:text-emerald-500" title="Pembayaran" id="mobile_btnbayar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>