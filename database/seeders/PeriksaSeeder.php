<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('periksas')->insert([
            [
                'id_pasien' => 1, // Sesuaikan dengan ID pasien di UsersSeeder
                'id_dokter' => 2, // Sesuaikan dengan ID dokter di UsersSeeder
                'tgl_periksa' => now(),
                'catatan' => 'Demam dan sakit kepala.',
                'biaya_periksa' => 150000,
            ],
        ]);
    }
}
