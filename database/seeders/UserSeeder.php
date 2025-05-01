<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'dr. Jane Doe',
            'alamat' => 'Jl. Jalan',
            'no_hp' => '081234567890',
            'email' => 'janedoe@gmail.com',
            'role' => 'dokter',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'nama' => 'dr. Virginia Abigail',
            'alamat' => 'Bandung, Indonesia',
            'no_hp' => '088888888',
            'email' => 'virginiaabigail@gmail.com',
            'role' => 'dokter',
            'password' => Hash::make('password'),
        ]);
    }
}
