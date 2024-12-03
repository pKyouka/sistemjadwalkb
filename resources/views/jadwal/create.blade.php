@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<div class="d-flex align-items-center mb-4">
    <i class="fas fa-calendar-plus fa-2x text-primary me-3"></i>
    <h1 class="m-0 text-primary fw-bold">Tambah Data Pasien</h1>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
        <div class="card-header bg-primary text-white p-4">
            <h5 class="m-0"><i class="fas fa-user-plus me-2"></i>Form Data Pasien</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('jadwal.store') }}" method="POST" class="needs-validation" novalidate>
                @csrf

                <div class="row g-4">
                    <!-- Pasien Selection Group -->
                    <div class="col-md-6">
                        <div class="form-group position-relative">
                            <label class="form-label text-primary fw-bold">
                                <i class="fas fa-user me-2"></i>ID Pasien
                            </label>
                            <div class="input-group">
                                <select name="idpasien" class="form-select rounded-start @error('idpasien') is-invalid @enderror" id="pasienSelect">
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach($pasiens as $pasien)
                                        <option value="{{ $pasien->id }}">{{ $pasien->id }} - {{ $pasien->nama }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="idpasien_manual"
                                       class="form-control @error('idpasien') is-invalid @enderror"
                                       id="pasienInput" style="display: none;"
                                       placeholder="Masukkan ID Pasien">
                                <button class="btn btn-outline-primary" type="button" onclick="toggleInput()">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>
                            <div id="searchResults" class="list-group shadow-sm position-absolute w-100 mt-1 z-3"></div>
                            @error('idpasien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Jenis Suntik -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary fw-bold">
                                <i class="fas fa-syringe me-2"></i>Jenis Suntik
                            </label>
                            <input type="text" name="jenisSuntik"
                                   class="form-control @error('jenisSuntik') is-invalid @enderror"
                                   placeholder="Masukkan jenis suntik" required>
                            @error('jenisSuntik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Schedule Fields -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary fw-bold">
                                <i class="fas fa-clock me-2"></i>Jadwal
                            </label>
                            <input type="text" name="jadwal"
                                   class="form-control @error('jadwal') is-invalid @enderror"
                                   placeholder="Masukkan jadwal" required>
                            @error('jadwal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Date Fields -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary fw-bold">
                                <i class="fas fa-calendar-day me-2"></i>Tanggal Suntik
                            </label>
                            <input type="date" name="tanggalSuntik"
                                   class="form-control @error('tanggalSuntik') is-invalid @enderror" required>
                            @error('tanggalSuntik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary fw-bold">
                                <i class="fas fa-bell me-2"></i>Tanggal Pengingat
                            </label>
                            <input type="date" name="tanggalPengingat"
                                   class="form-control @error('tanggalPengingat') is-invalid @enderror" required>
                            @error('tanggalPengingat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Reminder Method -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary fw-bold">
                                <i class="fas fa-comment-alt me-2"></i>Metode Pengingat
                            </label>
                            <select name="metodePengingat"
                                    class="form-select @error('metodePengingat') is-invalid @enderror" required>
                                <option value="">-- Pilih Metode --</option>
                                <option value="SMS">SMS</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Email">Email</option>
                            </select>
                            @error('metodePengingat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Next Injection Date -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary fw-bold">
                                <i class="fas fa-calendar-plus me-2"></i>Tanggal Suntik Berikutnya
                            </label>
                            <input type="date" name="tanggalSuntikBerikutnya"
                                   class="form-control @error('tanggalSuntikBerikutnya') is-invalid @enderror" required>
                            @error('tanggalSuntikBerikutnya')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top">
                    <a href="{{ route('jadwal.index') }}" class="btn btn-light">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
    .card {
        background: #ffffff;
        transition: all 0.3s ease-in-out;
        border: none;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .form-control, .form-select {
        border-radius: 8px;
        padding: 0.75rem;
        border: 1px solid #008080;
        color: #008080;
        transition: all 0.2s ease;
    }
    .form-control:focus, .form-select:focus {
        border-color: #008080;
        box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.25);
        color: #008080;
    }
    .btn {
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
    }
    .btn-primary {
        background: #008080;
        border-color: #008080;
    }
    .btn-primary:hover {
        background: #006666;
        transform: translateY(-2px);
    }
    .form-label {
        margin-bottom: 0.5rem;
        color: #008080;
        font-size: 0.875rem;
    }
    .invalid-feedback {
        font-size: 0.875rem;
        color: #008080;
    }
    .text-primary {
        color: #008080 !important;
    }
    .bg-primary {
        background-color: #008080 !important;
    }
</style>
@stop

@section('js')
<script>
    // Add your JavaScript here
</script>
@stop
