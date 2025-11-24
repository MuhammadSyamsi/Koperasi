<?= $this->extend('template'); ?>

<?= $this->section('konten'); ?>

<div class="container-fluid">
  <!--------------------------->
  <div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <div class="row">
            <?php foreach ($data as $s) :
              if ($s['stok'] == 'ada') {
                $classDiv = "card-title fw-semibold bg-success";
                $tombol = "btn btn-primary";
                $isian = "req";
              } else {
                $classDiv = "card-title fw-semibold bg-danger";
                $tombol = "btn btn-danger";
                $isian = "ada";
              }
            ?>
              <div class="col-md-3">
                <form action="reqkulak" method="post">
                  <div class="card">
                    <img src="images/<?= $s['gambar']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="<?php echo $classDiv; ?>"><?= $s['nama']; ?></p>
                      <p class="card-text"><?= $s['jenis']; ?></p>
                      <input type="text" hidden name="stok" value="<?= $isian; ?>" />
                      <input type="text" hidden name="id" value="<?= $s['id']; ?>" />
                      <button type="submit" class="<?= $tombol; ?>"><?= $s['stok']; ?></button>
                    </div>
                  </div>
                </form>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>