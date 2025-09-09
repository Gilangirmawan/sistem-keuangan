<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori', compact('kategori'));
    }


    public function create()
    {
        return view('admin.kategori.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori',
            'jenis' => 'required|in:pemasukan,pengeluaran',
        ]);

        Kategori::create($request->all());

        return redirect()->back()->with('success', 'Data kategori berhasil dihapus');
    }


    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100|unique:kategori,nama_kategori,' . $kategori->id,
            'jenis' => 'required|in:pemasukan,pengeluaran',
        ]);

        $kategori->update($request->all());

        return redirect()->back()->with('success', 'Data kategori berhasil dihapus');
    }


    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->back()->with('success', 'Data kategori berhasil dihapus');
    }
}
