<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Pasien;
use App\Http\Controllers\Controller;

class RiwayatController extends Controller
{
    public function index()
    {
        $riwayat = Riwayat::all();
        return view('riwayat.index', compact('riwayat'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        return view('riwayat.create', compact('pasiens'));
    }

    public function store(Request $request)
    {
        $riwayat = new Riwayat;
        $riwayat->idpasien = $request->idpasien;
        $riwayat->jenisSuntik = $request->jenisSuntik;
        $riwayat->jadwal = $request->jadwal;
        $riwayat->tanggalSuntik = $request->tanggalSuntik;
        $riwayat->tanggalPengingat = $request->tanggalPengingat;
        $riwayat->metodePengingat = $request->metodePengingat;
        $riwayat->tanggalSuntikBerikutnya = $request->tanggalSuntikBerikutnya;
        $riwayat->save();
        return redirect()->route('riwayat.index');
    }

    public function edit($id)
    {
        $riwayat = Riwayat::find($id);
        return view('riwayat.edit', compact('riwayat'));
    }

    public function update(Request $request, $id)
    {
        $riwayat = Riwayat::find($id);
        $riwayat->idpasien = $request->idpasien;
        $riwayat->jenisSuntik = $request->jenisSuntik;
        $riwayat->jadwal = $request->jadwal;
        $riwayat->tanggalSuntik = $request->tanggalSuntik;
        $riwayat->tanggalPengingat = $request->tanggalPengingat;
        $riwayat->metodePengingat = $request->metodePengingat;
        $riwayat->tanggalSuntikBerikutnya = $request->tanggalSuntikBerikutnya;
        $riwayat->save();
        return redirect()->route('riwayat.index');
    }

    public function destroy($id)
    {
        $riwayat = Riwayat::find($id);
        $riwayat->delete();
        return redirect()->route('riwayat.index');
    }

    public function searchPasien(Request $request)
    {
        $pasiens = Pasien::where('nama', 'like', '%'.$request->nama.'%')->get();
        return response()->json($pasiens);
    }
}
