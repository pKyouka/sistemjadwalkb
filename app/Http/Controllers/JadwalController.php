<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\JadwalSuntikKB;
use App\Models\JadwalPeriksa;
use App\Models\Pasien;
use App\Http\Controllers\Controller;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwalperiksa = JadwalPeriksa::all();
        $jadwalsuntik = JadwalSuntikKB::all();
        return view('jadwal.index', compact('jadwalperiksa', 'jadwalsuntik'));
    }


    public function ingat()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.pengingat', compact('jadwal'));
    }

    public function create()
    {
        $pasiens = Pasien::all();
        return view('jadwal.create', compact('pasiens'));
    }

    public function createperiksa()
    {
        return view('jadwal.periksa');
    }

    public function storeJadwalPengingat(Request $request)
    {
        $request->validate([
            'namaPasien' => 'required',
            'noTelepon' => 'required',
            'tanggalSuntik' => 'required|date',
            'tanggalPengingat' => 'required|date',
            'jadwalPengingat' => 'required',
            'jenisPengingat' => 'required'
        ], [
            'required' => 'Field :attribute harus diisi',
            'date' => 'Field :attribute harus berupa tanggal'
        ]);
        $jadwalsuntik = new JadwalSuntikKB;
        $jadwalsuntik->namaPasien = $request->namaPasien;
        $jadwalsuntik->noTelepon = $request->noTelepon;
        $jadwalsuntik->tanggalSuntik = $request->tanggalSuntik;
        $jadwalsuntik->tanggalPengingat = $request->tanggalPengingat;
        $jadwalsuntik->jadwalPengingat = $request->jadwalPengingat;
        $jadwalsuntik->jenisPengingat = $request->jenisPengingat;
        $jadwalsuntik->save();
        return redirect()->route('jadwal');
    }


    public function storeJadwalPeriksa(Request $request)
    {
        $request->validate([
            'namaPasien' => 'required',
            'noTelepon' => 'required',
            'tanggalPeriksa' => 'required|date',
            'tanggalPengingat' => 'required|date',
            'jadwalPengingat' => 'required',
            'jenisPengingat' => 'required'
        ], [
            'required' => 'Field :attribute harus diisi',
            'date' => 'Field :attribute harus berupa tanggal'
        ]);
        $jadwalperiksa = new JadwalPeriksa;
        $jadwalperiksa->namaPasien = $request->namaPasien;
        $jadwalperiksa->noTelepon = $request->noTelepon;
        $jadwalperiksa->tanggalPeriksa = $request->tanggalPeriksa;
        $jadwalperiksa->tanggalPengingat = $request->tanggalPengingat;
        $jadwalperiksa->jadwalPengingat = $request->jadwalPengingat;
        $jadwalperiksa->jenisPengingat = $request->jenisPengingat;
        $jadwalperiksa->save();
        return redirect()->route('jadwal');
    }


    public function update(Request $request, $id)
    {
        $jadwal = JadwalSuntik::find($id);
        $jadwal->namaPasien = $request->namaPasien;
        $jadwal->noTelepon = $request->noTelepon;
        $jadwal->tanggalSuntik = $request->tanggalSuntik;
        $jadwal->tanggalPengingat = $request->tanggalPengingat;
        $jadwal->jadwalPengingat = $request->jadwalPengingat;
        $jadwal->jenisPengingat = $request->jenisPengingat;
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

    public function jadwalPengingatKB($id)
    {
        $jadwalpengingat = jadwalPengingat::paginate(10);
        return view('jadwal.pengingat', compact('jadwalpengingat'));
    }

    public function storePemeriksaan(Request $request)
    {
        $validated = $request->validate([
            'namaPasien' => 'required',
            'noTelepon' => 'required',
            'tanggalPeriksa' => 'required|date',
            'jenisPengingat' => 'required'
        ]);

        $jadwal = new Jadwal();
        $jadwal->namaPasien = $validated['namaPasien'];
        $jadwal->noTelepon = $validated['noTelepon'];
        $jadwal->tanggalPeriksa = $validated['tanggalPeriksa'];
        $jadwal->jenisPengingat = $validated['jenisPengingat'];
        $jadwal->save();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal pemeriksaan berhasil ditambahkan');
    }

    public function storeSuntik(Request $request)
    {
        $validated = $request->validate([
            'namaPasien' => 'required',
            'noTelepon' => 'required',
            'tanggalSuntik' => 'required|date',
            'jadwalPengingat' => 'required',
            'tanggalPengingat' => 'required|date'
        ]);

        $pengingat = new JadwalSuntikKB();
        $pengingat->namaPasien = $validated['namaPasien'];
        $pengingat->noTelepon = $validated['noTelepon'];
        $pengingat->tanggalSuntik = $validated['tanggalSuntik'];
        $pengingat->jadwalPengingat = $validated['jadwalPengingat'];
        $pengingat->tanggalPengingat = $validated['tanggalPengingat'];
        $pengingat->jenisPengingat = 'Suntik KB';
        $pengingat->save();

        return redirect()->route('jadwal.index')->with('success', 'Pengingat suntik KB berhasil ditambahkan');
    }




    public function edit($id)
    {
        $pengingat = JadwalSuntikKB::findOrFail($id);
        return view('jadwal.edit', compact('pengingat'));
    }

    public function updateJadwalPengingat(Request $request, $id)
    {
        $request->validate([
            'namaPasien' => 'required',
            'noTelepon' => 'required',
            'tanggalSuntik' => 'required|date',
            'tanggalPengingat' => 'required|date',
            'jadwalPengingat' => 'required',
            'jenisPengingat' => 'required'
        ]);

        $pengingat = JadwalSuntikKB::findOrFail($id);
        $pengingat->nama_pasien = $request->namaPasien;
        $pengingat->no_telepon = $request->noTelepon;
        $pengingat->tanggal_suntik = $request->tanggalSuntik;
        $pengingat->tanggal_pengingat = $request->tanggalPengingat;
        $pengingat->jadwal_pengingat = $request->jadwalPengingat;
        $pengingat->jenis_pengingat = $request->jenisPengingat;
        $pengingat->save();

        return redirect()->route('jadwal')->with('success', 'Pengingat berhasil diperbarui');
    }

    public function editPriksa($id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);
        return view('jadwal.editpriksa', compact('jadwal'));
    }

    public function updateJadwalPeriksa(Request $request, $id)
    {
        $request->validate([
            'namaPasien' => 'required',
            'noTelepon' => 'required',
            'tanggalPeriksa' => 'required|date',
            'tanggalPengingat' => 'required|date',
            'jadwalPengingat' => 'required',
            'jenisPengingat' => 'required'
        ]);

        $jadwal = JadwalPeriksa::findOrFail($id);
        $jadwal->namaPasien = $request->namaPasien;
        $jadwal->noTelepon = $request->noTelepon;
        $jadwal->tanggalPeriksa = $request->tanggalPeriksa;
        $jadwal->tanggalPengingat = $request->tanggalPengingat;
        $jadwal->jadwalPengingat = $request->jadwalPengingat;
        $jadwal->jenisPengingat = $request->jenisPengingat;
        $jadwal->save();

        return redirect()->route('jadwal')->with('success', 'Jadwal periksa berhasil diperbarui');
    }

    // jadwal priksa k
}
