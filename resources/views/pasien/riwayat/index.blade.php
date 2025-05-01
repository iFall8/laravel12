@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Riwayat Periksa')
@section('content_header_title', 'Riwayat Periksa')

@section('content_body')
<div class="card">
    <div class="card-body">
        <table class="table caption-top">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Catatan</th>
                    <th>Obat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periksas as $periksa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $periksa->tgl_periksa }}</td>
                        <td>{{ $periksa->catatan ?? '-' }}</td>
                        <td>
                            @forelse ($periksa->detailPeriksa as $detail)
                                {{ $detail->obat->nama_obat ?? '-' }}<br>
                            @empty
                                Tidak ada obat
                            @endforelse
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
