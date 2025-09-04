<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PemasukanController extends Controller
{
    public function index()
    {
        // Ambil data pemasukan dengan relasi kategori + pagination
        $pemasukan = Transaksi::where('jenis_transaksi', 'pemasukan')
            ->with('kategori')
            ->latest()
            ->paginate(5); // <-- pagination aktif

        $kategori = Kategori::all();

        return view('admin.pemasukan', compact('pemasukan', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori'     => 'required|exists:kategori,id',
            'jumlah'          => 'required|numeric|min:0',
            'total'           => 'required|numeric|min:0',
            'keterangan'      => 'nullable|string|max:255',
            'bukti_transaksi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('bukti_transaksi')) {
            $filePath = $request->file('bukti_transaksi')->store('bukti', 'public');
        }

        Transaksi::create([
            'jenis_transaksi' => 'pemasukan',
            'id_kategori'     => $request->id_kategori,
            'jumlah'          => $request->jumlah,
            'total'           => $request->total,
            'keterangan'      => $request->keterangan,
            'bukti_transaksi' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data pemasukan berhasil ditambahkan');
    }

    public function update(Request $request, Transaksi $pemasukan)
    {
        $request->validate([
            'id_kategori'     => 'required|exists:kategori,id',
            'jumlah'          => 'required|numeric|min:0',
            'total'           => 'required|numeric|min:0',
            'keterangan'      => 'nullable|string|max:255',
            'bukti_transaksi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filePath = $pemasukan->bukti_transaksi;
        if ($request->hasFile('bukti_transaksi')) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('bukti_transaksi')->store('bukti', 'public');
        }

        $pemasukan->update([
            'id_kategori'     => $request->id_kategori,
            'jumlah'          => $request->jumlah,
            'total'           => $request->total,
            'keterangan'      => $request->keterangan,
            'bukti_transaksi' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data pemasukan berhasil diperbarui');
    }

    public function destroy(Transaksi $pemasukan)
    {
        if ($pemasukan->bukti_transaksi && Storage::disk('public')->exists($pemasukan->bukti_transaksi)) {
            Storage::disk('public')->delete($pemasukan->bukti_transaksi);
        }

        $pemasukan->delete();

        return redirect()->back()->with('success', 'Data pemasukan berhasil dihapus');
    }
}
