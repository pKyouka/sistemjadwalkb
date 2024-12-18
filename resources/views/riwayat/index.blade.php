@extends('adminlte::page')

@section('title', 'Riwayat Aktivitas')

@section('content_header')
    <h1 class="mb-3" style="color: #008080; font-weight: bold;">
        <i class="fas fa-history me-2"></i>
        Riwayat Aktivitas
    </h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card custom-card">
                <div class="card-header" style="background-color: #008080; color: white;">
                    <h3 class="card-title">Riwayat Aktivitas Sistem</h3>
                </div>
                <div class="card-body">
                    <!-- Filter Section -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <form method="GET" class="d-flex gap-3">
                            <div class="input-group">
                                <label class="input-group-text" for="filterType">Filter:</label>
                                <select class="form-select" name="type" id="filterType">
                                    <option value="">Semua Aktivitas</option>
                                    <option value="pasien" {{ request('type') == 'pasien' ? 'selected' : '' }}>Aktivitas Pasien</option>
                                    <option value="jadwal" {{ request('type') == 'jadwal' ? 'selected' : '' }}>Aktivitas Jadwal</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Terapkan</button>
                        </form>
                    </div>

                    <!-- Table Section -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Tipe Aktivitas</th>
                                    <th>Deskripsi</th>
                                    <th>Dilakukan Oleh</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($riwayat as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <span class="badge {{ $item->type == 'pasien' ? 'bg-info' : 'bg-success' }}">
                                                {{ ucfirst($item->type) }}
                                            </span>
                                        </td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->user->name ?? 'System' }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal{{ $item->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <!-- Detail Modal -->
                                            <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Aktivitas</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <dl class="row">
                                                                <dt class="col-sm-4">Waktu</dt>
                                                                <dd class="col-sm-8">{{ $item->created_at->format('d/m/Y H:i:s') }}</dd>

                                                                <dt class="col-sm-4">Tipe</dt>
                                                                <dd class="col-sm-8">{{ ucfirst($item->type) }}</dd>

                                                                <dt class="col-sm-4">Deskripsi</dt>
                                                                <dd class="col-sm-8">{{ $item->description }}</dd>

                                                                <dt class="col-sm-4">Data Sebelum</dt>
                                                                <dd class="col-sm-8"><pre>{{ json_encode(json_decode($item->old_values), JSON_PRETTY_PRINT) }}</pre></dd>

                                                                <dt class="col-sm-4">Data Sesudah</dt>
                                                                <dd class="col-sm-8"><pre>{{ json_encode(json_decode($item->new_values), JSON_PRETTY_PRINT) }}</pre></dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data riwayat</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .custom-card {
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .card-header {
        border-radius: 10px 10px 0 0;
    }
    .table thead th {
        background-color: #f8f9fa;
    }
    .badge {
        padding: 8px 12px;
        border-radius: 20px;
    }
    .modal pre {
        background-color: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
        max-height: 200px;
        overflow-y: auto;
    }
</style>
@stop

@section('js')
<script>
    // Add any JavaScript functionality here if needed
    $(document).ready(function() {
        // Example: Auto-hide alert messages after 5 seconds
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    });
</script>
@stop
