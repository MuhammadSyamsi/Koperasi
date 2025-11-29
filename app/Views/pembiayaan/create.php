<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="card">
    <div class="card-header">
        <h5>Tambah Pembiayaan</h5>
    </div>
    <div class="card-body">
        <form action="/pembiayaan/store" method="post">

            <div class="mb-3">
                <label>Nama Customer</label>
                <input type="text" name="customer" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Modal Keluar</label>
                <input type="number" name="modalKeluar" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Harga Jual</label>
                <input type="number" name="hargaJual" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Angsuran</label>
                <input type="date" name="tanggalAngsuran" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jatuh Tempo</label>
                <input type="date" name="jatuhTempo" class="form-control">
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="/pembiayaan" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>