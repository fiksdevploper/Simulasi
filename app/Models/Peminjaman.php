<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = ['id_inventaris', 'nama_barang', 'nama_peminjam', 'tanggal_pinjam', 'tanggal_kembali', 'status_peminjaman', 'petugas'];

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class, 'id_inventaris');
    }
}
