@extends('layouts.app')
 
{{-- Customize layout sections --}}
 
@section('subtitle', 'Dokter')
@section('content_header_title', 'Periksa')
@section('content_body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('periksa.create') }}" class="btn
btn-primary">Jadwalkan Periksa</a>
        </div>
 
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Dokter</th>
                        <th>Tanggal</th>
                        <th>Biaya</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periksa as $o)
                        <tr>
                            <td>{{ $o->id }}</td>
                            <td>{{ $o->dokter->nama  }}</td>
                            <td>{{ $o->tgl_periksa }}</td>
                            <td>{{ $o->biaya_periksa }}</td>
                            <td>
                                @if ($o->created_at != $o->updated_at)
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-danger">Belum Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection