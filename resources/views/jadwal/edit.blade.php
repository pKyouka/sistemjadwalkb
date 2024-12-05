@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-teal">Edit Data Jadwal</h1>
@stop

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-teal text-white">
            <h3 class="card-title mb-0">Form Edit Jadwal</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                @csrf
                @method('POST')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="idpasien" class="font-weight-bold">ID Pasien</label>
                            <input type="text" class="form-control shadow-sm" id="idpasien" name="idpasien" value="{{ $jadwal->idpasien }}" required>
                        </div>

                        <div class="form-group">
                            <label for="jenisSuntik" class="font-weight-bold">Jenis Suntik</label>
                            <input type="text" class="form-control shadow-sm" id="jenisSuntik" name="jenisSuntik" value="{{ $jadwal->jenisSuntik }}" required>
                        </div>

                        <div class="form-group">
                            <label for="jadwal" class="font-weight-bold">Jadwal</label>
                            <select class="form-control shadow-sm" id="jadwal" name="jadwal" required>
                                <option value="suntik" {{ $jadwal->jadwal == 'suntik' ? 'selected' : '' }}>Suntik</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggalSuntik" class="font-weight-bold">Tanggal Suntik</label>
                            <input type="date" class="form-control shadow-sm" id="tanggalSuntik" name="tanggalSuntik" value="{{ $jadwal->tanggalSuntik }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggalPengingat" class="font-weight-bold">Tanggal Pengingat</label>
                            <input type="date" class="form-control shadow-sm" id="tanggalPengingat" name="tanggalPengingat" value="{{ $jadwal->tanggalPengingat }}" required>
                        </div>

                        <div class="form-group">
                            <label for="metodePengingat" class="font-weight-bold">Metode Pengingat</label>
                            <input type="text" class="form-control shadow-sm" id="metodePengingat" name="metodePengingat" value="{{ $jadwal->metodePengingat }}" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggalSuntikBerikutnya" class="font-weight-bold">Tanggal Suntik Berikutnya</label>
                            <input type="date" class="form-control shadow-sm" id="tanggalSuntikBerikutnya" name="tanggalSuntikBerikutnya" value="{{ $jadwal->tanggalSuntikBerikutnya }}" required>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-right">
                    <a href="{{ route('jadwal.create') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn text-white" style="background-color: #008080;">
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
    .bg-teal {
        background-color: #008080 !important;
    }
    .text-teal {
        color: #008080 !important;
    }
    .form-control:focus {
        border-color: #008080;
        box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.25);
    }
</style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
