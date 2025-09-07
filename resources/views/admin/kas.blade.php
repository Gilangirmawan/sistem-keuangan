{{-- @extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto mt-14">

        <header class="flex flex-col sm:flex-row justify-between sm:items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Laporan Arus Kas</h1>
                <p class="text-sm text-gray-500">Metode: Indirect</p>
            </div>
            <button class="mt-4 sm:mt-0 flex items-center gap-2 bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Ekspor
            </button>
        </header>

        <div class="bg-white p-4 rounded-lg shadow-sm mb-6 border border-gray-200">
            <div class="flex items-center text-gray-600 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                </svg>
                <span class="font-semibold">Filter</span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-center">
                <div class="relative">
                    <label for="date-from" class="text-sm font-medium text-gray-700">Dari</label>
                    <input type="text" id="date-from" value="01/08/2025" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <div class="absolute inset-y-0 right-0 top-6 flex items-center pr-3 pointer-events-none">
                        <i class="fas fa-calendar-alt text-gray-400"></i>
                    </div>
                </div>

                <div class="relative">
                    <label for="date-to" class="text-sm font-medium text-gray-700">Sampai</label>
                    <input type="text" id="date-to" value="31/08/2025" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                     <div class="absolute inset-y-0 right-0 top-6 flex items-center pr-3 pointer-events-none">
                        <i class="fas fa-calendar-alt text-gray-400"></i>
                    </div>
                </div>

                <div>
                    <label for="branch" class="text-sm font-medium text-gray-700">Cabang</label>
                    <select id="branch" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option>Semua Cabang</option>
                        <option>Cabang A</option>
                        <option>Cabang B</option>
                    </select>
                </div>
                
                <div class="flex items-end h-full gap-4 lg:col-span-2">
                    <div class="flex items-center">
                        <label for="ytd-toggle" class="mr-3 text-sm font-medium text-gray-900">Tampilkan YTD</label>
                        <button type="button" class="bg-blue-600 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" role="switch" aria-checked="true">
                            <span class="sr-only">Tampilkan YTD</span>
                            <span aria-hidden="true" class="translate-x-5 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                        </button>
                    </div>

                    <button class="flex items-center gap-2 text-gray-600 font-semibold py-2 px-4 rounded-lg hover:bg-gray-100 transition duration-200 border border-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h5M20 20v-5h-5M20 4h-5v5M4 20h5v-5" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h5M20 20v-5h-5M20 4h-5v5M4 20h5v-5M15 4h5v5M4 9V4h5M9 20v-5H4" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 15h-5v5M9 4v5H4" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16a4 4 0 100-8 4 4 0 000 8z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Refresh
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200">
                <p class="text-sm text-gray-500">Kas dari Operasi</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">Rp 35.715.000</p>
            </div>
             <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200">
                <p class="text-sm text-gray-500">Kas dari Investasi</p>
                <p class="text-2xl font-bold text-red-600 mt-1">-Rp 10.000.000</p>
            </div>
             <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200">
                <p class="text-sm text-gray-500">Kas dari Pendanaan</p>
                <p class="text-2xl font-bold text-red-600 mt-1">-Rp 5.000.000</p>
            </div>
             <div class="bg-white p-5 rounded-lg shadow-sm border border-gray-200">
                <p class="text-sm text-gray-500">Saldo Akhir Kas</p>
                <p class="text-2xl font-bold text-gray-800 mt-1">Rp 35.715.000</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 w-1/2">
                                Keterangan
                            </th>
                            <th scope="col" class="px-6 py-3 text-right">
                                Periode Ini
                            </th>
                            <th scope="col" class="px-6 py-3 text-right">
                                YTD
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-3 font-bold text-gray-900">Arus Kas dari Aktivitas Operasi</td>
                            <td class="px-6 py-3"></td>
                            <td class="px-6 py-3"></td>
                        </tr>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-3 pl-10">Laba Bersih</td>
                            <td class="px-6 py-3 text-right">Rp 38.715.000</td>
                            <td class="px-6 py-3 text-right">Rp 278.125.000</td>
                        </tr>
                        <tr class="bg-gray-50 border-b">
                            <td class="px-6 py-3 pl-10">Penyusutan</td>
                            <td class="px-6 py-3 text-right">Rp 3.000.000</td>
                            <td class="px-6 py-3 text-right">Rp 18.000.000</td>
                        </tr>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-3 pl-10">(Kenaikan)/Penurunan Piutang</td>
                            <td class="px-6 py-3 text-right text-red-600">-Rp 5.000.000</td>
                            <td class="px-6 py-3 text-right text-red-600">-Rp 20.000.000</td>
                        </tr>
                         <tr class="bg-gray-50 border-b">
                            <td class="px-6 py-3 pl-10">(Kenaikan)/Penurunan Persediaan</td>
                            <td class="px-6 py-3 text-right text-red-600">-Rp 2.500.000</td>
                            <td class="px-6 py-3 text-right text-red-600">-Rp 15.000.000</td>
                        </tr>
                         <tr class="bg-white border-b">
                            <td class="px-6 py-3 pl-10">Kenaikan/(Penurunan) Hutang Usaha</td>
                            <td class="px-6 py-3 text-right">Rp 1.500.000</td>
                            <td class="px-6 py-3 text-right">Rp 10.000.000</td>
                        </tr>
                        <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-3 font-bold text-gray-900">Kas Bersih dari Operasi</td>
                            <td class="px-6 py-3 text-right font-bold text-gray-900">Rp 35.715.000</td>
                            <td class="px-6 py-3 text-right font-bold text-gray-900">Rp 271.125.000</td>
                        </tr>

                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 font-bold text-gray-900">Arus Kas dari Aktivitas Investasi</td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                        </tr>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-3 pl-10">Pembelian Aset Tetap</td>
                            <td class="px-6 py-3 text-right text-red-600">-Rp 10.000.000</td>
                            <td class="px-6 py-3 text-right text-red-600">-Rp 50.000.000</td>
                        </tr>
                        <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-3 font-bold text-gray-900">Kas Bersih dari Investasi</td>
                            <td class="px-6 py-3 text-right font-bold text-red-600">-Rp 10.000.000</td>
                            <td class="px-6 py-3 text-right font-bold text-red-600">-Rp 50.000.000</td>
                        </tr>

                         <tr class="bg-white border-b">
                            <td class="px-6 py-4 font-bold text-gray-900">Arus Kas dari Aktivitas Pendanaan</td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                        </tr>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-3 pl-10">Penerimaan Pinjaman</td>
                            <td class="px-6 py-3 text-right"></td>
                            <td class="px-6 py-3 text-right">Rp 100.000.000</td>
                        </tr>
                        <tr class="bg-gray-50 border-b">
                            <td class="px-6 py-3 pl-10">Pembayaran Pinjaman</td>
                            <td class="px-6 py-3 text-right text-red-600">-Rp 5.000.000</td>
                            <td class="px-6 py-3 text-right text-red-600">-Rp 25.000.000</td>
                        </tr>
                        <tr class="bg-gray-100 border-b">
                            <td class="px-6 py-3 font-bold text-gray-900">Kas Bersih dari Pendanaan</td>
                            <td class="px-6 py-3 text-right font-bold text-red-600">-Rp 5.000.000</td>
                            <td class="px-6 py-3 text-right font-bold text-gray-900">Rp 75.000.000</td>
                        </tr>
                        
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 font-bold text-gray-900">Rekonsiliasi Kas</td>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4"></td>
                        </tr>
                        <tr class="bg-white border-b">
                            <td class="px-6 py-3 pl-10">Kenaikan/(Penurunan) Kas</td>
                            <td class="px-6 py-3 text-right">Rp 20.715.000</td>
                            <td class="px-6 py-3 text-right">Rp 296.125.000</td>
                        </tr>
                         <tr class="bg-gray-50 border-b">
                            <td class="px-6 py-3 pl-10">Saldo Awal Kas</td>
                            <td class="px-6 py-3 text-right">Rp 15.000.000</td>
                            <td class="px-6 py-3 text-right">Rp 15.000.000</td>
                        </tr>
                        <tr class="bg-blue-100">
                            <td class="px-6 py-4 font-extrabold text-blue-800">Saldo Akhir Kas</td>
                            <td class="px-6 py-4 text-right font-extrabold text-blue-800">Rp 35.715.000</td>
                            <td class="px-6 py-4 text-right font-extrabold text-blue-800">Rp 311.125.000</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection --}}