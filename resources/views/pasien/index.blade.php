@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-gradient fw-bold mb-3">
        <i class="fas fa-syringe me-2"></i>
        Data Pasien Suntik
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
    <div class="container">
        <div class="mb-4">
            <a href="{{ route('pasien.create') }}" class="btn btn-modern">
                <i class="fas fa-plus"></i> Tambah Data Pasien
            </a>
        </div>
        <div class="card custom-card">
            <div class="card-header">
                <h3 class="card-title">Data Pasien</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover modern-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>NamaDokter</th>
                                <th>Dosis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>{{ $item->namaDokter }}</td>
                                    <td>{{ $item->Dosis }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('pasien.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .btn-modern {
            background-color: #008080;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-modern:hover {
            background-color: #006666;
            color: white;
            transform: translateY(-2px);
        }

        .custom-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-top: 3px solid #008080;
        }

        .modern-table {
            width: 100%;
        }

        .modern-table thead th {
            background-color: #008080;
            color: white;
            padding: 12px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons .btn:hover {
            opacity: 0.8;
        }
    </style>
@stop
