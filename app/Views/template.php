<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Koperasi</title>
  <!--<link rel="shortcut icon" type="image/png" href="assets/images/logos/koperasi.png" />-->

  <!-- Google Fonts (Opsional) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 (CSS) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" 
        rel="stylesheet">

  <!-- Select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" 
        rel="stylesheet" />

  <!-- Simplebar -->
  <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.5/simplebar.min.css" -->
        <!--rel="stylesheet" -->
        <!--integrity="sha512-/5aYjUlwGc4PovH+7PNgIhUQlKArkgqwcDUhtbkvUvGqAAVwmvnVn9JcGeHTPSZQO1+q0+Wwudk8yppbtFQmuw==" -->
        <!--crossorigin="anonymous" referrerpolicy="no-referrer" />-->

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    /* === Bottom Navigation for Mobile === */
    .mobile-bottom-nav {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      height: 65px;
      background: #ffffff;
      border-top: 1px solid #ddd;
      display: flex;
      justify-content: space-around;
      align-items: center;
      z-index: 1030;
    }

    .mobile-bottom-nav .nav-item {
      flex: 1;
      text-align: center;
      color: #6c757d;
      font-size: 12px;
      text-decoration: none;
      padding: 5px 0;
    }

    .mobile-bottom-nav .nav-item i {
      display: block;
      font-size: 20px;
      margin-bottom: 2px;
    }

    .mobile-bottom-nav .nav-item.active,
    .mobile-bottom-nav .nav-item:hover {
      color: #0d6efd;
    }

    @media (max-width: 991.98px) {
      aside.left-sidebar {
        display: none !important;
      }
      .body-wrapper {
        padding-bottom: 70px;
      }
    }
  </style>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" 
       data-layout="vertical" 
       data-navbarbg="skin6" 
       data-sidebartype="full" 
       data-sidebar-position="fixed" 
       data-header-position="fixed">
    
    <!-- Sidebar -->
    <aside class="left-sidebar d-none d-lg-block">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="bi bi-x-lg fs-4"></i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="bi bi-dot fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./">
                <i class="bi bi-speedometer2"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="bi bi-dot fs-4"></i>
              <span class="hide-menu">Manage</span>
            </li>
            <li class="sidebar-item"><a class="sidebar-link" href="info"><i class="bi bi-info-circle"></i><span>Detail Informasi</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="barang"><i class="bi bi-box-seam"></i><span>Barang Kantin</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="listkulak"><i class="bi bi-basket"></i><span>List Kulakan</span></a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="invoice"><i class="bi bi-receipt"></i><span>Invoice</span></a></li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="body-wrapper">
      <?= $this->renderSection('konten'); ?>
    </div>
  </div>

  <!-- Bottom Navigation -->
  <nav class="mobile-bottom-nav d-lg-none">
    <a href="<?= base_url('/'); ?>" class="nav-item <?= uri_string() == '' ? 'active' : '' ?>">
      <i class="bi bi-speedometer2"></i>
      <span>Dashboard</span>
    </a>
    <a href="<?= base_url('info'); ?>" class="nav-item <?= uri_string() == 'info' ? 'active' : '' ?>">
      <i class="bi bi-info-circle"></i>
      <span>Info</span>
    </a>
    <a href="<?= base_url('barang'); ?>" class="nav-item <?= uri_string() == 'barang' ? 'active' : '' ?>">
      <i class="bi bi-box-seam"></i>
      <span>Barang</span>
    </a>
    <a href="<?= base_url('listkulak'); ?>" class="nav-item <?= uri_string() == 'listkulak' ? 'active' : '' ?>">
      <i class="bi bi-basket"></i>
      <span>Kulakan</span>
    </a>
    <a href="<?= base_url('invoice'); ?>" class="nav-item <?= uri_string() == 'invoice' ? 'active' : '' ?>">
      <i class="bi bi-receipt"></i>
      <span>Invoice</span>
    </a>
  </nav>

  <!-- jQuery -->
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" -->
          <!--integrity="sha512-v2CJ7Ua5Z3mCk2oJ+oGS4vuwG8aWwseHcixWUpqYZtT+I6jk7IpyaBMn+GpG9zA5u1U9Rr3aj/n/tjv0XzY+ig==" -->
          <!--crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

  <!-- Bootstrap Bundle (JS + Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
          crossorigin="anonymous"></script>

  <!-- ApexCharts -->
  <!--<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>-->

  <!-- Simplebar -->
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.5/simplebar.min.js" -->
          <!--integrity="sha512-NK14J8CXXH7WvhyBldfU8LXYnzpLxKXW9t6pR6KnA8qAgFjpo2EvApC8uSkVuxb2FxKiEvbOHOYkU3oP68zpsw==" -->
          <!--crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

  <!-- Select2 -->
  <!--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>-->

  <!-- html2canvas -->
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>-->
  
    <!-- Cleave.js -->
  <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>

</body>
</html>