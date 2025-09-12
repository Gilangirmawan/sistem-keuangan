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
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex flex-col items-center justify-center p-4">
            {{-- Mockup Laptop --}}
            <div class="relative mx-auto border-gray-800 dark:border-gray-800 bg-gray-800 border-[8px] rounded-t-xl h-[158px] max-w-[301px] md:h-[257px] md:max-w-[512px]">
                <div class="rounded-lg overflow-hidden h-[142px] md:h-[241px] bg-white dark:bg-gray-800">
                    {{-- Gambar untuk mode terang --}}
                    <img src="{{ asset('img/mockup-laptop.png') }}" class="dark:hidden h-[142px] md:h-[241px] w-full rounded-lg" alt="Dashboard Screenshot">
                    {{-- Gambar untuk mode gelap (placeholder) --}}
                    <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/laptop-screen-dark.png" class="hidden dark:block h-[142px] md:h-[241px] w-full rounded-lg" alt="Dashboard Screenshot Dark Mode">
                </div>
            </div>
            <div class="relative mx-auto bg-gray-900 dark:bg-gray-700 rounded-b-xl rounded-t-sm h-[17px] max-w-[351px] md:h-[21px] md:max-w-[597px]">
                <div class="absolute left-1/2 top-0 -translate-x-1/2 rounded-b-xl w-[56px] h-[5px] md:w-[96px] md:h-[8px] bg-gray-800"></div>
            </div>
        </div>                 
    </div>
</section>

@endsection