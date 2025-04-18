<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Periksa;

class RiwayatController extends Controller
{
    public function index()
    {
        return view('pasien/riwayat.index');
    }
}
