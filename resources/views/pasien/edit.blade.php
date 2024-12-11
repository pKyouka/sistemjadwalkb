@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h1 class="m-0" style="color: #008080">
                <i class="fas fa-user-edit mr-2"></i>
                Edit Data Pasien
            </h1>
            <small class="text-muted">Modify patient information</small>
        </div>
    </div>
@stop

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header" style="background-color: #008080; color: white;">
                <h3 class="card-title mb-0">Form Edit Pasien</h3>
            </div>
            <div class="card-body bg-light">
                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama" class="font-weight-bold">Nama Pasien</label>
                                <input type="text" class="form-control shadow-sm" id="nama" name="nama" value="{{ $pasien->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="telepon" class="font-weight-bold">Nomor Telepon</label>
                                <input type="text" class="form-control shadow-sm" id="telepon" name="telepon" value="{{ $pasien->telepon }}" required>
                            </div>
                            <div class="form-group">
                                <label for="idDokter" class="font-weight-bold">Nama Dokter</label>
                                <input type="text" class="form-control shadow-sm" id="idDokter" name="idDokter" value="{{ $pasien->idDokter }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat" class="font-weight-bold">Alamat</label>
                                <textarea class="form-control shadow-sm" id="alamat" name="alamat" rows="3" required>{{ $pasien->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="Dosis" class="font-weight-bold">Dosis</label>
                                <input type="text" class="form-control shadow-sm" id="Dosis" name="Dosis" value="{{ $pasien->Dosis }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-right">
                        <a href="{{ route('pasien.index') }}" class="btn btn-secondary shadow-sm mr-2">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn shadow-sm text-white" style="background-color: #008080">
                            <i class="fas fa-save"></i> Update
                        </button>
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
        .btn:hover {
            opacity: 0.9;
        }
    </style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
