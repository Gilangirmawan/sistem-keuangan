@extends('layouts.home')

@section('title', 'Sistem Keuangan Sederhana')

@section('content')

{{-- Section 1: Jumbotron --}}
<section class="bg-white">
    {{-- PENYEMPURNAAN: Grid diubah untuk memperbesar gambar di desktop, padding dan ukuran teks disesuaikan untuk mobile --}}
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-6">
            {{-- Konten Teks --}}
            <h1 class="max-w-2xl mb-4 text-3xl font-extrabold tracking-tight leading-none sm:text-4xl md:text-5xl xl:text-6xl text-gray-900">
                Kelola Keuangan Bisnis Anda, Tanpa Ribet.
            </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">
                Sistem pencatatan keuangan sederhana untuk memantau pemasukan, pengeluaran, dan melihat laporan laba rugi secara otomatis.
            </p>

            {{-- Tombol Aksi --}}
            {{-- PERBAIKAN: Warna tombol diubah menjadi hijau dan teks menjadi putih --}}
            <a href="{{ route('login') }}" 
               class="inline-flex items-center justify-center px-6 py-3 text-base font-bold text-center text-white bg-[#01c350] rounded-lg hover:bg-[#00ad75] focus:ring-4 focus:ring-green-300 transition-colors">
                Masuk ke Dashboard
            </a> 
        </div>
        <div class="hidden lg:mt-0 lg:col-span-6 lg:flex items-center justify-center">
            <img src="{{ asset('img/hero.png') }}" class="rounded-lg" alt="Sistem Keuangan Dashboard">
        </div>                
    </div>
</section>

{{-- Section 2: Cara Penggunaan Sistem --}}
<section class="bg-gray-50">
    <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-16 lg:px-6">
        <div class="max-w-screen-md mx-auto text-center mb-8 lg:mb-16">
            {{-- PENYEMPURNAAN: Ukuran teks disesuaikan untuk mobile --}}
            <h2 class="mb-4 text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Pencatatan Keuangan dalam 3 Langkah Mudah</h2>
            <p class="text-gray-500 sm:text-xl">Mulai kelola keuangan Anda dengan alur kerja yang sederhana dan intuitif, dirancang untuk efisiensi.</p>
        </div>
        <div class="space-y-8 md:grid md:grid-cols-3 md:gap-12 md:space-y-0">
            <!-- Langkah 1 -->
            <div>
                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-green-100 text-green-600 lg:h-16 lg:w-16">
                    <i class="fa-solid fa-tags text-2xl lg:text-3xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">1. Atur Kategori Anda</h3>
                <p class="text-gray-500">Mulailah dengan membuat kategori untuk setiap jenis pemasukan dan pengeluaran agar pencatatan lebih terorganisir.</p>
            </div>
            <!-- Langkah 2 -->
            <div>
                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-green-100 text-green-600 lg:h-16 lg:w-16">
                    <i class="fa-solid fa-file-pen text-2xl lg:text-3xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">2. Catat Semua Transaksi</h3>
                <p class="text-gray-500">Masukkan setiap transaksi yang terjadi. Anda juga bisa mengunggah bukti transaksi jika perlu untuk arsip digital.</p>
            </div>
            <!-- Langkah 3 -->
            <div>
                <div class="flex items-center justify-center w-12 h-12 mb-4 rounded-full bg-green-100 text-green-600 lg:h-16 lg:w-16">
                    <i class="fa-solid fa-chart-pie text-2xl lg:text-3xl"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">3. Lihat Laporan Otomatis</h3>
                <p class="text-gray-500">Sistem akan secara otomatis mengolah data Anda menjadi laporan Laba Rugi dan Buku Besar yang siap dianalisis.</p>
            </div>
        </div>
    </div>
</section>

@endsection

