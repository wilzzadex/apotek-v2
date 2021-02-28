<?php

namespace App\Http\Controllers;
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
        dd($request->all());
    }
}
