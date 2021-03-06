<?php

namespace App\Http\Controllers;
use App\Models\Penjualan_Obat;
use App\Models\Detail_penjualan;
use Illuminate\Http\Request;
use DataTables;

class HistoriPenjualanController extends Controller
{
    public function index()
    {
        return view('back.pages.histori.penjualan.penjualan');
    }

    public function datapenjualan(Request $request)
    {
        $user_id = auth()->user()->id;
        $filter1 = $request->tahun . '-' . $request->bulan;
        // dd($filter1);
        $penjualan = Penjualan_Obat::where('created_at', 'like', '%' . $filter1 . '%')->orderBy('id','DESC');
        if(auth()->user()->role != 'admin'){
            $query = $penjualan->where('user_id',$user_id);
        }else{
            
        }

        $query = $penjualan->get();
        return Datatables::of($query)
            ->editColumn('tgl_transaksi', function ($query) {
                return date('d M Y', strtotime($query->tgl_transaksi));
            })
            ->editColumn('pelanggan_id', function ($query) {
                return '-Umum-';
            })
            ->editColumn('jumlah_bayar', function ($query) {
                return 'Rp.' . number_format($query->jumlah_bayar, 0, ',', '.');
            })
            ->addColumn('aksi', function ($query) {
                return '<div class="dropdown dropdown-inline mr-4">
                        <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ki ki-bold-more-hor"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="lihatDetail(this)" id="' . $query->id . '">Lihat Detail</a>
                            <a class="dropdown-item" href="' . route('histori.penjualan.print', $query->id) . '" target="_blank">Cetak</a>
                        </div>
                    </div>';
            })
            ->rawColumns(['jenis', 'keterangan', 'aksi', 'status_tagihan'])
            ->addIndexColumn()
            ->make(true);
    }

    public function struk($id){
        $penjualan =  Penjualan_Obat::where('id',$id)->first();
        $detail_penjualan = Detail_penjualan::where('no_transaksi',$penjualan->no_transaksi)->get();

        $data['penjualan'] = $penjualan;
        $data['detail_penjualan'] = $detail_penjualan;
        return view('back.pages.laporan.struk',$data);
    }

    public function detailpenjualan(Request $request)
    {
        $penjualan = Penjualan_Obat::findOrFail($request->id);
        // dd($penjualan);
        $detail = Detail_penjualan::where('no_transaksi',$penjualan->no_transaksi)->get();
        $data['penjualan'] = $penjualan;
        $data['detail'] = $detail;
        return view('back.pages.part_of.detail_penjualan',$data);
    }
}
