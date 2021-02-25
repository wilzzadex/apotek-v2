<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_pembelian extends Model
{
    protected $table = 'detail_pembelian_obat';
    protected $fillable = [
        'no_faktur',
        'kode_obat',
        'no_batch',
        'jumlah_obat',
        'jumlah_satuan_terkecil',
        'unit_id',
        'tgl_exp',
        'harga_beli',
        'diskon',
        'margin_jual',
        'user_id',
    ];
}
