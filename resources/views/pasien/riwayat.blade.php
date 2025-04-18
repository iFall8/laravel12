@extends('layouts.app')

@section('title', 'Riwayat Periksa')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pasien.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Riwayat Periksa</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Riwayat Pemeriksaan</h3>
        </div>
        <div class="card-body">
            <table id="riwayatTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Tanggal Periksa</th>
                        <th>Catatan</th>
                        <th>Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayats as $key => $riwayat)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $riwayat->dokter->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($riwayat->tgl_periksa)->format('d M Y H:i') }}</td>
                            <td>{{ $riwayat->catatan ?? '-' }}</td>
                            <td>Rp {{ number_format($riwayat->biaya_periksa, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function () {
            $('#riwayatTable').DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endpush