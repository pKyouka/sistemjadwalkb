@extends('adminlte::page')

@section('title', 'Update Pasien')

@section('content_header')
    <h1 class="text-teal">Update Data Pasien</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="card shadow-lg">
            <div class="card-header text-white" style="background-color: #008080;">
                <h3 class="card-title"><i class="fas fa-user-edit"></i> Form Update Pasien</h3>
            </div>
            <div class="card-body bg-light">
                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama"><i class="fas fa-user"></i> Nama Pasien</label>
                                <input type="text" class="form-control form-control-lg @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" value="{{ $pasien->nama }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_telepon"><i class="fas fa-phone"></i> Nomor Telepon</label>
                                <input type="text" class="form-control form-control-lg @error('no_telepon') is-invalid @enderror"
                                    id="no_telepon" name="no_telepon" value="{{ $pasien->no_telepon }}" required>
                                @error('no_telepon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_lahir"><i class="fas fa-calendar"></i> Tanggal Lahir</label>
                                <input type="date" class="form-control form-control-lg @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir" name="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}" required>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat"><i class="fas fa-map-marker-alt"></i> Alamat</label>
                                <textarea class="form-control form-control-lg @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" rows="3" required>{{ $pasien->alamat }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-4">
                        <a href="{{ route('pasien.index') }}" class="btn btn-secondary btn-lg mr-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="button" class="btn btn-danger btn-lg mr-2" onclick="window.location.reload();">
                            <i class="fas fa-times"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-lg" style="background-color: #008080; color: white;">
                            <i class="fas fa-save"></i> Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card {
            border-radius: 15px;
            border: none;
        }
        .card-header {
            border-radius: 15px 15px 0 0;
            padding: 1.5rem;
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #eee;
            padding: 0.8rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #008080;
            box-shadow: 0 0 0 0.2rem rgba(0, 128, 128, 0.25);
        }
        .btn {
            border-radius: 10px;
            padding: 0.8rem 1.5rem;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        label {
            font-weight: 600;
            color: #444;
            margin-bottom: 0.5rem;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Add hover effect to form inputs
            $('.form-control').hover(
                function() { $(this).addClass('shadow-sm'); },
                function() { $(this).removeClass('shadow-sm'); }
            );
        });
    </script>
@stop
