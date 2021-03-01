<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Penjualan_Obat;
use App\Models\Pengaturan_Aplikasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function indexPenjualan()
    {
        return view('back.pages.laporan.penjualan');
    }

    public function cetakPenjualan(Request $request)
    {
        $input = $request->tanggal;
        $pecah = explode(" - ",$input);
        $tanggal_awal = date('Y-m-d',strtotime($pecah[0]));
        $tanggal_akhir = date('Y-m-d',strtotime($pecah[1]));

        $pembelian = Pembelian::where('status_tagihan','lunas')->whereBetween('tgl_faktur',[$tanggal_awal,$tanggal_akhir])->sum('jumlah_tagihan');
        $penjualan = Penjualan_Obat::whereBetween('tgl_transaksi',[$tanggal_awal,$tanggal_akhir])->sum('jumlah_bayar');
        
        $data['pembelian'] = $pembelian;
        $data['penjualan'] = $penjualan;
        $data['input_tanggal'] = $input;
        $data['pengaturan'] = Pengaturan_Aplikasi::first();
        return view('back.pages.laporan.cetak_penjualan',$data);
    }
}
