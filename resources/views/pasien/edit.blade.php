@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('pasien.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Edit Data Pasien
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $pasien->nama }}" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required>{{ $pasien->alamat }}</textarea>
                </div>
                <div class="form-group">
                    <label for="telepon">Nomor Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $pasien->telepon }}" required>
                </div>
                <div class="form-group">
                    <label for="idDokter">ID Dokter</label>
                    <input type="text" class="form-control" id="idDokter" name="idDokter" value="{{ $pasien->idDokter }}" required>
                </div>
                <div class="form-group">
                    <label for="Dosis">Dosis</label>
                    <input type="text" class="form-control" id="Dosis" name="Dosis" value="{{ $pasien->Dosis }}" required>
                </div>
                <a href="{{ route('pasien.index') }}" class="btn btn-warning">Cancel</a>
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
