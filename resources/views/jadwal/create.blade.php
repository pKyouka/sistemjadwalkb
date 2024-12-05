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
                                <input type="text"
                                       class="form-control @error('idpasien') is-invalid @enderror"
                                       id="searchPasien"
                                       placeholder="Cari pasien..."
                                       autocomplete="off">
                                <select name="idpasien" class="form-select d-none" id="pasienSelect">
                                    <option value="">-- Pilih Pasien --</option>
                                    @foreach($pasiens as $pasien)
                                        <option value="{{ $pasien->id }}">{{ $pasien->id }} - {{ $pasien->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="searchResults" class="list-group position-absolute w-100 mt-1 z-3"></div>
                            @error('idpasien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <script>
                    document.getElementById('searchPasien').addEventListener('input', function() {
                        const searchText = this.value.toLowerCase();
                        const select = document.getElementById('pasienSelect');
                        const results = document.getElementById('searchResults');
                        results.innerHTML = '';

                        if (searchText.length > 0) {
                            Array.from(select.options).forEach(option => {
                                if (option.text.toLowerCase().includes(searchText) && option.value) {
                                    const div = document.createElement('div');
                                    div.className = 'list-group-item list-group-item-action';
                                    div.textContent = option.text;
                                    div.onclick = () => {
                                        select.value = option.value;
                                        this.value = option.text;
                                        results.innerHTML = '';
                                    };
                                    results.appendChild(div);
                                }
                            });
                        }
                    });
                    </script>

                    <!-- Jenis Suntik -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label text-primary fw-bold">
                                <i class="fas fa-syringe me-2"></i>Jenis Suntik
                            </label>
                            <select name="jenisSuntik"
                                    class="form-select @error('jenisSuntik') is-invalid @enderror" required>
                                <option value="">-- Pilih Jenis Suntik --</option>
                                <option value="KB 1 Bulan">KB 1 Bulan</option>
                                <option value="KB 3 Bulan">KB 3 Bulan</option>
                                <option value="KB 6 Bulan">KB 6 Bulan</option>
                                <option value="KB 1 Tahun">KB 1 Tahun</option>
                            </select>
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
                            <select name="jadwal" class="form-select @error('jadwal') is-invalid @enderror" required>
                                <option value="">-- Pilih Jadwal --</option>
                                <option value="Senin">fruetd</option>
                            </select>
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
                                <option value="WhatsApp">WhatsApp</option>
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
                    <a href="{{ route('jadwal.create') }}" class="btn btn-light">
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
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-control, .form-select {
        border-radius: 8px;
        padding: 0.75rem;
        border: 1px solid #008080;
        color: #008080;
        transition: all 0.2s ease;
        height: 48px;
        width: 100%;
    }

    .form-control:focus, .form-select:focus {
        border-color: #008080;
        box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.25);
        color: #008080;
    }

    .row {
        margin: 0 -15px;
    }

    .col-md-6 {
        padding: 0 15px;
    }

    .btn {
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
        font-weight: 600;
        min-width: 120px;
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
        margin-bottom: 0.75rem;
        color: #008080;
        font-size: 0.95rem;
        display: block;
    }

    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
        margin-top: 0.25rem;
    }

    .text-primary {
        color: #008080 !important;
    }

    .bg-primary {
        background-color: #008080 !important;
    }

    .list-group-item {
        padding: 0.75rem 1rem;
        border-color: #008080;
    }
</style>
@stop

@section('js')
<script>
    // Form validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
@stop
