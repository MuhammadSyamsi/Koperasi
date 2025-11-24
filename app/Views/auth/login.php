<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Koperasi Darul Hijrah</title>
  
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #d7f5e3, #b2e5c2); /* hijau pucat pastel */
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
    }
    .logo {
      margin-top: 50px;
      margin-bottom: 25px;
    }
    .logo img {
      width: 200px;
      height: 200px;
      object-fit: contain;
    }
    .login-card {
      background: rgba(255, 255, 255, 0.75); /* putih transparan 75% */
      border-radius: 1.5rem 1.5rem 0 0;
      width: 100%;
      max-width: 480px;
      height: 60vh;
      padding: 2rem;
      box-shadow: 0 -5px 25px rgba(0,0,0,0.15);
      position: fixed;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .form-header {
      text-align: center;
      font-weight: 700;
      font-size: 1.7rem;
      margin-bottom: 1rem;
      color: #2e7d32;
    }
    .input-box {
      background: #fff;
      border-radius: 1rem;
      padding: 1rem;
      border: 1px solid #ccc;
    }
    .input-group-text {
      background: none;
      border: none;
      font-size: 1.2rem;
    }
    .form-control {
      border: none;
      background: transparent;
      box-shadow: none;
      color: #333;
    }
    .form-control::placeholder {
      color: #888;
    }
    .form-control:focus {
      outline: none;
      box-shadow: none;
    }
    hr {
      margin: 0.8rem 0;
      border-top: 1px solid #ddd;
    }
    .login-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .login-actions a {
      font-weight: 600;
      color: #2e7d32;
      text-decoration: none;
    }
    .login-actions a:hover {
      color: #1b5e20;
    }
    .login-btn {
      border-radius: 50rem;
      padding: 0.6rem 2rem;
      font-weight: 500;
      background: #66bb6a;
      border: none;
      color: #fff;
    }
    .login-btn:hover {
      background: #43a047;
    }
    .footer-label {
      text-align: center;
      font-weight: 600;
      color: #2e7d32;
      margin-top: 1rem;
    }
    /* Warna icon berbeda */
    .icon-user { color: #007bff; }    /* biru */
    .icon-pass { color: #e53935; }    /* merah */
  </style>
</head>
<body>

  <!-- Logo -->
  <div class="logo text-center">
    <img src="<?= base_url('assets/logo.png') ?>" alt="Logo Koperasi Darul Hijrah">
  </div>

  <!-- Card -->
  <div class="login-card">
    
    <div>
      <!-- Flash Error -->
      <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger py-2">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <!-- Header Form -->
      <div class="form-header">Login</div>

      <!-- Form -->
      <form action="/login" method="post">
        <?= csrf_field() ?>

        <!-- Input Box Gabungan -->
        <div class="input-box mb-4">
          <!-- Username -->
          <div class="input-group mb-2">
            <span class="input-group-text"><i class="bi bi-person-fill icon-user"></i></span>
            <input type="text" name="login" class="form-control" placeholder="Username atau Email" required>
          </div>
          <hr>
          <!-- Password -->
          <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill icon-pass"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
        </div>

        <!-- Actions -->
        <div class="login-actions">
          <a href="/forgot-password">Lupa Password?</a>
          <button type="submit" class="btn login-btn px-4">Login</button>
        </div>
      </form>
    </div>

    <!-- Label bawah -->
    <div class="footer-label">
      Koperasi Darul Hijrah
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>