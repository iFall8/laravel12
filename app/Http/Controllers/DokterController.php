<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\Obat;

class DokterController extends Controller
{
    public function dashboard()
    {
        $jumlahPeriksaHariIni = Periksa::where('id_dokter', auth()->id())
            ->whereDate('tgl_periksa', today())
            ->count();
            
        $jumlahObat = Obat::count();
        
        return view('dokter.dashboard', compact('jumlahPeriksaHariIni', 'jumlahObat'));
    }
}