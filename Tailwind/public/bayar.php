<!-- Pembayaran -->
<?php

// Jika tidak ada session pelanggan (belum login)
if (!isset($_SESSION['users']) or empty($_SESSION['users'])) {
    // echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// Mendapatkan id_pembelian dari url
$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// print_r($_SESSION);
// echo "</pre>";

// Mendapatkan id_pelanggan yg beli
$id_pelanggan_beli = $detail['id_user'];
// Mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION['users']['id_user'];

if ($id_pelanggan_beli != $id_pelanggan_login) {
    // echo "<script>alert('Akses ditolak!');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}



?>
<div class="border border-gray-100 ml-20 pb-10 rounded shadow-md hidden md:block" id="bayar">


    <p class="py-7 pl-4 text-3xl text-center font-bold">Pembayaran</p>
    <hr class="mx-10">

    <div class="mx-10">
        <div class="grid grid-cols-3 my-6">
            <div>
                <p class="font-semibold text-gray-900">No Pemesanan</p>
                <p class="text-blue-500"><?= $detail['id_pembelian']; ?></p>
            </div>
            <div>
                <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                <p class="text-blue-500"><?= date("d F Y", strtotime($detail['tanggal_pembelian'])); ?></p>
            </div>
            <div>
                <p class="font-semibold text-gray-900">Total Pembayaran</p>
                <p class="text-blue-500">Rp <?= number_format($detail['total_pembelian']); ?></p>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <div>
                <div>
                    <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                    <input class="form-control w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="penyetor">
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Bank</label>
                    <input class="form-control w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="bank" id="">
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Total</label>
                    <input class="form-control w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="total" id="">
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                    <input type="file" id="file" name="bukti" class="form-control bg-sky-600 text-gray-100  p-2 rounded-md cursor-pointer hover:bg-sky-700 shadow-emerald-400">
                </div>
            </div>
            <button name="konfirmasi" type="submit" class="bg-sky-600 text-center text-white mt-10 py-2 px-14 rounded-md hover:bg-sky-700">Konfirmasi</button>
        </form>
    </div>
</div>


<!-- Pembayaran -->
<div class="border border-gray-100 pb-10 rounded shadow-md md:hidden" id="mobile_bayar">
    <p class="py-7 pl-4 text-3xl text-center font-bold">Pembayaran</p>
    <hr class="mx-10">

    <div class="mx-10">
        <div class="grid grid-cols-1 my-6">
            <div>
                <p class="font-semibold text-gray-900">No Pemesanan</p>
                <p class="text-gray-500"><?= $detail['id_pembelian']; ?></p>
            </div>
            <div class="my-2">
                <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                <p class="text-gray-500"><?= $detail['tanggal_pembelian']; ?></p>
            </div>
            <div>
                <p class="font-semibold text-gray-900">Total Pembayaran</p>
                <p class="text-gray-500">Rp <?= number_format($detail['total_pembelian']); ?></p>
            </div>
        </div>

        <div>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                    <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="penyetor" id="">
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Bank</label>
                    <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="bank" id="">
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Total</label>
                    <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="total" id="">
                </div>
                <div>
                    <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                    <input type="file" id="file" name="bukti" class="w-full form-control bg-sky-600 text-gray-100  p-2 rounded-md cursor-pointer hover:bg-sky-700 shadow-emerald-400">
                </div>
                <button name="konfirmasi" type="submit" class="bg-sky-600 text-center text-white mt-10 py-2 px-14 rounded-md hover:bg-sky-700">Konfirmasi</button>
            </form>
        </div>
    </div>

</div>


<?php
if (isset($_POST['konfirmasi'])) {
    $id = $detail['id_pembelian'];
    $sql = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembelian='$id'") or die(mysqli_error($koneksi));

    $hasilquery = mysqli_num_rows($sql);

    if ($hasilquery == 0) {
        $bukti = $_FILES['bukti']['name'];
        $lokasi = $_FILES['bukti']['tmp_name'];
        move_uploaded_file($lokasi, "img/bukti_pembayaran/$bukti");
        $penyetor = $_POST['penyetor'];
        $bank = $_POST['bank'];
        $total = $_POST['total'];
        $tanggal = date('Y-m-d');

        $insert = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pembelian, penyetor, bank, total, bukti, tanggal) VALUES ('$id', '$penyetor', '$bank', '$total', '$bukti', '$tanggal')") or die(mysqli_error($koneksi));
        $koneksi->query("UPDATE pembelian SET status_pembelian='Waiting' WHERE id_pembelian='$idpem'");
        if ($insert) {
            // echo "<script>alert('Data sudah di kirim ke admin');</script>";
            echo "<script>location='data.php?halaman=riwayat';</script>";
        } else {

            echo '<script>
                sweetAlert({ title: "Gagal!", text: "Ups, Anda sudah terdaftar hadir!", type: "error", timer: 2000});
                </script>';
        }
    } else {

        echo '<script>
            sweetAlert({ title: "Gagal!", text: "Ups, Anda sudah terdaftar hadir!", type: "error", timer: 2000});
            </script>';
    }
}

?>