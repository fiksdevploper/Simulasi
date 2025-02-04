<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('admin.inventaris.index', compact('inventaris'));
    }

    public function create()
    {
        return view('admin.inventaris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_inventaris' => 'required|unique:inventaris',
            'nama_barang' => 'required',
            // salah
            // 'kondisi' => 'required',
            'kondisi' => 'required|in:baik,perbaikan',
            'stok' => 'required',
            'tanggal_register' => 'required',
        ]);

        Inventaris::create($request->only(['id_inventaris', 'nama_barang', 'kondisi', 'stok', 'tanggal_register']));
        return redirect()->route('inventaris.index');
    }

    public function show(Inventaris $inventaris)
    {
        return view('admin.inventaris.index', compact('inventaris'));
    }

    public function edit(Inventaris $inventaris)
    {
        return view('admin.inventaris.edit', compact('inventaris'));
    }

    public function update(Request $request, Inventaris $inventaris)
    {
        $request->validate([
            'id_inventaris' => 'required|unique:inventaris,id_inventaris,' . $inventaris->id,
            'nama_barang' => 'required',
            'kondisi' => 'required',
            'stok' => 'required',
            'tanggal_register' => 'required',
        ]);

        $inventaris->update($request->all());
        return redirect()->route('inventaris.index');
    }

    public function destroy(Inventaris $inventaris)
    {
        $inventaris->delete();
        return redirect()->route('inventaris.index');
    }
}
