<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Tambah Transaksi Keuangan</h4>
                <a href="<?= base_url('keuangan/multiple'); ?>" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle"></i> Multiple Create
                </a>
            </div>

            <form action="<?= base_url('keuangan/store'); ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Unit</label>
                        <select name="unit" class="form-select" required>
                            <option value="kantin">Kantin</option>
                            <option value="laundry">Laundry</option>
                            <option value="pembiayaan">Pembiayaan</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Tipe</label>
                        <select name="catatan" class="form-select" required>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d'); ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jumlah</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" id="jumlah" name="jumlah" class="form-control text-end" placeholder="0" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Contoh: Beli ATK" required>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <a href="<?= base_url('laporan'); ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    new Cleave('#jumlah', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand',
        delimiter: '.',
        numeralDecimalMark: ',',
        numeralDecimalScale: 0
    });
});
</script>

<?= $this->endSection(); ?>
