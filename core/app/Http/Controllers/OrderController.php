<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use App\Models\Suplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Temp_Pembelian_Obat;
use Validator;
use View;
use DB;

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
            $unit = Unit::where('id',$request->unit_id)->first();
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
            $temp->jumlah_satuan_terkecil = $unit->satuan_terkecil * $request->jumlah_obat;


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

    public function renderLain()
    {
        $user_id = 1;
        $temp = Temp_Pembelian_Obat::where('user_id',$user_id)->get();
        $total_1 = 0;
        $total_2 = 0;
        $pot_pen = 0;
        foreach($temp as $item){
            $subtotal = $item->jumlah_obat * $item->harga_beli;
            $diskon = ($item->diskon / 100) * $subtotal;
            $total_1 += $subtotal;
            $pot_pen += $diskon;
            $total_2 += ($total_1 - $pot_pen);
        }

        $data['total_1'] = $total_1;
        $data['total_2'] = $total_2;
        $data['pot_pen'] = $pot_pen;
        return response()->json($data);
        
    }

    public function deleteObat(Request $request)
    {
        $temp = Temp_Pembelian_Obat::find($request->id)->delete();
    }

    public function editObat(Request $request)
    {
        $temp = Temp_Pembelian_Obat::find($request->id)->first();
        $data['temp'] = $temp;
        $data['obat'] = Obat::orderBy('nama_obat','ASC')->get();
        $data['suplier'] = Suplier::orderBy('nama_suplier','ASC')->get();
        $data['unit'] = Unit::orderBy('nama','ASC')->get();
        return view('back.pages.part_of.modal_edit_obat',$data);
    }

    public function updateObat(Request $request)
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

        $cek = Temp_Pembelian_Obat::where('id','!=',$request->id)->where(['user_id' => $user_id, 'kode_obat' => $request->obat_id])->count();
        if($cek > 0){
            return response()->json('ada');
        }else{
            $unit = Unit::where('id',$request->unit_id)->first();
            $temp = Temp_Pembelian_Obat::find($request->id);
            $temp->kode_obat = $request->obat_id;
            $temp->no_batch = $request->no_batch;
            $temp->unit_id = $request->unit_id;
            $temp->jumlah_obat = $request->jumlah_obat;
            $temp->tgl_exp = date('Y-m-d',strtotime($request->tgl_exp));
            $temp->harga_beli = $harga_beli;
            $temp->diskon = $diskon;
            $temp->margin_jual = $margin_jual;
            $temp->user_id = $user_id;
            $temp->jumlah_satuan_terkecil = $unit->satuan_terkecil * $request->jumlah_obat;
            $temp->save();

            $data['temp'] = Temp_Pembelian_Obat::where('user_id',$user_id)->get();
            $data['view'] = view('back.pages.part_of.tabel_pembelian_obat',$data)->render();
            return response()->json($data);
        };
    }
}
