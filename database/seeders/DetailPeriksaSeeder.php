<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_periksas')->insert([
            [
                'id_periksa' => 1, // Sesuaikan dengan ID di PeriksaSeeder
                'id_obat' => 1, // Sesuaikan dengan ID di ObatSeeder
            ],
            [
                'id_periksa' => 1,
                'id_obat' => 2,
            ],
        ]);
    }
}
