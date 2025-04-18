<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Periksa;

class PeriksaControllerPn extends Controller
{
    public function index()
    {
        $periksa = Periksa::with('dokter')->where('id', auth()->id())->get(); // atau sesuaikan dengan kebutuhan
        return view('pasien/periksa.index', compact('periksa'));
    }

}
