<?php

namespace App\Http\Controllers;
use App\Exports\PenjualanExport;
use App\Exports\PenjualanExport2;
use App\Models\Detail_penjualan;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Pembelian;
use App\Models\Penjualan_Obat;
use App\Models\Pengaturan_Aplikasi;
use App\User;
use PDF;
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

    public function indexPenjualan2()
    {
        $data['kasir'] = User::where('role','kasir')->orderBy('name')->get();
        return view('back.pages.laporan.index_penjualan',$data);
    }

    public function cetak2(Request $request)
    {
        // dd($request->all());
        if($request->type_button  == 'excel'){
            $input = $request->tanggal;
            $pecah = explode(" - ",$input);
            $tanggal_awal = date('Y-m-d',strtotime($pecah[0]));
            $tanggal_akhir = date('Y-m-d',strtotime($pecah[1]));

            $laporan = Penjualan_Obat::query();


            if($request->kasir_id){
                $kasir_id = $request->kasir_id;
                $user = User::where('id',$kasir_id)->first();
                $file_name = 'Laporan-'.$user->name.'-'.str_replace("/","-",$input).'.xlsx';
                return Excel::download(new PenjualanExport($tanggal_awal,$tanggal_akhir,$kasir_id), $file_name);    
            }else{
                $file_name = 'Laporan-'.str_replace("/","-",$input).'.xlsx';
                return Excel::download(new PenjualanExport2($tanggal_awal,$tanggal_akhir), $file_name);    
            }
        }else{

            $input = $request->tanggal;
            $pecah = explode(" - ",$input);
            $tanggal_awal = date('Y-m-d',strtotime($pecah[0]));
            $tanggal_akhir = date('Y-m-d',strtotime($pecah[1]));

            $penjualan = Penjualan_Obat::query();


            if($request->kasir_id){
                $kasir_id = $request->kasir_id;
                $penjualan = Penjualan_Obat::where('user_id',$kasir_id)->whereBetween('tgl_transaksi',[$tanggal_awal,$tanggal_akhir]);
                $user = User::where('id',$kasir_id)->first();
                $file_name = 'Laporan-'.$user->name.'-'.str_replace("/","-",$input).'.xlsx';
            }else{
                $file_name = 'Laporan-'.str_replace("/","-",$input).'.xlsx';
                $penjualan = Penjualan_Obat::whereBetween('tgl_transaksi',[$tanggal_awal,$tanggal_akhir]);
            }

            if($request->is_detail){
                $detail_penjualan =  Detail_penjualan::all();
                $data['penjualan'] = $penjualan->get();
                $data['detail'] = $detail_penjualan;
                // return view('back.pages.laporan.pdf_detail_penjualan',$data);
                $pdf = PDF::loadview('back.pages.laporan.pdf_detail_penjualan',$data);
    	        return $pdf->download('laporan-penjualan-'.date('dmyhis').'.pdf');
            }else{
                $data['penjualan'] = $penjualan->get();
                $pdf = PDF::loadview('back.pages.laporan.pdf_penjualan',$data);
                return $pdf->download('laporan-penjualan-'.date('dmyhis').'.pdf');
            }
            
            // dd($data);
            // $pdf = PDF::loadview('back.pages.laporan.pdf_detail_penjualan',$data);
    	    // return $pdf->download('laporan-berita'.date('dmyhis').'.pdf');
            
        }

        
    
    }
}
