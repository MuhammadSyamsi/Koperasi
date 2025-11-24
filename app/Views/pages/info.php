<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="container-fluid mt-3">

  <!-- 🔍 FILTER -->
  <div class="card border-0 shadow-sm mb-3">
    <div class="card-body">
      <form method="get" action="<?= base_url('info'); ?>" class="row g-2 align-items-end">
        <div class="col-md-3">
          <label class="form-label mb-1">Dari Tanggal</label>
          <input type="date" name="dari" value="<?= esc($_GET['dari'] ?? ''); ?>" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label mb-1">Sampai Tanggal</label>
          <input type="date" name="sampai" value="<?= esc($_GET['sampai'] ?? ''); ?>" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label mb-1">Unit</label>
          <select name="unit" class="form-select">
            <option value="">Semua Unit</option>
            <option value="kantin" <?= ($_GET['unit'] ?? '') === 'kantin' ? 'selected' : ''; ?>>Kantin</option>
            <option value="laundry" <?= ($_GET['unit'] ?? '') === 'laundry' ? 'selected' : ''; ?>>Laundry</option>
            <option value="pembiayaan" <?= ($_GET['unit'] ?? '') === 'pembiayaan' ? 'selected' : ''; ?>>Pembiayaan</option>
            <option value="lain-lain" <?= ($_GET['unit'] ?? '') === 'lain-lain' ? 'selected' : ''; ?>>Lain-lain</option>
          </select>
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-primary w-100">
            <i class="bi bi-filter"></i> Tampilkan
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- 💰 RINGKASAN -->
  <div class="row g-3 mb-3">
    <div class="col-md-3 col-6">
      <div class="card text-center bg-light">
        <div class="card-body p-2">
          <h6 class="text-muted mb-1">SHU Kantin</h6>
          <h5 class="fw-bold text-success">Rp <?= number_format($shu_kantin, 0, ',', '.'); ?></h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card text-center bg-light">
        <div class="card-body p-2">
          <h6 class="text-muted mb-1">SHU Laundry</h6>
          <h5 class="fw-bold text-success">Rp <?= number_format($shu_laundry, 0, ',', '.'); ?></h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card text-center bg-light">
        <div class="card-body p-2">
          <h6 class="text-muted mb-1">SHU Pembiayaan</h6>
          <h5 class="fw-bold text-success">Rp <?= number_format($shu_pembiayaan, 0, ',', '.'); ?></h5>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-6">
      <div class="card text-center bg-light">
        <div class="card-body p-2">
          <h6 class="text-muted mb-1">Total Keuntungan</h6>
          <h5 class="fw-bold text-primary">Rp <?= number_format($keuntungan, 0, ',', '.'); ?></h5>
        </div>
      </div>
    </div>
  </div>

  <!-- 📋 DATA TABEL -->
  <div class="card border-0 shadow-sm">
    <div class="card-body">
      <h6 class="mb-3">Transaksi Terbaru</h6>
      <div class="table-responsive">
        <table class="table table-striped align-middle">
          <thead class="table-light">
            <tr class="text-center">
              <th>No</th>
              <th>Unit & Tanggal</th>
              <th>Keterangan</th>
              <th>Catatan</th>
              <th>Nominal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($data): ?>
              <?php $no = 1; foreach ($data as $item): ?>
                <tr>
                  <td class="text-center"><?= $no++; ?></td>
                  <td>
                    <div><strong><?= ucfirst($item['unit']); ?></strong></div>
                    <span class="text-muted small"><?= date('d M Y', strtotime($item['tanggal'])); ?></span>
                  </td>
                  <td><?= esc($item['keterangan']); ?></td>
                  <td class="text-center">
                    <span class="badge <?= $item['catatan'] == 'pemasukan' ? 'bg-success' : 'bg-danger'; ?>">
                      <?= ucfirst($item['catatan']); ?>
                    </span>
                  </td>
                  <td class="text-end">Rp <?= number_format($item['nominal'], 0, ',', '.'); ?></td>
                  <td class="text-center">
                    <button class="btn btn-sm btn-warning btn-edit"
                            data-id="<?= $item['id']; ?>"
                            data-catatan="<?= $item['catatan']; ?>"
                            data-keterangan="<?= $item['keterangan']; ?>"
                            data-nominal="<?= $item['nominal']; ?>"
                            data-unit="<?= $item['unit']; ?>"
                            data-tanggal="<?= $item['tanggal']; ?>"
                            data-bukti="<?= $item['bukti']; ?>">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-danger btn-hapus" data-id="<?= $item['id']; ?>">
                      <i class="bi bi-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="6" class="text-center text-muted">Tidak ada data</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- ✏️ MODAL EDIT -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="<?= base_url('transaksi/update'); ?>">
      <?= csrf_field(); ?>
      <input type="hidden" name="id" id="editId">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title">Edit Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2">
            <label>Catatan</label>
            <select name="catatan" id="editCatatan" class="form-select">
              <option value="pemasukan">Pemasukan</option>
              <option value="pengeluaran">Pengeluaran</option>
            </select>
          </div>
          <div class="mb-2">
            <label>Keterangan</label>
            <input type="text" name="keterangan" id="editKeterangan" class="form-control">
          </div>
          <div class="mb-2">
            <label>Nominal</label>
            <input type="number" name="nominal" id="editNominal" class="form-control">
          </div>
          <div class="mb-2">
            <label>Unit</label>
            <input type="text" name="unit" id="editUnit" class="form-control">
          </div>
          <div class="mb-2">
            <label>Tanggal</label>
            <input type="date" name="tanggal" id="editTanggal" class="form-control">
          </div>
          <div class="mb-2">
            <label>Bukti</label>
            <input type="text" name="bukti" id="editBukti" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- 🗑️ MODAL HAPUS -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="<?= base_url('transaksi/delete'); ?>">
      <?= csrf_field(); ?>
      <input type="hidden" name="id" id="hapusId">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">Apakah Anda yakin ingin menghapus data ini?</div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- ⚙️ SCRIPT -->
<script>
  // Edit data
  document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', function() {
      document.getElementById('editId').value = this.dataset.id;
      document.getElementById('editCatatan').value = this.dataset.catatan;
      document.getElementById('editKeterangan').value = this.dataset.keterangan;
      document.getElementById('editNominal').value = this.dataset.nominal;
      document.getElementById('editUnit').value = this.dataset.unit;
      document.getElementById('editTanggal').value = this.dataset.tanggal;
      document.getElementById('editBukti').value = this.dataset.bukti;
      new bootstrap.Modal(document.getElementById('modalEdit')).show();
    });
  });

  // Hapus data
  document.querySelectorAll('.btn-hapus').forEach(btn => {
    btn.addEventListener('click', function() {
      document.getElementById('hapusId').value = this.dataset.id;
      new bootstrap.Modal(document.getElementById('modalHapus')).show();
    });
  });
</script>

<?= $this->endSection(); ?>