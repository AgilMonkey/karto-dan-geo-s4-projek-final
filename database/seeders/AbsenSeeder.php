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
        // Define specific user data
        $users = [
            [
                'nama' => 'Agil',
                'waktu' => '2024-07-02 07:30:00',
                'status' => 'Datang',
            ],
            [
                'nama' => 'Agil',
                'waktu' => '2024-07-02 17:30:00',
                'status' => 'Pulang',
            ],
            [
                'nama' => 'Jane Smith',
                'waktu' => '2024-07-02 08:00:00',
                'status' => 'datang',
            ],
            [
                'nama' => 'Jane Smith',
                'waktu' => '2024-07-02 16:00:00',
                'status' => 'pulang',
            ],
            [
                'nama' => 'Bob Brown',
                'waktu' => '2024-07-02 09:00:00',
                'status' => 'datang',
            ],
            [
                'nama' => 'Bob Brown',
                'waktu' => '2024-07-02 18:00:00',
                'status' => 'pulang',
            ],
        ];

        // Insert users into the database
        foreach ($users as $user) {
            Absen::create($user);
        }
    }
}
