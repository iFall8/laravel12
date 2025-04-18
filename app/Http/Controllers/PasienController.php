<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\DetailPeriksa;
use Carbon\Carbon;

class PasienController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->id();
        
        // Get counts for dashboard
        $totalPemeriksaan = Periksa::where('id_pasien', $userId)->count();
        $jadwalMendatang = Periksa::where('id_pasien', $userId)
            ->where('tgl_periksa', '>', Carbon::now())
            ->count();
        $totalResepObat = DetailPeriksa::whereHas('periksa', function($query) use ($userId) {
            $query->where('id_pasien', $userId);
        })->count();
        
        // Get upcoming examination schedule
        $jadwalPemeriksaan = Periksa::with('dokter')
            ->where('id_pasien', $userId)
            ->where('tgl_periksa', '>', Carbon::now())
            ->orderBy('tgl_periksa')
            ->limit(5)
            ->get();
            
        // Get last examination
        $pemeriksaanTerakhir = Periksa::with(['dokter', 'detailPeriksas.obat'])
            ->where('id_pasien', $userId)
            ->where('status', 'selesai')
            ->orderBy('tgl_periksa', 'desc')
            ->first();
            
        return view('pasien.dashboard', compact(
            'totalPemeriksaan', 
            'jadwalMendatang', 
            'totalResepObat',
            'jadwalPemeriksaan',
            'pemeriksaanTerakhir'
        ));
    }
}