<h2>Data Pembelian</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pembelian</th>
            <th>Status Pembelian</th>
            <th>Total</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php $no = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN users ON pembelian.id_user = users.id_user"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $pecah["username"]; ?></td>
                <td><?= date("d F Y", strtotime($pecah["tanggal_pembelian"])); ?></td>
                <td><?= $pecah["status_pembelian"]; ?></td>
                <td>Rp. <?= number_format($pecah["total_pembelian"]); ?>,-</td>
                <td>
                    <a href="index.php?halaman=detail&id=<?= $pecah["id_pembelian"]; ?>" class="btn btn-primary btn-xs">detail</a>
                    <?php if ($pecah['status_pembelian'] != 'pending') : ?>
                        <a href="index.php?halaman=pembayaran&id=<?= $pecah['id_pembelian']; ?>" class="btn btn-success btn-xs">Pembayaran</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endwhile; ?>

    </tbody>
</table>