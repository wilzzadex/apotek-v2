<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::all();
        $data['unit'] = $unit;
        return view('back.pages.unit.unit',$data);
    }

    public function add()
    {
        return view('back.pages.unit.unit_add');
    }

    public function store(Request $request)
    {
        $unit = new Unit();
        $unit->nama = $request->nama;
        $unit->save();

        return redirect(route('unit'))->with('success','Data Berhasil di simpan !');
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $data['unit'] = $unit;
        return view('back.pages.unit.unit_edit',$data);
    }

    public function update(Request $request,$id)
    {
        $unit = Unit::findOrFail($id);
        $unit->nama = $request->nama;
        $unit->save();
        return redirect(route('unit'))->with('success','Data Berhasil di ubah !');

    }

    public function destroy(Request $request)
    {
        $unit = Unit::findOrFail($request->id);
        $unit->delete();
    }
}

