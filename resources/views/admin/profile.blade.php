@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="w-full mx-auto bg-white p-6 md:p-8 mt-14 rounded-xl shadow-md">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Profil Saya</h1>
        <p class="text-gray-500">Perbarui informasi dan password akun Anda.</p>
    </div>

    {{-- Notifikasi Sukses --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition
             class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-5" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Grid untuk Nama dan Email --}}
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            {{-- Nama Pengguna --}}
            <div class="mb-4 sm:mb-0">
                <label for="nama" class="block text-gray-700 font-medium mb-2">Nama</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fa-solid fa-user"></i>
                    </span>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $user->nama) }}"
                           class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01c350]">
                </div>
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                           class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01c350]">
                </div>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <hr>
        {{-- Bagian Ubah Password --}}
        <div class=" mt-6 pt-6">
            <h2 class="text-lg font-semibold text-gray-800">Ubah Password</h2>
            <p class="text-gray-500 text-sm mb-4">Kosongkan jika Anda tidak ingin mengubah password.</p>
            
            {{-- Grid untuk Password --}}
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                {{-- Password Baru --}}
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password Baru</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password"
                               class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01c350]">
                    </div>
                     @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
        
                {{-- Konfirmasi Password Baru --}}
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Konfirmasi Password Baru</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01c350]">
                    </div>
                </div>
            </div>
        </div>

        {{-- Tombol Simpan --}}
        <div class="flex justify-end mt-4">
            <button type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-[#01c350] to-[#009588] text-white font-bold rounded-lg hover:from-[#00ad75] hover:to-[#007b89] focus:outline-none focus:ring-4 focus:ring-[#01c350]/40 transition-all shadow-md hover:shadow-lg">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

