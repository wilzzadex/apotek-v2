<?php

namespace App\Http\Controllers;
use DataTables;
use App\Models\Pembelian;
use App\Models\Detail_pembelian;
use Illuminate\Http\Request;

class HistoriPembelianController extends Controller
{
    public function index()
    {
        return view('back.pages.histori.pembelian.pembelian');
    }

    public function dataPembelian(Request $request)
    {
        $filter1 = $request->tahun . '-' . $request->bulan;
        // dd($filter1);
        $query = Pembelian::where('created_at','like','%' . $filter1 . '%')->get();
        return Datatables::of($query)
        ->editColumn('tgl_faktur', function($query){
            return date('d M Y',strtotime($query->tgl_faktur));
        })
        ->editColumn('suplier_id', function($query){
            return $query->suplier->nama_suplier;
        })
        ->editColumn('jumlah_tagihan', function($query){
            return 'Rp.'.number_format($query->jumlah_tagihan,0,',','.');
        })
        ->editColumn('jenis', function($query){
            if($query->jenis == 'Kredit'){
                $jenis = '<span class="badge badge-info">Kredit</span>';
            }

            if($query->jenis == 'Tunai'){
                $jenis = '<span class="badge badge-success">Tunai</span>';
            }

            return $jenis;
        })
        ->editColumn('keterangan', function($query){
            $keterangan = '';
            if($query->jenis == 'Kredit'){
                $keterangan  .= 'Jatuh Tempo : ' . date('d M Y',strtotime($query->jatuh_tempo)); 
            }

            return $keterangan;
        })
        ->editColumn('status_tagihan', function($query){
            $status = '';
            if($query->status_tagihan == 'lunas'){
                $status = '<span class="badge badge-success">Lunas</span>';
            }

            if($query->status_tagihan == 'belum_lunas'){
                $status = '<span class="badge badge-danger">Belum Lunas</span>';
            }

            return $status;
        })
        ->addColumn('aksi', function($query){
            $status = '';
            if($query->status_tagihan == 'belum_lunas'){
                $status = '<a class="dropdown-item" href="javascript:void(0)">Lunasi</a>';     
            }
            return '<div class="dropdown dropdown-inline mr-4">
                        <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ki ki-bold-more-hor"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0)">Lihat Detail</a>
                            <a class="dropdown-item" href="javascript:void(0)">Cetak</a>
                            '.$status.'
                        </div>
                    </div>';
        })
        ->rawColumns(['jenis','keterangan','aksi','status_tagihan'])
        ->addIndexColumn()
        ->make(true);
    }
}
