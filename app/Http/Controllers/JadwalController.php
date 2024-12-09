<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\JadwalSuntikKB;
use App\Models\Pasien;
use App\Http\Controllers\Controller;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        $jadwalsuntik = JadwalSuntikKB::all();
        return view('jadwal.index', compact('jadwal', 'jadwalsuntik'));
    }


    public function ingat()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.pengingat', compact('jadwal'));
    }

    public function create()
    {
        return view('jadwal.create', compact('pasiens'));
    }

    public function storeJadwalPengingat(Request $request)
    {
        $jadwalsuntik = new JadwalSuntikKB;
        $jadwalsuntik->namaPasien = $request->namaPasien;
        $jadwalsuntik->noTelepon = $request->noTelepon;
        $jadwalsuntik->tanggalSuntik = $request->tanggalSuntik;
        $jadwalsuntik->tanggalPengingat = $request->tanggalPengingat;
        $jadwalsuntrik->jadwalPengingat = $request->jadwalPengingat;
        $jadwalsuntik->jenisPengingat = $request->jenisPengingat;
        $jadwalsuntik->save();
        return redirect()->route('jadwal.index');
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
        return redirect()->route('jadwal');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        if ($jadwal) {
            $jadwal->delete();
            return redirect()->route('jadwal');
        }
        return redirect()->route('jadwal')->with('error', 'Jadwal not found');
    }

    public function searchPasien(Request $request)
    {
        $pasiens = Pasien::where('nama', 'like', '%'.$request->nama.'%')->get();
        return response()->json($pasiens);
    }
}
