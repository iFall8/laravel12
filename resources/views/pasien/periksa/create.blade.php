@extends('layouts.app')
@section('title', 'Tambah Obat')
 
@section('content_header')
    <h1>Jadwalkan Periksa</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('periksa.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="id_dokter">Dokter</label>
                    <x-adminlte-select name="id_dokter" label="Pilih Dokter">
                        <x-adminlte-options :options="$dokters" empty-option="Pilih dokter"/>
                    </x-adminlte-select>
                </div>

                <div class="form-group">
                    <label for="nama">Tanggal</label>
                    <input type="date" name="tgl_periksa" id="tgl_periksa"
                    placeholder="Tanggal Periksa" class="form-control" required>
                </div>
                <div class="wrappper d-flex justify-content-end"
                style="gap:10px;">
                    <button type="submit" class="btn
                    btn-success">Submit</button>
                    <a href="{{route('obat.index')}}" class="btn
                    btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection