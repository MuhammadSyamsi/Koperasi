<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-4">
    <h3>Edit Invoice</h3>

    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('invoice/update/'.$invoice['id_invoice']); ?>" method="post">
                <div class="mb-3">
                    <label for="nomor_invoice" class="form-label">Nomor Invoice</label>
                    <input type="text" class="form-control" id="nomor_invoice" name="nomor_invoice" 
                           value="<?= esc($invoice['nomor_invoice']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" 
                           value="<?= esc($invoice['tanggal']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan"><?= esc($invoice['keterangan']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="UNPAID"  <?= $invoice['status']=='UNPAID'?'selected':''; ?>>UNPAID</option>
                        <option value="PARTIAL" <?= $invoice['status']=='PARTIAL'?'selected':''; ?>>PARTIAL</option>
                        <option value="PAID"    <?= $invoice['status']=='PAID'?'selected':''; ?>>PAID</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= base_url('invoice/view/'.$invoice['id_invoice']); ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>