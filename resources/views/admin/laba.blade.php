@extends('layouts.app')

@section('content')


<div class="p-6 bg-white rounded-lg shadow-md mt-14">
  <!-- Judul -->
  <h2 class="text-lg font-semibold text-gray-800 mb-7 border-l-4 pl-2">
    Laba & Rugi (Profit/Loss)
  </h2>

  <!-- Filter Bulan/Tahun -->
  <div class="flex items-center gap-4 mb-10">
    <select class="border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-sky-500 focus:outline-none">
      <option>Bulan/Tahun</option>
      <option>Januari 2025</option>
      <option>Februari 2025</option>
      <option>Maret 2025</option>
    </select>

    <!-- Tombol Ekstrak -->
    <div class="flex gap-2">
      <button class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md shadow">
        Ekstraxt PDF
      </button>
      <button class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-md shadow">
        Ekstraxt XLS
      </button>
    </div>
  </div>

  <!-- Tabel -->
  <div class="overflow-x-auto">
    <table class="w-full border border-black text-center">
      <thead>
        <tr class="bg-gray-100">
          <th class="border border-black px-4 py-4">Pemasukan</th>
          <th class="border border-black px-4 py-4">Pengeluaran</th>
          <th class="border border-black px-4 py-4">Laba Bersih</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="border border-black px-4 py-4"></td>
          <td class="border border-black px-4 py-4"></td>
          <td class="border border-black px-4 py-4"></td>
        </tr>
        <tr>
          <td class="border border-black px-4 py-4"></td>
          <td class="border border-black px-4 py-4"></td>
          <td class="border border-black px-4 py-4"></td>
        </tr>
        <tr>
          <td class="border border-black px-4 py-4"></td>
          <td class="border border-black px-4 py-4"></td>
          <td class="border border-black px-4 py-4"></td>
        </tr>
        <tr>
          <td class="border border-black px-4 py-4"></td>
          <td class="border border-black px-4 py-4"></td>
          <td class="border border-black px-4 py-4"></td>
        </tr>
        <tr>
          <td class="border border-black px-4 py-4"></td>
          <td class="border border-black px-4 py-4"></td>
          <td class="border border-black px-4 py-4"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@endsection
