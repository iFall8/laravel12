@extends('layouts.app')

@section('title','Dashboard Dokter')
@section('subtitle','Obat')

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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Memeriksa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Memeriksa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Periksa Pasien</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pasien</th>
                      <th>Keluhan</th>
                      <th>Tanggal</th>
                      <th>Biaya</th>
                      <th>Obat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($periksas->count() > 0)
                      @foreach ($periksas as $periksa)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $periksa->pasien->nama }}</td>
                          <td>{{ $periksa-> catatan }}</td>
                          <td>{{ $periksa->tgl_periksa }}</td>
                          <td>{{ $periksa->biaya_periksa }}</td>
                          <td>
                            @foreach ($periksa->obats as $obat)
                              <span class="badge badge-info">{{ $obat->nama_obat }}</span><br>
                            @endforeach
                          </td>
                          <td>
                            <a href="{{ url('dokter/periksa/'. $periksa->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ url('dokter/periksa/' . $periksa->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus obat ini?')">Delete</button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="5" class="text-center">Tidak ada data obat.</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection