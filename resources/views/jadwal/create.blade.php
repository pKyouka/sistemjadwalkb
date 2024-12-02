@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tambah data pasien</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="idpasien">ID Pasien</label>
                <div class="input-group">
                    <select name="idpasien" class="form-control @error('idpasien') is-invalid @enderror" id="pasienSelect">
                        <option value="">Pilih Pasien</option>
                        @foreach($pasiens as $pasien)
                            <option value="{{ $pasien->id }}">{{ $pasien->id }} - {{ $pasien->nama }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="idpasien_manual" class="form-control @error('idpasien') is-invalid @enderror" id="pasienInput" style="display: none;" placeholder="Masukkan ID Pasien">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="toggleInput()">Switch Input</button>
                    </div>
                </div>
                <div id="searchResults" class="list-group" style="position: absolute; z-index: 1000; width: 95%;"></div>
                @error('idpasien')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @push('js')
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                function toggleInput() {
                    const select = document.getElementById('pasienSelect');
                    const input = document.getElementById('pasienInput');
                    if (select.style.display === 'none') {
                        select.style.display = 'block';
                        input.style.display = 'none';
                        input.value = '';
                    } else {
                        select.style.display = 'none';
                        input.style.display = 'block';
                        select.value = '';
                    }
                }

                $('#pasienInput').on('input', function() {
                    let query = $(this).val();
                    $.ajax({
                        url: "{{ route('pasien.search') }}",
                        method: 'GET',
                        data: { query: query },
                        success: function(data) {
                            let html = '';
                            if (data.length > 0) {
                                data.forEach(function(pasien) {
                                    html += `<a href="javascript:void(0)" class="list-group-item list-group-item-action"
                                            onclick="selectPasien('${pasien.id}', '${pasien.nama}')">${pasien.id} - ${pasien.nama}</a>`;
                                });
                            } else {
                                html = '<a class="list-group-item">Tidak ada hasil</a>';
                            }
                            $('#searchResults').html(html).show();
                        }
                    });
                });

                function selectPasien(id, nama) {
                    $('#pasienInput').val(id);
                    $('#searchResults').hide();
                }

                $(document).on('click', function(e) {
                    if (!$(e.target).closest('#searchResults, #pasienInput').length) {
                        $('#searchResults').hide();
                    }
                });
            </script>
            @endpush

            <div class="form-group">
                <label for="jenisSuntik">Jenis Suntik</label>
                <input type="text" name="jenisSuntik" class="form-control @error('jenisSuntik') is-invalid @enderror" required>
                @error('jenisSuntik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jadwal">Jadwal</label>
                <input type="text" name="jadwal" class="form-control @error('jadwal') is-invalid @enderror" required>
                @error('jadwal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggalSuntik">Tanggal Suntik</label>
                <input type="date" name="tanggalSuntik" class="form-control @error('tanggalSuntik') is-invalid @enderror" required>
                @error('tanggalSuntik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggalPengingat">Tanggal Pengingat</label>
                <input type="date" name="tanggalPengingat" class="form-control @error('tanggalPengingat') is-invalid @enderror" required>
                @error('tanggalPengingat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="metodePengingat">Metode Pengingat</label>
                <input type="text" name="metodePengingat" class="form-control @error('metodePengingat') is-invalid @enderror" required>
                @error('metodePengingat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggalSuntikBerikutnya">Tanggal Suntik Berikutnya</label>
                <input type="date" name="tanggalSuntikBerikutnya" class="form-control @error('tanggalSuntikBerikutnya') is-invalid @enderror" required>
                @error('tanggalSuntikBerikutnya')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> Aplikasi Penjadwalan</script>
@stop
