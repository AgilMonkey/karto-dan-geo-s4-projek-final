<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Absen;
use App\Models\User;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Absen::create([
            'nama' => User::first()->name,
            'waktu' => "2024-07-02 09:30:00",
            'status' => 'Datang'
        ]);
    }
}
