<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Golongan;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        return view('back.pages.obat.obat');
    }

    public function add(){
        $data['kategori'] = Kategori::orderBy('nama_kategori','ASC')->get();
        $data['golongan'] = Golongan::orderBy('nama_golongan','ASC')->get();
        return view('back.pages.obat.obat_add',$data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $cstm = [
            'unique' => 'Kode Obat sudah Terdaftar'
        ];
        $request->validate([
            'kode_obat' => 'unique:obat,kode_obat',
        ],$cstm);
        $obat = new Obat();
        $obat->kode_obat = strtoupper($request->kode_obat);
        $obat->nama_obat = $request->nama_obat;
        $obat->kategori_id = $request->kategori_obat;
        $obat->golongan_id = $request->golongan_obat;
        $obat->harga_jual = 0;
        $obat->stok_minimum = $request->stok_minimum;
        $obat->keterangan = $request->keterangan;
        $obat->save();

        return redirect(route('obat'))->with('success','Data Berhasil di simpan');
    }
}
