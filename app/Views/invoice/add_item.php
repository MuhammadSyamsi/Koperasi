<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-4">
    <h3>Tambah Item untuk Invoice <?= esc($invoice['nomor_invoice']); ?></h3>

    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('invoice/saveItem'); ?>" method="post">
                <input type="hidden" name="id_invoice" value="<?= esc($invoice['id_invoice']); ?>">

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('invoice/detail/'.$invoice['id_invoice']); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>