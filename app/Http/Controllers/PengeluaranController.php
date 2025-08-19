<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::latest()->get();
        return view('admin.pengeluaran', compact('pengeluaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pengeluaran' => 'required|string|max:255',
            'kategori'    => 'required|string|max:100',
            'jumlah'      => 'required|numeric',
            'keterangan'  => 'nullable|string',
        ]);

        Pengeluaran::create($request->all());

        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        return view('admin.pengeluaran-edit', compact('pengeluaran'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $request->validate([
            'pengeluaran' => 'required|string|max:255',
            'kategori'    => 'required|string|max:100',
            'jumlah'      => 'required|numeric',
            'keterangan'  => 'nullable|string',
        ]);

        $pengeluaran->update($request->all());

        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with('success', 'Data berhasil dihapus.');
    }
}
