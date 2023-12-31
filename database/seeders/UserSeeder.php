<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@admin.com',
            'password' => Hash::make('12345678'),
        ]);

        // Tambahkan pengguna lainnya jika diperlukan

        // ...
    }
}
