@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tambah data pasien</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('pasien.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Pasien</label>
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required></textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="text" name="telepon" class="form-control @error('telepon') is-invalid @enderror" required>
                @error('telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="idDokter">ID Dokter</label>
                <input type="text" name="idDokter" class="form-control @error('idDokter') is-invalid @enderror" required>
                @error('id_dokter')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Dosis">Dosis</label>
                <input type="text" name="Dosis" class="form-control @error('Dosis') is-invalid @enderror" required>
                @error('dosis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
