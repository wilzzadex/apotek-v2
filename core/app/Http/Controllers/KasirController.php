<?php

namespace App\Http\Controllers;

use App\Models\Detail_penjualan;
use App\Models\Obat;
use App\Models\Penjualan_Obat;
use App\Models\Satuan_Obat;
use App\Models\Temp_penjualan_obat;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        return view('back.pages.kasir.kasir');
    }

    public function showObat(Request $request)
    {
        $obat = Obat::where('nama_obat','like','%' . $request->keyword . '%')->orWhere('kode_obat','like','%' . $request->keyword . '%')->with('satuans')->get();
        $data['obat'] = $obat;
        return view('back.pages.part_of.tabel_show_obat',$data);
    }

    public function addtolist(Request $request)
    {
        $user_id = auth()->user()->id;
        $obat = Obat::where('id',$request->id)->first();
        $cek = Temp_penjualan_obat::where('user_id',$user_id)->where('kode_obat',$obat->kode_obat)->count();
        if($cek > 0){
            return response()->json('ada');
        }else{
            $temp = new Temp_penjualan_obat();
            $temp->kode_obat = $obat->kode_obat;
            $temp->jumlah_obat = 0;
            $temp->unit_id = 0;
            $temp->harga = 0;
            $temp->diskon = 0;
            $temp->subtotal = 0;
            $temp->user_id = $user_id;
            $temp->save();

            return response()->json('ok');
        }
    }

    public function getList()
    {
        $user_id = auth()->user()->id;
        $list = Temp_penjualan_obat::where('user_id',$user_id)->get();
        $data['list'] = $list;
        return view('back.pages.part_of.tabel_list_obat',$data);
    }

    public function changePcs(Request $request)
    {
        $temp = Temp_penjualan_obat::where('id',$request->id)->first();
        $satuan = Satuan_Obat::where('kode_obat',$temp->kode_obat)->get();
        $data['temp'] = $temp;
        $data['satuan'] = $satuan;
        return view('back.pages.part_of.modal_pcs',$data);
    }

    public function changePcsPost(Request $request)
    {
        $temp = Temp_penjualan_obat::where('id',$request->id)->first();
        $harga = Satuan_Obat::where('kode_obat',$temp->kode_obat)->where('unit_id',$request->unit_id)->first();

        $temp->jumlah_obat = $request->jumlah_obat;
        $temp->unit_id = $request->unit_id;
        $temp->harga = $harga->harga_Jual;
        $temp->subtotal = ($harga->harga_Jual * $request->jumlah_obat)  - (($temp->diskon / 100) * ($harga->harga_Jual * $request->jumlah_obat));
        $temp->save();

        return redirect()->back();
    }

    public function changeDiskon(Request $request)
    {
        $temp = Temp_penjualan_obat::where('id',$request->id)->first();
        $data['temp'] = $temp;
        return view('back.pages.part_of.modal_diskon',$data);
    }

    public function changeDiskonPost(Request $request)
    {
        $temp = Temp_penjualan_obat::where('id',$request->id)->first();
        $temp->diskon = $request->diskon;
        $temp->subtotal = ($temp->harga * $temp->jumlah_obat)  - (($request->diskon / 100) * ($temp->harga * $temp->jumlah_obat));
        $temp->save();
        return redirect()->back();
    }

    public function getTotal()
    {
        $user_id = auth()->user()->id;
        $list = Temp_penjualan_obat::where('user_id',$user_id)->sum('subtotal');
        return response()->json($list);
    }

    public function store(Request $request){
        // dd($request->all());
        $user_id = auth()->user()->id;
        $penjualan = new Penjualan_Obat();
        $penjualan->no_transaksi = $request->kode_transaksi;
        $penjualan->tgl_transaksi = date('Y-m-d');
        $penjualan->jumlah_bayar = str_replace(".","",$request->total_bayar);
        $penjualan->uang_bayar = str_replace(".","",$request->uang_bayar);
        $penjualan->uang_kembali = str_replace(".","",$request->uang_kembali);
        $penjualan->user_id = $user_id;
        $penjualan->save();

        $temp = Temp_penjualan_obat::where("user_id",$user_id)->get();
        // dd($temp);
        foreach($temp as $item){
            $detail = new Detail_penjualan();
            $detail->kode_obat = $item->kode_obat;
            $detail->jumlah_obat = $item->jumlah_obat;
            $detail->no_transaksi = $penjualan->no_transaksi;
            $detail->unit_id = $item->unit_id;
            $detail->harga = $item->harga;
            $detail->diskon = $item->diskon;
            $detail->subtotal = $item->subtotal;
            $detail->user_id = $user_id;
            $detail->save();

            $update_stok = Satuan_Obat::where('kode_obat',$detail->kode_obat)->where('unit_id',$detail->unit_id)->first();
            $update_stok->stok = ($update_stok->stok + $item->jumlah_obat);
            $update_stok->save();
        }

        $dele = Temp_penjualan_obat::where('user_id',$user_id)->delete();
        return redirect()->back()->with('success','Transaksi Berhasil di simpan');
        
    }

    public function listDestroy(Request $request){
        $dele = Temp_penjualan_obat::where('id',$request->id)->delete();
        return response()->json();
    }
}
