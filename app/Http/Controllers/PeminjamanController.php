<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // controll peminjaman admin
    public function index()
    {
        $peminjaman = Peminjaman::all();
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    // buat peminjaman
    public function create()
    {
        $inventaris = Inventaris::where('stok', '>', 0)->get();
        return view('index.peminjaman', compact('inventaris'));
    }

    // simpan peminjaman ke dashboard admin
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_inventaris' => 'required|exists:inventaris,id_inventaris',
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'petugas' => 'required',
        ]);

        // Cek stok
        $inventaris = Inventaris::where('id_inventaris', $request->id_inventaris)->first();

        if ($inventaris->stok <= 0) {
            return redirect()->back()
                ->with('error', 'Stok barang tidak tersedia')
                ->withInput();
        }
            // menyimpan data
            Peminjaman::create([
                'id_inventaris' => $inventaris->id_inventaris,
                'nama_barang' => $inventaris->nama_barang,
                'nama_peminjam' => $request->nama_peminjam,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'status_peminjaman' => 'Proses',  // Status awal peminjaman
            ]);

            // Mengurangi stok barang
            $inventaris->decrement('stok', 1);
            return redirect()->route('home')
            ->with('success', 'Peminjaman berhasil ditambahkan');
    }

    // update status peminjaman
    public function update(Request $request, $id)
    {
        // validasi input
        $request->validate([
            'status_peminjaman' => 'required|in:Belum Kembali,Sudah Kembali,Proses,Batal',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status_peminjaman = $request->status_peminjaman;

        // Jika status peminjaman sudah kembali, tambah stok inventaris
        if ($request->status_peminjaman == 'Sudah Kembali') {
            $inventaris = Inventaris::where('id_inventaris', $peminjaman->id_inventaris)->first();
            $inventaris->increment('stok');
        }

        $peminjaman->save();
        
        return redirect()->route('peminjaman.index')->with('success', 'Status peminjaman berhasil diupdate');
    }

    // Menghapus peminjaman
    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}
