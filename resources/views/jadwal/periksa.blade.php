@extends('layouts.app')

@section('title', 'Periksa')

@section('content_header')
<div class="d-flex align-items-center mb-4 animate__animated animate__fadeIn">
    <div>
        <h1 class="m-0 fw-bold" style="color: #008080; text-shadow: 2px 2px 4px rgba(0,0,0,0.1);">
            Form Periksa Suntik KB
        </h1>
        <p class="text-muted mb-0 mt-1">
            <i class="fas fa-info-circle me-1"></i>
            Atur jadwal periksa suntik KB Anda disini
        </p>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg border-0 rounded-3 overflow-hidden">
        <div class="card-header text-white p-4" style="background-color: #008080;">
            <h5 class="m-0"><i class="fas fa-calendar-check me-2"></i>Form Periksa</h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('jadwal.storeJadwalPeriksa') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row g-4">
                    <!-- Nama Pasien -->
                    <div class="col-md-6">
                    <div class="form-group">
                            <label class="form-label fw-bold" style="color: #008080;">
                                <i class="fas fa-user me-2"></i>Nama Pasien<span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control @error('nama_pasien') is-invalid @enderror"
                                   name="namaPasien"
                                   required
                                   oninvalid="this.setCustomValidity('Nama pasien harus diisi')"
                                   oninput="setCustomValidity('')"
                                   placeholder="Masukkan nama pasien">
                            @error('namaPasien')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="invalid-feedback">
                                Nama pasien tidak boleh kosong
                            </div>
                        </div>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-bold" style="color: #008080;">
                                <i class="fas fa-phone me-2"></i>Nomor Telepon<span class="text-danger">*</span>
                            </label>
                            <input type="tel"
                                   class="form-control @error('noTelepon') is-invalid @enderror"
                                   name="noTelepon"
                                   required
                                   oninvalid="this.setCustomValidity('Nama pasien harus diisi')"
                                   oninput="setCustomValidity('')"
                                   placeholder="Masukkan Nomor Telepon">
                            @error('noTelepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tanggal Suntik -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-bold" style="color: #008080;">
                                <i class="fas fa-calendar-day me-2"></i>Tanggal Periksa<span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   class="form-control datepicker @error('tanggalSuntik') is-invalid @enderror"
                                   id="tanggalSuntik"
                                   name="tanggalPeriksa"
                                   required
                                   oninvalid="this.setCustomValidity('Nama pasien harus diisi')"
                                   oninput="setCustomValidity('')"
                                   placeholder="Masukkan Tanggal Suntik"
                                   data-min-date="today">
                            @error('tanggalSuntik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Jadwal Pengingat -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-bold" style="color: #008080;">
                                <i class="fas fa-clock me-2"></i>Jadwal Pengingat<span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jadwalPengingat') is-invalid @enderror"
                                    id="jadwalPengingat"
                                    name="jadwalPengingat"
                                    required>
                                <option value="-1">H-1</option>
                                <option value="-2">H-2</option>
                                <option value="-3">H-3</option>
                            </select>
                            @error('jadwalPengingat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tanggal Pengingat -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-bold" style="color: #008080;">
                            <i class="fas fa-bell me-2"></i>Tanggal Pengingat<span class="text-danger">*</span>
                        </label>
                        <input type="text"
                            class="form-control @error('tanggalPengingat') is-invalid @enderror"
                            id="tanggalPengingat"
                            name="tanggalPengingat"
                            readonly>
                        <input type="hidden" id="hiddenTanggalPengingat" name="hiddenTanggalPengingat">
                            @error('tanggalPengingat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>


                    <!-- Jenis Pengingat -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label fw-bold" style="color: #008080;">
                                <i class="fas fa-comments me-2"></i>Jenis Pengingat<span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('jenisPengingat') is-invalid @enderror"
                                    name="jenisPengingat"
                                    required>
                                <option value="whatsapp">WhatsApp</option>
                            </select>
                            @error('jenisPengingat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-4 text-right">
                    <a href="{{ route('jadwal') }}" class="btn btn-secondary px-4 me-2">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                    <button type="submit" class="btn px-4" style="background-color: #008080; color: white;">
                        <i class="fas fa-save me-2"></i>Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    /* Your existing styles here */
</style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        flatpickr('.datepicker', {
            dateFormat: "Y-m-d",
            defaultDate: null,
            allowInput: true,
        });

        const tanggalSuntik = document.getElementById('tanggalSuntik');
        const jadwalPengingat = document.getElementById('jadwalPengingat');
        const tanggalPengingat = document.getElementById('tanggalPengingat');

        function hitungTanggalPengingat() {
            const suntikValue = tanggalSuntik.value;
            const hMinus = parseInt(jadwalPengingat.value);

            if (suntikValue) {
                const suntikDate = new Date(suntikValue);
                suntikDate.setDate(suntikDate.getDate() + hMinus);
                tanggalPengingat.value = suntikDate.toISOString().split('T')[0];
            }
        }

        tanggalSuntik.addEventListener('change', hitungTanggalPengingat);
        jadwalPengingat.addEventListener('change', hitungTanggalPengingat);
    });
</script>
@endpush
@stop
