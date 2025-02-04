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

    public function edit(Inventaris $inventari)
    {
        return view('admin.inventaris.edit', compact('inventari'));
    }

    public function update(Request $request, Inventaris $inventari)
    {
        $request->validate([
            'id_inventaris' => 'required|unique:inventaris,id_inventaris,'.$inventari->id,
            'nama_barang' => 'required',
            'kondisi' => 'required',
            'stok' => 'required',
            'tanggal_register' => 'required',
        ]);

        $inventari->update($request->all());
        return redirect()->route('inventaris.index');
    }

    public function destroy(Inventaris $inventari)
    {
        $inventari->delete();
        return redirect()->route('inventaris.index');
    }
}
