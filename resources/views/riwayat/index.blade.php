@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Riwayat Jadwal</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayat as $jadwal)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jadwal->nama }}</td>
                <td>{{ $jadwal->tanggal }}</td>
                <td>{{ $jadwal->waktu }}</td>
                <td>{{ $jadwal->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
