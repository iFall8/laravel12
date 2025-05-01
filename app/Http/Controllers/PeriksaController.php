<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Periksa;

class PeriksaController extends Controller
{
    // Tampilkan semua periksa
    public function index()
    {
        $periksas = Periksa::with('pasien')->get(); // Load pasien biar nanti bisa dipakai kalau mau
        return view('dokter.periksa.index', compact('periksas'));
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $periksa = Periksa::findOrFail($id);
        $obats = Obat::all(); // ambil semua obat
        return view('dokter.periksa.edit', compact('periksa', 'obats'));
    }

    // Proses update biaya
    public function update(Request $request, $id)
    {
        $request->validate([
            'catatan' => 'nullable|string|max:1000',
        ]);
        
        $periksa = Periksa::findOrFail($id);
    
        // Ambil ID obat yang dipilih
        $obatIds = $request->input('obats', []);
    
        // Hitung total harga obat dari database
        $totalHargaObat = Obat::whereIn('id', $obatIds)->sum('harga');
    
        // Hitung total biaya: harga obat + biaya jasa dokter (30.000)
        $totalBiaya = $totalHargaObat + 30000;
    
        // Update data periksa
        $periksa->catatan = $request->input('catatan'); // Tambahkan catatan
        $periksa->biaya_periksa = $totalBiaya;
        $periksa->save();
    
        // Simpan relasi obat
        $periksa->obats()->sync($obatIds);
    
        return redirect('/dokter/periksa')->with('success', 'Data periksa berhasil diperbarui.');
    }
    

    // Menghapus periksa
    public function destroy($id)
    {
        $periksa = Periksa::findOrFail($id);
        $periksa->delete();

        return redirect('/dokter/periksa')->with('success', 'Data periksa berhasil dihapus.');
    }

}
