<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Transaksi::where('jenis_transaksi', 'pengeluaran')->with('kategori')->latest()->get();
        $kategori = Kategori::all();
        $pengeluaran = Transaksi::where('jenis_transaksi', 'pengeluaran')
            ->with('kategori')
            ->latest()
            ->paginate(5);

        return view('admin.pengeluaran', compact('pengeluaran', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori'     => 'required|exists:kategori,id',
            'total'           => 'required|numeric|min:0',
            'keterangan'      => 'nullable|string|max:255',
            'bukti_transaksi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('bukti_transaksi')) {
            $filePath = $request->file('bukti_transaksi')->store('bukti', 'public');
        }

        Transaksi::create([
            'jenis_transaksi' => 'pengeluaran',
            'id_kategori'     => $request->id_kategori,
            'jumlah'          => $request->jumlah,
            'total'           => $request->total,
            'keterangan'      => $request->keterangan,
            'bukti_transaksi' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data pengeluaran berhasil ditambahkan');
    }

    public function update(Request $request, Transaksi $pengeluaran)
    {
        $request->validate([
            'id_kategori'     => 'required|exists:kategori,id',
            'jumlah'          => 'required|numeric|min:0',
            'total'           => 'required|numeric|min:0',
            'keterangan'      => 'nullable|string|max:255',
            'bukti_transaksi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filePath = $pengeluaran->bukti_transaksi;
        if ($request->hasFile('bukti_transaksi')) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('bukti_transaksi')->store('bukti', 'public');
        }

        $pengeluaran->update([
            'id_kategori'     => $request->id_kategori,
            'jumlah'          => $request->jumlah,
            'total'           => $request->total,
            'keterangan'      => $request->keterangan,
            'bukti_transaksi' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data pengeluaran berhasil diperbarui');
    }

    public function destroy(Transaksi $pengeluaran)
    {
        if ($pengeluaran->bukti_transaksi && Storage::disk('public')->exists($pengeluaran->bukti_transaksi)) {
            Storage::disk('public')->delete($pengeluaran->bukti_transaksi);
        }

        $pengeluaran->delete();

        return redirect()->back()->with('success', 'Data pengeluaran berhasil dihapus');
    }
}
