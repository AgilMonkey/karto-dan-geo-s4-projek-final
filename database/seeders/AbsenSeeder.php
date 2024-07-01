<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Absen;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Absen::create([
            'nama' => "agil",
            'waktu' => "2024-07-02 09:30:00",
            'status' => 'Datang'
        ]);
    }
}
