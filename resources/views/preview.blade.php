@extends('layouts.home')

@section('title', 'Preview Fitur - myFinance')

@section('content')

{{-- ================= Section 1: Page Header ================= --}}
<section class="bg-white py-16 md:py-20" aria-labelledby="preview-heading">
    <div class="max-w-screen-xl px-6 mx-auto">
        <div class="max-w-screen-md mx-auto text-center" data-aos="fade-up">
            <h1 id="preview-heading" class="mb-4 text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-gray-900">
                Jelajahi Fitur Unggulan Kami
            </h1>
            <p class="text-gray-600 sm:text-xl">
                Lihat lebih dekat bagaimana myFinance dapat menyederhanakan pencatatan finansial Anda, langkah demi langkah.
            </p>
        </div>
        <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="100">
            <a href="/" 
               class="inline-flex items-center gap-2 text-gray-600 hover:text-[#01c350] transition-colors group font-medium">
                <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </div>
</section>

{{-- ================= Section 2: Features Showcase ================= --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-screen-xl px-4 mx-auto lg:px-6 space-y-16 md:space-y-20">

        <!-- Fitur 1: Dashboard -->
        <div class="items-center gap-12 lg:gap-16 md:grid md:grid-cols-2">
            <div class="mb-8 md:mb-0" data-aos="fade-right" data-aos-delay="200">
                <img class="w-full rounded-lg shadow-lg aspect-video object-cover object-top" src="{{ asset('img/dashboard.png') }}" alt="Tampilan Dashboard">
            </div>
            <div data-aos="fade-left" data-aos-delay="200">
                <div class="flex items-center gap-4 mb-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-[#01c350] to-[#009588] text-white shadow-md">
                        <i class="fa-solid fa-tachometer-alt text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Dashboard Intuitif</h3>
                </div>
                <p class="text-gray-600 text-lg">
                    Saat pertama kali masuk, Anda akan disambut oleh ringkasan visual yang informatif. Pantau total pemasukan, pengeluaran, dan laba/rugi bulan ini dalam sekejap. Grafik tren membantu Anda melihat gambaran besar kondisi keuangan Anda.
                </p>
            </div>
        </div>

        <!-- Fitur 2: Manajemen Kategori -->
        <div class="items-center gap-12 lg:gap-16 md:grid md:grid-cols-2">
            <div class="md:order-2 mb-8 md:mb-0" data-aos="fade-left">
                <img class="w-full rounded-lg shadow-lg aspect-video object-cover object-top" src="{{ asset('img/kategori.png') }}" alt="Manajemen Kategori">
            </div>
            <div class="md:order-1" data-aos="fade-right">
                <div class="flex items-center gap-4 mb-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-[#01c350] to-[#009588] text-white shadow-md">
                         <i class="fa-solid fa-tags text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Kategori yang Fleksibel</h3>
                </div>
                <p class="text-gray-600 text-lg">
                    Kelola semua kategori pemasukan dan pengeluaran Anda di satu tempat. Tambah, edit, atau hapus kategori sesuai kebutuhan untuk memastikan setiap transaksi tercatat dengan akurat dan terorganisir.
                </p>
            </div>
        </div>

        <!-- Fitur 3: Pencatatan Pemasukan -->
        <div class="items-center gap-12 lg:gap-16 md:grid md:grid-cols-2">
            <div class="mb-8 md:mb-0" data-aos="fade-right">
                <img class="w-full rounded-lg shadow-lg aspect-video object-cover object-top" src="{{ asset('img/pemasukan.png') }}" alt="Pencatatan Pemasukan">
            </div>
            <div data-aos="fade-left">
                <div class="flex items-center gap-4 mb-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-[#01c350] to-[#009588] text-white shadow-md">
                        <i class="fa-solid fa-wallet text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Catat Pemasukan</h3>
                </div>
                <p class="text-gray-600 text-lg">
                    Formulir pencatatan kami dirancang untuk kecepatan. Tambahkan keterangan, pilih kategori, masukkan nominal, dan lampirkan bukti transaksi jika perlu. Semua bisa dilakukan dalam hitungan detik.
                </p>
            </div>
        </div>
        
        <!-- Fitur 4: Pencatatan Pengeluaran -->
        <div class="items-center gap-12 lg:gap-16 md:grid md:grid-cols-2">
            <div class="md:order-2 mb-8 md:mb-0" data-aos="fade-left">
                <img class="w-full rounded-lg shadow-lg aspect-video object-cover object-top" src="{{ asset('img/pengeluaran.png') }}" alt="Pencatatan Pengeluaran">
            </div>
            <div class="md:order-1" data-aos="fade-right">
                <div class="flex items-center gap-4 mb-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-[#01c350] to-[#009588] text-white shadow-md">
                        <i class="fa-solid fa-money-bill-wave text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Catat Pengeluaran</h3>
                </div>
                <p class="text-gray-600 text-lg">
                    Lacak setiap pengeluaran dengan mudah. Antarmuka yang bersih memastikan Anda dapat mencatat semua biaya dengan cepat, membantu Anda tetap sesuai anggaran.
                </p>
            </div>
        </div>

         <!-- Fitur 5: Laporan Laba Rugi -->
        <div class="items-center gap-12 lg:gap-16 md:grid md:grid-cols-2">
            <div class="mb-8 md:mb-0" data-aos="fade-right">
                <img class="w-full rounded-lg shadow-lg aspect-video object-cover object-top" src="{{ asset('img/laba.png') }}" alt="Laporan Laba Rugi">
            </div>
            <div data-aos="fade-left">
                <div class="flex items-center gap-4 mb-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-[#01c350] to-[#009588] text-white shadow-md">
                        <i class="fa-solid fa-chart-line text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Laporan Laba Rugi</h3>
                </div>
                <p class="text-gray-600 text-lg">
                   Pahami kesehatan finansial Anda secara menyeluruh. Laporan Laba Rugi dibuat secara otomatis, memberikan Anda gambaran jelas tentang keuntungan atau kerugian dalam periode tertentu.
                </p>
            </div>
        </div>

        <!-- Fitur 6: Laporan Buku Besar -->
        <div class="items-center gap-12 lg:gap-16 md:grid md:grid-cols-2">
            <div class="md:order-2 mb-8 md:mb-0" data-aos="fade-left">
                <img class="w-full rounded-lg shadow-lg aspect-video object-cover object-top" src="{{ asset('img/buku.png') }}" alt="Laporan Buku Besar">
            </div>
            <div class="md:order-1" data-aos="fade-right">
                <div class="flex items-center gap-4 mb-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-[#01c350] to-[#009588] text-white shadow-md">
                        <i class="fa-solid fa-book-open text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Laporan Buku Besar</h3>
                </div>
                <p class="text-gray-600 text-lg">
                    Telusuri setiap transaksi secara mendetail. Laporan Buku Besar menyajikan riwayat lengkap dengan saldo berjalan, dan dapat diekspor ke PDF atau CSV untuk keperluan audit atau analisis lebih lanjut.
                </p>
            </div>
        </div>

    </div>
</section>

{{-- ================= Section 3: Final CTA ================= --}}
<section class="bg-white">
    <div class="py-16 px-4 mx-auto max-w-screen-xl sm:py-24 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <h2 class="mb-4 text-3xl sm:text-4xl tracking-tight font-extrabold leading-tight text-gray-900">Tertarik untuk Mencoba?</h2>
            <p class="mb-8 font-normal text-gray-600 md:text-lg">Masuk ke dashboard sekarang dan rasakan sendiri kemudahan mengelola keuangan dengan myFinance.</p>
            <a href="{{ route('login') }}" class="text-white bg-[#01c350] hover:bg-[#009588] focus:ring-4 focus:ring-[#01c350]/50 font-bold rounded-lg text-base px-6 py-3.5 transition-all duration-300 transform hover:scale-105">
                Masuk ke Dashboard
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<style>
    img {
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
        image-rendering: high-quality;
    }
</style>
@endpush

@push('scripts')
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 850,
            once: true,
            offset: 80,
            easing: 'ease-out-cubic',
            mirror: false,
        });
    });
</script>
@endpush

