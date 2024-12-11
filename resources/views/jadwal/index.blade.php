@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
    @section('content_header')
    <h1 class="mb-3" style="color: #008080; font-weight: bold;">
        <i class="fas fa-syringe me-2"></i>
        Data Penjadwalan Pasien
    </h1>
@stop

        <!-- Tabel Pengingat Suntik KB -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #008080; color: white;">
                    <h5 class="card-title mb-0">Pengingat Suntik KB</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded mb-3">
                        <form method="GET" class="d-flex align-items-center">
                            <div class="input-group">
                                <label for="perPage" class="input-group-text bg-white border-end-0">Tampilkan:</label>
                                <select name="perPage1" id="perPage" onchange="this.form.submit()"
                                    class="form-select border-start-0" style="width: 100px;">
                                    <option value="10" {{ request('perPage1') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="30" {{ request('perPage1') == 30 ? 'selected' : '' }}>30</option>
                                    <option value="50" {{ request('perPage1') == 50 ? 'selected' : '' }}>50</option>
                                    <option value="{{ $jadwal->count() }}" {{ request('perPage1') == $jadwal->count() ? 'selected' : '' }}>Semua</option>
                                </select>
                            </div>
                        </form>
                        <a href="{{ route('jadwal.pengingat') }}" class="btn btn-success btn-lg shadow-sm">
                            <i class="fas fa-plus me-2"></i>Tambah Pengingat
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tanggal Suntik</th>
                                    <th>Jenis Pengingat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jadwalsuntik as $pengingat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengingat->namaPasien }}</td>
                                    <td>{{ $pengingat->noTelepon }}</td>
                                    <td>{{ $pengingat->tanggalSuntik }}</td>
                                    <td>{{ $pengingat->jenisPengingat }}</td>
                                    <td>
                                        <a href="{{ route('jadwal.edit', $pengingat->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('jadwal.destroy', $pengingat->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Periksa Suntik KB -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header" style="background-color: #008080; color: white;">
                    <h5 class="card-title mb-0">Jadwal Periksa Suntik KB</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded mb-3">
                        <form method="GET" class="d-flex align-items-center">
                            <div class="input-group">
                                <label for="perPage" class="input-group-text bg-white border-end-0">Tampilkan:</label>
                                <select name="perPage1" id="perPage" onchange="this.form.submit()"
                                    class="form-select border-start-0" style="width: 100px;">
                                    <option value="10" {{ request('perPage1') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="30" {{ request('perPage1') == 30 ? 'selected' : '' }}>30</option>
                                    <option value="50" {{ request('perPage1') == 50 ? 'selected' : '' }}>50</option>
                                    <option value="{{ $jadwal->count() }}" {{ request('perPage1') == $jadwal->count() ? 'selected' : '' }}>Semua</option>
                                </select>
                            </div>
                        </form>
                        <a href="{{ route('jadwal.create') }}" class="btn btn-success btn-lg shadow-sm">
                            <i class="fas fa-plus me-2"></i>Tambah Periksa
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Jenis Pengingat</th>
                                    <th>Aksi</th>
                                </tr>
                            <tbody>
                                <!-- Data periksa akan ditampilkan di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .card {
        border-radius: 10px;
        border: none;
        margin-bottom: 20px;
    }
    .card-header {
        border-radius: 10px 10px 0 0;
    }
    .btn-success {
        background-color: #008080;
        border-color: #008080;
    }
    .btn-success:hover {
        background-color: #006666;
        border-color: #006666;
    }
    .table th {
        background-color: #f8f9fa;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f9f9;
    }
</style>
@endpush
@endsection
                            </thead>
