<?php

namespace App\Http\Controllers;

use App\Models\Detail_pembelian;
use App\Models\Kategori;
use App\Models\Golongan;
use App\Models\Obat;
use App\Models\Unit;
use App\Models\Satuan_Obat;
use Facade\FlareClient\View;
use DB;
use Illuminate\Http\Request;
use DataTables;

class ObatController extends Controller
{
    public function index()
    {
        return view('back.pages.obat.obat');
    }

    public function add(){
        $data['kategori'] = Kategori::orderBy('nama_kategori','ASC')->get();
        $data['golongan'] = Golongan::orderBy('nama_golongan','ASC')->get();
        $data['unit'] = Unit::orderBy('tingkat_satuan','ASC')->get();
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

        foreach($request->jumlah_satuan as $key => $item){
            $statement = DB::select("SHOW TABLE STATUS LIKE 'satuan_obat'");
            $nextId = $statement[0]->Auto_increment;
            $satuan_obat = new Satuan_Obat();
            $satuan_obat->kode_obat = $obat->kode_obat;
            $satuan_obat->unit_id = $request->jumlah_satuan[$key];
            $satuan_obat->jumlah_satuan = isset($request->jumlah) ? $request->jumlah[$key] : 0;
            $satuan_obat->unit_id_sama_dengan = $request->sama_dengan[$key];
            $satuan_obat->sama_dengan = $nextId + 1;
            $satuan_obat->save();

            // if($satuan_obat->unit_id != $satuan_obat->unit_id_sama_dengan){
            //     $before_id = $satuan_obat
            // }
        }

        return redirect(route('obat'))->with('success','Data Berhasil di simpan');
    }

    public function getSatuan(Request $request)
    {
        // dd($request->all());
        $satuan_selected = Unit::whereIn('id',$request->satuan_selected)->get();
        $satuan = Unit::query();
        foreach($satuan_selected as $item){
            $satuan = $satuan->where('tingkat_satuan','>',$item->tingkat_satuan);
        }
        $data['satuan'] = $satuan->get();
        $satuan_next = $satuan->orderBy('tingkat_satuan','DESC')->first();
        $data['satuan_next'] = Unit::whereIn('id',$request->satuan_selected)->orderBy('tingkat_satuan','DESC')->first();
        $data['html_satuan'] = view('back.pages.part_of.select_satuan',$data)->render();
        return response()->json($data);
    }

    public function dataObat()
    {
        $query = Obat::orderBy('nama_obat','ASC')->with('details')->get();
        return Datatables::of($query)
        ->editColumn('nama_obat', function($query){
            return $query->kode_obat . ' - ' . $query->nama_obat;
        })
        ->editColumn('kategori_id', function($query){
            return $query->kategori->nama_kategori;
        })
        ->editColumn('golongan_id', function($query){
            return $query->golongan->nama_golongan;
        })
        ->addColumn('no_batch', function($query){
            $batch = '';
            foreach($query->details as $item){
                $batch .= $item->no_batch . ' - ' . date('d F Y',strtotime($item->tgl_exp)) . '<br>';
            }
            return $batch;
        })
        ->addColumn('harga_jual', function($query){
            $harga_jual = '';
            $pembelian = Satuan_Obat::where('kode_obat',$query->kode_obat)->get();
            foreach($pembelian as $key => $item){
                $harga_jual .= 'Harga Jual Per ' . $item->unit->nama  . ' : ' . number_format($item->harga_Jual,0,',','.') . '<br>';
            }
            return $harga_jual;
        })
        ->addColumn('stok', function($query){
            $stoks = '';
            $pembelian = Satuan_Obat::where('kode_obat',$query->kode_obat)->get();
            foreach($pembelian as $item){
                $stoks .= $item->stok . ' ' . $item->unit->nama . '<br>';
            }
            return $stoks;
        })
        ->addColumn('status', function($query){
            $satuan = Satuan_Obat::where('kode_Obat',$query->kode_obat)->get();
            $unit_id = [];
            foreach($satuan as $item){
                $unit_id[] .= $item->unit_id;
            }
            $unit = Unit::whereIn('id',$unit_id)->orderBy('tingkat_satuan','asc')->first();
            $stok = Satuan_Obat::where('kode_obat',$query->kode_obat)->where('unit_id',$unit->id)->first();
            $stok_ava = $stok->stok;
            $stok_min = $query->stok_minimum;
            if($stok_ava < $stok_min){
                $html ='<span class="badge badge-warning">Restock!</span>';
            }else{
                $html ='<span class="badge badge-success">Available</span>';
            }
            return $html;
        })
        ->addColumn('aksi', function($query){
            if(auth()->user()->role == 'admin'){
                return '<div class="dropdown dropdown-inline mr-4">
                        <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ki ki-bold-more-hor"></i>
                        </button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="lihatDetail(this)" id="'.$query->id.'">Lihat Satuan</a>
                            <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                            <a class="dropdown-item" href="javascript:void(0)">Hapus</a>
                        </div>
                    </div>';
            }else{
                return '<div class="dropdown dropdown-inline mr-4">
                <button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-hor"></i>
                </button>
                <div class="dropdown-menu" style="">
                    <a class="dropdown-item" href="javascript:void(0)" onclick="lihatDetail(this)" id="'.$query->id.'">Lihat Satuan</a>
                    
                </div>
            </div>';
            }
            
        })
        ->rawColumns(['aksi','no_batch','stok','harga_jual','status'])
        ->addIndexColumn()
        ->make(true);
    }
}
