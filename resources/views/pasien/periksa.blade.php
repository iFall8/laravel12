@extends('layouts.app')

@section('title', 'Buat Janji Periksa')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('pasien.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Buat Janji</li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Buat Janji Periksa</h3>
        </div>
        <form action="{{ route('pasien.periksa.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" class="form-control" id="nama" value="{{ Auth::user()->nama }}" readonly>
                </div>
                <div class="form-group">
                    <label for="id_dokter">Pilih Dokter</label>
                    <select class="form-control" id="id_dokter" name="id_dokter" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($dokters as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_periksa">Tanggal Periksa</label>
                    <input type="datetime-local" class="form-control" id="tgl_periksa" name="tgl_periksa" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection