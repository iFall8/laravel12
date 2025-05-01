@extends('layouts.app')

@section('title', 'Dashboard Dokter')
@section('subtitle', 'Edit Biaya')

@section('nav-item')
  @if (request()->is('dokter*'))
    <li class="nav-item">
      <a href="/dokter/periksa" class="nav-link {{ request()->is('dokter/periksa*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Periksa</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="/dokter/obat" class="nav-link {{ request()->is('dokter/obat*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Obat</p>
      </a>
    </li>
  @else
    @each('adminlte::partials.sidebar.menu-item', $adminlte->menu(), 'item')
  @endif
@endsection

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Biaya</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('obat.index') }}">Obat</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Periksa</h3>
              </div>
              <form action="{{ url('dokter/periksa/' . $periksa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mt-3">
                  <label for="catatan">Catatan Dokter:</label>
                  <textarea name="catatan" id="catatan" rows="4" class="form-control">{{ old('catatan', $periksa->catatan) }}</textarea>
                </div>

                <div class="form-group">
                <label>Obat yang diberikan:</label>
                <div class="row">
                    @foreach ($obats as $obat)
                    <div class="col-md-4">
                        <div class="form-check">
                        <input class="form-check-input"
                                type="checkbox"
                                name="obats[]"
                                value="{{ $obat->id }}"
                                id="obat_{{ $obat->id }}"
                                {{ in_array($obat->id, $periksa->obats->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label class="form-check-label" for="obat_{{ $obat->id }}">
                            {{ $obat->nama_obat }}
                        </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="card-footer text-right">
                  <a href="{{ url('/dokter/periksa') }}" class="btn btn-secondary">Kembali</a>
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection