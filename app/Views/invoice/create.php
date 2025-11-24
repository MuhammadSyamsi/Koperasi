<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-4">
    <h3>Buat Invoice Baru</h3>
    <form id="form-invoice">
        <div class="mb-3">
            <label class="form-label">Nomor Invoice</label>
            <input type="text" name="nomor_invoice" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Tagihan</label>
            <input type="number" name="total_tagihan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="<?= base_url('invoice'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
document.getElementById('form-invoice').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = Object.fromEntries(new FormData(this));

    const res = await fetch("<?= base_url('invoice/store'); ?>", {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(formData)
    });

    const result = await res.json();
    if(result.status === 'success'){
        alert('Invoice berhasil dibuat!');
        window.location.href = "<?= base_url('invoice/view'); ?>/" + result.id_invoice;
    }
});
</script>

<?= $this->endSection(); ?>
