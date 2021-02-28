<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satuan_Obat extends Model
{
    protected $table = 'satuan_obat';
    protected $fillable = [
        'kode_obat',
        'unit_id',
        'unit_id_sama_dengan',
        'jumlah_satuan',
        'stok',
        'harga_jual',
    ];

    public function unit()
    {
        return $this->hasOne(Unit::class, 'id','unit_id');
    }
}
