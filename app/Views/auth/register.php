<?= $this->extend('template'); ?>
<?= $this->section('konten'); ?>

<div class="card col-lg-5 mx-auto mt-5 shadow">
  <div class="card-body">
    <h3 class="card-title text-center mb-4">Register</h3>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger">
        <?= session('error') ?>
      </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
      <div class="alert alert-success">
        <?= session('success') ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('register') ?>" method="post">
      <?= csrf_field() ?>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input 
          type="text" 
          class="form-control" 
          id="username" 
          name="username" 
          required 
          value="<?= old('username') ?>">
      </div>

      <div class="mb-3">
        <label for="fullname" class="form-label">Nama Lengkap</label>
        <input 
          type="text" 
          class="form-control" 
          id="fullname" 
          name="fullname" 
          value="<?= old('fullname') ?>">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input 
          type="email" 
          class="form-control" 
          id="email" 
          name="email" 
          required 
          value="<?= old('email') ?>">
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input 
          type="password" 
          class="form-control" 
          id="password" 
          name="password" 
          required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Daftar</button>
    </form>

    <div class="mt-3 text-center">
      Sudah punya akun? <a href="<?= base_url('login') ?>">Login</a>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>