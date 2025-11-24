<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-3">
    <h4>Tambah Barang</h4>
    <form action="<?= base_url('barang/store'); ?>" method="post">
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= $this->endSection(); ?>
