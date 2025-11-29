<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Daftar Pembiayaan</h5>
        <a href="/pembiayaan/create" class="btn btn-primary btn-sm">Tambah</a>
    </div>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Modal Keluar</th>
                    <th>Harga Jual</th>
                    <th>Keuntungan</th>
                    <th>Saldo Masuk</th>
                    <th>Kekurangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1;
                foreach ($pembiayaan as $p) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $p['customer']; ?></td>
                        <td><?= number_format($p['modalKeluar']); ?></td>
                        <td><?= number_format($p['hargaJual']); ?></td>
                        <td class="text-success fw-bold"><?= number_format($p['keuntungan']); ?></td>
                        <td class="text-primary fw-bold"><?= number_format($p['saldoMasuk']); ?></td>
                        <td class="text-danger fw-bold"><?= number_format($p['kekurangan']); ?></td>
                        <td class="text-center">
                            <a href="/pembiayaan/edit/<?= $p['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/pembiayaan/delete/<?= $p['id']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data?');">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>