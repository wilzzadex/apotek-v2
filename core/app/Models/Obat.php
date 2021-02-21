<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'stok_minimum',
        'kategori_id',
        'golongan_id',
        'harga_jual',
        'keterangan',
    ];
}
