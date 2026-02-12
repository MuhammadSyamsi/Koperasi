const defaultConfig = {
  background_color: "#f0fdf4",
  header_color: "#059669",
  card_color: "#ffffff",
  text_color: "#1f2937",
  accent_color: "#10b981",
  font_family: "Poppins",
  font_size: 16,
  hero_title: "Koperasi Darul Hijrah",
  hero_subtitle: "Melayani dengan Amanah dan Profesional",
  chairman_name: "Ustadz Sulthon",
  secretary_name: "Ustadz Budi",
  treasurer_name: "Ustadz Syamsi",
  contact_phone: "+62 XXX XXXX XXXX",
  contact_email: "kantinalhijrah@gmail.com"
};

const allowedFonts = ["Poppins"];

function onConfigChange(config) {
  const root = document.getElementById("root");

  const font = allowedFonts.includes(config.font_family)
    ? config.font_family
    : defaultConfig.font_family;

  const baseSize = config.font_size || defaultConfig.font_size;

  root.style.backgroundColor = config.background_color;
  root.style.color = config.text_color;
  root.style.fontFamily = font;

  root.innerHTML = `
    <!-- HEADER -->
    <header class="sticky top-0 z-50 shadow-lg" style="background:${config.header_color}">
      <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex gap-4 items-center">
          <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center text-xl">🏪</div>
          <div>
            <h1 class="font-bold text-white">${config.hero_title}</h1>
            <p class="text-white/80 text-sm">Pondok Pesantren</p>
          </div>
        </div>
        <nav class="hidden md:flex gap-6 text-white">
          <a href="#layanan">Layanan</a>
          <a href="#struktur">Struktur</a>
          <a href="#kontak">Kontak</a>
        </nav>
      </div>
    </header>

    <!-- HERO -->
    <section class="py-20 text-center islamic-pattern fade-in"
      style="background:linear-gradient(135deg,${config.header_color},${config.accent_color})">
      <img src="/assets/img/kantin.png" class="mx-auto max-w-xs mb-6" alt="Kantin">
      <h2 class="text-white font-bold text-4xl mb-4">${config.hero_title}</h2>
      <p class="text-white/90 max-w-xl mx-auto mb-8">${config.hero_subtitle}</p>
      <a href="#layanan" class="btn-primary inline-block px-8 py-4 bg-white text-gray-800 rounded-full font-semibold">
        Jelajahi Layanan
      </a>
    </section>

    <!-- FOOTER -->
    <footer class="py-8 text-center text-white" style="background:${config.header_color}">
      <p class="font-semibold">${config.hero_title}</p>
      <p class="text-sm text-white/80">© 2024 Koperasi Darul Hijrah</p>
    </footer>
  `;

  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener("click", e => {
      e.preventDefault();
      const target = document.querySelector(link.getAttribute("href"));
      if (target) target.scrollIntoView({ behavior: "smooth" });
    });
  });
}

if (window.elementSdk) {
  window.elementSdk.init({
    defaultConfig,
    onConfigChange
  });
}