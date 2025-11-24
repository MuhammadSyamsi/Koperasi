<?= $this->extend('template'); ?>

<?= $this->section('konten'); ?>
<?php $today = date('Y-m-d'); ?>
<div class="container-fluid">
  <!--  Row 1 -->
  <div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Catatan Koperasi</h5>
          <div class="mb-1 col-lg-12">
            <form action="simpan" method="post">
              <?= csrf_field(); ?>
              <input type="text" hidden class="form-control" id="id" name="id" />
              <label for="catatan" class="form-label">catatan</label>
              <select type="text" class="form-control" id="catatan" name="catatan" value="Pengeluaran">
                <option value="Pemasukan">Pemasukan</option>
                <option value="Pengeluaran">Pengeluaran</option>
              </select>
          </div>
          <div class="mb-1 col-lg-12">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="masukkan keterangan">
          </div>
          <div class="mb-1 col-lg-12">
            <label for="keterangan" class="form-label">Nominal</label>
            <input type="number" class="form-control" id="nominal" name="nominal" placeholder="0">
          </div>
          <div class="mb-1 col-lg-12">
            <label for="unit" class="form-label">Unit Koperasi</label>
            <select type="text" class="form-control" id="unit" name="unit" value="kantin">
              <option value="kantin">Kantin</option>
              <option value="laundry">Laundry</option>
              <option value="pembiayaan">Pembiayaan</option>
              <option value="lain-lain">Lain-lain</option>
            </select>
          </div>
          <div class="mb-1 col-lg-12">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $today; ?>">
          </div>
          <!--<div class="mb-1 col-lg-12">-->
          <!--  <label for="bukti" class="form-label">Bukti</label>-->
          <!--  <div clas="custom-file">-->
          <!--    <input type="file" class="custom-file-input" name="bukti" id="bukti">-->
          <!--  </div>-->
          <!--</div>-->
        </div>
        <button type="submit" class="btn btn-dark m-1">Kirim Laporan</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="py-6 px-6 text-center">
  <p class="mb-0 fs-4">Didesain dan Dibangun<br /> oleh dan untuk
  <h3>Pak Samsi</h3>
  </p>
</div>
</div>
<?= $this->endSection(); ?>