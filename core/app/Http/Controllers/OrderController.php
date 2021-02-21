<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use App\Models\Suplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Temp_Pembelian_Obat;
use Validator;
use View;

class OrderController extends Controller
{
    public function index()
    {
        $data['obat'] = Obat::orderBy('nama_obat','ASC')->get();
        $data['suplier'] = Suplier::orderBy('nama_suplier','ASC')->get();
        $data['unit'] = Unit::orderBy('nama','ASC')->get();
        return view('back.pages.transaksi.order.order',$data);
    }

    public function addTemp(Request $request)
    {
        $diskon = 0;
        $margin_jual = 0;
        $user_id = '1';
        $harga_beli = str_replace('.','',$request->harga_beli);
        if($request->margin_jual){
            $margin_jual = $request->margin_jual;
        }
        if($request->diskon){
            $diskon = $request->diskon;
        }

        $cek = Temp_Pembelian_Obat::where(['user_id' => $user_id, 'kode_obat' => $request->obat_id])->count();
        if($cek > 0){
            return response()->json('ada');
        }else{
            $temp = new Temp_Pembelian_Obat();
            $temp->kode_obat = $request->obat_id;
            $temp->no_batch = $request->no_batch;
            $temp->unit_id = $request->unit_id;
            $temp->jumlah_obat = $request->jumlah_obat;
            $temp->tgl_exp = date('Y-m-d',strtotime($request->tgl_exp));
            $temp->harga_beli = $harga_beli;
            $temp->diskon = $diskon;
            $temp->margin_jual = $margin_jual;
            $temp->user_id = $user_id;
            $temp->save();

            $data['temp'] = Temp_Pembelian_Obat::where('user_id',$user_id)->get();
            $data['view'] = view('back.pages.part_of.tabel_pembelian_obat',$data)->render();
            return response()->json($data);
        };
    }

    public function renderTabel()
    {
        $user_id = 1;
        $data['temp'] = Temp_Pembelian_Obat::where('user_id',$user_id)->get();
        return view('back.pages.part_of.tabel_pembelian_obat',$data);
    }
}
