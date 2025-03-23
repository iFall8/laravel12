<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('obats')->insert([
            ['nama_obat' => 'Paracetamol', 'kemasan' => 'Tablet 500mg', 'harga' => 5000],
            ['nama_obat' => 'Amoxicillin', 'kemasan' => 'Kapsul 250mg', 'harga' => 10000],
        ]);
    }
}
