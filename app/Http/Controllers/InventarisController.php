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


    public function search(Request $request)
    {
        $search = $request->input('search');

        $inventaris = Inventaris::when($search, function ($query, $search) {
            return $query->where('nama_barang', 'like', "%{$search}%")
                         ->orWhere('id_inventaris', 'like', "%{$search}%")
                         ->orWhere('kondisi', 'like', "%{$search}%");
        })->get();

        return response()->json($inventaris);
    }
    
    public function create()
    {
        return view('admin.inventaris.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_inventaris' => 'required|unique:inventaris',
            'nama_barang' => 'required',
            'kondisi' => 'required|in:baik,perbaikan',
            'stok' => 'required',
            'tanggal_register' => 'required',
        ]);

        Inventaris::create($data);
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
            'id_inventaris' => 'required|unique:inventaris,id_inventaris,' . $inventari->id,
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
