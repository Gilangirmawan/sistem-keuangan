<?php


namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukan = Pemasukan::latest()->get();
        return view('admin.pemasukan', compact('pemasukan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pemasukan' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        Pemasukan::create($request->all());

        return redirect()->route('pemasukan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Pemasukan $pemasukan)
    {
        return view('admin.pemasukan-edit', compact('pemasukan'));
    }

    public function update(Request $request, Pemasukan $pemasukan)
    {
        $request->validate([
            'pemasukan' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'jumlah' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $pemasukan->update($request->all());

        return redirect()->route('pemasukan.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(Pemasukan $pemasukan)
    {
        $pemasukan->delete();

        return redirect()->route('pemasukan.index')->with('success', 'Data berhasil dihapus.');
    }
}
