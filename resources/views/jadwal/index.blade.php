@extends('adminlte::page')

@section('title', 'Jadwal Suntik')

@section('content_header')
    <h1 class="text-gradient fw-bold mb-3">
        <i class="fas fa-syringe me-2"></i>
        Data Jadwal Suntik
    </h1>
@stop

<style>
.text-gradient {
    background: linear-gradient(45deg, #00a3a3, #008080);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 2rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}
</style>

@section('content')
    <div class="container-fluid">
        <div class="mb-4">
            <a href="{{ route('jadwal.create') }}" class="btn btn-teal btn-lg">
                <i class="fas fa-plus me-2"></i> Tambah Jadwal
            </a>
        </div>

        <div class="card shadow">
            <div class="card-header bg-teal text-white py-3">
                <h3 class="card-title mb-0 fw-bold"><i class="fas fa-calendar-alt me-2"></i>Data Jadwal Suntik</h3>
            </div>
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="jadwalTable">
                        <thead>
                            <tr class="bg-light">
                                <th class="text-center" width="5%">#</th>
                                <th>ID Pasien</th>
                                <th>Jenis Suntik</th>
                                <th>Jadwal</th>
                                <th>Tanggal Suntik</th>
                                <th>Tanggal Pengingat</th>
                                <th>Metode Pengingat</th>
                                <th>Tanggal Suntik Berikutnya</th>
                                <th class="text-center" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jadwal as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $item->idpasien }}</td>
                                    <td>{{ $item->jenisSuntik }}</td>
                                    <td>{{ $item->jadwal }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->tanggalSuntik)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->tanggalPengingat)) }}</td>
                                    <td>{{ $item->metodePengingat }}</td>
                                    <td>{{ date('d/m/Y', strtotime($item->tanggalSuntikBerikutnya)) }}</td>
                                    <td>
                                        <div class="btn-group d-flex justify-content-center">
                                            <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-teal btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">
                                        <i class="fas fa-info-circle me-2"></i>Tidak ada data tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        :root {
            --teal-primary: #008080;
            --teal-light: #00a3a3;
            --teal-dark: #006666;
        }

        .btn-teal {
            background-color: var(--teal-primary);
            color: white;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 4px rgba(0, 128, 128, 0.2);
        }

        .btn-teal:hover {
            background-color: var(--teal-light);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 128, 128, 0.3);
        }

        .bg-teal {
            background: linear-gradient(135deg, var(--teal-primary), var(--teal-light));
        }

        .text-teal {
            color: var(--teal-primary);
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .table {
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background-color: rgba(0, 128, 128, 0.1);
            border-bottom: 2px solid var(--teal-primary);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .table td, .table th {
            padding: 1rem;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: rgba(0, 128, 128, 0.05);
        }

        .btn-group .btn {
            margin: 0 2px;
            padding: 0.5rem 0.8rem;
            border-radius: 6px;
        }

        @media (max-width: 768px) {
            .table-responsive {
                border-radius: 12px;
            }

            .btn-group {
                flex-direction: row !important;
            }
        }
    </style>
@stop

@section('content_header')
    <h1 class="text-teal fw-bold mb-3"><i class="fas fa-calendar-alt me-2"></i>Daftar Jadwal Suntik</h1>
@stop
