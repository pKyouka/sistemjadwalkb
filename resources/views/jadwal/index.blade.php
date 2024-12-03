@extends('adminlte::page')

@section('title', 'Jadwal Suntik')

@section('content_header')
    <h1 class="text-teal">Daftar Jadwal Suntik</h1>
@stop

@section('content')
    <div class="mb-3">
        <a href="{{ route('jadwal.create') }}" class="btn btn-teal">
            <i class="fas fa-plus"></i> Tambah Jadwal
        </a>
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-teal text-white">
            <h3 class="card-title mb-0">Data Jadwal Suntik</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="jadwalTable">
                    <thead class="bg-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>ID Pasien</th>
                            <th>Jenis Suntik</th>
                            <th>Jadwal</th>
                            <th>Tanggal Suntik</th>
                            <th>Tanggal Pengingat</th>
                            <th>Metode Pengingat</th>
                            <th>Tanggal Suntik Berikutnya</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwal as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->idpasien }}</td>
                                <td>{{ $item->jenisSuntik }}</td>
                                <td>{{ $item->jadwal }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->tanggalSuntik)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->tanggalPengingat)) }}</td>
                                <td>{{ $item->metodePengingat }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->tanggalSuntikBerikutnya)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-teal btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <style>
        .btn-teal {
            background-color: #008080;
            color: white;
        }
        .btn-teal:hover {
            background-color: #006666;
            color: white;
        }
        .bg-teal {
            background-color: #008080;
        }
        .text-teal {
            color: #008080;
        }
        .table thead th {
            border-bottom: 2px solid #008080;
        }
        .card {
            border: none;
            border-radius: 10px;
        }
        .card-header {
            border-radius: 10px 10px 0 0;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#jadwalTable').DataTable({
                "ordering": true,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
                }
            });
        });
    </script>
@stop
