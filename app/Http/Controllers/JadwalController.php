<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Pasien;
use App\Http\Controllers\Controller;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        return view('jadwal.create', compact('pasiens'));
    }

    public function store(Request $request)
    {
        $jadwal = new Jadwal;
        $jadwal->idpasien = $request->idpasien;
        $jadwal->jenisSuntik = $request->jenisSuntik;
        $jadwal->jadwal = $request->jadwal;
        $jadwal->tanggalSuntik = $request->tanggalSuntik;
        $jadwal->tanggalPengingat = $request->tanggalPengingat;
        $jadwal->metodePengingat = $request->metodePengingat;
        $jadwal->tanggalSuntikBerikutnya = $request->tanggalSuntikBerikutnya;
        $jadwal->save();
        return redirect()->route('jadwal.index');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        return view('jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->idpasien = $request->idpasien;
        $jadwal->jenisSuntik = $request->jenisSuntik;
        $jadwal->jadwal = $request->jadwal;
        $jadwal->tanggalSuntik = $request->tanggalSuntik;
        $jadwal->tanggalPengingat = $request->tanggalPengingat;
        $jadwal->metodePengingat = $request->metodePengingat;
        $jadwal->tanggalSuntikBerikutnya = $request->tanggalSuntikBerikutnya;
        $jadwal->save();
        return redirect()->route('jadwal.index');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        return redirect()->route('jadwal');
    }

    public function searchPasien(Request $request)
    {
        $pasiens = Pasien::where('nama', 'like', '%'.$request->nama.'%')->get();
        return response()->json($pasiens);
    }
}
