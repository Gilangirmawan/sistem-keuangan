@extends('layouts.home')

@section('title', 'Sistem Keuangan Sederhana')

@section('content')
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            {{-- Konten Teks --}}
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-gray-900">
                Kelola Keuangan Bisnis Anda, Tanpa Ribet.
            </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl">
                Sistem pencatatan keuangan sederhana untuk memantau pemasukan, pengeluaran, dan melihat laporan laba rugi secara otomatis.
            </p>

            {{-- Tombol Aksi --}}
            <a href="{{ route('login') }}" 
               class="inline-flex items-center justify-center px-6 py-3 text-base font-bold text-center text-gray-900 bg-[#FACC15] rounded-lg hover:bg-yellow-400 focus:ring-4 focus:ring-yellow-300 transition-colors">
                Masuk ke Dashboard
            </a> 
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex items-center justify-center">
            {{-- Visual Vektor Baru --}}
            <img src="https://images.undraw.com/undraw_data_reports_706v.svg" alt="Financial System Vector" class="w-full h-auto">
        </div>                
    </div>
</section>


@endsection