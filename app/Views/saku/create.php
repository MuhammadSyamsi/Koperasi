<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-3">
    <h4>Tambah Saldo Saku</h4>
    <form action="<?= base_url('saku/store'); ?>" method="post">
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Total Saldo</label>
            <input type="number" name="total_saldo" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= $this->endSection(); ?>
