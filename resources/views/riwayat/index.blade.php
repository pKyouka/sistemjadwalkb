@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-4" style="border-color: #008080;">
        <div class="card-header" style="background-color: #008080; color: white;">
            <h1 class="mb-0" style="font-size: 24px;"><i class="fas fa-history me-2"></i>Riwayat Jadwal</h1>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr style="background-color: #008080; color: white;">
                            <th class="text-center">No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $jadwal)
                        <tr class="align-middle">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $jadwal->nama }}</td>
                            <td>{{ $jadwal->tanggal }}</td>
                            <td>{{ $jadwal->waktu }}</td>
                            <td>{{ $jadwal->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
.table-hover tbody tr:hover {
    background-color: #e6f3f3;
    transition: background-color 0.2s;
}
.card {
    border-radius: 10px;
}
.card-header {
    border-radius: 10px 10px 0 0;
}
</style>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto refresh riwayat table every 5 minutes
    setInterval(function() {
        location.reload();
    }, 300000);

    // Add sorting functionality
    const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;
    const comparer = (idx, asc) => (a, b) => ((v1, v2) =>
        v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
    )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

    document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
        const table = th.closest('table');
        const tbody = table.querySelector('tbody');
        Array.from(tbody.querySelectorAll('tr'))
            .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
            .forEach(tr => tbody.appendChild(tr));
    })));
});
</script>

<style>
.table th {
    cursor: pointer;
    position: relative;
}

.table th:hover::after {
    content: '↕';
    position: absolute;
    right: 8px;
    opacity: 0.5;
}

.animate-new-row {
    animation: highlightNew 2s ease-in-out;
}

@keyframes highlightNew {
    0% { background-color: #c3e6cb; }
    100% { background-color: transparent; }
}
</style>
