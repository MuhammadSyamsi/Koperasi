<?php
// ===============================
// CONFIG (MUDAH DIGANTI)
// ===============================
$config = [
  'hero_title'      => 'Koperasi Darul Hijrah',
  'hero_subtitle'   => 'Melayani dengan Amanah dan Profesional',
  'chairman'        => 'Ustadz Sulthon',
  'secretary'       => 'Ustadz Budi',
  'treasurer'       => 'Ustadz Syamsi',
  'phone'           => '+62 895 2082 1215',
  'email'           => 'kantinalhijrah@gmail.com',

  // Warna
  'bg'              => '#f0fdf4',
  'primary'         => '#059669',
  'accent'          => '#10b981',
  'text'            => '#1f2937',
];
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $config['hero_title']; ?></title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/kantin.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body { font-family: 'Poppins', sans-serif; background: <?= $config['bg']; ?> }
    .card { transition:.3s }
    .card:hover { transform:translateY(-8px); box-shadow:0 20px 40px rgba(0,0,0,.15) }
  </style>
</head>

<body class="text-gray-800">

<!-- HEADER -->
<header class="sticky top-0 z-50" style="background:<?= $config['primary']; ?>">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <div class="flex items-center gap-3 text-white">
      <div class="w-10 h-10 bg-white text-xl rounded-full flex items-center justify-center"><img src="kantin2.png" alt="kantin darul hijrah"></div>
      <div>
        <h1 class="font-bold"><?= $config['hero_title']; ?></h1>
        <p class="text-sm opacity-80">Pondok Pesantren</p>
      </div>
    </div>
    <nav class="hidden md:flex gap-6 text-white font-medium">
      <a href="#layanan">Layanan</a>
      <a href="#struktur">Struktur</a>
      <a href="#kontak">Kontak</a>
    </nav>
  </div>
</header>

<!-- HERO -->
<section class="py-20 text-center text-white"
  style="background:linear-gradient(135deg,<?= $config['accent']; ?>,<?= $config['accent']; ?>)">
  <img src="kantin.png" class="mx-auto mb-6 max-w-xs" alt="Kantin">
  <h2 class="text-4xl font-bold mb-4"><?= $config['hero_title']; ?></h2>
  <p class="max-w-xl mx-auto mb-8 opacity-90"><?= $config['hero_subtitle']; ?></p>
  <a href="#layanan"
     class="inline-block bg-white text-gray-800 px-8 py-4 rounded-full font-semibold">
    Jelajahi Layanan
  </a>
</section>

<!-- LAYANAN -->
<section id="layanan" class="py-20">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-bold text-center mb-12 text-green-700">
      Layanan Koperasi
    </h2>

    <div class="grid md:grid-cols-3 gap-8">
      <?php
      $services = [
        ['🍱','Kantin','Makanan, minuman, perlengkapan santri'],
        ['👕','Laundry','Cuci dan setrika rutin santri'],
        ['💰','Pembiayaan','Sistem pembiayaan syariah'],
      ];
      foreach ($services as $s): ?>
        <div class="card bg-white p-8 rounded-2xl border-t-4"
             style="border-color:<?= $config['accent']; ?>">
          <div class="text-4xl mb-4"><?= $s[0]; ?></div>
          <h3 class="font-bold text-lg mb-2"><?= $s[1]; ?></h3>
          <p class="text-sm opacity-80"><?= $s[2]; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- STRUKTUR -->
<section id="struktur" class="py-20 bg-white">
  <div class="max-w-5xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold mb-12 text-green-700">Struktur Organisasi</h2>

    <div class="grid md:grid-cols-3 gap-8">
      <?php
      $org = [
        ['👤','Ketua',$config['chairman']],
        ['📝','Sekretaris',$config['secretary']],
        ['💼','Bendahara',$config['treasurer']],
      ];
      foreach ($org as $o): ?>
        <div class="p-8 rounded-2xl text-white"
             style="background:linear-gradient(135deg,<?= $config['primary']; ?>,<?= $config['accent']; ?>)">
          <div class="text-4xl mb-3"><?= $o[0]; ?></div>
          <h3 class="font-semibold"><?= $o[1]; ?></h3>
          <p class="opacity-90"><?= $o[2]; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- KEUNGGULAN KOPERASI -->
<section id="keunggulan" class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-6">

    <div class="text-center mb-14">
      <h2 class="text-3xl font-bold text-green-700 mb-3">
        Keunggulan Koperasi Darul Hijrah
      </h2>
      <p class="max-w-2xl mx-auto text-gray-600">
        Sistem layanan koperasi dikelola secara profesional, amanah, dan
        menyesuaikan kebutuhan santri serta SDM pondok pesantren.
      </p>
    </div>

    <div class="grid md:grid-cols-3 gap-10">

      <!-- KEUNGGULAN KANTIN -->
      <div class="bg-green-50 rounded-2xl p-8 border-l-4 border-green-600">
        <h3 class="text-xl font-bold mb-4 text-green-700 flex items-center gap-2">
          🍱 Kantin
        </h3>

        <ul class="space-y-3 text-sm text-gray-700">
          <li>✔ Sistem <strong>cashless menggunakan kartu NFC</strong> untuk mengurangi risiko kehilangan uang tunai</li>
          <li>✔ Dikelola oleh <strong>SDM profesional</strong> dari pondok</li>
          <li>✔ <strong>Customer Service 24 jam</strong> untuk kendala kartu NFC</li>
          <li>✔ Vendor makanan basah dikelola langsung oleh SDM pondok</li>
          <li>✔ Menyediakan kebutuhan lengkap, meliputi:</li>
        </ul>

        <p class="mt-4 text-sm text-gray-700">
          Snack, minuman, susu, gorengan, pensil, bolpoin, buku, solatip, bantal,
          peci, sabun mandi batang & cair, pasta gigi, sabun cuci, gayung, serta
          berbagai perlengkapan <strong>ATK, MCK, dan asrama</strong> lainnya.
        </p>
      </div>

      <!-- KEUNGGULAN LAUNDRY -->
      <div class="bg-green-50 rounded-2xl p-8 border-l-4 border-green-600">
        <h3 class="text-xl font-bold mb-4 text-green-700 flex items-center gap-2">
          👕 Laundry
        </h3>

        <ul class="space-y-3 text-sm text-gray-700">
          <li>✔ Didukung <strong>2 unit mesin cuci</strong></li>
          <li>✔ Dijaga dan dikelola oleh <strong>SDM profesional</strong></li>
          <li>✔ Jatah <strong>2 kali cuci setiap pekan</strong> untuk santri</li>
          <li>✔ Termasuk <strong>setrika seragam dan pewangi</strong></li>
          <li>✔ Menerima <strong>laundry kiloan</strong> dari selain santri</li>
          <li>✔ Tersedia layanan <strong>jahit dan obras</strong></li>
        </ul>
      </div>

      <!-- KEUNGGULAN PEMBIAYAAN -->
      <div class="bg-green-50 rounded-2xl p-8 border-l-4 border-green-600">
        <h3 class="text-xl font-bold mb-4 text-green-700 flex items-center gap-2">
          💰 Pembiayaan
        </h3>

        <ul class="space-y-3 text-sm text-gray-700">
          <li>✔ Diperuntukkan khusus bagi <strong>SDM pondok pesantren</strong></li>
          <li>✔ Mendukung kebutuhan <strong>pengembangan usaha</strong></li>
          <li>✔ Membantu proses <strong>upgrading dan peningkatan produktivitas</strong></li>
          <li>✔ Menggunakan <strong>akad pembiayaan syariah</strong></li>
          <li>✔ Transparan, amanah, dan sesuai prinsip Islam</li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- KONTAK -->
<section id="kontak" class="py-20">
  <div class="max-w-3xl mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold mb-8 text-green-700">Hubungi Kami</h2>

    <div class="bg-white rounded-2xl p-8 shadow">
      <p class="mb-2">📱 <?= $config['phone']; ?></p>
      <p>✉️ <?= $config['email']; ?></p>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer class="py-6 text-center text-white"
        style="background:<?= $config['primary']; ?>">
  <p class="font-semibold"><?= $config['hero_title']; ?></p>
  <p class="text-sm opacity-80">© 2024 Koperasi Darul Hijrah</p>
<p class="text-sm opacity-80">
  © 2024 Koperasi Darul Hijrah ·
  <a href="https://syamsi.my.id" target="_blank" class="text-white/70 hover:text-white transition">
    Design by Muhammad Syamsi
  </a>
</p></footer>

<script>
document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.onclick=e=>{
    e.preventDefault();
    document.querySelector(a.getAttribute('href'))
      ?.scrollIntoView({behavior:'smooth'});
  }
})
</script>

</body>
</html>