<?php

namespace App\Http\Controllers;
use App\Models\Obat;
use App\Models\Suplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Temp_Pembelian_Obat;
use App\Models\Pembelian;
use App\Models\Detail_pembelian;
use App\Models\Satuan_Obat;
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
        $user_id = auth()->user()->id;
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
        $user_id = auth()->user()->id;
        $data['temp'] = Temp_Pembelian_Obat::where('user_id',$user_id)->get();
        return view('back.pages.part_of.tabel_pembelian_obat',$data);
    }

    public function renderLain()
    {
        $user_id = auth()->user()->id;
        $temp = Temp_Pembelian_Obat::where('user_id',$user_id)->get();
        $total_1 = 0;
        $total_2 = 0;
        $pot_pen = 0;
        foreach($temp as $item){
            $subtotal = $item->jumlah_obat * $item->harga_beli;
            $diskon = ($item->diskon / 100) * $subtotal;
            $total_1 += $subtotal;
            $pot_pen += $diskon;
        }
        
        $total_2 += ($total_1 - $pot_pen);
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
        $temp = Temp_Pembelian_Obat::where('id',$request->id)->first();
        // dd($temp->id);
        $data['temp'] = $temp;
        $data['obat'] = Obat::orderBy('nama_obat','ASC')->get();
        $data['suplier'] = Suplier::orderBy('nama_suplier','ASC')->get();
        $data['unit'] = Satuan_Obat::where('kode_obat',$temp->obat->kode_obat)->get();
        return view('back.pages.part_of.modal_edit_obat',$data);
    }

    public function updateObat(Request $request)
    {
        $diskon = 0;
        $margin_jual = 0;
        $user_id = auth()->user()->id;
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

    public function storeOrder(Request $request)
    {
        // dd(date('Y-m-d',strtotime($request->tanggal_faktur)));

        $user_id = auth()->user()->id;
        $pembelian = new Pembelian();
        $pembelian->no_faktur = $request->no_faktur;
        $pembelian->tgl_faktur = date('Y-m-d',strtotime($request->tanggal_faktur));
        $pembelian->suplier_id = $request->suplier_id;
        $pembelian->pajak = $request->pajak_total;
        $pembelian->biaya_lain = str_replace(".","",$request->biaya_lain);
        $pembelian->jenis = $request->jenis;
        $pembelian->user_id = $user_id;
        $pembelian->jumlah_tagihan = str_replace(".","",$request->jumlah_tagihan);
        $pembelian->status_tagihan = 'lunas';
        if($request->jenis == 'Kredit'){
            $pembelian->jatuh_tempo = date('Y-m-d',strtotime($request->jatuh_tempo));
            $pembelian->status_tagihan = 'belum_lunas';
        }
        $pembelian->save();
        $temp = Temp_Pembelian_Obat::where('user_id', $user_id);
        foreach($temp->get() as $temp){
            $detail = new Detail_pembelian();
            $detail->no_faktur = $pembelian->no_faktur;
            $detail->no_batch = $temp->no_batch;
            $detail->kode_obat = $temp->kode_obat;
            $detail->jumlah_obat = $temp->jumlah_obat;
            $detail->jumlah_satuan_terkecil = $temp->jumlah_satuan_terkecil;
            $detail->unit_id = $temp->unit_id;
            $detail->tgl_exp = $temp->tgl_exp;
            $detail->harga_beli = $temp->harga_beli;
            $detail->diskon = $temp->diskon;
            $detail->margin_jual = $temp->margin_jual;
            $detail->user_id = $temp->user_id;
            $detail->save();
        }

        $delete = Temp_Pembelian_Obat::where('user_id',$user_id)->delete();

        return redirect(route('histori.pembelian'))->with('success','Data Berhasil disimpan');
    }

    public function getObatUnit(Request $request)
    {
        $satuan = Satuan_Obat::where('kode_obat',$request->id)->get();
        $data['satuan'] = $satuan;
        return view('back.pages.part_of.select_satuan_obat',$data);
    }
}
