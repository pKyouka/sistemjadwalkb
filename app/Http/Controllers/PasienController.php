<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('perPage', 10); // Default 10 data per halaman
        $pasien = Pasien::paginate($perPage);
        return view('pasien.index', compact('pasien'));
    }


    public function create()
    {
        $pasien = Pasien::all();
        return view('pasien.create', compact('pasien'));
    }

    public function store(Request $request)
    {
        $pasien = new Pasien;
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->telepon = $request->telepon;
        $pasien->namaDokter = $request->namaDokter;
        $pasien->Dosis = $request->Dosis;
        $pasien->save();
        return redirect()->route('pasien.index');
    }

    public function edit($id)
    {
        $pasien = Pasien::find($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::find($id);
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->telepon = $request->telepon;
        $pasien->namaDokter = $request->namaDokter;
        $pasien->Dosis = $request->Dosis;
        $pasien->save();
        return redirect()->route('pasien.index');
    }


    public function destroy($id)
    {
        Pasien::findOrFail($id)->delete();
        return redirect()->route('pasien.index');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $pasien = Pasien::where('nama', 'like', "%" . $keyword . "%")->get();
        return view('pasien.index', compact('pasien'));
    }

}
