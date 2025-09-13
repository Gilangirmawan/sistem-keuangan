@extends('layouts.home')

@section('title', 'Sistem Keuangan Sederhana untuk Bisnis Anda')

@section('content')

{{-- Section 1: Jumbotron --}}
<section class="bg-white">
    <div class="py-16 px-4 mx-auto max-w-screen-xl text-center lg:py-24">
        {{-- PENYESUAIAN WARNA: Warna heading diubah menjadi hitam pekat --}}
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
            Kelola Keuangan Bisnis, Tanpa Ribet.
        </h1>
        {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
        <p class="mb-8 text-lg font-normal text-gray-900 lg:text-xl sm:px-16 lg:px-48">
            Dari pencatatan transaksi hingga laporan laba rugi otomatis. Fokus pada bisnis Anda, biarkan kami yang urus angkanya.
        </p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
            <a href="{{ route('login') }}" class="inline-flex justify-center items-center py-3 px-6 text-base font-bold text-center text-white rounded-lg bg-[#01c350] hover:bg-[#009588] focus:ring-4 focus:ring-[#01c350]/50 transition-all duration-300 transform hover:scale-105">
                Masuk ke Dashboard
                <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>
        <div class="mt-12">
            <img src="https://placehold.co/900x500/01c350/FFFFFF?text=Dashboard+Preview" class="rounded-lg shadow-2xl mx-auto" alt="Sistem Keuangan Dashboard Preview">
        </div>
    </div>
</section>

{{-- Section 2: Fitur Unggulan --}}
<section id="fitur" class="py-16 bg-gray-50/70">
    <div class="max-w-screen-xl px-4 mx-auto lg:px-6">
        <div class="max-w-screen-md mx-auto text-center mb-12">
            {{-- PENYESUAIAN WARNA: Warna heading diubah menjadi hitam pekat --}}
            <h2 class="mb-4 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Platform Lengkap Untuk Keuangan Anda</h2>
            {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
            <p class="text-gray-900 sm:text-xl">Fitur yang dirancang untuk memberikan kemudahan dan kontrol penuh atas finansial bisnis Anda.</p>
        </div>
        
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- Fitur Card -->
            <div class="p-6 bg-white rounded-lg border border-gray-200/80 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-md bg-[#01c350]/10 text-[#009588]">
                    <i class="fa-solid fa-money-bill-transfer text-2xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">Transaksi Cepat</h3>
                {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
                <p class="text-gray-900">Catat pemasukan dan pengeluaran dalam hitungan detik, lengkap dengan unggah bukti transaksi.</p>
            </div>
            <!-- Fitur Card -->
            <div class="p-6 bg-white rounded-lg border border-gray-200/80 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-md bg-[#01c350]/10 text-[#009588]">
                    <i class="fa-solid fa-tags text-2xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">Kategori Fleksibel</h3>
                {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
                <p class="text-gray-900">Kelompokkan transaksi ke dalam kategori yang bisa Anda sesuaikan sendiri sesuai kebutuhan.</p>
            </div>
            <!-- Fitur Card -->
            <div class="p-6 bg-white rounded-lg border border-gray-200/80 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-md bg-[#01c350]/10 text-[#009588]">
                    <i class="fa-solid fa-chart-pie text-2xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">Laporan Instan</h3>
                {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
                <p class="text-gray-900">Dapatkan laporan laba rugi otomatis tanpa perlu perhitungan manual yang memakan waktu.</p>
            </div>
            <!-- Fitur Card -->
            <div class="p-6 bg-white rounded-lg border border-gray-200/80 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-md bg-[#01c350]/10 text-[#009588]">
                    <i class="fa-solid fa-book-open text-2xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">Buku Besar Rinci</h3>
                {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
                <p class="text-gray-900">Telusuri setiap detail transaksi dalam format buku besar yang jelas dengan saldo berjalan.</p>
            </div>
            <!-- Fitur Card -->
            <div class="p-6 bg-white rounded-lg border border-gray-200/80 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-md bg-[#01c350]/10 text-[#009588]">
                    <i class="fa-solid fa-file-export text-2xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">Ekspor Data</h3>
                {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
                <p class="text-gray-900">Ekspor laporan keuangan Anda ke format PDF atau CSV dengan satu kali klik untuk kebutuhan cetak.</p>
            </div>
            <!-- Fitur Card -->
            <div class="p-6 bg-white rounded-lg border border-gray-200/80 hover:shadow-lg transition-shadow duration-300">
                 <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-md bg-[#01c350]/10 text-[#009588]">
                    <i class="fa-solid fa-users-gear text-2xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">Akses Multi-Peran</h3>
                {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
                <p class="text-gray-900">Atur hak akses data dengan peran Admin dan User untuk menjaga keamanan informasi finansial.</p>
            </div>
        </div>
    </div>
</section>

{{-- Section 3: Cara Penggunaan Sistem --}}
<section class="bg-white py-16">
    <div class="max-w-screen-xl px-4 mx-auto lg:px-6">
        <div class="max-w-screen-md mx-auto text-center mb-16">
            {{-- PENYESUAIAN WARNA: Warna heading diubah menjadi hitam pekat --}}
            <h2 class="mb-4 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Mulai dalam 3 Langkah Mudah</h2>
            {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
            <p class="text-gray-900 sm:text-xl">Alur kerja yang sederhana dan intuitif untuk efisiensi maksimal.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-12">
            <!-- Step 1 -->
            <div class="text-center relative">
                <div class="flex items-center justify-center mx-auto w-16 h-16 mb-4 rounded-full bg-[#01c350] text-white shadow-lg">
                    <span class="text-2xl font-bold">1</span>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">Atur Kategori</h3>
                {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
                <p class="text-gray-900">Buat kategori pemasukan & pengeluaran yang sesuai dengan bisnis Anda.</p>
            </div>
            
            <!-- Step 2 -->
            <div class="text-center relative">
                <div class="flex items-center justify-center mx-auto w-16 h-16 mb-4 rounded-full bg-[#01c350] text-white shadow-lg">
                    <span class="text-2xl font-bold">2</span>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">Catat Transaksi</h3>
                {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
                <p class="text-gray-900">Input semua transaksi harian Anda. Cepat, mudah, dan terorganisir.</p>
            </div>

            <!-- Step 3 -->
            <div class="text-center">
                <div class="flex items-center justify-center mx-auto w-16 h-16 mb-4 rounded-full bg-[#01c350] text-white shadow-lg">
                    <span class="text-2xl font-bold">3</span>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-900">Lihat Laporan</h3>
                {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
                <p class="text-gray-900">Analisis kesehatan finansial bisnis Anda melalui laporan yang dibuat otomatis.</p>
            </div>
        </div>
    </div>
</section>

{{-- Section 4: Final Call to Action --}}
<section class="bg-gradient-to-t from-gray-50/70 to-white">
    <div class="py-16 px-4 mx-auto max-w-screen-xl sm:py-24 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            {{-- PENYESUAIAN WARNA: Warna heading diubah menjadi hitam pekat --}}
            <h2 class="mb-4 text-3xl sm:text-4xl tracking-tight font-extrabold leading-tight text-gray-900">Siap Menyederhanakan Keuangan Anda?</h2>
            {{-- PENYESUAIAN WARNA: Warna teks diubah menjadi hitam pekat --}}
            <p class="mb-8 font-normal text-gray-900 md:text-lg">Masuk sekarang dan rasakan kemudahan mengontrol keuangan bisnis Anda secara real-time.</p>
            <a href="{{ route('login') }}" class="text-white bg-[#01c350] hover:bg-[#009588] focus:ring-4 focus:ring-[#01c350]/50 font-bold rounded-lg text-base px-6 py-3.5 transition-all duration-300 transform hover:scale-105">
                Mulai Sekarang
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
{{-- Tidak ada script tambahan yang diperlukan untuk saat ini --}}
@endpush

