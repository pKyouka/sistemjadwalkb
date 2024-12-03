@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 style="color: #008080">Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('pasien.create') }}" class="btn" style="background-color: #008080; color: white;">
                <i class="fas fa-plus"></i> Tambah Data Pasien
            </a>
        </div>
        <div class="card shadow-sm">
            <div class="card-header" style="background-color: #008080; color: white;">
                <h3 class="card-title">Data Pasien</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead style="background-color: #008080; color: white;">
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
                                        <a href="{{ route('pasien.edit', $item->id) }}" class="btn btn-sm" style="background-color: #008080; color: white;">
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
        .card {
            border-radius: 10px;
        }
        .table {
            border-radius: 5px;
            overflow: hidden;
        }
        .btn {
            border-radius: 5px;
            transition: all 0.3s;
        }
        .btn:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }
    </style>
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
