<?= $this->extend('template'); ?>

<?= $this->section('konten'); ?>
<div class="container-fluid">
  <!--  Row 1 -->
  <div class="row">
    <div class="col-lg-6 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Belanja Bulan Ini</h5>
          <h4 class="fw-semibold mb-3">
            <?php foreach ($jumlah as $jum) : echo format_rupiah($jum['sum']);
            endforeach; ?></h4>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Rekening</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nominal</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 0; ?>
                <?php foreach ($jumlahrekening as $rek) : $i++; ?>
                  <tr>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0"><?php echo $i; ?></h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1"><?php echo $rek['rekening']; ?></h6>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal"><?php echo format_rupiah($rek['sum']); ?></p>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Pemasukan 3 Bulan Terakhir</h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Bulan</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nominal</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">1</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Bulan Ini</h6>
                  </td>
                  <td class="border-bottom-0">
                    <?php foreach ($bulanini as $tode) : ?>
                      <p class="mb-0 fw-normal"><?php echo format_rupiah($tode['sum']); ?></p>
                    <?php endforeach; ?>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">2</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">Bulan Kemarin</h6>
                  </td>
                  <td class="border-bottom-0">
                    <?php foreach ($bulanlalu as $lalu) : ?>
                      <p class="mb-0 fw-normal"><?php echo format_rupiah($lalu['sum']); ?></p>
                    <?php endforeach; ?>
                  </td>
                </tr>
                <tr>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">3</h6>
                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-1">3 Bulan Lalu</h6>
                  </td>
                  <td class="border-bottom-0">
                    <?php foreach ($bulanlewat as $lewat) : ?>
                      <p class="mb-0 fw-normal"><?php echo format_rupiah($lewat['sum']); ?></p>
                    <?php endforeach; ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Tunggakan Santri Mandiri</h5>
          <h4 class="fw-semibold mb-3">
            <?php echo format_rupiah($sumtung) ?> </h4>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nama</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Total</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $z = 0; ?>
                <?php foreach ($tunggakan as $tung) : $z++; ?>
                  <tr>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0"><?php echo $z; ?></h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1"><?php echo $tung['nama']; ?></h6>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal"><?php echo format_rupiah($tung['totaltung']); ?></p>
                    </td>
                  </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Detail Tunggakan</h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <tbody>
                <tr>
                  <?php foreach ($detailtung as $det) : ?>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Daftar Ulang</h6>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-secondary rounded-3 fw-semibold"><?php echo $det['program'] ?></span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal"><?php echo format_rupiah($det['tungdu']) ?></p>
                    </td>
                  <?php endforeach; ?>
                </tr>
                <tr>
                  <?php foreach ($detailtung as $det) : ?>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Tunggakan Tahun Lalu</h6>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-secondary rounded-3 fw-semibold"><?php echo $det['program'] ?></span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal"><?php echo format_rupiah($det['tungtl']) ?></p>
                    </td>
                  <?php endforeach; ?>
                </tr>
                <tr>
                  <?php foreach ($detailtung as $det) : ?>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">SPP</h6>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-secondary rounded-3 fw-semibold"><?php echo $det['program'] ?></span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal"><?php echo format_rupiah($det['tungspp']) ?></p>
                    </td>
                  <?php endforeach; ?>
                </tr>
                <tr>
                  <?php foreach ($detailbea as $bea) : ?>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Daftar Ulang</h6>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success rounded-3 fw-semibold"><?php echo $bea['program'] ?></span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal"><?php echo format_rupiah($bea['tungdu']) ?></p>
                    </td>
                  <?php endforeach; ?>
                </tr>
                <tr>
                  <?php foreach ($detailbea as $bea) : ?>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Tunggakan Tahun Lalu</h6>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success rounded-3 fw-semibold"><?php echo $bea['program'] ?></span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal"><?php echo format_rupiah($bea['tungtl']) ?></p>
                    </td>
                  <?php endforeach; ?>
                </tr>
              </tbody>
            </table>
          </div>
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