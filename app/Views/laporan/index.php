<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container mt-3">

    <h3 class="mb-4">📊 Laporan Keuangan & Aset</h3>

    <div class="row g-3">
        <!-- Aset -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h6>Total Aset</h6>
                    <h4 class="text-primary">Rp <?= number_format($totalAset,0,',','.'); ?></h4>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= base_url('aset'); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="<?= base_url('aset/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <!-- Barang -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h6>Jumlah Barang</h6>
                    <h4 class="text-success"><?= $totalBarang; ?></h4>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= base_url('barang'); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="<?= base_url('barang/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <!-- Invoice -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h6>Invoice</h6>
                    <h4 class="text-warning"><?= $totalInvoice; ?></h4>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= base_url('invoice'); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="<?= base_url('invoice/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <!-- Tagihan -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h6>Tagihan</h6>
                    <h4 class="text-danger">Rp <?= number_format($tagihan,0,',','.'); ?></h4>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= base_url('invoice'); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="<?= base_url('invoice/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <!-- Dibayar -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h6>Total Dibayar</h6>
                    <h4 class="text-success">Rp <?= number_format($dibayar,0,',','.'); ?></h4>
                </div>
                <div class="card-footer text-center">
                    <a href="<?= base_url('payments'); ?>" class="btn btn-sm btn-outline-primary">Detail Pembayaran</a>
                </div>
            </div>
        </div>

        <!-- Sisa Tagihan -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h6>Sisa Tagihan</h6>
                    <h4 class="text-danger">Rp <?= number_format($sisaTagihan,0,',','.'); ?></h4>
                </div>
                <div class="card-footer text-center">
                    <a href="<?= base_url('invoice'); ?>" class="btn btn-sm btn-outline-primary">Detail Invoice</a>
                </div>
            </div>
        </div>

        <!-- Saku -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h6>Saldo Saku</h6>
                    <h4 class="text-primary">Rp <?= number_format($saku['total_saldo'] ?? 0,0,',','.'); ?></h4>
                    <small class="text-muted">Per <?= $saku['tanggal'] ?? '-'; ?></small>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= base_url('saku'); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="<?= base_url('saku/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>
    </div>

    <h5 class="mt-4">🏪 Laba Rugi Koperasi</h5>
    <div class="row g-3">
        <!-- Kantin -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6>Kantin</h6>
                    <h4 class="<?= $labaKantin >= 0 ? 'text-success' : 'text-danger'; ?>">
                        Rp <?= number_format($labaKantin,0,',','.'); ?>
                    </h4>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= base_url('keuangan?unit=kantin'); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="<?= base_url('keuangan/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <!-- Laundry -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6>Laundry</h6>
                    <h4 class="<?= $labaLaundry >= 0 ? 'text-success' : 'text-danger'; ?>">
                        Rp <?= number_format($labaLaundry,0,',','.'); ?>
                    </h4>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= base_url('keuangan?unit=laundry'); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="<?= base_url('keuangan/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <!-- Pembiayaan -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6>Pembiayaan</h6>
                    <h4 class="<?= $labaPembiayaan >= 0 ? 'text-success' : 'text-danger'; ?>">
                        Rp <?= number_format($labaPembiayaan,0,',','.'); ?>
                    </h4>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= base_url('keuangan?unit=pembiayaan'); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="<?= base_url('keuangan/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mt-2">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6>Omset</h6>
                    <h4 class="text-primary">Rp <?= number_format($omset,0,',','.'); ?></h4>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= base_url('keuangan'); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="<?= base_url('keuangan/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6>Total Biaya</h6>
                    <h4 class="text-danger">Rp <?= number_format($biaya,0,',','.'); ?></h4>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="<?= base_url('keuangan'); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                    <a href="<?= base_url('keuangan/create'); ?>" class="btn btn-sm btn-primary">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>