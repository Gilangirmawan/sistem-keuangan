@extends('layouts.app')

@section('content')


<div class="p-6 bg-white rounded-lg shadow-md mt-14">
  <!-- Judul -->
  <h2 class="text-lg font-semibold text-gray-800 mb-4">
    Buku Besar (General Ledger)
  </h2>

  <!-- Filter -->
  {{-- <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Dari</label>
      <input type="date" value="2025-08-01" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-sky-500 focus:outline-none">
    </div>
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">Sampai</label>
      <input type="date" value="2025-08-31" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-sky-500 focus:outline-none">
    </div>
    <div class="md:col-span-2">
      <label class="block text-sm font-medium text-gray-700 mb-1">Akun</label>
      <select class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-sky-500 focus:outline-none">
        <option>11000 - Kas di Tangan</option>
      </select>
    </div>
  </div>

  <!-- Search & Tombol -->
  <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-4">
    <input type="text" placeholder="Keterangan / No. bukti"
      class="w-full md:w-1/2 border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-sky-500 focus:outline-none"> --}}
    <div class="flex gap-2">
      <button class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md shadow">
        Ekspor PDF
      </button>
      <button class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md shadow">
        Ekspor CSV
      </button>
    </div>
  </div>

  <!-- Tabel -->
  <div class="overflow-x-auto">
    <table class="w-full border border-gray-200 text-left text-sm">
      <thead>
        <tr class="bg-gray-100 text-gray-700">
          <th class="px-4 py-2 border border-gray-200 text-center">Tanggal</th>
          <th class="px-4 py-2 border border-gray-200 text-center" text-center>Jenis - Kategori</th>
          <th class="px-4 py-2 border border-gray-200 text-center">Debit</th>
          <th class="px-4 py-2 border border-gray-200 text-center">Kredit</th>
          <th class="px-4 py-2 border border-gray-200 text-center">Saldo Saat Ini</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="px-4 py-2 border border-gray-200"></td>
          <td class="px-4 py-2 border border-gray-200"></td>
          <td class="px-4 py-2 border border-gray-200 font-semibold"></td>
          <td class="px-4 py-2 border border-gray-200 text-center"></td>
          <td class="px-4 py-2 border border-gray-200"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


@endsection
