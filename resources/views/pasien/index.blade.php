@extends('adminlte::page')

@section('title', 'Data Pasien')

@section('content_header')
    <h1 class="text-gradient fw-bold mb-3">
        <i class="fas fa-user-injured me-2"></i>
        Data Pasien
    </h1>
@stop

@section('content')
    <div class="container">
        <!-- Tombol Tambah Data -->
        <div class="mb-4">
            <a href="{{ route('pasien.create') }}" class="btn btn-modern">
                <i class="fas fa-plus"></i> Tambah Data Pasien
            </a>
        </div>

        <!-- Form Pilihan Jumlah Data -->
        <form method="GET" action="{{ route('pasien.index') }}" class="mb-3">
            <label for="perPage" class="form-label">Tampilkan:</label>
            <select name="perPage" id="perPage" onchange="this.form.submit()" class="form-select form-select-sm w-auto d-inline">
                <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                <option value="30" {{ request('perPage') == 30 ? 'selected' : '' }}>30</option>
                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="{{ $pasien->total() }}" {{ request('perPage') == $pasien->total() ? 'selected' : '' }}>Semua</option>
            </select>
        </form>

        <!-- Tabel Data Pasien -->
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
                                <th>Nama Dokter</th>
                                <th>Dosis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pasien as $index => $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($pasien->currentPage() - 1) * $pasien->perPage() }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>{{ $item->namaDokter }}</td>
                                    <td>{{ $item->Dosis }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('pasien.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('pasien.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data tidak tersedia</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper mt-4">
            <div class="d-flex justify-content-center">
            {{ $pasien->appends(['perPage' => request('perPage')])->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <style>
            .page-item.active .page-link {
            background-color: #008080;
            border-color: #008080;
            }
            .page-link {
            color: #008080;
            }
            .page-link:hover {
            color: #006666;
            }
        </style>
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

        .text-gradient {
            background: linear-gradient(45deg, #00a3a3, #008080);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>
@stop
