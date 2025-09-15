@extends('layouts.home')

@section('title', 'Sistem Pencatatan Keuangan untuk Semua Kebutuhan Anda')

@section('content')

{{-- ================= Section 1: Hero ================= --}}
<section class="relative overflow-hidden bg-gray-50" aria-labelledby="hero-heading">
    <div class="grid max-w-screen-xl px-6 pt-12 pb-24 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
        
        <!-- Left Content -->
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 id="hero-heading"
                class="max-w-2xl mb-6 text-4xl font-extrabold tracking-tight leading-snug md:text-5xl xl:text-6xl text-gray-900
                       opacity-0 -translate-x-6 transform transition-all duration-700 ease-out">
                Satu Tempat Untuk <span class="text-[#01c350]">Semua Catatan Keuangan Anda.</span>
            </h1>

            <p class="hero-sub max-w-2xl mb-8 font-medium text-gray-600 md:text-lg lg:text-xl leading-relaxed
                       opacity-0 translate-y-4 transform transition-all duration-700 ease-out">
                Dari kebutuhan sehari-hari hingga operasional bisnis, semua transaksi Anda tersimpan rapi, mudah diatur, dan dapat dianalisis tanpa ribet.
            </p>
            
            <a href="{{ route('login') }}" 
               class="hero-cta inline-flex items-center justify-center px-8 py-3 text-base font-bold text-center text-white rounded-xl
                      bg-gradient-to-r from-[#01c350] to-[#009588] hover:from-[#00ad75] hover:to-[#007b89]
                      shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-[#01c350]/40
                      opacity-0 translate-y-4 transform transition-all duration-700 ease-out">
                Masuk ke Dashboard
                <i class="fa-solid fa-arrow-right ml-2 -mr-1"></i>
            </a>
        </div>

        <!-- Right Illustration -->
        <div class="relative hidden lg:flex lg:col-span-5">
            <img src="{{ asset('img/hero.png') }}" 
                 alt="Ilustrasi Keuangan"
                 class="max-w-md w-full h-auto mx-auto drop-shadow-2xl transform hover:scale-105 transition-transform duration-500 ease-in-out float-animate will-change-transform">
            <div class="absolute -z-10 top-10 right-10 w-72 h-72 bg-green-200 rounded-full blur-3xl opacity-40"></div>
        </div>                
    </div>
</section>

{{-- ================= Section 2: Fitur ================= --}}
<section id="fitur" class="relative overflow-hidden py-32 bg-gradient-to-b from-[#01c350] to-[#009588]">
    
    <!-- Brush Top Separator -->
    <div class="absolute top-0 left-0 w-full overflow-hidden leading-[0] -translate-y-[1px]">
        <svg class="relative block w-full h-24 text-gray-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C150,30 350,0 600,20 C850,40 1050,0 1200,30 L1200,0 L0,0 Z" fill="currentColor"/>
            <path d="M0,0 C200,50 400,10 600,35 C800,60 1000,20 1200,50 L1200,0 L0,0 Z" fill="currentColor" opacity="0.6"/>
            <path d="M0,0 C250,60 450,20 600,50 C750,80 950,30 1200,60 L1200,0 L0,0 Z" fill="currentColor" opacity="0.3"/>
        </svg>
    </div>

    <div class="relative max-w-screen-xl px-6 mx-auto">
        <!-- Heading -->
        <div class="max-w-screen-md mx-auto text-center mb-16" data-aos="fade-up">
            <h2 class="mb-4 text-3xl sm:text-4xl font-extrabold tracking-tight text-white">
                Platform Lengkap Untuk Keuangan Anda
            </h2>
            <p class="text-white/90 sm:text-xl">
                Fitur yang dirancang untuk memberikan kemudahan dan kontrol penuh atas finansial Anda.
            </p>
        </div>
        
        <!-- Cards -->
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 mb-8">
            @foreach ([
                ['icon' => 'fa-money-bill-transfer', 'title' => 'Pencatatan Cepat', 'desc' => 'Baik pemasukan atau pengeluaran, catat dalam hitungan detik. Lampirkan bukti transfer atau nota untuk arsip digital.'],
                ['icon' => 'fa-tags', 'title' => 'Kategori Fleksibel', 'desc' => "Kelompokkan transaksi sesuai kebutuhan Anda, dari 'Biaya Operasional' hingga 'Jajan Kopi'. Semuanya bisa disesuaikan."],
                ['icon' => 'fa-chart-pie', 'title' => 'Laporan Visual', 'desc' => 'Grafik sederhana kami membantu Anda memahami kesehatan finansial dan melihat ke mana uang Anda pergi secara instan.'],
            ] as $i => $fitur)
            <div class="p-6 bg-white rounded-xl border border-gray-200/80 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1"
                 data-aos="zoom-in" data-aos-delay="{{ ($i+1) * 100 }}">
                <div class="flex items-center justify-center w-12 h-12 mb-5 rounded-lg bg-[#01c350]/10 text-[#009588]">
                    <i class="fa-solid {{ $fitur['icon'] }} text-2xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">{{ $fitur['title'] }}</h3>
                <p class="text-gray-600">{{ $fitur['desc'] }}</p>
            </div>
            @endforeach
        </div>

        <div class="flex flex-col sm:flex-row justify-center gap-8">
            @foreach ([
                ['icon' => 'fa-book-open', 'title' => 'Riwayat Transaksi', 'desc' => 'Akses kembali catatan keuangan kapan saja. Gunakan filter dan pencarian untuk menemukan transaksi tertentu dengan cepat.'],
                ['icon' => 'fa-file-export', 'title' => 'Ekspor Data', 'desc' => 'Butuh data untuk laporan atau analisis? Ekspor riwayat transaksi Anda ke format PDF atau CSV dengan sekali klik.'],
            ] as $j => $fitur)
            <div class="sm:w-80 p-6 bg-white rounded-xl border border-gray-200/80 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1"
                 data-aos="zoom-in" data-aos-delay="{{ ($j+1) * 100 }}">
                <div class="flex items-center justify-center w-12 h-12 mb-5 rounded-lg bg-[#01c350]/10 text-[#009588]">
                    <i class="fa-solid {{ $fitur['icon'] }} text-2xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">{{ $fitur['title'] }}</h3>
                <p class="text-gray-600">{{ $fitur['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Brush Bottom Separator -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] translate-y-[2px]">
        <svg class="relative block w-full h-32 text-gray-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,120 C150,90 350,120 600,100 C850,80 1050,120 1200,90 L1200,120 L0,120 Z" fill="currentColor"/>
            <path d="M0,120 C200,70 400,110 600,85 C800,60 1000,100 1200,70 L1200,120 L0,120 Z" fill="currentColor" opacity="0.6"/>
            <path d="M0,120 C250,60 450,100 600,70 C750,40 950,90 1200,60 L1200,120 L0,120 Z" fill="currentColor" opacity="0.3"/>
        </svg>
    </div>
</section>

{{-- ================= Section 3: Steps (No Images) ================= --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-screen-xl px-4 mx-auto lg:px-6">
        <!-- Heading -->
        <div class="max-w-screen-md mx-auto text-center mb-16" data-aos="fade-up">
            <h2 class="mb-4 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Begini Cara Kerjanya.</h2>
            <p class="text-gray-600 sm:text-xl">Dirancang agar Anda bisa langsung nyaman menggunakannya, tanpa perlu panduan tebal.</p>
        </div>

        <!-- Steps Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            @foreach ([ 
                ['num' => '1', 'title' => 'Atur Kategori', 'desc' => 'Tentukan kategori sesuai kebutuhan, baik pribadi maupun bisnis, agar setiap transaksi punya tempatnya sendiri.'],
                ['num' => '2', 'title' => 'Catat Transaksi', 'desc' => 'Setiap kali ada transaksi, langsung catat saat itu juga. Prosesnya cepat, jadi tidak akan mengganggu aktivitas Anda.'],
                ['num' => '3', 'title' => 'Lihat Hasilnya', 'desc' => 'Biarkan sistem yang bekerja mengubah angka-angka Anda menjadi laporan visual yang mudah dipahami dan siap dianalisis.'],
            ] as $i => $step)
            <div class="text-center" data-aos="fade-up" data-aos-delay="{{ ($i+1)*100 }}">
                <div class="flex items-center justify-center mx-auto w-16 h-16 mb-6 rounded-full bg-gradient-to-r from-[#01c350] to-[#009588] text-white shadow-lg">
                    <span class="text-2xl font-bold">{{ $step['num'] }}</span>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">{{ $step['title'] }}</h3>
                <p class="text-gray-600">{{ $step['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('styles')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<style>
/* Efek floating halus untuk ilustrasi hero */
@keyframes float {
  0% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
  100% { transform: translateY(0px); }
}
.float-animate {
  animation: float 5s ease-in-out infinite;
}

/* Fallback untuk accessible reduced-motion */
@media (prefers-reduced-motion: reduce) {
  .float-animate { animation: none; }
  .hero-cta, .hero-sub, #hero-heading { transition: none !important; }
}
</style>
@endpush

@push('scripts')
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  // Init AOS
  AOS.init({
    duration: 850,
    once: true,
    offset: 80,
    easing: 'ease-out-cubic',
    mirror: false,
  });

  // Animasi Hero saat window load
  window.addEventListener('load', function () {
    const title = document.getElementById('hero-heading');
    const sub = document.querySelector('.hero-sub');
    const cta = document.querySelector('.hero-cta');

    if (title) {
      setTimeout(() => {
        title.classList.remove('opacity-0', '-translate-x-6');
        title.classList.add('opacity-100', 'translate-x-0');
      }, 80);
    }

    if (sub) {
      setTimeout(() => {
        sub.classList.remove('opacity-0', 'translate-y-4');
        sub.classList.add('opacity-100', 'translate-y-0');
      }, 220);
    }

    if (cta) {
      setTimeout(() => {
        cta.classList.remove('opacity-0', 'translate-y-4');
        cta.classList.add('opacity-100', 'translate-y-0');
      }, 360);
    }
    
    if (window.AOS && typeof window.AOS.refresh === 'function') {
      setTimeout(() => { window.AOS.refresh(); }, 50);
    }
  });
</script>
@endpush

