<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-4">
    <h3>Detail Invoice</h3>

    <!-- Navigasi Aksi -->
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <div class="btn-group">
            <a href="<?= base_url('invoice/addItem/'.$invoice['id_invoice']); ?>" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Item
            </a>

            <a href="<?= base_url('invoice/addPayment/'.$invoice['id_invoice']); ?>" class="btn btn-warning btn-sm">
                <i class="bi bi-cash-coin"></i> Tambah Pembayaran
            </a>
        </div>

        <button id="btnSaveImg" class="btn btn-success btn-sm">
            <i class="bi bi-download"></i> Simpan Invoice
        </button>
    </div>

    <!-- Card Invoice -->
    <div id="invoiceCard" class="card shadow mb-4">
        <div class="card-body">
            <h3 class="mb-3">Detail Invoice</h3>
            <p><strong>Nomor Invoice:</strong> <?= esc($invoice['nomor_invoice']); ?></p>
            <p><strong>Tanggal:</strong> <?= esc($invoice['tanggal']); ?></p>
            <p><strong>Total Tagihan:</strong> Rp <?= number_format($invoice['total_tagihan'],0,',','.'); ?></p>
            <p><strong>Status:</strong> 
                <span class="badge bg-<?= $invoice['status']=='PAID'?'success':($invoice['status']=='PARTIAL'?'warning':'danger'); ?>">
                    <?= esc($invoice['status']); ?>
                </span>
            </p>
            <p><strong>Keterangan:</strong> <?= esc($invoice['keterangan']); ?></p>

            <!-- item table -->
            <h5 class="mt-4">Item Invoice</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $it): ?>
                    <tr>
                        <td><?= esc($it['nama_barang']); ?></td>
                        <td><?= esc($it['jumlah']); ?></td>
                        <td>Rp <?= number_format($it['harga'],0,',','.'); ?></td>
                        <td>Rp <?= number_format($it['subtotal'],0,',','.'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- pembayaran -->
            <h5>Pembayaran</h5>
            <table class="table table-bordered mb-3">
                <thead>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <th>Metode</th>
                        <th>Jumlah Dialokasikan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($payments as $pay): ?>
                    <tr>
                        <td><?= esc($pay['tanggal_bayar']); ?></td>
                        <td><?= esc($pay['metode']); ?></td>
                        <td>Rp <?= number_format($pay['jumlah_dialok'],0,',','.'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="alert alert-info">
                <strong>Total Dibayar:</strong> Rp <?= number_format($totalBayar,0,',','.'); ?><br>
                <strong>Sisa Tagihan:</strong> Rp <?= number_format($invoice['total_tagihan'] - $totalBayar,0,',','.'); ?>
            </div>
        </div>
    </div>

    <a href="<?= base_url('invoice'); ?>" class="btn btn-secondary">Kembali</a>
</div>

<script>
document.getElementById("btnSaveImg").addEventListener("click", function() {
    const invoice = document.getElementById("invoiceCard");

    html2canvas(invoice, { scale: 2 }).then(canvas => {
        const imgData = canvas.toDataURL("image/png");
        const link = document.createElement("a");
        link.href = imgData;
        link.download = "invoice_<?= $invoice['nomor_invoice']; ?>.png";
        link.click();
    });
});
</script>

<?= $this->endSection(); ?>