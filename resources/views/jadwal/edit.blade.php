@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="mb-3">
    <a href="{{ route('jadwal.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Edit Data Jadwal
    </a>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="idpasien">ID Pasien</label>
                <input type="text" class="form-control" id="idpasien" name="idpasien" value="{{ $jadwal->idpasien }}" required>
            </div>

            <div class="form-group">
                <label for="jenisSuntik">Jenis Suntik</label>
                <input type="text" class="form-control" id="jenisSuntik" name="jenisSuntik" value="{{ $jadwal->jenisSuntik }}" required>
            </div>

            <div class="form-group">
                <label for="jadwal">Jadwal</label>
                <input type="text" class="form-control" id="jadwal" name="jadwal" value="{{ $jadwal->jadwal }}" required>
            </div>

            <div class="form-group">
                <label for="tanggalSuntik">Tanggal Suntik</label>
                <input type="date" class="form-control" id="tanggalSuntik" name="tanggalSuntik" value="{{ $jadwal->tanggalSuntik }}" required>
            </div>

            <div class="form-group">
                <label for="tanggalPengingat">Tanggal Pengingat</label>
                <input type="date" class="form-control" id="tanggalPengingat" name="tanggalPengingat" value="{{ $jadwal->tanggalPengingat }}" required>
            </div>

            <div class="form-group">
                <label for="metodePengingat">Metode Pengingat</label>
                <input type="text" class="form-control" id="metodePengingat" name="metodePengingat" value="{{ $jadwal->metodePengingat }}" required>
            </div>

            <div class="form-group">
                <label for="tanggalSuntikBerikutnya">Tanggal Suntik Berikutnya</label>
                <input type="date" class="form-control" id="tanggalSuntikBerikutnya" name="tanggalSuntikBerikutnya" value="{{ $jadwal->tanggalSuntikBerikutnya }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
