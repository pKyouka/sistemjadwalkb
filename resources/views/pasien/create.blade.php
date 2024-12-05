@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 style="color: #008080"><i class="fas fa-user-plus mr-2"></i>Tambah Data Pasien</h1>
@stop

@section('content')
<div class="container py-4">
    <div class="card shadow-lg rounded-lg">
        <div class="card-header" style="background-color: #008080; color: white">
            <h4 class="mb-0">Form Data Pasien</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('pasien.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="nama" class="form-label fw-bold">Nama Pasien</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                placeholder="Masukkan nama pasien" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="telepon" class="form-label fw-bold">Nomor Telepon</label>
                            <input type="number" name="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                pattern="[0-9]*" inputmode="numeric" placeholder="Masukkan nomor telepon" required>
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="alamat" class="form-label fw-bold">Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                        placeholder="Masukkan alamat lengkap" rows="3" required></textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="namaDokter" class="form-label fw-bold">Nama Dokter</label>
                            <input type="text" name="namaDokter" class="form-control @error('idDokter') is-invalid @enderror"
                                placeholder="Masukkan nama dokter" required>
                            @error('id_dokter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="Dosis" class="form-label fw-bold">Dosis</label>
                            <input type="text" name="Dosis" class="form-control @error('Dosis') is-invalid @enderror"
                                placeholder="Masukkan dosis" required>
                            @error('dosis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-lg px-4" style="background-color: #008080; color: white">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                    <a href="{{ route('pasien.index') }}" class="btn btn-lg btn-secondary px-4 ms-2">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .form-control:focus {
        border-color: #008080;
        box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.25);
    }
    .form-control {
        border-radius: 0.5rem;
    }
    .card {
        border: none;
        border-radius: 1rem;
    }
</style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
