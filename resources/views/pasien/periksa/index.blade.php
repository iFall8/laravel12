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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periksas as $o)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $o->dokter->nama  }}</td>
                            <td>{{ $o->tgl_periksa }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection