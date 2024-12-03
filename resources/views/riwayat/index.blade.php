@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4" style="border-color: #008080;">
        <div class="card-header" style="background-color: #008080; color: white;">
            <h1 class="mb-0" style="font-size: 24px;"><i class="fas fa-history me-2"></i>Riwayat Jadwal</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr style="background-color: #008080; color: white;">
                            <th class="text-center">No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $jadwal)
                        <tr class="align-middle">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $jadwal->nama }}</td>
                            <td>{{ $jadwal->tanggal }}</td>
                            <td>{{ $jadwal->waktu }}</td>
                            <td>{{ $jadwal->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.table-hover tbody tr:hover {
    background-color: #e6f3f3;
    transition: background-color 0.2s;
}
.card {
    border-radius: 10px;
}
.card-header {
    border-radius: 10px 10px 0 0;
}
</style>
@endsection
