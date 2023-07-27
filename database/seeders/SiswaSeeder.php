<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'name' => 'siswa',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        Siswa::create([
            'name' => 'siswa 2',
            'email' => 'siswa2@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
