<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $fillable = ['id_inventaris', 'nama_barang', 'kondisi', 'stok', 'tanggal_register'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_inventaris');
    }
}
