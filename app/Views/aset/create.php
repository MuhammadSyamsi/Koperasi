<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-3">
    <h4>Tambah Aset</h4>
    <form action="<?= base_url('aset/store'); ?>" method="post">
        <div class="mb-3">
            <label>Nama Aset</label>
            <input type="text" name="nama_aset" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nilai Aset</label>
            <input type="number" name="nilai" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= $this->endSection(); ?>
