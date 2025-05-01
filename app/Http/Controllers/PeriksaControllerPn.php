<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\User;
use App\Models\Periksa;

class PeriksaControllerPn extends Controller
{
    // Di controller pasien (misalnya PeriksaController.php)
    public function index()
    {
        $periksas = Periksa::all();
        return view('pasien.periksa.index', compact('periksas'));
    }


    public function create()
    {
        // Ambil semua user yang merupakan dokter, sesuaikan dengan role
        $dokters = User::where('role', 'dokter')->pluck('nama', 'id')->toArray();

        return view('pasien.periksa.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:users,id', 
            'tgl_periksa' => 'required|date',
        ]);

        Periksa::create([
            'id_pasien' => auth()->id(),
            'id_dokter' => $request->id_dokter,
            'tgl_periksa' => $request->tgl_periksa,
            'biaya_periksa' => 0, // default atau bisa dihitung otomatis
        ]);

        return redirect()->route('periksa.index')->with('success', 'Jadwal periksa berhasil ditambahkan.');
    }

}
