<?php
include 'fungsi.php';

$id_pembelian = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();


if (empty($detbay)) {
    // echo "<script>alert('Belum ada data pembayaran!');</script>";
    echo "<script>location='history.php';</script>";
}

// Jika data pelanggan yang bayar tidak sesuai yang login
if ($_SESSION['users']['id_user'] != $detbay['id_user']) {
    // echo "<script>alert('Akses ditolak!');</script>";
    echo "<script>location='history.php';</script>";
}

?>

<!-- view pembayaran -->
<div class="border border-gray-100 ml-20 pb-10 rounded shadow-md hidden md:block" id="viewbayar">
    <p class="text-md text-blue-500 font-semibold mx-10 mt-10 py-2">Payment successful</p>
    <p class="text-4xl font-extrabold mx-10">Thanks for your order</p>

    <div class="mx-10">
        <div class="grid grid-cols-3 my-8">
            <div>
                <p class="font-semibold text-gray-900">No Pembayaran</p>
                <p class="text-blue-500"><?= $detbay['id_pembayaran']; ?></p>
            </div>
            <div>
                <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                <p class="text-blue-500"><?= $detbay['tanggal']; ?></p>
            </div>
            <div>
                <p class="font-semibold text-gray-900">Status Pembelian</p>
                <p class="text-blue-500"><?= $detbay['status_pembelian']; ?></p>
            </div>
        </div>

        <div>
            <form action="" method="post">
                <div>
                    <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                    <div class="w-full outline-none mb-4 px-2 py-1 border border-blue-200 bg-blue-50 font-bold text-gray-500 rounded-md"><?= $detbay['penyetor']; ?></div>
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Bank</label>
                    <div class="w-full outline-none mb-4 px-2 py-1 border border-blue-200 bg-blue-50 font-bold text-gray-500 rounded-md"><?= $detbay['bank']; ?></div>
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Total</label>
                    <div class="w-full outline-none mb-4 px-2 py-1 border border-blue-200 bg-blue-50 font-bold text-gray-500 rounded-md">Rp <?= number_format($detbay['total']); ?></div>
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                    <img class="w-40 h-40 mb-5 p-1 ring-1 ring-blue-200" src="img/bukti_pembayaran/<?php echo $detbay['bukti']; ?>">

                </div>
            </form>
        </div>
    </div>
</div>

<!-- view pembayaran -->
<div class="border border-gray-100 pb-10 rounded shadow-md md:hidden" id="mobile_viewbayar">
    <p class="text-md text-blue-500 font-semibold mx-10 mt-10 py-2">Payment successful</p>
    <p class="text-4xl font-extrabold mx-10">Thanks for your order</p>

    <div class="mx-10">
        <div class="grid grid-cols-1 my-8">
            <div>
                <p class="font-semibold text-gray-900">No Pemesanan</p>
                <p class="text-blue-500"><?= $detbay['id_pembayaran']; ?></p>
            </div>
            <div class="my-2">
                <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                <p class="text-blue-500"><?= $detbay['tanggal']; ?></p>
            </div>
            <div>
                <p class="font-semibold text-gray-900">Status Pembelian</p>
                <p class="text-blue-500"><?= $detbay['status_pembelian']; ?></p>
            </div>
        </div>

        <div>
            <form action="" method="post">
                <div>
                    <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                    <div class="w-full outline-none mb-4 px-2 py-1 border border-emerald-200 bg-emerald-50 font-bold text-gray-500 rounded-md"><?= $detbay['penyetor']; ?></div>
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Bank</label>
                    <div class="w-full outline-none mb-4 px-2 py-1 border border-emerald-200 bg-emerald-50 font-bold text-gray-500 rounded-md"><?= $detbay['bank']; ?></div>
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Total</label>
                    <div class="w-full outline-none mb-4 px-2 py-1 border border-emerald-200 bg-emerald-50 font-bold text-gray-500 rounded-md">Rp. <?= number_format($detbay['total']); ?>,-</div>
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                    <img class="w-40 h-40 mb-5 p-1 ring-1 ring-emerald-200" src="img/bukti_pembayaran/<?php echo $detbay['bukti']; ?>">

                </div>
            </form>
        </div>
    </div>

</div>