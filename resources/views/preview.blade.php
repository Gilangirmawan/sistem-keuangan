@extends('layouts.home')

@section('title', 'Preview Fitur - KeuanganApp')

@section('content')

{{-- ================= Section 1: Page Header ================= --}}
<section class="bg-white py-16 md:py-20" aria-labelledby="preview-heading">
    <div class="max-w-screen-xl px-6 mx-auto">
        <div class="max-w-screen-md mx-auto text-center" data-aos="fade-up">
            <h1 id="preview-heading" class="mb-4 text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-gray-900">
                Jelajahi Fitur Unggulan Kami
            </h1>
            <p class="text-gray-600 sm:text-xl">
                Lihat lebih dekat bagaimana KeuanganApp dapat menyederhanakan pencatatan finansial Anda, langkah demi langkah.
            </p>
        </div>
    </div>
</section>

{{-- ================= Section 2: Features Showcase ================= --}}
<section class="bg-gray-50 py-20">
    <div class="max-w-screen-xl px-4 mx-auto lg:px-6 space-y-20">

        <!-- Fitur 1: Dashboard -->
        <div class="items-center gap-16 md:grid md:grid-cols-2">
            <div data-aos="fade-right">
                {{-- Ganti dengan screenshot halaman Dashboard Anda --}}
                <img class="w-full rounded-lg shadow-lg aspect-video object-cover object-top" src="https://placehold.co/1200x675/01c350/FFFFFF?text=Screenshot+Dashboard" alt="Tampilan Dashboard">
            </div>
            <div data-aos="fade-left">
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
        <div class="items-center gap-16 md:grid md:grid-cols-2">
            <div class="md:order-2" data-aos="fade-left">
                 {{-- Ganti dengan screenshot halaman Kategori Anda --}}
                <img class="w-full rounded-lg shadow-lg aspect-video object-cover object-top" src="https://placehold.co/1200x675/2f4858/FFFFFF?text=Screenshot+Kategori" alt="Manajemen Kategori">
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

        <!-- Fitur 3: Pencatatan Transaksi -->
        <div class="items-center gap-16 md:grid md:grid-cols-2">
            <div data-aos="fade-right">
                 {{-- Ganti dengan screenshot halaman Tambah Transaksi Anda --}}
                <img class="w-full rounded-lg shadow-lg aspect-video object-cover object-top" src="https://placehold.co/1200x675/FACC15/2f4858?text=Screenshot+Transaksi" alt="Pencatatan Transaksi">
            </div>
            <div data-aos="fade-left">
                <div class="flex items-center gap-4 mb-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-[#01c350] to-[#009588] text-white shadow-md">
                        <i class="fa-solid fa-file-pen text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Pencatatan Cepat & Rinci</h3>
                </div>
                <p class="text-gray-600 text-lg">
                    Formulir pencatatan kami dirancang untuk kecepatan. Masukkan nominal, pilih kategori, tambahkan deskripsi, dan lampirkan bukti transaksi jika perlu. Semua bisa dilakukan dalam hitungan detik.
                </p>
            </div>
        </div>

         <!-- Fitur 4: Laporan -->
        <div class="items-center gap-16 md:grid md:grid-cols-2">
            <div class="md:order-2" data-aos="fade-left">
                 {{-- Ganti dengan screenshot halaman Laporan Anda --}}
                <img class="w-full rounded-lg shadow-lg aspect-video object-cover object-top" src="https://placehold.co/1200x675/007b89/FFFFFF?text=Screenshot+Laporan" alt="Laporan Keuangan">
            </div>
            <div class="md:order-1" data-aos="fade-right">
                <div class="flex items-center gap-4 mb-4">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-r from-[#01c350] to-[#009588] text-white shadow-md">
                        <i class="fa-solid fa-book-open text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Laporan Siap Pakai</h3>
                </div>
                <p class="text-gray-600 text-lg">
                   Analisis data Anda melalui laporan Laba Rugi dan Buku Besar yang dibuat secara otomatis. Gunakan filter untuk melihat data berdasarkan periode, dan ekspor hasilnya ke PDF atau CSV untuk keperluan lebih lanjut.
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
            <p class="mb-8 font-normal text-gray-600 md:text-lg">Masuk ke dashboard sekarang dan rasakan sendiri kemudahan mengelola keuangan dengan KeuanganApp.</p>
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
  // Init AOS
  AOS.init({
    duration: 850,
    once: true,
    offset: 80,
    easing: 'ease-out-cubic',
    mirror: false,
  });
</script>
@endpush
