<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Periksa;

class PeriksaController extends Controller
{
    public function index()
    {
        return view('dokter/periksa.index');
    }

    public function create()
    {
        // misalnya kamu ingin menampilkan list dokter untuk dipilih
        $dokter = \App\Models\User::where('role', 'dokter')->get();
        return view('pasien.periksa.create', compact('dokter'));
    }

}
