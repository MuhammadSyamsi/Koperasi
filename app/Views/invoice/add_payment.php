<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-4">
    <h3>Tambah Pembayaran</h3>
    <div class="card shadow">
        <div class="card-body">
            <form action="<?= base_url('invoice/savePayment/'.$invoice['id_invoice']); ?>" method="post">
                <?= csrf_field(); ?>

                <div class="mb-3">
                    <label>Nomor Invoice</label>
                    <input type="text" class="form-control" value="<?= esc($invoice['nomor_invoice']); ?>" disabled>
                </div>

                <div class="mb-3">
                    <label>Tanggal Bayar</label>
                    <input type="date" name="tanggal_bayar" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Metode Pembayaran</label>
                    <select name="metode" class="form-select" required>
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
                        <option value="QRIS">QRIS</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('invoice/view/'.$invoice['id_invoice']); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>