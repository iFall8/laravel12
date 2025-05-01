<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Periksa;
use App\Models\DetailPeriksa;
use Illuminate\Support\Facades\Auth;


class RiwayatController extends Controller
{
    public function index()
    {
        $periksas = Periksa::where('id_pasien', auth()->id()) // sesuaikan dengan nama kolom FK
            ->with(['detailPeriksa.obat']) // ambil relasi ke obat
            ->get();

        return view('pasien.riwayat.index', compact('periksas'));
    }
}
