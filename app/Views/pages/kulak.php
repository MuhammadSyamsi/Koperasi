<?= $this->extend('template'); ?>

<?= $this->section('konten'); ?>

<div class="container-fluid">
  <!--------------------------->
  <div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Request Kulakan</h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">No.</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Nama</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Jenis</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Keterangan</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 0;
                foreach ($data as $s) : $i++; ?>
                  <tr>
                    <td><?= $i; ?></td>
                    <td><?= $s['nama']; ?></td>
                    <td><?= $s['jenis']; ?></td>
                    <td><?= '-' ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>